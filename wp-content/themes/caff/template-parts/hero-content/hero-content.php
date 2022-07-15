<?php
/**
 * Template part for displaying Hero Content
 *
 * @package Caff
 */

$caff_enable = caff_gtm( 'caff_hero_content_visibility' );

if ( ! caff_display_section( $caff_enable ) ) {
	return;
}

get_template_part( 'template-parts/hero-content/content-hero' );
