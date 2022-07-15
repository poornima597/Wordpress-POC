<?php

class AREOI_Api
{
	private static $initiated = false;

	public static function init() 
	{

		if ( !self::$initiated ) {
			if ( is_user_logged_in() ) {
				register_rest_route( 'areoi', '/variables', array(
					'methods' => 'GET',
					'callback' => array( 'AREOI_Api', 'variables' ),
					'permission_callback' => function() {
						return true;
					}
				) );

				register_rest_route( 'areoi', '/theme-json', array(
					'methods' => 'GET',
					'callback' => array( 'AREOI_Api', 'theme_json' ),
					'permission_callback' => function() {
						return true;
					}
				) );

				register_rest_route( 'areoi', '/bootstrap-classes', array(
					'methods' => 'GET',
					'callback' => array( 'AREOI_Api', 'bootstrap_classes' ),
					'permission_callback' => function() {
						return true;
					}
				) );
			}
		}
	}

	public static function variables() 
	{
		$query = sanitize_text_field( !empty( $_GET['q'] ) ) ? sanitize_text_field( $_GET['q'] ) : false;
		$_settings 	= new AREOI_Settings();
		$page 		= $_settings->get_settings();
		$variables  = array();
		foreach ( $page['children'] as $child_key => $child ) {
			if ( empty( $child['sections'] ) ) {
				continue;	
			}
			foreach ( $child['sections'] as $section_key => $section ) {
				
				if ( empty( $section['options'] ) ) {
					continue;	
				}
				foreach ( $section['options'] as $option_key => $option ) {

					if ( empty( $option['variable'] ) ) {
						continue;
					}
					if ( $query && strpos( $option['label'], $query ) === false ) {
						continue;
					}
					$variables[] = array( 
						'id' => $option['label'],
						'text' => $option['label']
					);
				}
			}
		}
		sort( $variables );

		$response = $variables;
		
		return array( 'results' => $response );
	}

	public static function theme_json() 
	{

		$query = sanitize_text_field( !empty( $_GET['q'] ) ) ? sanitize_text_field( $_GET['q'] ) : false;		
		$theme_json = areoi_get_theme_json();
		$variables = array();
		foreach ( $theme_json as $row_key => $row ) {

			$include = false;
			foreach ( $row['children'] as $child_key => $child ) {
				if ( !$query || strpos( strtolower( $row['text'] ), strtolower( $query ) ) !== false || strpos( strtolower( $child['text'] ), strtolower( $query ) ) !== false ) {
					$include = true;
				}
			}
			if ( $include ) {
				$variables[] = array( 
					'children' 	=> $row['children'],
					'text' 	=> $row['text']
				);
			}
		}
		sort( $variables );

		$response = $variables;
		
		return array( 'results' => $response );
	}

	public static function bootstrap_classes() 
	{

		$query = sanitize_text_field( !empty( $_GET['q'] ) ) ? sanitize_text_field( $_GET['q'] ) : false;		
		$classes = json_decode( file_get_contents( AREOI__PLUGIN_DIR . '/settings/classes/bootstrap-class-list.json' ) );
		$variables = array();
		foreach ( $classes as $class_key => $class ) {

			if ( $query && strpos( $class, $query ) === false ) continue;

			$variables[] = array(
				'id' 	=> $class,
				'text' => $class
			);
		}
		sort( $variables );

		$response = $variables;
		
		return array( 'results' => $response );
	}
}
