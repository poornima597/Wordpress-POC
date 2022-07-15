<?php
/**
 * Template part for displaying Hero Content
 *
 * @package Caff
 */

$caff_visibility = caff_gtm( 'caff_contact_form_visibility' );

if ( ! caff_display_section( $caff_visibility ) ) {
	return;
}

get_template_part( 'template-parts/contact-form/content-contact' );
