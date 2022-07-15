<?php
/**
 * Caff Theme Customizer
 *
 * @package Caff
 */

/**
 * Main Class for customizer
 */
class Caff_Customizer {
	public function __construct() {
		// Register Custozier Options.
		add_action( 'customize_register', array( $this, 'register_options' ) );

		// Add preview js.
		add_action( 'customize_preview_init', array( $this, 'preview_js' ) );

		// Enqueue js for customizer.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'customize_control_js' ) );

		// Enqueue Font Awesome.
		add_action( 'customize_controls_print_styles', array( $this, 'scripts_styles' ) );
	}

	/**
	 * Add postMessage support for site title and description for the Theme Customizer.
	 * Other basic stuff for customizer initialization.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function register_options( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'blogname', array(
				'selector'            => '.site-title a, body.home #custom-header .page-title',
				'container_inclusive' => false,
				'render_callback'     => function() {
					bloginfo( 'name' );
				},
			) );
			$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
				'selector'            => '.site-description',
				'container_inclusive' => false,
				'render_callback'     => function() {
					bloginfo( 'description' );
				},
			) );
		}

		$section_visibility = Caff_Customizer_Utilities::section_visibility();

		$section_visibility['excluding-home'] = esc_html__( 'Excluding Homepage', 'caff' );

		Caff_Customizer_Utilities::register_option(
			array(
				'settings'          => 'caff_header_image_visibility',
				'type'              => 'select',
				'sanitize_callback' => 'caff_sanitize_select',
				'label'             => esc_html__( 'Visible On', 'caff' ),
				'section'           => 'header_image',
				'choices'           => $section_visibility,
				'priority'          => 1,
			)
		);

		$wp_customize->add_section( new Caff_Upsell_Section( $wp_customize, 'upsell_section',
			array(
				'title'           => esc_html__( 'Caff Pro Available', 'caff' ),
				'url'             => 'https://fireflythemes.com/themes/caff-pro',
				'backgroundcolor' => '#f06544',
				'textcolor'       => '#fff',
				'priority'        => 0,
			)
		) );
	}

	/**
	 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
	 * 
	 * @since 1.0
	 */
	public function preview_js() {
		$min  = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		wp_enqueue_script( 'caff-customizer', get_template_directory_uri() . '/js/customizer-preview' . $min . '.js', array( 'customize-preview' ), caff_get_file_mod_date( '/js/customizer-preview' . $min . '.js' ), true );
	}

	/**
	 * Binds the JS listener to make Customizer caff_color_scheme control.
	 *
	 * @since 1.0
	 */
	public function customize_control_js() {
		$min  = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		// Enqueue Select2.
		wp_enqueue_script( 'caff-select2-js', trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'js/select2' . $min . '.js', array( 'jquery' ), '4.0.13', true );
		wp_enqueue_style( 'caff-select2-css', trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'css/select2' . $min . '.css', array(), '4.0.13', 'all' );
		
		// Enqueue Custom JS and CSS.
		wp_enqueue_script( 'caff-custom-controls-js', trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'js/customizer' . $min . '.js', array( 'jquery', 'jquery-ui-core', 'caff-select2-js' ), caff_get_file_mod_date( '/js/customizer' . $min . '.js' ), true );
		
		wp_enqueue_style( 'caff-custom-controls-css', trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'css/customizer' . $min . '.css', null, caff_get_file_mod_date( '/css/customizer' . $min . '.css' ), 'all' );
		
		wp_enqueue_editor();
	}

	/**
	 * Enqueue Font Awesome.
	 * @return void
	 */
	function scripts_styles() {
		$min  = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		// Register and enqueue our icon font
		// We're using the awesome Font Awesome icon font. http://fortawesome.github.io/Font-Awesome
		wp_enqueue_style( 'font-awesome', trailingslashit( get_template_directory_uri() ) . 'css/font-awesome/css/all' . $min . '.css' , array(), '5.15.3', 'all' );
	}
}

/**
 * Initialize customizer class.
 */
$caff_customizer = new Caff_Customizer();

/**
 * Utility Class
 */
require get_theme_file_path( '/inc/customizer/utilities.php' );

/**
 * Load all our Customizer Custom Controls
 */
require get_theme_file_path( '/inc/customizer/custom-controls.php' );

/**
 * Theme Options
 */
require get_theme_file_path( '/inc/customizer/theme-options.php' );

/**
 * Header Options
 */
require get_theme_file_path( '/inc/customizer/header-options.php' );

/**
 * Sections
 */
require get_theme_file_path( '/inc/customizer/sections.php' );

/**
 * Slider Options
 */
require get_theme_file_path( '/inc/customizer/slider.php' );

/**
 * Hero Content
 */
require get_theme_file_path( '/inc/customizer/hero-content.php' );

/**
 * What We Do section
 */
require get_theme_file_path( '/inc/customizer/wwd.php' );


/**
 * Testimonial Section
 */
require get_theme_file_path( '/inc/customizer/testimonial.php' );

/**
 * Contact Form
 */
require get_theme_file_path( '/inc/customizer/contact-form.php' );

/**
 * Customizer Reset Button.
 */
require get_theme_file_path( '/inc/customizer/reset.php' );

/**
 * Featured Grid.
 */
require get_theme_file_path( '/inc/customizer/featured-grid.php' );

/**
 * Food Menu.
 */
require get_theme_file_path( '/inc/customizer/food-menu.php' );
