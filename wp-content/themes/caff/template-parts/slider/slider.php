<?php
/**
 * Template part for displaying Slider
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Caff
 */

$caff_visibility = caff_gtm( 'caff_slider_visibility' );

if ( ! caff_display_section( $caff_visibility ) ) {
	return;
}

?>
<div id="slider-section" class="section slider-section no-padding overlay-enabled style-one zoom-disabled">
	<div class="swiper-wrapper">
		<?php get_template_part( 'template-parts/slider/post', 'type' ); ?>
	</div><!-- .swiper-wrapper -->


	<?php
	// Pagination.
	if ( caff_gtm( 'caff_slider_pagination' ) ) : ?>
    <div class="swiper-pagination"></div>
	<?php endif; ?>

    <?php
	// Navigation.
	if ( caff_gtm( 'caff_slider_navigation' ) ) : ?>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    <?php endif; ?>
</div><!-- .main-slider -->
