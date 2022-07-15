<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Caff
 */

get_header();

$show_content = caff_gtm( 'caff_show_homepage_content' );

if ( $show_content || ! is_front_page() ) :
	?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<div class="archive-posts-wrapper section-content-wrapper">

					<?php
					if ( have_posts() ) :

						if ( is_home() && ! is_front_page() ) :
							?>
							<div class="section-heading-wrapper">
								<header>
									<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
								</header>
							</div><!-- .section-posts-wrapper -->

							<?php
						endif; ?>

						<div id="infinite-post-wrap" class="archive-post-wrap">
							<div id="infinite-grid" class="infinite-grid">
								<?php
								/* Start the Loop */
								while ( have_posts() ) :
									the_post();

									/*
									 * Include the Post-Type-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
									 */
									get_template_part( 'template-parts/content/content', get_post_type() );

								endwhile;
								?>
							</div><!-- .grid -->
							<?php
							
							the_posts_navigation();

							else :

								get_template_part( 'template-parts/content/content', 'none' );

							endif;
							?>
						</div><!-- .archive-post-wrap -->
				</div><!-- .archive-posts-wrapper -->

			</main><!-- #main -->
		</div><!-- #primary -->
	<?php
	get_sidebar();
endif;
get_footer();
