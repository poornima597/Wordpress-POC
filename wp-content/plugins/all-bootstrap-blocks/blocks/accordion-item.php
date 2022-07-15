<?php
function areoi_render_block_accordion_item( $attributes, $content ) 
{
	$class 			= 	trim( 
		areoi_get_class_name_str( array( 
			'accordion-item',
			( !empty( $attributes['className'] ) ? $attributes['className'] : '' )
		) ) 
		. ' ' . 
		areoi_get_display_class_str( $attributes, 'block' ) 
	);

	$button_class = areoi_get_class_name_str( array( 
		'accordion-button',
		( !empty( $attributes['open'] ) ? '' : 'collapsed' ),
	) );

	$body_class = areoi_get_class_name_str( array( 
		'accordion-collapse',
		'collapse',
		( !empty( $attributes['open'] ) ? 'show' : '' ),
	) );
	$always_open = '';
	if ( empty( $attributes['always_open'] ) ) {
		$always_open = 'data-bs-parent=".block-' . $attributes['parent_id'] . '"';
	}

	$output = '
		<div ' . areoi_return_id( $attributes ) . ' class="' . areoi_format_block_id( $attributes['block_id'] ) . ' ' . $class . '">

			<' . $attributes['heading'] . ' 
				class="accordion-header" 
				id="block-' . $attributes['block_id'] . '-header"
			>
				<button 
					class="' . $button_class . '" 
					type="button" 
					data-bs-toggle="collapse" 
					data-bs-target="#block-' . $attributes['block_id'] . '-collapse" 
					aria-expanded="true" 
					aria-controls="block-' . $attributes['block_id'] . '-collapse"
				>
					' . $attributes['title'] . '
				</button>
			</' . $attributes['heading'] . '>

			<div 
				id="block-' . $attributes['block_id'] . '-collapse" 
				class="' . $body_class . '" 
				aria-labelledby="block-' . $attributes['block_id'] . '-header"
				' . $always_open . '
			>
				<div class="accordion-body">
					' . $content . ' 
				</div>
			</div>
		</div>
	';

	return $output;
}