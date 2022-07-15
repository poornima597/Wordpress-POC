<?php
/**
 * The template for displaying food_menu items
 *
 * @package Caff Pro
 */

$caff_visibility = caff_gtm( 'caff_food_menu_visibility' );

if ( ! caff_display_section( $caff_visibility ) ) {
	return;
}

if ( 'custom-pages' === $caff_visibility ) {
	// Bail if custom pages is selected, and current page is not in list.
	if (  ! in_array( get_the_ID(), explode( ',', caff_gtm( 'caff_food_menu_custom_pages' ) ) ) ) {
		return;
	}
}

$caff_classes = array();
$caff_classes[] = 'food-menu-section section';

$caff_bg_image = caff_gtm( 'caff_food_menu_bg_image' );
$caff_classes[] = caff_gtm( 'caff_food_menu_overlay' ) ? ' overlay-enabled' : '';
?>
<div id="food-menu-section" class="<?php caff_display_section_classes( $caff_classes ); ?>"<?php echo $caff_bg_image ? 'style="background-image: url( ' .esc_url( $caff_bg_image ) . ' )"' : ''; ?>>
	<div class="container">
		<?php caff_section_title( 'food_menu' ); ?>

		<?php get_template_part( 'template-parts/food-menu/nova-menu' ); ?>

		<?php
		$caff_button_text   = caff_gtm( 'caff_food_menu_button_text' );
		$caff_button_link   = caff_gtm( 'caff_food_menu_button_link' );
		$caff_button_target = caff_gtm( 'caff_food_menu_button_target' ) ? '_blank' : '_self';

		if ( $caff_button_text ) : ?>
			<div class="more-wrapper clear-fix">
				<a href="<?php echo esc_url( $caff_button_link ); ?>" class="ff-button" target="<?php echo esc_attr( $caff_button_target ); ?>"><?php echo esc_html( $caff_button_text ); ?></a>
			</div><!-- .more-wrapper -->
		<?php endif; ?>
	</div><!-- .container -->
</div><!-- #food-menu-section -->
