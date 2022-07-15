<?php

class AREOI_GenerateSettings
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

		self::generate_settings( array() );
	}

	public static function generate_settings( $params )
	{
		$variables = self::get_variables();
		$variables = self::clean_variables( $variables );
		$variables = self::format_variables( $variables );

		$params = array(
			'name' 			=> 'Code',
			'slug'			=> 'code',
			'description' 	=> '',
			'position'		=> 10,
			'theme'			=> false,
		);

		$output = self::print_variables( $variables, $params );
		header('Content-Type: text/plain');
	}

	public static function get_variables()
	{
		$variables = '
			$code-font-size:                    $small-font-size !default;
$code-color:                        $pink !default;

$kbd-padding-y:                     .2rem !default;
$kbd-padding-x:                     .4rem !default;
$kbd-font-size:                     $code-font-size !default;
$kbd-color:                         $white !default;
$kbd-bg:                            $gray-900 !default;

$pre-color:                         null !default;
		';
		return $variables;
	}

	public static function clean_variables( $variables )
	{
		$variables = trim( preg_replace( '/\t+/', '', $variables ) );
		$variables = str_replace( '!default', '', $variables );
		$variables = str_replace( ' ;', ';', $variables );
		return $variables;
	}

	public static function format_variables( $variables )
	{
		$variables_arr 	= explode( ';', $variables );
		$variables 		= array();
		foreach ( $variables_arr as $variable_key => $variable ) {
			$variable 	= trim( $variable );
			if ( $variable ) {
				$variable_arr 	= array_map('trim', explode( ':', $variable ) );
				$variables[] 	= $variable_arr;
			}
		}

		return $variables;
	}

	public static function print_variables( $variables, $params )
	{
$output = '<?php
/*
Name: ' . $params['name'] . '
Slug: ' . $params['slug'] . '
Description: ' . $params['description'] . '
Position: ' . $params['position'] . '
Theme: ' . $params['theme'] . '
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? \'-\' . $section : \'\' )  . \'-' . $params['slug'] . '-\';

return array(';

foreach ( $variables as $variable_key => $variable ) {
	$label 		= $variable[0];
	$value 		= $variable[1];
	$name 		= str_replace( '$', '', $variable[0] );

	switch ( $value ) {
		case strpos( $value, '#' ) !== false:
			$type = 'color-picker';
		break;
		case in_array( $value, array( 'true', 'false') ):
			$type = 'checkbox';

			if ( $value == 'true' ) {
				$value = 1;
			} else {
				$value = 0;
			}

		break;
		default:
			$type = 'text';
		break;
	}

	$output 	.= '
	array(
		\'label\' => \'' . $label . '\',
		\'name\' => $slug . \'' . $name . '\',
		\'variable\' => \'' . $label . '\',
		\'row\' => \'default\',
		\'input\' => \'' . $type . '\',
		\'default\' => \'' . $value . '\',
		\'description\' => \'\',
		\'allow_reset\' => true,
		\'options\' => array()
	),';
	}

$output .= '
);';

		return $output;
	}
}
