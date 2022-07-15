<?php
/**
 * Featured Content Options
 *
 * @package Caff
 */

class Caff_Food_Menu_Options {
	public function __construct() {
		// Register Featured Content Options.
		add_action( 'customize_register', array( $this, 'register_options' ), 99 );
        
		// Add default options.
        add_filter('caff_customizer_defaults', array( $this, 'add_defaults' ));
    }

	/**
	 * Add options to defaults
	 */
	public function add_defaults( $default_options ) {
		$defaults = array(
			'caff_food_menu_visibility'              => 'disabled',
			'caff_food_menu_number'                  => 6,
			'caff_food_menu_button_link'             => '#',
		);

		$updated_defaults = wp_parse_args( $defaults, $default_options );

		return $updated_defaults;
	}

	/**
	 * Add layouts section and its controls
	 */
	public function register_options( $wp_customize ) {
        if ( ! class_exists( 'Jetpack' ) ) {
			Caff_Customizer_Utilities::register_option(
				array(
					'custom_control'    => 'Caff_Note_Control',
					'settings'          => 'caff_food_menu_jetpack_notice',
					'sanitize_callback' => 'caff_text_sanitization',
					'label'             => esc_html__('Please install Jetpack Plugin for Food Menu. Also make sure Jetpack is connected.', 'caff'),
					'section'           => 'caff_ss_food_menu',
					'transport'         => 'postMessage',
				)
			);

			return;
		}

		Caff_Customizer_Utilities::register_option(
			array(
				'settings'          => 'caff_food_menu_visibility',
				'type'              => 'select',
				'sanitize_callback' => 'caff_sanitize_select',
				'label'             => esc_html__( 'Visible On', 'caff' ),
				'section'           => 'caff_ss_food_menu',
				'choices'           => Caff_Customizer_Utilities::section_visibility(),
			)
		);

		// Add Edit Shortcut Icon.
		$wp_customize->selective_refresh->add_partial( 'caff_food_menu_visibility', array(
			'selector' => '#food-menu-section',
		) );

		Caff_Customizer_Utilities::register_option(
			array(
				'custom_control'    => 'WP_Customize_Image_Control',
				'sanitize_callback' => 'esc_url_raw',
				'settings'          => 'caff_food_menu_bg_image',
				'label'             => esc_html__( 'Background Image', 'caff' ),
				'section'           => 'caff_ss_food_menu',
				'active_callback'   => array( $this, 'is_section_visible' ),
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'custom_control'    => 'Caff_Toggle_Switch_Custom_control',
				'settings'          => 'caff_food_menu_overlay',
				'sanitize_callback' => 'caff_switch_sanitization',
				'label'             => esc_html__( 'Overlay on image?', 'caff' ),
				'section'           => 'caff_ss_food_menu',
				'active_callback'   => array( $this, 'is_section_visible' ),
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'type'              => 'text',
				'sanitize_callback' => 'caff_text_sanitization',
				'settings'          => 'caff_food_menu_section_top_subtitle',
				'label'             => esc_html__( 'Section Top Sub-title', 'caff' ),
				'section'           => 'caff_ss_food_menu',
				'active_callback'   => array( $this, 'is_section_visible' ),
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'settings'          => 'caff_food_menu_section_title',
				'type'              => 'text',
				'sanitize_callback' => 'caff_text_sanitization',
				'label'             => esc_html__( 'Section Title', 'caff' ),
				'section'           => 'caff_ss_food_menu',
				'active_callback'   => array( $this, 'is_section_visible' ),
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'settings'          => 'caff_food_menu_section_subtitle',
				'type'              => 'text',
				'sanitize_callback' => 'caff_text_sanitization',
				'label'             => esc_html__( 'Section Subtitle', 'caff' ),
				'section'           => 'caff_ss_food_menu',
				'active_callback'   => array( $this, 'is_section_visible' ),
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'settings'          => 'caff_food_menu_number',
				'type'              => 'number',
				'label'             => esc_html__( 'Number', 'caff' ),
				'description'       => esc_html__( 'Please refresh the customizer page once the number is changed.', 'caff' ),
				'section'           => 'caff_ss_food_menu',
				'sanitize_callback' => 'absint',
				'input_attrs'       => array(
					'min'   => 1,
					'max'   => 80,
					'step'  => 1,
					'style' => 'width:100px;',
				),
				'active_callback'   => array( $this, 'is_section_visible' ),
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'custom_control'    => 'Caff_Dropdown_Select2_Custom_Control',
				'sanitize_callback' => 'caff_text_sanitization',
				'settings'          => 'caff_food_menu_item_label',
				'label'             => esc_html__( 'Pick Nova Menu Sections', 'caff' ),
				'section'           => 'caff_ss_food_menu',
				'input_attrs'       => array(
					'multiselect' => true,
				),
				'choices'           => array( esc_html__( '--Select--', 'caff' ) => Caff_Customizer_Utilities::get_terms( 'nova_menu' ) ),
				'active_callback'   => array( $this, 'is_section_visible' ),
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'type'              => 'text',
				'sanitize_callback' => 'caff_text_sanitization',
				'settings'          => 'caff_food_menu_button_text',
				'label'             => esc_html__( 'Button Text', 'caff' ),
				'section'           => 'caff_ss_food_menu',
				'active_callback'   => array( $this, 'is_section_visible' ),
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'type'              => 'url',
				'sanitize_callback' => 'esc_url_raw',
				'settings'          => 'caff_food_menu_button_link',
				'label'             => esc_html__( 'Button Link', 'caff' ),
				'section'           => 'caff_ss_food_menu',
				'active_callback'   => array( $this, 'is_section_visible' ),
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'custom_control'    => 'Caff_Toggle_Switch_Custom_control',
				'settings'          => 'caff_food_menu_button_target',
				'sanitize_callback' => 'caff_switch_sanitization',
				'label'             => esc_html__( 'Open link in new tab?', 'caff' ),
				'section'           => 'caff_ss_food_menu',
				'active_callback'   => array( $this, 'is_section_visible' ),
			)
		);
	}

	/**
	 * Featured Content visibility active callback.
	 */
	public function is_section_visible( $control ) {
		return ( caff_display_section( $control->manager->get_setting( 'caff_food_menu_visibility' )->value() ) );
	}
}

/**
 * Initialize class
 */
$caff_ss_food_menu = new Caff_Food_Menu_Options();
