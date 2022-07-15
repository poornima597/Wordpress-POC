<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Caff
 */

	$show_content = caff_gtm( 'caff_show_homepage_content' );

	if ( $show_content || ! is_front_page() ) : ?>
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- #content -->
	<?php endif; ?>

		<?php do_action( 'caff_after_content' ); ?>
		
		<footer id="colophon" class="site-footer">
			<?php get_template_part( 'template-parts/footer/footer', 'widget' ); ?>

			<?php get_template_part( 'template-parts/footer/site-info' ); ?>
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<div id="scrollup" class="displaynone">
		<a title="<?php echo esc_attr__( 'Go to Top', 'caff' ); ?>" class="scrollup" href="#"><i class="fas fa-angle-up"></i></a>
	</div>

	<?php wp_footer(); ?>
</body>
</html>
