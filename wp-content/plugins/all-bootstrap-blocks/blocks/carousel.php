<?php
function areoi_render_block_carousel( $attributes, $content ) 
{
	libxml_use_internal_errors( true );
	
	$dom 	= new DOMDocument;
	$dom->encoding = 'utf-8';
	$dom->loadHTML( utf8_decode( $content ) );
	$xpath 	= new DOMXpath($dom);
	$items 	= $xpath->query('//div[contains(@class, "carousel-item")]');

	$class 			= 	trim( 
		areoi_get_class_name_str( array( 
			'carousel',
			'slide',
			( !empty( $attributes['className'] ) ? $attributes['className'] : '' ),
			( !empty( $attributes['style'] ) ? $attributes['style'] : '' ),
			( !empty( $attributes['transition'] ) ? $attributes['transition'] : '' ),
		) ) 
		. ' ' . 
		areoi_get_display_class_str( $attributes, 'block' ) 
	);

	$buttons = null;
	if ( !empty( $attributes['controls'] ) && $items->length > 1 ) {
		$buttons = '
			<button class="carousel-control-prev" type="button" data-bs-target=".block-' . $attributes['block_id'] . '" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target=".block-' . $attributes['block_id'] . '" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		';
	}

	$indicators = null;
	if ( !empty( $attributes['indicators'] ) && $items->length > 1 ) {
		$indicators = '<div class="carousel-indicators">';
			foreach ( $items as $item_key => $item ) {
				$indicators .= '
					<button 
						type="button" 
						data-bs-target=".block-' . $attributes['block_id'] . '" 
						data-bs-slide-to="' . $item_key . '" 
						class="' . ( $item_key == 0 ? 'active' : '' ) . '" 
						aria-current="true" 
						aria-label="Slide ' . $item_key . '"
					></button>
				';
			}
		$indicators .= '</div>';
	}

	$newdoc = new DOMDocument();
	if ( !empty( $items ) ) {
		foreach ( $items as $item_key => $item ) {
			$cloned = $item->cloneNode(TRUE);
			if ( $item_key == 0 ) {
				$cloned->setAttribute( 'class', 'carousel-item active' );
			}
		    $newdoc->appendChild($newdoc->importNode($cloned,TRUE));
		}
		$content = $newdoc->saveHTML();
	}

	$auto_scroll = false;
	if ( empty( $attributes['auto_scroll'] ) && $attributes['interval'] === true ) $auto_scroll = 'carousel'; 
	if ( !empty( $attributes['auto_scroll'] ) ) $auto_scroll = ( $attributes['auto_scroll'] ? 'carousel' : 'false' ); 

	$interval = false;
	if ( $attributes['interval'] ) $interval = $attributes['interval'];
	if ( $attributes['interval'] === true ) $interval = 4000;
	if ( $auto_scroll != 'carousel' ) $interval = false;

	$output = '
		<div 
			' . areoi_return_id( $attributes ) . '
			class="' . areoi_format_block_id( $attributes['block_id'] ) . ' ' . $class . '"
			data-bs-ride="' . $auto_scroll . '"
			data-bs-touch="' .( $attributes['touch'] ? 'true' : 'false') . '" 
			' . ( $auto_scroll ? 'data-bs-interval="' . $interval . '"' : '' ) . '
		>
			' . $buttons . '
			' . $indicators . '
			' . $content . ' 
			<div class="clearfix"></div>
		</div>
	';

	return $output;
}