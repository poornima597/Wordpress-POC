<?php
function areoi_render_block_toast( $attributes, $content ) 
{
	$class 			= 	trim( 
		areoi_get_class_name_str( array( 
			'toast',
			( !empty( $attributes['background'] ) ? $attributes['background'] : '' ),
			( !empty( $attributes['text_color'] ) ? $attributes['text_color'] : '' ),
			( !empty( $attributes['border_color'] ) ? $attributes['border_color'] : '' ),
			( !empty( $attributes['className'] ) ? $attributes['className'] : '' ),
		) ) 
	);

	$container_class = trim( 
		areoi_get_class_name_str( array(
			'position-fixed',
			'p-3',
			( !empty( $attributes['placement'] ) ? $attributes['placement'] : '' ),
		) ) 
	);

	$output = '
		<div class="' . $container_class . '" style="z-index: 11">
			<div 
				' . areoi_return_id( $attributes ) . ' 
				class="' . areoi_format_block_id( $attributes['block_id'] ) . ' ' . $class . '"
				role="alert" aria-live="assertive" aria-atomic="true"
			>
				' . $content . '
			</div>
		</div>
	';

	return $output;
}