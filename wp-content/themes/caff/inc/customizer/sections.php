<?php
/**
 * Caff Theme Customizer
 *
 * @package Caff
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function caff_sortable_sections( $wp_customize ) {
	$wp_customize->add_panel( 'caff_sp_sortable', array(
		'title'       => esc_html__( 'Sections', 'caff' ),
		'priority'    => 150,
	) );

	$default_sections = caff_get_default_sortable_sections();

	$sortable_options = array();

	$sortable_order = caff_gtm( 'caff_ss_order' );

	if ( $sortable_order ) {
		$sortable_options = explode( ',', $sortable_order );
	}

	$sortable_sections = array_unique( $sortable_options + array_keys( $default_sections ) );
		
	foreach ( $sortable_sections as $section ) {
		if ( isset( $default_sections[$section] ) ) {
			// Add sections.
			$wp_customize->add_section( 'caff_ss_' . $section,
				array(
					'title' => $default_sections[$section],
					'panel' => 'caff_sp_sortable'
				)
			);
		}
		
		unset($default_sections[$section]);
	}

	if ( count( $default_sections ) ) {
		foreach ($default_sections as $key => $value) {
			// Add new sections.
			$wp_customize->add_section( 'caff_ss_' . $key,
				array(
					'title' => $value,
					'panel' => 'caff_sp_sortable'
				)
			);
		}
	}

	// Add hidden section for saving sorted sections.
	Caff_Customizer_Utilities::register_option(
		array(
			'settings'          => 'caff_ss_order',
			'sanitize_callback' => 'sanitize_text_field',
			'label'             => esc_html__( 'Section layout', 'caff' ),
			'section'           => 'caff_ss_main_content',
		)
	);
}
add_action( 'customize_register', 'caff_sortable_sections', 1 );

/**
 * Default sortable sections order
 * @return array
 */
function caff_get_default_sortable_sections() {
	return $default_sections = array (
		'slider'           => esc_html__( 'Slider', 'caff' ),
		'wwd'              => esc_html__( 'What We Do', 'caff' ),
		'hero_content'     => esc_html__( 'Hero Content', 'caff' ),
		'featured_grid'    => esc_html__( 'Featured Grid', 'caff' ),
		'food_menu'        => esc_html__( 'Food Menu', 'caff' ),
		'testimonial'      => esc_html__( 'Testimonials', 'caff' ),
		'contact_form'     => esc_html__( 'Contact Form', 'caff' ),
	);
}
