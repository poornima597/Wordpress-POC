<?php
function areoi_render_block_progress( $attributes, $content ) 
{
	$class 			= 	trim( 
		areoi_get_class_name_str( array( 
			'progress',
			areoi_format_block_id( $attributes['block_id'] ),
			( !empty( $attributes['className'] ) ? $attributes['className'] : '' )
		) ) . ' ' . areoi_get_display_class_str( $attributes, 'block' )
	);
	$bar_class 			= 	trim( 
		areoi_get_class_name_str( array( 
			'progress-bar',
			( !empty( $attributes['background'] ) ? $attributes['background'] : '' ),
			( !empty( $attributes['striped'] ) ? 'progress-bar-striped' : '' ),
			( !empty( $attributes['animated'] ) ? 'progress-bar-animated' : '' )
		) )
	);
	$label = ( !empty( $attributes['label'] ) ? $attributes['width'] . '%' : '' );
	$width = ( !empty( $attributes['width'] ) ? 'style="width: ' . $attributes['width'] . '%;"' : '' );

	$output = '
		<div ' . areoi_return_id( $attributes ) . ' class="' . $class . '">
			<div 
				class="' . $bar_class . '" 
				role="progressbar" 
				aria-valuenow="0" 
				aria-valuemin="0" 
				aria-valuemax="100"
				' . $width . '
			>
				' . $label . '
			</div>
		</div>
	';

	return $output;
}