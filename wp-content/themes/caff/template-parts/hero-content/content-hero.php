<?php
/**
 * Template part for displaying Hero Content
 *
 * @package Caff
 */
if ( ! caff_gtm( 'caff_hero_content_page' ) ) {
	return;
}

$caff_args = array(
	'page_id'        => absint( caff_gtm( 'caff_hero_content_page' ) ),
	'posts_per_page' => 1,
	'post_type'      => 'page',
);

$caff_loop = new WP_Query( $caff_args );

while ( $caff_loop->have_posts() ) :
	$caff_loop->the_post();

	$caff_content_align = caff_gtm( 'caff_hero_content_position' );
	$caff_text_align    = caff_gtm( 'caff_hero_content_text_align' );
	$caff_subtitle      = caff_gtm( 'caff_hero_content_custom_subtitle' );

	$classes[] = 'hero-content-section section';
	$classes[] = caff_gtm( 'caff_hero_content_position' );
	$classes[] = caff_gtm( 'caff_hero_content_text_align' );

	if ( ! has_post_thumbnail() ) {
		$classes[] = 'thumbnail-disable';
	}
	?>

	<div id="hero-content-section" class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
		<div class="section-featured-page">
			<div class="container">
				<div class="row">
					<div class="hero-content-wrapper">
						<?php if ( has_post_thumbnail() ) : ?>
						<div class="ff-grid-6 featured-page-thumb">
							<div class=" featured-page-thumb-wrapper"><?php the_post_thumbnail( 'caff-hero', array( 'class' => 'alignnone' ) );?>
						</div>
						</div>
						<?php endif; ?>

						<!-- .ff-grid-6 -->
						<div class="ff-grid-6 featured-page-content">
							<div class="featured-page-section">
								<div class="section-title-wrap text-alignleft">
									<?php if ( $caff_subtitle ) : ?>
									<p class="section-top-subtitle"><?php echo esc_html( $caff_subtitle ); ?></p>
									<?php endif; ?>

									<?php the_title( '<h2 class="section-title">', '</h2>' ); ?>

									<span class="divider"></span>
								</div>

								<?php caff_display_content( 'hero_content' ); ?>
							</div><!-- .featured-page-section -->
						</div><!-- .ff-grid-6 -->
					</div><!-- .hero-content-wrapper -->

				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .section-featured-page -->
	</div><!-- .section -->
<?php
endwhile;

wp_reset_postdata();
