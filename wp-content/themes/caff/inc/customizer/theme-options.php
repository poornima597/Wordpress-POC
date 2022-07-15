<?php
/**
 * Adds the theme options sections, settings, and controls to the theme customizer
 *
 * @package Caff
 */

class Caff_Theme_Options {
	public function __construct() {
		// Register our Panel.
		add_action( 'customize_register', array( $this, 'add_panel' ) );

		// Register Breadcrumb Options.
		add_action( 'customize_register', array( $this, 'register_breadcrumb_options' ) );

		// Register Excerpt Options.
		add_action( 'customize_register', array( $this, 'register_excerpt_options' ) );

		// Register Homepage Options.
		add_action( 'customize_register', array( $this, 'register_homepage_options' ) );

		// Register Layout Options.
		add_action( 'customize_register', array( $this, 'register_layout_options' ) );

		// Register Search Options.
		add_action( 'customize_register', array( $this, 'register_search_options' ) );

		// Add default options.
		add_filter( 'caff_customizer_defaults', array( $this, 'add_defaults' ) );
	}

	/**
	 * Add options to defaults
	 */
	public function add_defaults( $default_options ) {
		$defaults = array(
			// Header Media.
			'caff_header_image_visibility' => 'entire-site',

			// Breadcrumb
			'caff_breadcrumb_show' => 1,

			// Layout Options.
			'caff_default_layout'          => 'right-sidebar',
			'caff_homepage_archive_layout' => 'no-sidebar-full-width',

			// Excerpt Options
			'caff_excerpt_length'    => 30,
			'caff_excerpt_more_text' => esc_html__( 'Continue reading', 'caff' ),

			// Footer Options.
			'caff_footer_editor_style'      => 'one-column',
			'caff_footer_editor_text'       => sprintf( _x( 'Copyright &copy; %1$s %2$s. All Rights Reserved. %3$s', '1: Year, 2: Site Title with home URL, 3: Privacy Policy Link', 'caff' ), '[the-year]', '[site-link]', '[privacy-policy-link]' ) . ' &#124; ' . esc_html__( 'Caff by', 'caff' ). '&nbsp;<a target="_blank" href="'. esc_url( 'https://fireflythemes.com' ) .'">Firefly Themes</a>',
			'caff_footer_editor_text_left'  => sprintf( _x( 'Copyright &copy; %1$s %2$s. All Rights Reserved. %3$s', '1: Year, 2: Site Title with home URL, 3: Privacy Policy Link', 'caff' ), '[the-year]', '[site-link]', '[privacy-policy-link]' ),
			'caff_footer_editor_text_right' => esc_html__( 'Caff by', 'caff' ). '&nbsp;<a target="_blank" href="'. esc_url( 'https://fireflythemes.com' ) .'">Firefly Themes</a>',

			// Homepage/Frontpage Options.
			'caff_front_page_category'   => '',
			'caff_show_homepage_content' => 1,

			// Search Options.
			'caff_search_text'         => esc_html__( 'Search...', 'caff' ),
		);


		$updated_defaults = wp_parse_args( $defaults, $default_options );

		return $updated_defaults;
	}

	/**
	 * Register the Customizer panels
	 */
	public function add_panel( $wp_customize ) {
		/**
		 * Add our Header & Navigation Panel
		 */
		 $wp_customize->add_panel( 'caff_theme_options',
		 	array(
				'title' => esc_html__( 'Theme Options', 'caff' ),
			)
		);
	}

	/**
	 * Add breadcrumb section and its controls
	 */
	public function register_breadcrumb_options( $wp_customize ) {
		// Add Excerpt Options section.
		$wp_customize->add_section( 'caff_breadcrumb_options',
			array(
				'title' => esc_html__( 'Breadcrumb', 'caff' ),
				'panel' => 'caff_theme_options',
			)
		);

		if ( function_exists( 'bcn_display' ) ) {
			Caff_Customizer_Utilities::register_option(
				array(
					'custom_control'    => 'Caff_Simple_Notice_Custom_Control',
					'sanitize_callback' => 'sanitize_text_field',
					'settings'          => 'ff_multiputpose_breadcrumb_plugin_notice',
					'label'             =>  esc_html__( 'Info', 'caff' ),
					'description'       =>  sprintf( esc_html__( 'Since Breadcrumb NavXT Plugin is installed, edit plugin\'s settings %1$shere%2$s', 'caff' ), '<a href="' . esc_url( get_admin_url( null, 'options-general.php?page=breadcrumb-navxt' ) ) . '" target="_blank">', '</a>' ),
					'section'           => 'ff_multiputpose_breadcrumb_options',
				)
			);

			return;
		}

		Caff_Customizer_Utilities::register_option(
			array(
				'custom_control'    => 'Caff_Toggle_Switch_Custom_control',
				'settings'          => 'caff_breadcrumb_show',
				'sanitize_callback' => 'caff_switch_sanitization',
				'label'             => esc_html__( 'Display Breadcrumb?', 'caff' ),
				'section'           => 'caff_breadcrumb_options',
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'custom_control'    => 'Caff_Toggle_Switch_Custom_control',
				'settings'          => 'caff_breadcrumb_show_home',
				'sanitize_callback' => 'caff_switch_sanitization',
				'label'             => esc_html__( 'Show on homepage?', 'caff' ),
				'section'           => 'caff_breadcrumb_options',
			)
		);
	}

	/**
	 * Add layouts section and its controls
	 */
	public function register_layout_options( $wp_customize ) {
		// Add layouts section.
		$wp_customize->add_section( 'caff_layouts',
			array(
				'title' => esc_html__( 'Layouts', 'caff' ),
				'panel' => 'caff_theme_options'
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'type'              => 'select',
				'settings'          => 'caff_default_layout',
				'sanitize_callback' => 'caff_sanitize_select',
				'label'             => esc_html__( 'Default Layout', 'caff' ),
				'section'           => 'caff_layouts',
				'choices'           => array(
					'right-sidebar'         => esc_html__( 'Right Sidebar', 'caff' ),
					'no-sidebar-full-width' => esc_html__( 'No Sidebar: Full Width', 'caff' ),
				),
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'type'              => 'select',
				'settings'          => 'caff_homepage_archive_layout',
				'sanitize_callback' => 'caff_sanitize_select',
				'label'             => esc_html__( 'Homepage/Archive Layout', 'caff' ),
				'section'           => 'caff_layouts',
				'choices'           => array(
					'right-sidebar'         => esc_html__( 'Right Sidebar', 'caff' ),
					'no-sidebar-full-width' => esc_html__( 'No Sidebar: Full Width', 'caff' ),
				),
			)
		);
	}

	/**
	 * Add excerpt section and its controls
	 */
	public function register_excerpt_options( $wp_customize ) {
		// Add Excerpt Options section.
		$wp_customize->add_section( 'caff_excerpt_options',
			array(
				'title' => esc_html__( 'Excerpt Options', 'caff' ),
				'panel' => 'caff_theme_options',
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'type'              => 'number',
				'settings'          => 'caff_excerpt_length',
				'sanitize_callback' => 'absint',
				'label'             => esc_html__( 'Excerpt Length (Words)', 'caff' ),
				'section'           => 'caff_excerpt_options',
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'type'              => 'text',
				'settings'          => 'caff_excerpt_more_text',
				'sanitize_callback' => 'sanitize_text_field',
				'label'             => esc_html__( 'Excerpt More Text', 'caff' ),
				'section'           => 'caff_excerpt_options',
			)
		);
	}

	/**
	 * Add Homepage/Frontpage section and its controls
	 */
	public function register_homepage_options( $wp_customize ) {
		Caff_Customizer_Utilities::register_option(
			array(
				'custom_control'    => 'Caff_Dropdown_Select2_Custom_Control',
				'sanitize_callback' => 'caff_text_sanitization',
				'settings'          => 'caff_front_page_category',
				'description'       => esc_html__( 'Filter Homepage/Blog page posts by following categories', 'caff' ),
				'label'             => esc_html__( 'Categories', 'caff' ),
				'section'           => 'static_front_page',
				'input_attrs'       => array(
					'multiselect' => true,
				),
				'choices'           => array( esc_html__( '--Select--', 'caff' ) => Caff_Customizer_Utilities::get_terms( 'category' ) ),
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'custom_control'    => 'Caff_Toggle_Switch_Custom_control',
				'settings'          => 'caff_show_homepage_content',
				'sanitize_callback' => 'caff_switch_sanitization',
				'label'             => esc_html__( 'Show Home Content/Blog', 'caff' ),
				'section'           => 'static_front_page',
			)
		);
	}

	/**
	 * Add Homepage/Frontpage section and its controls
	 */
	public function register_search_options( $wp_customize ) {
		// Add Homepage/Frontpage Section.
		$wp_customize->add_section( 'caff_search',
			array(
				'title' => esc_html__( 'Search', 'caff' ),
				'panel' => 'caff_theme_options',
			)
		);

		Caff_Customizer_Utilities::register_option(
			array(
				'settings'          => 'caff_search_text',
				'sanitize_callback' => 'caff_text_sanitization',
				'label'             => esc_html__( 'Search Text', 'caff' ),
				'section'           => 'caff_search',
				'type'              => 'text',
			)
		);
	}
}

/**
 * Initialize class
 */
$caff_theme_options = new Caff_Theme_Options();
