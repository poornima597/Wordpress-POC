

<article id="post-<?php the_ID(); ?>" <?php post_class( 'menu-item' ); ?> >

<?php if ( has_post_thumbnail() ) : ?>
	<div class="food-menu-thumbnail post-thumbnail">
		<?php the_post_thumbnail( 'thumbnail' ); ?>
	</div><!-- .menu-thumbnail -->
<?php endif; ?>

<div class="menu-entry-container">

	<header class="entry-header">
		<h3 class="entry-title"><?php the_title(); ?></h3>
		<?php $price = get_post_meta( $post->ID, 'nova_price', true ); ?>
		<?php if ( ! empty( $price ) ) : ?>
			<span class="menu-price"><?php echo esc_html( $price ); ?></span>
		<?php endif; ?>
	</header><!-- .entry-header -->
	<?php $terms = wp_get_object_terms( $post->ID, 'nova_menu' ); ?>
		<?php if ( ! empty ( $terms ) && ! is_wp_error( $terms ) ) : ?>
			<span class="menu-labels">
				<?php
					foreach( $terms as $term ) {
						echo '<span class="' . esc_attr( $term->slug ) .'">' . esc_html( $term->name ) . '</span>';
					}
				?>
			</span><!-- .menu-labels -->
		<?php endif; ?>
	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
</div> <!-- .menu-entry-wrapper -->

</article><!-- #post-<?php the_ID(); ?> -->
			
