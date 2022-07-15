<?php
function areoi_render_block_modal_header( $attributes, $content ) 
{
	$class 			= 	trim( 
		areoi_get_class_name_str( array( 
			'modal-header',
			( !empty( $attributes['className'] ) ? $attributes['className'] : '' ),
		) ) 
	);

	$close = null;
	if ( !empty( $attributes['close_button'] ) ) {
		$close = '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
	}

	$output = '
		<div ' . areoi_return_id( $attributes ) . ' class="' . areoi_format_block_id( $attributes['block_id'] ) . ' ' . $class . '">
			<div class="modal-header-content">' . $content . '</div>
			' . $close . '
		</div>
	';

	return $output;
}