<?php
function areoi_render_block_button_group( $attributes, $content ) 
{
	$class 			= 	trim( 
		areoi_get_class_name_str( array( 
			( !empty( $attributes['className'] ) ? $attributes['className'] : '' ),
			( !empty( $attributes['style'] ) ? $attributes['style'] : 'btn-group' ),
			( !empty( $attributes['size'] ) ? $attributes['size'] : '' ),
		) ) 
		. ' ' . 
		areoi_get_display_class_str( $attributes, 'inline-flex' ) 
	);

	$output = '
		<div ' . areoi_return_id( $attributes ) . ' class="' . areoi_format_block_id( $attributes['block_id'] ) . ' ' . $class . '">
			' . $content . ' 
		</div>
	';

	return $output;
}