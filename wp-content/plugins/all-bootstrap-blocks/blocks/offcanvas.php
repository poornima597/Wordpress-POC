<?php
function areoi_render_block_offcanvas( $attributes, $content ) 
{
	$class 			= 	trim( 
		areoi_get_class_name_str( array( 
			'offcanvas',
			( !empty( $attributes['placement'] ) ? $attributes['placement'] : '' ),
			( !empty( $attributes['className'] ) ? $attributes['className'] : '' ),
		) ) 
	);

	$output = '
		<div 
			' . areoi_return_id( $attributes ) . ' 
			class="' . areoi_format_block_id( $attributes['block_id'] ) . ' ' . $class . '"
			tabindex="-1" 
			aria-hidden="true"
			' . ( !empty( $attributes['backdrop'] ) && $attributes['backdrop'] != 'Default' ? 'data-bs-backdrop="' . $attributes['backdrop'] . '"' : '' ) . '
			' . ( !empty( $attributes['scrollable'] ) && $attributes['scrollable'] != 'Default' ? 'data-bs-scroll="' . $attributes['scrollable'] . '"' : '' ) . '
		>
			' . $content . '
		</div>
	';

	return $output;
}