<?php
function areoi_render_block_media_grid_image( $attributes, $content ) 
{
	
	$parent 	= areoi_get_parent_block( $attributes['parent_id'] );
	$layout 	= !empty( $parent['attrs']['layout'] ) ? $parent['attrs']['layout'] : 'grid';
	$style 		= !empty( $parent['attrs']['style'] ) ? $parent['attrs']['style'] : 'flush';
	$link_target = !empty( $parent['attrs']['linkTarget'] ) ? $parent['attrs']['linkTarget'] : false;

	$card_class = 	trim( 
		areoi_get_class_name_str( array( 
			'card-body',
			'd-flex',
			'position-relative',
			
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
		) )
	);

	$class 			= 	trim( 
		areoi_get_class_name_str( array( 
			'areoi-content-grid-item',
			( !empty( $attributes['className'] ) ? $attributes['className'] : '' )
		) ) 
		. ' ' . 
		areoi_get_display_class_str( $attributes, 'block' ) 
	);

	$output = '';

	$padding = ($style == 'full' ? 'p-0' : '');

	if ( !empty( $attributes['id'] ) ) {
		
		$image 			= wp_get_attachment_image_src( $attributes['id'], !empty( $attributes['sizeSlug'] ) ? $attributes['sizeSlug'] : 'full' );

		$image_url 		= $image[0];
		$image_alt 		= '';
		$image_width 	= $image[1];
		$image_height 	= $image[2];

		$link_url 		= null;
		if ( $attributes['linkDestination'] == 'media' ) $link_url = $image_url;
		if ( $attributes['linkDestination'] == 'attachment' ) $link_url = get_attachment_link( $attributes['id'] );

		$link_target_str = '';
		if ( $link_target ) $link_target_str = ' target="_blank"';

		$fit = !empty( $attributes['media_fit'] ) ? $attributes['media_fit'] : 'cover';
		$align = !empty( $attributes['media_align'] ) ? $attributes['media_align'] : 'center';
		$height = !empty( $attributes['media_fit'] ) && $attributes['media_fit'] == 'set' ? ( !empty( $attributes['media_height'] ) ? $attributes['media_height'] : '50' ) : false;
		$width = !empty( $attributes['media_fit'] ) && $attributes['media_fit'] == 'set' ? ( !empty( $attributes['media_width'] ) ? $attributes['media_width'] : '100' ) : false;

		$output .= '<figure class="wp-block-areoi-media-grid-image areoi-content-grid-item ' . $padding . '">';

			if ( !empty( $link_url ) ) {
				$output .= '<a href="' . $link_url . '"' . $link_target_str . ' class="areoi-media">';
			} else {
				$output .= '<div class="areoi-media">';
			}

				$output .= '<div class="areoi-media-container ' . $fit . ' ' . $align . '">';
					$output .= '<img src="' . $image_url . '" alt="' . $image_alt . '" width="' . $image_width . '" height="' . $image_height . '"  style="' . ( $height ? 'max-height: ' . $height . 'px;' : '') . ( $width ? 'max-width: ' . $width . 'px;' : '') . '" />';
				$output .= '</div';

			if ( !empty( $link_url ) ) {
				$output .= '</a>';
			} else {
				$output .= '</div>';
			}

		$output .= '</figure>';
	}

	return $output;
	
}