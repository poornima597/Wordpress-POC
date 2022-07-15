<?php
class AREOI_Reset
{
	private static $initiated = false;

	public static function init() {
		if ( ! self::$initiated ) {
			self::init_hooks();
		}
	}

	private static function init_hooks() 
	{
		self::$initiated = true;

		if ( is_admin() && !empty( $_POST['areoi-reset'] ) && $_POST['areoi-reset'] == 1 ) {
			self::reset();
		}
	}

	public static function reset()
	{
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

		$_settings = new AREOI_Settings();
        $_settings->compile_scss();

        $status = 'success';
		$message = 'Your settings have been reverted!';

        add_action( 'admin_notices', function() use ( $status, $message ) {
			?>
			<div class="notice notice-<?php echo $status ?> is-dismissible">
		        <p><?php echo $message ?></p>
		    </div>
			<?php 
		} );
	}
}
