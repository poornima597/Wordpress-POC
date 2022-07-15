<?php
/**
 * Template Name: Menu Page
 *
 * @package Caff
 */

get_header(); ?>
<?php
if ( class_exists( 'Nova_Restaurant' ) ) {
	Nova_Restaurant::init( array(
		'menu_tag'               => 'section',
		'menu_class'             => 'menu-items',
		'menu_header_tag'        => 'header',
		'menu_header_class'      => 'menu-group-header',
		'menu_title_tag'         => 'h2',
		'menu_title_class'       => 'menu-group-title',
		'menu_description_tag'   => 'div',
		'menu_description_class' => 'menu-group-description',
	) );
}
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<div class="food-menu-section page-template-menu">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

			<?php endwhile; ?>

			<?php if ( class_exists( 'Jetpack' ) ) : ?>

				<?php
				$loop = new WP_Query( array( 'post_type' => 'nova_menu_item' ) );
				while ( $loop->have_posts() ) :
					$loop->the_post();
					get_template_part( 'template-parts/content/content', 'menu' );
				endwhile;
				wp_reset_postdata();
				?>
			<?php endif; ?>
			</div>
		</main><!-- #main -->

	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
