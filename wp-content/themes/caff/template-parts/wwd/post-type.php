<?php
/**
 * Template part for displaying Post Types Slider
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Caff
 */

$caff_wwd_args = caff_get_section_args( 'wwd' );

$caff_loop = new WP_Query( $caff_wwd_args );

if ( $caff_loop->have_posts() ) :

	?>
	<div class="wwd-block-list">
		<div class="row">
		<?php

		while ( $caff_loop->have_posts() ) :
			$caff_loop->the_post();

			$count = absint( $caff_loop->current_post );

			$icon  = caff_gtm( 'caff_wwd_custom_icon_' . $count );
			$image = caff_gtm( 'caff_wwd_custom_image_' . $count );
			?>
			<div class="wwd-block-item post-type ff-grid-4">
				<div class="wwd-block-inner inner-block-shadow">
					<?php if ( $icon ) : ?>
					<a class="wwd-fonts-icon" href="<?php the_permalink(); ?>" >
						<i class="<?php echo esc_attr( $icon ); ?>"></i>
					</a>
					<?php elseif ( $image ) : ?>
					<a class="wwd-image" href="<?php echo esc_url( $more_link ); ?>">
						<img src="<?php echo esc_url( $image ); ?>" title="<?php echo esc_attr( $title ); ?>"/>
					</a>
					<?php endif; ?>

					<div class="wwd-block-inner-content">
						<?php the_title( '<h3 class="wwd-item-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">','</a></h3>'); ?>

						<?php caff_display_content( 'wwd' ); ?>
					</div><!-- .wwd-block-inner-content -->
				</div><!-- .wwd-block-inner -->
			</div><!-- .wwd-block-item -->
		<?php
		endwhile;
		?>
		</div><!-- .row -->
	</div><!-- .wwd-block-list -->
<?php
endif;

wp_reset_postdata();
