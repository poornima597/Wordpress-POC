<?php
function areoi_render_block_list_group_item( $attributes, $content ) 
{
	$class 			= 	trim( 
		areoi_get_class_name_str( array( 
			'list-group-item',
			( !empty( $attributes['className'] ) ? $attributes['className'] : '' ),
			( !empty( $attributes['style'] ) ? $attributes['style'] : '' ),
			( !empty( $attributes['active'] ) ? 'active' : '' ),
			( !empty( $attributes['disabled'] ) ? 'disabled' : '' ),
			( !empty( $attributes['action'] ) ? 'list-group-item-action' : '' ),
		) ) 
		. ' ' . 
		areoi_get_display_class_str( $attributes, 'block' ) 
	);

	if ( !empty( $attributes['url'] ) ) {
		$output = '
			<a 
				href="' . $attributes['url'] . '" 
				rel="' . (!empty( $attributes['rel'] ) ? $attributes['rel'] : '') . '" 
				target="' . (!empty( $attributes['linkTarget'] ) ? $attributes['linkTarget'] : '') . '" 
				id="block-' . $attributes['block_id'] . '" 
				class="' . $class . '"
			>
				' . $attributes['text'] . ' 
			</a>
		';
	} else {
		$output = '
			<div ' . areoi_return_id( $attributes ) . ' class="' . areoi_format_block_id( $attributes['block_id'] ) . ' ' . $class . '">
				' . $attributes['text'] . '
			</div>
		';
	}

	return $output;
}