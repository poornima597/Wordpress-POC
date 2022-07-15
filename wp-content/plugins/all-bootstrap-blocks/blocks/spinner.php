<?php
function areoi_render_block_spinner( $attributes, $content ) 
{
	$class 			= 	trim( 
		areoi_get_class_name_str( array( 
			( !empty( $attributes['style'] ) ? $attributes['style'] : '' ),
			( !empty( $attributes['color'] ) ? $attributes['color'] : '' ),
			( !empty( $attributes['size'] ) ? $attributes['style'] . $attributes['size'] : '' ),
			areoi_format_block_id( $attributes['block_id'] ),
			( !empty( $attributes['className'] ) ? $attributes['className'] : '' )
		) ) . ' ' . areoi_get_display_class_str( $attributes, 'block' )
	);

	$output = '
		<div ' . areoi_return_id( $attributes ) . ' class="' . $class . '">
			<span class="visually-hidden">Loading...</span>
		</div>
	';

	return $output;
}