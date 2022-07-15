<?php
/**
 * Template part for displaying Service
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Caff
 */

$caff_visibility = caff_gtm( 'caff_wwd_visibility' );

if ( ! caff_display_section( $caff_visibility ) ) {
	return;
}

?>
<div id="wwd-section" class="wwd-section section page style-one">
	<div class="section-wwd">
		<div class="container">
			<?php caff_section_title( 'wwd' ); ?>

			<?php get_template_part( 'template-parts/wwd/post-type' ); ?>
		</div><!-- .container -->
	</div><!-- .section-wwd  -->
</div><!-- .section -->
