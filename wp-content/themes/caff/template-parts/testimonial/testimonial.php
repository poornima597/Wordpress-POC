<?php
/**
 * Template part for displaying Service
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Caff
 */

$caff_visibility = caff_gtm( 'caff_testimonial_visibility' );

if ( ! caff_display_section( $caff_visibility ) ) {
	return;
}

$image = caff_gtm( 'caff_testimonial_bg_image' );
?>
<div id="testimonial-section" class="testimonial-section section dark-background page" <?php echo $image ? 'style="background-image: url( ' .esc_url( $image ) . ' )"' : ''; ?>>
	<div class="section-testimonial testimonial-layout-1">
		<div class="container">
			<?php caff_section_title( 'testimonial' ); ?>

			<?php get_template_part( 'template-parts/testimonial/post-type' ); ?>
		</div><!-- .container -->
	</div><!-- .section-testimonial  -->
</div><!-- .section -->
