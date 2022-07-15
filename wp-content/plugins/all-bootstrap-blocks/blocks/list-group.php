<?php
function areoi_render_block_list_group( $attributes, $content ) 
{
	$class 			= 	trim( 
		areoi_get_class_name_str( array( 
			'list-group',
			( !empty( $attributes['className'] ) ? $attributes['className'] : '' ),
			( !empty( $attributes['flush'] ) ? $attributes['flush'] : '' ),
			( !empty( $attributes['style'] ) ? $attributes['style'] : '' ),
			( !empty( $attributes['layout'] ) ? $attributes['layout'] : '' ),
		) ) 
		. ' ' . 
		areoi_get_display_class_str( $attributes, 'flex' ) 
	);

	$output = '
		<div ' . areoi_return_id( $attributes ) . ' class="' . areoi_format_block_id( $attributes['block_id'] ) . ' ' . $class . '">
			' . $content . ' 
		</div>
	';

	return $output;
}