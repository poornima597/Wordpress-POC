<?php
/**
 * Template part for displaying Hero Content
 *
 * @package Caff
 */
$caff_type = caff_gtm( 'caff_contact_form_type' );

if ( 'page' === $caff_type && caff_gtm( 'caff_contact_form_page' ) ) {
	$caff_args = array(
		'page_id' => absint( caff_gtm( 'caff_contact_form_page' ) ),
	);
} elseif ( 'post' === $caff_type && caff_gtm( 'caff_contact_form_post' ) ) {
	$caff_args = array(
		'p' => absint( caff_gtm( 'caff_contact_form_post' ) ),
	);
} elseif ( 'category' === $caff_type && caff_gtm( 'caff_contact_form_category' ) ) {
	$caff_args = array(
		'cat' => absint( caff_gtm( 'caff_contact_form_category' ) ),
	);
} elseif ( 'tag' === $caff_type && caff_gtm( 'caff_contact_form_tag' ) ) {
	$caff_args = array(
		'tag_id' => absint( caff_gtm( 'caff_contact_form_tag' ) ),
	);
}

// If $caff_args is empty return false
if ( empty( $caff_args ) ) {
	return;
}

$caff_args['posts_per_page'] = 1;

$caff_loop = new WP_Query( $caff_args );

while ( $caff_loop->have_posts() ) :
	$caff_loop->the_post();

	$caff_subtitle = caff_gtm( 'caff_contact_form_custom_subtitle' );
	
	$caff_bg_image = caff_gtm( 'caff_contact_form_bg_image' );
	$caff_classes[] = caff_gtm( 'caff_contact_form_overlay' ) ? ' overlay-enabled' : '';
	$caff_classes[] = 'section no-padding';
	?>
	<div id="contact-form-section" class="section <?php caff_display_section_classes( $caff_classes ); ?>" <?php echo $caff_bg_image ? 'style="background-image: url( ' .esc_url( $caff_bg_image ) . ' )"' : ''; ?>>
		<div class="section-contact clear-fix">
			<div class="container">
			
				<div class="form-section ff-grid-6 pull-right">
					<div class="section-title-wrap text-alignleft">
						<?php if ( $caff_subtitle ) : ?>
							<p class="section-top-subtitle"><?php echo esc_html( $caff_subtitle ); ?></p>
						<?php endif; ?>

							<?php the_title( '<h2 class="section-title">', '</h2>' ); ?>

							<span class="divider"></span>
					</div><!-- .section-title-wrap -->

					<?php the_content(); ?>
				</div>
			</div><!-- .custom-contact-form -->
			</div>
			<!-- .container -->
		</div><!-- .section-contact -->
	</div><!-- .section -->
	<?php 
	$caff_map = caff_gtm( 'caff_contact_form_map_code' );
	
	if ( $caff_map ) : ?>
		<div class="gmap_canvas">
			<?php echo $caff_map; ?>
		</div>
	<?php endif; ?>
<?php
endwhile;

wp_reset_postdata();
