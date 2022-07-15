<?php
function areoi_render_block_row( $attributes, $content ) 
{
	$class 			= 	trim( 
		areoi_get_class_name_str( array( 
			'row',
			'areoi-element',
			( !empty( $attributes['className'] ) ? $attributes['className'] : '' ),

			( empty( $attributes['hide_xs'] ) && !empty( $attributes['vertical_align_xs'] ) ? $attributes['vertical_align_xs'] : '' ),
			( empty( $attributes['hide_sm'] ) && !empty( $attributes['vertical_align_sm'] ) ? $attributes['vertical_align_sm'] : '' ),
			( empty( $attributes['hide_md'] ) && !empty( $attributes['vertical_align_md'] ) ? $attributes['vertical_align_md'] : '' ),
			( empty( $attributes['hide_lg'] ) && !empty( $attributes['vertical_align_lg'] ) ? $attributes['vertical_align_lg'] : '' ),
			( empty( $attributes['hide_xl'] ) && !empty( $attributes['vertical_align_xl'] ) ? $attributes['vertical_align_xl'] : '' ),
			( empty( $attributes['hide_xxl'] ) && !empty( $attributes['vertical_align_xxl'] ) ? $attributes['vertical_align_xxl'] : '' ),

			( empty( $attributes['hide_xs'] ) && !empty( $attributes['horizontal_align_xs'] ) ? $attributes['horizontal_align_xs'] : '' ),
			( empty( $attributes['hide_sm'] ) && !empty( $attributes['horizontal_align_sm'] ) ? $attributes['horizontal_align_sm'] : '' ),
			( empty( $attributes['hide_md'] ) && !empty( $attributes['horizontal_align_md'] ) ? $attributes['horizontal_align_md'] : '' ),
			( empty( $attributes['hide_lg'] ) && !empty( $attributes['horizontal_align_lg'] ) ? $attributes['horizontal_align_lg'] : '' ),
			( empty( $attributes['hide_xl'] ) && !empty( $attributes['horizontal_align_xl'] ) ? $attributes['horizontal_align_xl'] : '' ),
			( empty( $attributes['hide_xxl'] ) && !empty( $attributes['horizontal_align_xxl'] ) ? $attributes['horizontal_align_xxl'] : '' ),

			( empty( $attributes['hide_xs'] ) && !empty( $attributes['row_cols_xs'] ) ? $attributes['row_cols_xs'] : '' ),
			( empty( $attributes['hide_sm'] ) && !empty( $attributes['row_cols_sm'] ) ? $attributes['row_cols_sm'] : '' ),
			( empty( $attributes['hide_md'] ) && !empty( $attributes['row_cols_md'] ) ? $attributes['row_cols_md'] : '' ),
			( empty( $attributes['hide_lg'] ) && !empty( $attributes['row_cols_lg'] ) ? $attributes['row_cols_lg'] : '' ),
			( empty( $attributes['hide_xl'] ) && !empty( $attributes['row_cols_xl'] ) ? $attributes['row_cols_xl'] : '' ),
			( empty( $attributes['hide_xxl'] ) && !empty( $attributes['row_cols_xxl'] ) ? $attributes['row_cols_xxl'] : '' )
		) ) 
		. ' ' . 
		areoi_get_display_class_str( $attributes, 'flex' ) 
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