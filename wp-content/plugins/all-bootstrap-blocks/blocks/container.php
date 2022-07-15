<?php
function areoi_render_block_container( $attributes, $content ) 
{
	$class 			= 	trim( 
		areoi_get_class_name_str( array( 
			'areoi-element',
			( !empty( $attributes['container'] ) ? $attributes['container'] : 'container' ),
			( !empty( $attributes['className'] ) ? $attributes['className'] : '' )
		) ) 
		. ' ' . 
		areoi_get_display_class_str( $attributes, 'block' ) 
	);
	
	$background 	= include( AREOI__PLUGIN_DIR . '/blocks/_partials/background.php' );

	$output = '
		<div ' . areoi_return_id( $attributes ) . ' class="' . areoi_format_block_id( $attributes['block_id'] ) . ' ' . $class . '">
			' . $background . '
			' . $content . ' 
		</div>
	';

	return $output;
}