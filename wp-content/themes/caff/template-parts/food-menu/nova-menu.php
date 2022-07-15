<?php
/**
 * The template for displaying food_menu items
 *
 * @package Catch_Foodmania
 */
?>

<?php
$caff_number = caff_gtm( 'caff_food_menu_number' );

if ( ! $caff_number ) {
	// If number is 0, then this section is disabled
	return;
}

$caff_cat_list = explode( ',', caff_gtm( 'caff_food_menu_item_label' ) );
?>
<div id="tabs" class="tabs">
	<div class="tabs-nav">
		<ul class="ui-tabs-nav">
			<?php
			$caff_i = 0;
			foreach ( $caff_cat_list as $caff_cat ) :
				$caff_term_obj = get_term_by( 'id', absint( $caff_cat ), 'nova_menu' );
				
				if( $caff_term_obj ) {
					$caff_term_name = $caff_cat_name[] = $caff_term_obj->name;

					$caff_class = 'ui-tabs-tab';

					if ( 0 === $caff_i ) {
						$caff_class .= ' ui-state-active';
					}

					?>
					<li class="<?php echo $caff_class; ?>"><a href="#tab-<?php echo esc_attr( $caff_i + 1 ); ?>" class="ui-tabs-anchor"><?php echo esc_html( $caff_term_obj->name ) ?></a></li>
					<?php
				}
				$caff_i++;
			endforeach;
			?>
		</ul>
	</div><!-- .tabs-nav -->

	<?php
	$caff_i = 0;
	foreach ( $caff_cat_list as $caff_cat ) :
		if ( isset( $caff_cat_name ) ) {
	?>

		<div class="ui-tabs-panel-wrap">
			<h4 class="ui-nav-collapse<?php  echo ( 0 === $caff_i ) ? ' ui-state-active' : ''; ?>"><a href="#tab-<?php echo esc_attr( $caff_i + 1 ); ?>" class="ui-tabs-anchor"><?php echo esc_html( $caff_cat_name[ $caff_i ] ); ?></a></h4>
			<div id="tab-<?php echo esc_attr( $caff_i + 1 ); ?>" class="layout-two ui-tabs-panel<?php  echo ( 0 === $caff_i ) ? ' active-tab' : ''; ?>">
				<?php
				$caff_args = array();

				$caff_args['post_type'] = array( 'nova_menu_item' );

				$caff_tax_query = array(
					array(
						'taxonomy' => 'nova_menu',
						'terms'    => absint( $caff_cat ),
						'field'    => 'term_id',
					),
				);

				$caff_args['tax_query']      = $caff_tax_query;
				$caff_args['posts_per_page'] = $caff_number;
				$caff_loop = new WP_Query( $caff_args );
				if ( $caff_loop->have_posts() ) :
					while ( $caff_loop->have_posts() ) :
						$caff_loop->the_post();

						get_template_part( 'template-parts/food-menu/content', 'menu' );
					endwhile;
				endif;
				wp_reset_postdata();
				?>
			</div><!-- #tab-1 -->
		</div><!-- .ui-tabs-panel-wrap -->

	<?php
		}
		$caff_i++;
	endforeach;
	?>
</div><!-- .tabs -->
