<?php
/**
 * Testimonial Options
 *
 * @package Caff
 */

class Caff_Testimonial_Options {
	public function __construct() {
		// Register Testimonial Options.
		add_action( 'customize_register', array( $this, 'register_options' ), 99 );

		// Add default options.
		add_filter( 'caff_customizer_defaults', array( $this, 'add_defaults' ) );
	}

	/**
	 * Add options to defaults
	 */
	public function add_defaults( $default_options ) {
		$defaults = array(
			'caff_testimonial_visibility' => 'disabled',
			'caff_testimonial_number'     => 4,
		);

		$updated_defaults = wp_parse_args( $defaults, $default_options );

		return $updated_defaults;
	}

	/**
	 * Add layouts section and its controls
	 */
	public function register_options( $wp_customize ) {
		Caff_Customizer_Utilities::register_option(
			array(
				'settings'          => 'caff_testimonial_visibility',
				'type'              => 'select',
				'sanitize_callback' => 'caff_sanitize_select',
				'label'             => esc_html__( 'Visible On', 'caff' ),
				'section'           => 'caff_ss_testimonial',
				'choices'           => Caff_Customizer_Utilities::section_visibility(),
			)
		);

		// Add Edit Shortcut Icon.
		$wp_customize->selective_refresh->add_partial( 'caff_testimonial_visibility', array(
			'selector' => '#testimonial-section',
		) );

		Caff_Customizer_Utilities::register_option(
			array(
				'type'              => 'text',
				'sanitize_callback' => 'caff_text_sanitization',
				'settings'          => 'caff_testimonial_section_top_subtitle',
				'label'             => esc_html__( 'Section Top Sub-title', 'caff' ),
				'section'           => 'caff_ss_testimonial',
				'active_callback'   => array( $this, 'is_testimonial_visible' ),
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'settings'          => 'caff_testimonial_section_title',
				'type'              => 'text',
				'sanitize_callback' => 'caff_text_sanitization',
				'label'             => esc_html__( 'Section Title', 'caff' ),
				'section'           => 'caff_ss_testimonial',
				'active_callback'   => array( $this, 'is_testimonial_visible' ),
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'settings'          => 'caff_testimonial_section_subtitle',
				'type'              => 'text',
				'sanitize_callback' => 'caff_text_sanitization',
				'label'             => esc_html__( 'Section Subtitle', 'caff' ),
				'section'           => 'caff_ss_testimonial',
				'active_callback'   => array( $this, 'is_testimonial_visible' ),
			)
		);


		Caff_Customizer_Utilities::register_option(
			array(
				'settings'          => 'caff_testimonial_number',
				'type'              => 'number',
				'label'             => esc_html__( 'Number', 'caff' ),
				'description'       => esc_html__( 'Please refresh the customizer page once the number is changed.', 'caff' ),
				'section'           => 'caff_ss_testimonial',
				'sanitize_callback' => 'absint',
				'input_attrs'       => array(
					'min'   => 1,
					'max'   => 80,
					'step'  => 1,
					'style' => 'width:100px;',
				),
				'active_callback'   => array( $this, 'is_testimonial_visible' ),
			)
		);

		$numbers = caff_gtm( 'caff_testimonial_number' );

		for( $i = 0, $j = 1; $i < $numbers; $i++, $j++ ) {
			Caff_Customizer_Utilities::register_option(
				array(
					'custom_control'    => 'Caff_Dropdown_Posts_Custom_Control',
					'sanitize_callback' => 'absint',
					'settings'          => 'caff_testimonial_page_' . $i,
					'label'             => esc_html__( 'Select Page', 'caff' ),
					'section'           => 'caff_ss_testimonial',
					'active_callback'   => array( $this, 'is_testimonial_visible' ),
					'input_attrs' => array(
						'post_type'      => 'page',
						'posts_per_page' => -1,
						'orderby'        => 'name',
						'order'          => 'ASC',
					),
				)
			);
		}
	}

	/**
	 * Testimonial visibility active callback.
	 */
	public function is_testimonial_visible( $control ) {
		return ( caff_display_section( $control->manager->get_setting( 'caff_testimonial_visibility' )->value() ) );
	}
}

/**
 * Initialize class
 */
$caff_ss_testimonial = new Caff_Testimonial_Options();
