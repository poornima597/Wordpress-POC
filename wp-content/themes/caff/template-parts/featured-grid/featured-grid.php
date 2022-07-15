<?php
/**
 * Template part for displaying Service
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Caff
 */

$caff_visibility = caff_gtm( 'caff_featured_grid_visibility' );

if ( ! caff_display_section( $caff_visibility ) ) {
	return;
}

$caff_classes[] = 'featured-grid-section section page style-one';
?>
<div id="featured-grid-section" class="featured-grid-section section page style-one">
	<div class="container">
		<?php caff_section_title( 'featured_grid' ); ?>

		<?php get_template_part( 'template-parts/featured-grid/post-type' ); ?>

		<?php
		$caff_button_text   = caff_gtm( 'caff_featured_grid_button_text' );
		$caff_button_link   = caff_gtm( 'caff_featured_grid_button_link' );
		$caff_button_target = caff_gtm( 'caff_featured_grid_button_target' ) ? '_blank' : '_self';

		if ( $caff_button_text ) : ?>
			<div class="more-wrapper clear-fix">
				<a href="<?php echo esc_url($caff_button_link); ?>" class="ff-button" target="<?php echo esc_attr( $caff_button_target ); ?>"><?php echo esc_html($caff_button_text); ?></a>
			</div><!-- .more-wrapper -->
		<?php endif; ?>
	</div><!-- .container -->
</div><!-- .latest-posts-section -->

