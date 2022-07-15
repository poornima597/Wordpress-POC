<?php
function areoi_render_block_content_grid_item( $attributes, $content ) 
{
	
	$parent 	= areoi_get_parent_block( $attributes['parent_id'] );
	$layout 	= !empty( $parent['attrs']['layout'] ) ? $parent['attrs']['layout'] : 'grid';
	$style 		= !empty( $parent['attrs']['style'] ) ? $parent['attrs']['style'] : 'card';
	$has_image	= ( !empty( $attributes['image'] ) || !empty( $attributes['video'] ) ) ? 'has-image' : '';

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
			$has_image,
			( !empty( $attributes['className'] ) ? $attributes['className'] : '' )
		) ) 
		. ' ' . 
		areoi_get_display_class_str( $attributes, 'block' ) 
	);

	$background 	= include( AREOI__PLUGIN_DIR . '/blocks/_partials/background.php' );

	$url = null;
	if ( !empty( $attributes['url'] ) ) {
		$url = '
			<a class="areoi-full-link"
		';
		if ( !empty( $attributes['url'] ) ) {
			$url .= ' href="' . $attributes['url'] . '"';
		}
		if ( !empty( $attributes['rel'] ) ) {
			$url .= ' rel="' . $attributes['rel'] . '"';
		}
		if ( !empty( $attributes['linkTarget'] ) ) {
			$url .= ' target="' . $attributes['linkTarget'] . '"';
		}
		$url .= '></a>';
	}

	$fit = !empty( $attributes['media_fit'] ) ? $attributes['media_fit'] : 'cover';
	$align = !empty( $attributes['media_align'] ) ? $attributes['media_align'] : 'center';
	$height = !empty( $attributes['media_fit'] ) && $attributes['media_fit'] == 'set' ? ( !empty( $attributes['media_height'] ) ? $attributes['media_height'] : '50' ) : false;
	$width = !empty( $attributes['media_fit'] ) && $attributes['media_fit'] == 'set' ? ( !empty( $attributes['media_width'] ) ? $attributes['media_width'] : '100' ) : false;

	$media = '';

	if ( ( !empty( $attributes['image'] ) || !empty( $attributes['video'] ) ) ) {
		
		$media .= '<div class="card-img-top areoi-media position-relative">';
			$media .= '<div class="areoi-media-container ' . $fit . ' ' . $align . '">';

				if ( !empty( $attributes['image'] ) ) {
					$media .= '<img src="' . $attributes['image']['url'] . '" width="' . $attributes['image']['width'] . '" height="' . $attributes['image']['height'] . '" alt="' . $attributes['image']['alt'] . '" style="' . ( $height ? 'max-height: ' . $height . 'px;' : '') . ( $width ? 'max-width: ' . $width . 'px;' : '') . '" />';
				}

                if ( !empty( $attributes['video'] ) ) {
					$media .= '<video class="" autoplay loop playsinline muted style="' . ( $height ? 'max-height: ' . $height . 'px;' : '') . ( $width ? 'max-width: ' . $width . 'px;' : '') . '">';
						$media .= '<source src="' . $attributes['video']['url'] . '" />';
					$media .= '</video>';
				}
            $media .= '</div>';
		$media .= '</div>';
	}

	switch ( $style ) {
		case 'full':
			
			$output = '
				<div ' . areoi_return_id( $attributes ) . ' class="' . areoi_format_block_id( $attributes['block_id'] ) . ' ' . $class . ' p-0">

					<div class="d-flex flex-column h-100 overflow-hidden position-relative">
						' . $background . '

						' . $media . '

						<div class="' . $card_class . '">
							<div class="w-100">' . $content . '</div> 
						</div>

						' . $url . '

					</div>
				</div>
			';

			break;

		case 'flush':
			
			$output = '
				<div ' . areoi_return_id( $attributes ) . ' class="' . areoi_format_block_id( $attributes['block_id'] ) . ' ' . $class . '">

					<div class="d-flex flex-column h-100 overflow-hidden position-relative">
						' . $background . '
						
						<div class="card-body pb-0">' . $media . '</div>
						
						<div class="' . $card_class . '">
							<div class="w-100">' . $content . '</div> 
						</div>

						' . $url . '

					</div>
				</div>
			';

			break;
		
		default:
			

			$output = '
				<div ' . areoi_return_id( $attributes ) . ' class="' . areoi_format_block_id( $attributes['block_id'] ) . ' ' . $class . '">

					<div class="card h-100 overflow-hidden position-relative">
						' . $background . '

						' . $media . '

						<div class="' . $card_class . '">
							<div class="w-100">' . $content . '</div> 
						</div>

						' . $url . '

					</div>
				</div>
			';

			break;
	}

	return $output;
}