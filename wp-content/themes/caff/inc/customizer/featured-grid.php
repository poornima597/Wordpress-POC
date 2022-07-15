<?php
/**
 * Featured Grid Options
 *
 * @package Caff
 */

class Caff_Featured_Grid_Options {
	public function __construct() {
		// Register Featured Grid Options.
		add_action( 'customize_register', array( $this, 'register_options' ), 99 );

		// Add default options.
		add_filter( 'caff_customizer_defaults', array( $this, 'add_defaults' ) );
	}

	/**
	 * Add options to defaults
	 */
	public function add_defaults( $default_options ) {
		$defaults = array(
			'caff_featured_grid_visibility'  => 'disabled',
			'caff_featured_grid_number'      => 3,
			'caff_featured_grid_button_link' => '#',
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
				'settings'          => 'caff_featured_grid_visibility',
				'type'              => 'select',
				'sanitize_callback' => 'caff_sanitize_select',
				'label'             => esc_html__( 'Visible On', 'caff' ),
				'section'           => 'caff_ss_featured_grid',
				'choices'           => Caff_Customizer_Utilities::section_visibility(),
			)
		);

		// Add Edit Shortcut Icon.
		$wp_customize->selective_refresh->add_partial( 'caff_featured_grid_visibility', array(
			'selector' => '#featured-grid-section',
		) );

		Caff_Customizer_Utilities::register_option(
			array(
				'type'              => 'text',
				'sanitize_callback' => 'caff_text_sanitization',
				'settings'          => 'caff_featured_grid_section_top_subtitle',
				'label'             => esc_html__( 'Section Top Sub-title', 'caff' ),
				'section'           => 'caff_ss_featured_grid',
				'active_callback'   => array( $this, 'is_featured_grid_visible' ),
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'settings'          => 'caff_featured_grid_section_title',
				'type'              => 'text',
				'sanitize_callback' => 'caff_text_sanitization',
				'label'             => esc_html__( 'Section Title', 'caff' ),
				'section'           => 'caff_ss_featured_grid',
				'active_callback'   => array( $this, 'is_featured_grid_visible' ),
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'settings'          => 'caff_featured_grid_section_subtitle',
				'type'              => 'text',
				'sanitize_callback' => 'caff_text_sanitization',
				'label'             => esc_html__( 'Section Subtitle', 'caff' ),
				'section'           => 'caff_ss_featured_grid',
				'active_callback'   => array( $this, 'is_featured_grid_visible' ),
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'settings'          => 'caff_featured_grid_number',
				'type'              => 'number',
				'label'             => esc_html__( 'Number', 'caff' ),
				'description'       => esc_html__( 'Please refresh the customizer page once the number is changed.', 'caff' ),
				'section'           => 'caff_ss_featured_grid',
				'sanitize_callback' => 'absint',
				'input_attrs'       => array(
					'min'   => 1,
					'max'   => 80,
					'step'  => 1,
					'style' => 'width:100px;',
				),
				'active_callback'   => array( $this, 'is_featured_grid_visible' ),
			)
		);

		$numbers = caff_gtm( 'caff_featured_grid_number' );

		for( $i = 0, $j = 1; $i < $numbers; $i++, $j++ ) {
			Caff_Customizer_Utilities::register_option(
				array(
					'custom_control'    => 'Caff_Dropdown_Posts_Custom_Control',
					'sanitize_callback' => 'absint',
					'settings'          => 'caff_featured_grid_page_' . $i,
					'label'             => esc_html__( 'Select Page', 'caff' ),
					'section'           => 'caff_ss_featured_grid',
					'active_callback'   => array( $this, 'is_featured_grid_visible' ),
					'input_attrs' => array(
						'post_type'      => 'page',
						'posts_per_page' => -1,
						'orderby'        => 'name',
						'order'          => 'ASC',
					),
				)
			);
		}

		Caff_Customizer_Utilities::register_option(
			array(
				'type'              => 'text',
				'sanitize_callback' => 'caff_text_sanitization',
				'settings'          => 'caff_featured_grid_button_text',
				'label'             => esc_html__( 'Button Text', 'caff' ),
				'section'           => 'caff_ss_featured_grid',
				'active_callback'   => array( $this, 'is_featured_grid_visible' ),
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'type'              => 'url',
				'sanitize_callback' => 'esc_url_raw',
				'settings'          => 'caff_featured_grid_button_link',
				'label'             => esc_html__( 'Button Link', 'caff' ),
				'section'           => 'caff_ss_featured_grid',
				'active_callback'   => array( $this, 'is_featured_grid_visible' ),
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'custom_control'    => 'Caff_Toggle_Switch_Custom_control',
				'settings'          => 'caff_featured_grid_button_target',
				'sanitize_callback' => 'caff_switch_sanitization',
				'label'             => esc_html__( 'Open link in new tab?', 'caff' ),
				'section'           => 'caff_ss_featured_grid',
				'active_callback'   => array( $this, 'is_featured_grid_visible' ),
			)
		);
	}

	/**
	 * Featured Grid visibility active callback.
	 */
	public function is_featured_grid_visible( $control ) {
		return ( caff_display_section( $control->manager->get_setting( 'caff_featured_grid_visibility' )->value() ) );
	}
}

/**
 * Initialize class
 */
$caff_ss_featured_grid = new Caff_Featured_Grid_Options();
