<?php
function areoi_render_block_banner( $attributes, $content ) 
{
	if ( !$content ) return $content;

	libxml_use_internal_errors(true);
	$dom 	= new DOMDocument;
	$dom->encoding = 'utf-8';
	$dom->loadHTML( utf8_decode( $content ) );
	$xpath 	= new DOMXpath($dom);
	$items 	= $xpath->query('//div[contains(@class, "banner-item")]');
	libxml_use_internal_errors(false);

	$layout 		= !empty( $attributes['layout'] ) ? $attributes['layout'] : 'grid';
	$container 		= !empty( $attributes['container'] ) ? $attributes['container'] : 'container';
	$has_follows 	= $items->count() > 3 ? 'banner-grid-has-follows' : '';

	$class 			= 	trim( 
		areoi_get_class_name_str( array( 
			'areoi-banner-' . $layout,
			$has_follows,
			( !empty( $attributes['size'] ) ? $attributes['size'] : '' ),
			( !empty( $attributes['className'] ) ? $attributes['className'] : '' )
		) ) 
		. ' ' . 
		areoi_get_display_class_str( $attributes, 'block' ) 
	);
 	
 	$output = '<div ' . areoi_return_id( $attributes ) . ' class="' . areoi_format_block_id( $attributes['block_id'] ) . ' ' . $class . '">';

		$contents = array();
		if ( !empty( $items ) ) {
			$item_count = $items->count();

			foreach ( $items as $item_key => $item ) {
				$newdoc = new DOMDocument();
				$cloned = $item->cloneNode( true );
			    $newdoc->appendChild($newdoc->importNode($cloned,TRUE));
			    $contents[] = $newdoc->saveHTML();
			}

			$path = AREOI__PLUGIN_DIR . 'blocks/banner/template-parts/' . $layout . '.php';
			if ( file_exists( $path ) ) include( $path );
		}

	$output .= '</div>';

	return $output;
}
