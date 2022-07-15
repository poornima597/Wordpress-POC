<?php
/**
 * @package All Bootstrap Blocks
 * @version 1.2.5
 * 
 * Plugin Name:     All Bootstrap Blocks
 * Text Domain:     all-bootstrap-blocks
 * Plugin URI:      https://areoi.io/all-bootstrap-blocks/
 * Description:     Create fully responsive Bootstrap 5 page layouts. 37 free blocks including containers, rows, columns, modals, accordions, cards, buttons and much more.
 * Author:          AREOI
 * Author URI:      https://areoi.io/
 * Version:         1.2.5
 * License:         GPL v2 or later
 * License URI:     https://www.gnu.org/licenses/gpl-2.0.html
*/

$areoi_version = '1.2.5';

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
    echo esc_attr( 'Hi there!  I\'m just a plugin, not much I can do when called directly.' );
    exit;
}

// Define globals properties
define( 'AREOI__VERSION', $areoi_version );
define( 'AREOI__NAME', 'AREOI' );
define( 'AREOI__MINIMUM_WP_VERSION', '5.8' );
define( 'AREOI__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'AREOI__PLUGIN_URI', plugin_dir_url( __FILE__ ) );
define( 'AREOI__BOOTSTRAP_VERSION', '5.0.2' );
define( 'AREOI__PREPEND', 'areoi' );
define( 'AREOI__TEXT_DOMAIN', 'all-bootstrap-blocks' );

// Include required classes
require_once( AREOI__PLUGIN_DIR . 'vendors/scssphp-1.6.0/scss.inc.php' );
require_once( AREOI__PLUGIN_DIR . 'helpers.php' );
require_once( AREOI__PLUGIN_DIR . 'class.areoi.php' );
require_once( AREOI__PLUGIN_DIR . 'class.areoi.blocks.php' );
require_once( AREOI__PLUGIN_DIR . 'class.areoi.settings.php' );
require_once( AREOI__PLUGIN_DIR . 'class.areoi.styles.php' );
require_once( AREOI__PLUGIN_DIR . 'class.areoi.api.php' );
require_once( AREOI__PLUGIN_DIR . 'class.areoi.activate.php' );
require_once( AREOI__PLUGIN_DIR . 'class.areoi.export.php' );
require_once( AREOI__PLUGIN_DIR . 'class.areoi.reset.php' );

// Trigger initialise actions across different classes
add_action( 'init', array( 'AREOI', 'init' ) );
add_action( 'init', array( 'AREOI_Blocks', 'init' ) );    
add_action( 'init', array( 'AREOI_Settings', 'init' ) );    
add_action( 'init', array( 'AREOI_Styles', 'init' ) ); 
add_action( 'init', array( 'AREOI_Export', 'init' ) );   
add_action( 'init', array( 'AREOI_Reset', 'init' ) );    
add_action( 'rest_api_init', array( 'AREOI_Api', 'init' ) );
register_activation_hook( __FILE__, array( 'AREOI_Activate', 'init' ) );

// Updated compiled scss whenever the version number changes
if ( get_option( 'areoi-version' ) != $areoi_version ) {
    $_settings = new AREOI_Settings();
    $_settings->compile_scss();
    update_option( 'areoi-version', $areoi_version );
}

// Recompile if theme.json exists and has been updated
if ( $theme_json = areoi_get_theme_json() ) {
    $cur_filetime   = areoi_get_theme_json_last_update();
    $prev_filetime  = get_option( 'areoi-theme-json-updated' );

    if ( !$prev_filetime || $prev_filetime < $cur_filetime ) {
        $_settings = new AREOI_Settings();
        $_settings->compile_scss();
    }
}
