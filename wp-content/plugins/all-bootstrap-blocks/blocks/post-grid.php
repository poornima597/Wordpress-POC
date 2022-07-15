<?php
function areoi_render_block_post_grid( $attributes, $content ) 
{
	$post_type 		= !empty( $attributes['post_type'] ) ? $attributes['post_type'] : 'post';
	$display_posts 	= !empty( $attributes['display_posts'] ) ? $attributes['display_posts'] : 'selected';
	$posts_per_page = !empty( $attributes['posts_per_page'] ) ? $attributes['posts_per_page'] : '8';
	$orderby 		= !empty( $attributes['orderby'] ) ? $attributes['orderby'] : 'title';
	$order 			= !empty( $attributes['order'] ) ? $attributes['order'] : 'asc';
	$post_ids 		= !empty( $attributes['post_ids'] ) ? $attributes['post_ids'] : [];
	$layout 		= !empty( $attributes['layout'] ) ? $attributes['layout'] : 'gird';
	$style 			= !empty( $attributes['style'] ) ? $attributes['style'] : 'card';
	$container 		= !empty( $attributes['container'] ) ? $attributes['container'] : 'container';
	$columns 		= !empty( $attributes['columns'] ) ? $attributes['columns'] : '3';
	$title_element 	= !empty( $attributes['title_element'] ) ? $attributes['title_element'] : 'h1';
	$text_color 	= !empty( $attributes['text_color'] ) ? $attributes['text_color'] : '';
	$include_media 	= !empty( $attributes['include_media'] ) ? 'has-image' : true;
	$media_layout 	= !empty( $attributes['media_layout'] ) ? $attributes['media_layout'] : 'inline';
	$include_pagination 	= !empty( $attributes['include_pagination'] ) ? $attributes['include_pagination'] : false;
	$pagination_color 	= !empty( $attributes['pagination_color'] ) ? $attributes['pagination_color'] : 'btn-primary';
	$show_all 		= in_array( 'all', $post_ids );

	$background 	= include( AREOI__PLUGIN_DIR . '/blocks/_partials/background.php' );

	$class 			= 	trim( 
		areoi_get_class_name_str( array( 
			'areoi-content-grid',
			'areoi-content-grid-' . $layout,
			'd-flex',
			( !empty( $attributes['size'] ) ? $attributes['size'] : 'areoi-medium' ),

			( empty( $attributes['hide_xs'] ) && !empty( $attributes['vertical_align_xs'] ) ? $attributes['vertical_align_xs'] : '' ),
			( empty( $attributes['hide_sm'] ) && !empty( $attributes['vertical_align_sm'] ) ? $attributes['vertical_align_sm'] : '' ),
			( empty( $attributes['hide_md'] ) && !empty( $attributes['vertical_align_md'] ) ? $attributes['vertical_align_md'] : '' ),
			( empty( $attributes['hide_lg'] ) && !empty( $attributes['vertical_align_lg'] ) ? $attributes['vertical_align_lg'] : '' ),
			( empty( $attributes['hide_xl'] ) && !empty( $attributes['vertical_align_xl'] ) ? $attributes['vertical_align_xl'] : '' ),
			( empty( $attributes['hide_xxl'] ) && !empty( $attributes['vertical_align_xxl'] ) ? $attributes['vertical_align_xxl'] : '' ),

			( empty( $attributes['hide_xs'] ) && !empty( $attributes['horizontal_align_xs'] ) ? $attributes['horizontal_align_xs'] : '' ),
			( empty( $attributes['hide_sm'] ) && !empty( $attributes['horizontal_align_sm'] ) ? $attributes['horizontal_align_sm'] : '' ),
			( empty( $attributes['hide_md'] ) && !empty( $attributes['horizontal_align_md'] ) ? $attributes['horizontal_align_md'] : '' ),
			( empty( $attributes['hide_lg'] ) && !empty( $attributes['horizontal_align_lg'] ) ? $attributes['horizontal_align_lg'] : '' ),
			( empty( $attributes['hide_xl'] ) && !empty( $attributes['horizontal_align_xl'] ) ? $attributes['horizontal_align_xl'] : '' ),
			( empty( $attributes['hide_xxl'] ) && !empty( $attributes['horizontal_align_xxl'] ) ? $attributes['horizontal_align_xxl'] : '' ),

			( !empty( $attributes['className'] ) ? $attributes['className'] : '' )
		) ) 
		. ' ' . 
		areoi_get_display_class_str( $attributes, 'block' ) 
	);

	$prepend = areoi_get_prepend_content( $attributes );
 	
 	$output = '
	 	<div ' . areoi_return_id( $attributes ) . ' class="' . areoi_format_block_id( $attributes['block_id'] ) . ' ' . $class . ' position-relative">
	 		' . $background . '
	 		<div class="' . $container . '">

	 			<div class="row h-100">
	 				<div class="col">

	 					' . $prepend . ' 
 	';		
 	
 	$post__in = $post_ids;
 	$post_parent__in = array();
 	$post_parent__not_in = array();
 	if ( $post_type == 'child-pages' || $display_posts == 'children' ) {
 		$post_parent__in = $post_ids;
 		$post__in = array();
 	}

 	if ( $show_all ) {
 		$post__in = array();
 		$post_parent__in = array('0');
 	}

 	if ( $show_all && $display_posts == 'children' ) {
 		$post__in = array();
 		$post_parent__in = array();
 		$post_parent__not_in = array('0');
 	}

 	$paged = get_query_var('paged') ? get_query_var('paged') : get_query_var('page');
 	$args = array(
 		'posts_per_page'   	=> $posts_per_page,
    	'post_type'        	=> $post_type,
    	'post_parent__in' 	=> $post_parent__in,
    	'post_parent__not_in'=> $post_parent__not_in,
    	'post__in'			=> $post__in,
    	'orderby'			=> $orderby,
    	'order'				=> $order,
    	'paged'				=> $paged,
    	'ignore_sticky_posts' => 1
 	);
 	
	$the_query = new WP_Query( $args );



 	if ( $the_query->have_posts() ) {

 		$output .= '<div class="row areoi-content-grid-columns areoi-content-grid-columns-' . $columns . '">';

 		while ( $the_query->have_posts() ) {
 			$the_query->the_post();
 			
			$url 		= $attributes['include_permalink'] ? '<a class="areoi-full-link" href="' . get_the_permalink() . '"></a>' : null; 
			$title 		= $attributes['include_title'] ? '<' . $title_element . ' class="' . $text_color . '">' . get_the_title() . '</' . $title_element . '>' : null;	
			$excerpt 	= $attributes['include_excerpt'] ? '<p class="' . $text_color . '">' . get_the_excerpt() . '</p>' : null;

			$content 	= '<div>' . $title . $excerpt . '</div>';

			$media = '';

			if ( $include_media ) {
				
				if ( $media_layout == 'inline' && get_the_post_thumbnail() ) {

					$media .= '<div class="card-img-top  position-relative">';
						$media .= '<div class="areoi-background">';

							$media .= get_the_post_thumbnail();

						$media .= '</div>';
					$media .= '</div>';

				} elseif ( $media_layout == 'background' ) {

					$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );

					$attributes['background_display'] 			= true;
					$attributes['background_image'] 			= array( 'url' => !empty( $image[0] ) ? $image[0] : null );
					$attributes['background_color'] 			= $attributes['item_background_color'];
					$attributes['background_display_overlay'] 	= $attributes['item_display_overlay'];
					$attributes['background_overlay'] 			= $attributes['item_overlay'];

					$media .= include( AREOI__PLUGIN_DIR . '/blocks/_partials/background.php' );
				}
			}

 			$card_class = 	trim( 
				areoi_get_class_name_str( array( 
					'card-body',
					'd-flex',
					'position-relative',
					
					( !empty( $attributes['item_vertical_align_xs'] ) ? $attributes['item_vertical_align_xs'] : '' ),
					( !empty( $attributes['item_vertical_align_sm'] ) ? $attributes['item_vertical_align_sm'] : '' ),
					( !empty( $attributes['item_vertical_align_md'] ) ? $attributes['item_vertical_align_md'] : '' ),
					( !empty( $attributes['item_vertical_align_lg'] ) ? $attributes['item_vertical_align_lg'] : '' ),
					( !empty( $attributes['item_vertical_align_xl'] ) ? $attributes['item_vertical_align_xl'] : '' ),
					(  !empty( $attributes['item_vertical_align_xxl'] ) ? $attributes['item_vertical_align_xxl'] : '' ),

					( !empty( $attributes['item_horizontal_align_xs'] ) ? $attributes['item_horizontal_align_xs'] : '' ),
					( !empty( $attributes['item_horizontal_align_sm'] ) ? $attributes['item_horizontal_align_sm'] : '' ),
					( !empty( $attributes['item_horizontal_align_md'] ) ? $attributes['item_horizontal_align_md'] : '' ),
					( !empty( $attributes['item_horizontal_align_lg'] ) ? $attributes['item_horizontal_align_lg'] : '' ),
					( !empty( $attributes['item_horizontal_align_xl'] ) ? $attributes['item_horizontal_align_xl'] : '' ),
					( !empty( $attributes['item_horizontal_align_xxl'] ) ? $attributes['item_horizontal_align_xxl'] : '' ),

					( !empty( $attributes['item_text_align_xs'] ) ? $attributes['item_text_align_xs'] : '' ),
					( !empty( $attributes['item_text_align_sm'] ) ? $attributes['item_text_align_sm'] : '' ),
					( !empty( $attributes['item_text_align_md'] ) ? $attributes['item_text_align_md'] : '' ),
					( !empty( $attributes['item_text_align_lg'] ) ? $attributes['item_text_align_lg'] : '' ),
					( !empty( $attributes['item_text_align_xl'] ) ? $attributes['item_text_align_xl'] : '' ),
					( !empty( $attributes['item_text_align_xxl'] ) ? $attributes['item_text_align_xxl'] : '' ),

					$text_color,
				) )
			);

			$class 			= 	trim( 
				areoi_get_class_name_str( array( 
					'areoi-content-grid-item',
					$include_media,
					( !empty( $attributes['card_size'] ) ? $attributes['card_size'] : 'areoi-card-small' ),
				) )
			);

			switch ( $style ) {
				case 'full':
					
					$output .= '
						<div class="' . $class . ' p-0">

							<div class="d-flex flex-column h-100 overflow-hidden position-relative">

								' . $media . '

								<div class="' . $card_class . '">
									' . $content . ' 
								</div>

								' . $url . '

							</div>
						</div>
					';

					break;

				case 'flush':
					
					$output .= '
						<div class="' . $class . '">

							<div class="d-flex flex-column h-100 overflow-hidden position-relative">
								
								' . $media . '

								<div class="' . $card_class . '">
									' . $content . '
								</div>

								' . $url . '

							</div>
						</div>
					';

					break;
				
				default:
					

					$output .= '
						<div class="' . $class . '">

							<div class="card h-100 overflow-hidden position-relative">

								' . $media . '

								<div class="' . $card_class . '">
									' . $content . '
								</div>

								' . $url . '

							</div>
						</div>
					';

					break;
			}

 		} 

 		$output .= '</div>';

 		if ( $include_pagination ) {
 			$big = 999999999;
	 		$pages = paginate_links( array(
			    'base' 		=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			    'format' 	=> '?paged=%#%',
			    'current' 	=> max( 1, $paged ),
			    'total'	 	=>  $the_query->max_num_pages,
			) );
			$pages = str_replace( 'page-numbers', 'page-numbers btn ' . $pagination_color, $pages );
			$pages = str_replace( 'current', 'current active', $pages );

			$output .= '
			<div class="text-center p-2">
				<div class="btn-group">' . $pages . '</div>
			</div>
			';
 		}

 		wp_reset_postdata();
 	}

	$output .= '
					</div>
				</div>
			</div>
		</div>
	';

	return $output;
}
