<?php
function areoi_render_block_content_grid( $attributes, $content ) 
{
	if ( !$content ) return $content;

	$layout 		= !empty( $attributes['layout'] ) ? $attributes['layout'] : 'gird';
	$container 		= !empty( $attributes['container'] ) ? $attributes['container'] : 'container';
	$columns 		= !empty( $attributes['columns'] ) ? $attributes['columns'] : '3';
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

	 					<div class="row areoi-content-grid-columns areoi-content-grid-columns-' . $columns . '">
 	';

							$output .= $content;

	$output .= '
						</div>
					</div>
				</div>
			</div>
		</div>
	';

	return $output;
}
