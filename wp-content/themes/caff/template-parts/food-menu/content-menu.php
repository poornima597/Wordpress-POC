<?php
/**
 * The template used for displaying menu single content
 *
 * @package Caff Pro
 */

?>
<article id="post-<?php the_ID(); ?>" class="menu-item ff-grid-6">
	<?php if ( has_post_thumbnail() ) : ?>
	<div class="food-menu-thumbnail post-thumbnail">
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail(); ?>
		</a>
	</div>
	<?php endif; ?>
	<div class="menu-entry-container">
		<div class="entry-description">
			<div class="entry-header">
				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_the_permalink() ) . '">', '</a></h2>' ); ?>
			</div>
			<div class="entry-price">
				<p class="item-price"><?php echo esc_html( get_post_meta( $post->ID, 'nova_price', true ) ); ?></p>
			</div>
			
		</div>
		<?php caff_display_content( 'food_menu' ); ?>
		
	</div>
</article><!-- .hentry -->
