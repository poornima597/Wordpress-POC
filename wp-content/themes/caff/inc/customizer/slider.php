<?php
/**
 * Slider Options
 *
 * @package Caff
 */

class Caff_Slider_Options {
	public function __construct() {
		// Register Slider Options.
		add_action( 'customize_register', array( $this, 'register_options' ), 98 );

		// Add default options.
		add_filter( 'caff_customizer_defaults', array( $this, 'add_defaults' ) );
	}

	/**
	 * Add options to defaults
	 */
	public function add_defaults( $default_options ) {
		$defaults = array(
			'caff_slider_visibility'     => 'disabled',
			'caff_slider_number'         => 2,
			'caff_slider_autoplay_delay' => 5000,
			'caff_slider_pause_on_hover' => 1,
			'caff_slider_navigation'     => 1,
			'caff_slider_pagination'     => 1,
		);

		$updated_defaults = wp_parse_args( $defaults, $default_options );

		return $updated_defaults;
	}

	/**
	 * Add slider section and its controls
	 */
	public function register_options( $wp_customize ) {
		Caff_Customizer_Utilities::register_option(
			array(
				'settings'          => 'caff_slider_visibility',
				'type'              => 'select',
				'sanitize_callback' => 'caff_sanitize_select',
				'label'             => esc_html__( 'Visible On', 'caff' ),
				'section'           => 'caff_ss_slider',
				'choices'           => Caff_Customizer_Utilities::section_visibility(),
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'type'              => 'number',
				'settings'          => 'caff_slider_number',
				'label'             => esc_html__( 'Number', 'caff' ),
				'description'       => esc_html__( 'Please refresh the customizer page once the number is changed.', 'caff' ),
				'section'           => 'caff_ss_slider',
				'sanitize_callback' => 'absint',
				'input_attrs'       => array(
					'min'   => 1,
					'max'   => 80,
					'step'  => 1,
					'style' => 'width:100px;',
				),
				'active_callback'   => array( $this, 'is_slider_visible' ),
			)
		);

		$numbers = caff_gtm( 'caff_slider_number' );

		for( $i = 0, $j = 1; $i < $numbers; $i++, $j++ ) {
			Caff_Customizer_Utilities::register_option(
				array(
					'custom_control'    => 'Caff_Simple_Notice_Custom_Control',
					'sanitize_callback' => 'caff_text_sanitization',
					'settings'          => 'caff_slider_notice_' . $i,
					'label'             => esc_html__( 'Item #', 'caff' )  . $j,
					'section'           => 'caff_ss_slider',
					'active_callback'   => array( $this, 'is_slider_visible' ),
				)
			);

			Caff_Customizer_Utilities::register_option(
				array(
					'custom_control'    => 'Caff_Dropdown_Posts_Custom_Control',
					'sanitize_callback' => 'absint',
					'settings'          => 'caff_slider_page_' . $i,
					'label'             => esc_html__( 'Select Page', 'caff' ),
					'section'           => 'caff_ss_slider',
					'active_callback'   => array( $this, 'is_slider_visible' ),
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
				'custom_control'    => 'Caff_Toggle_Switch_Custom_control',
				'settings'          => 'caff_slider_autoplay',
				'sanitize_callback' => 'caff_switch_sanitization',
				'label'             => esc_html__( 'Autoplay', 'caff' ),
				'section'           => 'caff_ss_slider',
				'active_callback'   => array( $this, 'is_slider_visible' ),
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'settings'          => 'caff_slider_autoplay_delay',
				'type'              => 'number',
				'sanitize_callback' => 'absint',
				'label'             => esc_html__( 'Autoplay Delay', 'caff' ),
				'description'       => esc_html__( '(in ms)', 'caff' ),
				'section'           => 'caff_ss_slider',
				'input_attrs'           => array(
					'width' => '10px',
				),
				'active_callback'   => array( $this, 'is_slider_autoplay_on' ),
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'custom_control'    => 'Caff_Toggle_Switch_Custom_control',
				'settings'          => 'caff_slider_pause_on_hover',
				'sanitize_callback' => 'caff_switch_sanitization',
				'label'             => esc_html__( 'Pause On Hover', 'caff' ),
				'section'           => 'caff_ss_slider',
				'active_callback'   => array( $this, 'is_slider_autoplay_on' ),
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'custom_control'    => 'Caff_Toggle_Switch_Custom_control',
				'settings'          => 'caff_slider_navigation',
				'sanitize_callback' => 'caff_switch_sanitization',
				'label'             => esc_html__( 'Navigation', 'caff' ),
				'section'           => 'caff_ss_slider',
				'active_callback'   => array( $this, 'is_slider_visible' ),
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'custom_control'    => 'Caff_Toggle_Switch_Custom_control',
				'settings'          => 'caff_slider_pagination',
				'sanitize_callback' => 'caff_switch_sanitization',
				'label'             => esc_html__( 'Pagination', 'caff' ),
				'section'           => 'caff_ss_slider',
				'active_callback'   => array( $this, 'is_slider_visible' ),
			)
		);
	}

	/**
	 * Slider visibility active callback.
	 */
	public function is_slider_visible( $control ) {
		return ( caff_display_section( $control->manager->get_setting( 'caff_slider_visibility' )->value() ) );
	}

	/**
	 * Slider autoplay check.
	 */
	public function is_slider_autoplay_on( $control ) {
		return ( $this->is_slider_visible( $control ) && $control->manager->get_setting( 'caff_slider_autoplay' )->value() );
	}
}

/**
 * Initialize class
 */
$slider_ss_slider = new Caff_Slider_Options();
