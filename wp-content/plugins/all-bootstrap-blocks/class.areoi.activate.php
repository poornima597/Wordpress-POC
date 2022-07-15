<?php
class AREOI_Activate
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

		$_settings = new AREOI_Settings();
		$_settings->compile_scss();

		update_option( 'areoi-dashboard-global-bootstrap-css', 1 );
		update_option( 'areoi-dashboard-global-bootstrap-js', 1 );
	}
}
