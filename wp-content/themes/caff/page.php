<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Caff
 */

get_header();

$show_content_meta = get_post_meta( get_the_ID(), 'caff-hide-content', true );

if ( ! $show_content_meta ) :

	$show_content = caff_gtm( 'caff_show_homepage_content' );

	if ( $show_content || ! is_front_page() ) :
		?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			</main><!-- #main -->
		</div><!-- #primary -->
		<?php
		get_sidebar();
	endif;
endif;
get_footer();
