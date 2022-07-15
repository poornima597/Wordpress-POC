<?php
function areoi_render_block_nav_and_tab_item( $attributes, $content ) 
{
	$class 			= 	trim( 
		areoi_get_class_name_str( array( 
			'nav-link',
			( !empty( $attributes['className'] ) ? $attributes['className'] : '' ),
			( !empty( $attributes['active'] ) ? 'active' : '' ),
			( !empty( $attributes['disabled'] ) ? 'disabled' : '' ),
		) ) 
		. ' ' . 
		areoi_get_display_class_str( $attributes, 'flex' )
	);

	$nav_and_tab_item_open = '<a ' . areoi_return_id( $attributes ) . ' class="' . areoi_format_block_id( $attributes['block_id'] ) . ' ' . $class . '"';
	
	if ( !empty( $attributes['url'] ) ) {
		$nav_and_tab_item_open .= ' href="' . $attributes['url'] . '"';
	}
	if ( !empty( $attributes['rel'] ) ) {
		$nav_and_tab_item_open .= ' rel="' . $attributes['rel'] . '"';
	}
	if ( !empty( $attributes['linkTarget'] ) ) {
		$nav_and_tab_item_open .= ' target="' . $attributes['linkTarget'] . '"';
	}
	$nav_and_tab_item_open .= '>';

	$output = '
		' . $nav_and_tab_item_open . '
			' . ( !empty( $attributes['text'] ) ? $attributes['text'] : '' ) . '
		</a>
	';

	return $output;
}