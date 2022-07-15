<?php
function areoi_render_block_collapse( $attributes, $content ) 
{
	$class 			= 	trim( 
		areoi_get_class_name_str( array(
			'collapse', 
			( !empty( $attributes['className'] ) ? $attributes['className'] : '' ),
			( !empty( $attributes['open'] ) ? 'show' : '' )
		) ) 
		. ' ' . 
		areoi_get_display_class_str( $attributes, 'block' ) 
	);

	$output = '
		<div ' . areoi_return_id( $attributes ) . ' class="' . areoi_format_block_id( $attributes['block_id'] ) . ' ' . $class . '">
			' . $content . ' 
		</div>
	';

	return $output;
}