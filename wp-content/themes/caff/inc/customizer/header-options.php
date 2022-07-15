<?php
/**
 * Adds the header options sections, settings, and controls to the theme customizer
 *
 * @package Caff
 */

class Caff_Header_Options {
	public function __construct() {
		// Register Header Options.
		add_action( 'customize_register', array( $this, 'register_header_options' ) );
	}

	/**
	 * Add header options section and its controls
	 */
	public function register_header_options( $wp_customize ) {
		// Add header options section.
		$wp_customize->add_section( 'caff_header_options',
			array(
				'title' => esc_html__( 'Header Options', 'caff' ),
				'panel' => 'caff_theme_options'
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'type'              => 'text',
				'settings'          => 'caff_header_email',
				'sanitize_callback' => 'sanitize_email',
				'label'             => esc_html__( 'Email', 'caff' ),
				'section'           => 'caff_header_options',
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'type'              => 'text',
				'settings'          => 'caff_header_phone',
				'sanitize_callback' => 'caff_text_sanitization',
				'label'             => esc_html__( 'Phone', 'caff' ),
				'section'           => 'caff_header_options',
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'type'              => 'text',
				'settings'          => 'caff_header_address',
				'sanitize_callback' => 'caff_text_sanitization',
				'label'             => esc_html__( 'Address', 'caff' ),
				'section'           => 'caff_header_options',
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'type'              => 'text',
				'settings'          => 'caff_header_open_hours',
				'sanitize_callback' => 'caff_text_sanitization',
				'label'             => esc_html__( 'Open Hours', 'caff' ),
				'section'           => 'caff_header_options',
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'type'              => 'text',
				'settings'          => 'caff_header_button_text',
				'sanitize_callback' => 'caff_text_sanitization',
				'label'             => esc_html__( 'Button Text', 'caff' ),
				'section'           => 'caff_header_options',
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'type'              => 'url',
				'settings'          => 'caff_header_button_link',
				'sanitize_callback' => 'esc_url_raw',
				'label'             => esc_html__( 'Button Link', 'caff' ),
				'section'           => 'caff_header_options',
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'custom_control'    => 'Caff_Toggle_Switch_Custom_control',
				'settings'          => 'caff_header_button_target',
				'sanitize_callback' => 'caff_switch_sanitization',
				'label'             => esc_html__( 'Open link in new tab?', 'caff' ),
				'section'           => 'caff_header_options',
			)
		);
	}
}

/**
 * Initialize class
 */
$caff_theme_options = new Caff_Header_Options();
