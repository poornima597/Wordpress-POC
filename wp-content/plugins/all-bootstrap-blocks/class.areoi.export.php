<?php
class AREOI_Export
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

		if ( is_admin() && !empty( $_POST['areoi-export'] ) && $_POST['areoi-export'] == 1 ) {
			self::export();
		}

		if ( is_admin() && !empty( $_POST['areoi-import'] ) && $_POST['areoi-import'] == 1 && !empty( $_FILES['areoi-import-file'] ) ) {
			self::import();
		}
	}

	public static function export()
	{
		$disallow = array('areoi-bootstrap-version', 'areoi-version');
		$new_options = array();
		$options = wp_load_alloptions();
		foreach ( $options as $slug => $values ) {
		    if ( str_starts_with( $slug, 'areoi-') && !in_array( $slug, $disallow ) ) {
		    	$new_options[$slug] = $values;
		    }
		}

		header( 'Content-type: application/json', true, 200 );
	    header( 'Content-Disposition: attachment; filename=all-bootstrap-blocks-' . date( 'Y-m-d-H-i-s' ) . '.json' );
	    header( 'Pragma: no-cache' );
	    header( 'Expires: 0' );
	    echo json_encode( $new_options );
	    exit();
	}

	public static function import()
	{
		$options = json_decode( file_get_contents( $_FILES['areoi-import-file']['tmp_name'] ), true );

		$status = 'error';
		$message = '';

		if ( $options !== NULL ) {
			$disallow = array('areoi-bootstrap-version', 'areoi-version');

			foreach ( $options as $slug => $values ) {
			    if ( str_starts_with( $slug, 'areoi-') && !in_array( $slug, $disallow ) ) {
			    	update_option( $slug, $values );
			    }
			}

			$_settings = new AREOI_Settings();
    		$_settings->compile_scss();

			$status = 'success';
			$message = 'Your settings were successfully imported!';
		} else {
			$message = 'That does not look to be a valid settings file. Please try another one.';
		}

		add_action( 'admin_notices', function() use ( $status, $message ) {
			?>
			<div class="notice notice-<?php echo $status ?> is-dismissible">
		        <p><?php echo $message ?></p>
		    </div>
			<?php 
		} );
	}
}
