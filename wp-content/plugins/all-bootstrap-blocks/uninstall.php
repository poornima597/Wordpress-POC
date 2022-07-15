<?php
// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

define( 'AREOI__VERSION', '1.0.0' );
define( 'AREOI__NAME', 'AREOI' );
define( 'AREOI__MINIMUM_WP_VERSION', '5.8' );
define( 'AREOI__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'AREOI__PLUGIN_URI', plugin_dir_url( __FILE__ ) );
define( 'AREOI__BOOTSTRAP_VERSION', '5.0.2' );
define( 'AREOI__PREPEND', 'areoi' );

require_once( AREOI__PLUGIN_DIR . 'class.areoi.settings.php' );
$_settings = new AREOI_Settings();
$page      = $_settings->get_settings();

foreach ( $page['children'] as $child_key => $child ) {
    
    if ( empty( $child['sections'] ) ) {
        continue;   
    }

    foreach ( $child['sections'] as $section_key => $section ) {
        
        if ( empty( $section['options'] ) ) {
            continue;   
        }
        foreach ( $section['options'] as $option_key => $option ) {
            delete_option( $option['name'] );
        }
    }
}

delete_option( 'areoi-bootstrap-version' );