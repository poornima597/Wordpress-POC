<?php  

function areoi_get_class_name_str( $classes )
{
	$class_string = '';
	if ( is_array( $classes) ) {
		foreach ( $classes as $class_key => $class ) {
			if ( !$class || $class == 'Default' ) {
				continue;
			}
			$class_string .= $class . ' ';
		}
	}
	return trim( $class_string );
}

function areoi_get_display_class_str( $attributes, $display )
{
	$devices 		= array( 'xs', 'sm', 'md', 'lg', 'xl', 'xxl' );
	$class_string 	= '';

	$prev_display 	= false;
	foreach ( $devices as $device ) {
		if ( empty( $attributes['hide_' . $device] ) ) {
			// continue;
		}
		$attr 		= !empty( $attributes['hide_' . $device] ) ? $attributes['hide_' . $device] : null;

		if ( !empty( $attr ) ) {
			$class_string 	.= ' d-' . ( $device == 'xs' ? '' : $device . '-' ) . 'none';
			$prev_display 	= true;
		} elseif ( $prev_display ) {

			$class_string 	.= ' d-' . ( $device == 'xs' ? '' : $device . '-' ) . $display;
			$prev_display 	= false;
		}
	}
	
	return trim( $class_string );
}

function areoi_return_id( $attributes )
{
	return ( ( !empty( $attributes['anchor'] ) ) ? 'id="' . $attributes['anchor'] . '"' : '' );
}

function areoi_get_display_block_class_str( $attributes, $display )
{
	$devices 		= array( 'xs', 'sm', 'md', 'lg', 'xl', 'xxl' );
	$class_string 	= '';

	$prev_display 	= false;
	foreach ( $devices as $device ) {
		$attr 		= $attributes['block_' . $device];

		if ( !empty( $attr ) ) {
			$class_string 	.= ' d-' . ( $device == 'xs' ? '' : $device . '-' ) . 'block';
			$prev_display 	= true;
		} elseif ( $prev_display ) {
			$class_string 	.= ' d-' . ( $device == 'xs' ? '' : $device . '-' ) . $display;
			$prev_display 	= false;
		}
	}
	
	return trim( $class_string );
}

function areoi_format_block_id( $block_id )
{
	return 'block-' . $block_id;
}

function areoi_get_rgba_str( $rgba )
{
	return trim( 'rgba(' . $rgba['r'] . ', ' . $rgba['g'] . ', ' . $rgba['b'] . ',' . $rgba['a'] . ')' );
}

function areoi_generate_breadcrumbs() 
{
	global $post,$wp_query;

	$breadcrumbs = array();
	if ( $post->post_parent ) {
		$breadcrumbs = areoi_generate_breadcrumbs_parent( $breadcrumbs, $post->post_parent );

		$breadcrumbs[] = array(
			'permalink' => home_url(),
			'label'		=> 'Home',
			'active'	=> false
		);
	}
	$breadcrumbs = array_reverse( $breadcrumbs );

	if ( get_permalink( $post->ID ) != home_url() ) {
		$breadcrumbs[] = array(
			'permalink' => get_the_permalink( $post->ID ),
			'label'		=> get_the_title( $post->ID ),
			'active'	=> true
		);
	} else {
		$breadcrumbs[0]['active'] = true;
	}
	return $breadcrumbs;
}

function areoi_generate_breadcrumbs_parent( $breadcrumbs, $parent_id ) 
{
	$parent = get_post( $parent_id );
	
	if ( get_permalink( $parent->ID ) != home_url() ) {
		$breadcrumbs[] = array(
			'permalink' => get_the_permalink( $parent->ID ),
			'label'		=> get_the_title( $parent->ID ),
			'active'	=> false
		);
	}

	if ( $parent->post_parent ) {
		return areoi_generate_breadcrumbs_parent( $breadcrumbs, $parent->post_parent );
	}
	return $breadcrumbs;
}

function areoi_enqueue_css( $enqueues )
{
	foreach ( $enqueues as $enqueue_key => $enqueue ) {
		wp_enqueue_style( $enqueue_key, AREOI__PLUGIN_URI . $enqueue, array(), filemtime( AREOI__PLUGIN_DIR . $enqueue ) );
	}
}

function areoi_enqueue_js( $enqueues )
{
	foreach ( $enqueues as $enqueue_key => $enqueue ) {
		wp_enqueue_script( $enqueue_key, AREOI__PLUGIN_URI . $enqueue['path'], $enqueue['includes'], filemtime( AREOI__PLUGIN_DIR . $enqueue['path'] ), true );
	}
}

function areoi_get_original_theme_json()
{
	$has_theme_json 	= null;
    $theme_json_path 	= get_stylesheet_directory() . '/theme.json';

    if ( file_exists( $theme_json_path ) ) $has_theme_json = json_decode( file_get_contents( $theme_json_path ), true );

	return $has_theme_json;
}

function areoi_get_theme_json()
{
	$has_theme_json 	= null;
    $theme_json_path 	= get_stylesheet_directory() . '/theme.json';

    if ( file_exists( $theme_json_path ) ) {
        $has_theme_json = json_decode( file_get_contents( $theme_json_path ), true );
        $settings 		= !empty( $has_theme_json['settings'] ) ? areoi_preset_properties_theme_json( $has_theme_json['settings'], array(), array( 'settings' ) ) : array();
        $styles = array(
			'text' => 'Styles',
			'children' => array()
		);
        $styles['children'] = !empty( $has_theme_json['styles'] ) ? areoi_flatten_theme_json( $has_theme_json['styles'], array(), array( 'styles' ) ) : array();
        $has_theme_json = array_merge( $settings, array( $styles ) );
    }

	return $has_theme_json;
}

function areoi_get_theme_json_last_update()
{
    $theme_json_path 	= get_stylesheet_directory() . '/theme.json';

	return filemtime( $theme_json_path );
}

function areoi_preset_properties_theme_json( $rows )
{
	$array = array();

	if ( !empty( $rows ) ) {
		
		if ( !empty( $rows['color']['gradients'] ) ) {
			$group = array(
				'text' => 'Gradient',
				'children' => array()
			);
			foreach ( $rows['color']['gradients'] as $row_key => $row ) {
				$var = 'settings!!color!!gradients!!' . $row_key . '!!gradient';
				$group['children'][] 		= [
					'id'	=> $var,
					'text' => ( !empty( $row['name'] ) ? $row['name'] : $row['slug'] )
				];
			}
			$array[] = $group;
		}

		if ( !empty( $rows['color']['palette'] ) ) {
			$group = array(
				'text' => 'Palette',
				'children' => array()
			);
			foreach ( $rows['color']['palette'] as $row_key => $row ) {
				$var = 'settings!!color!!palette!!' . $row_key . '!!color';
				$group['children'][] 		= [
					'id'	=> $var,
					'text' => ( !empty( $row['name'] ) ? $row['name'] : $row['slug'] )
				];
			}
			$array[] = $group;
		}

		if ( !empty( $rows['typography']['fontFamilies'] ) ) {
			$group = array(
				'text' => 'Font Families',
				'children' => array()
			);
			foreach ( $rows['typography']['fontFamilies'] as $row_key => $row ) {
				$var = 'settings!!typography!!fontFamilies!!' . $row_key . '!!fontFamiliy';
				$group['children'][] 		= [
					'id'	=> $var,
					'text' => ( !empty( $row['name'] ) ? $row['name'] : $row['slug'] )
				];
			}
			$array[] = $group;
		}

		if ( !empty( $rows['typography']['fontSizes'] ) ) {
			$group = array(
				'text' => 'Font Size',
				'children' => array()
			);
			foreach ( $rows['typography']['fontSizes'] as $row_key => $row ) {
				$var = 'settings!!typography!!fontSizes!!' . $row_key . '!!size';
				$group['children'][] 		= [
					'id'	=> $var,
					'text' => ( !empty( $row['name'] ) ? $row['name'] : $row['slug'] )
				];
			}
			$array[] = $group;
		}

	}
	
	return $array;
}

function areoi_flatten_theme_json( $rows, $array, $append )
{
	if ( !empty( $rows ) ) {
		foreach ( $rows as $child_rows_key => $child_rows ) {
			$new_append 		= $append;
			$new_append[] 		= $child_rows_key;
			$append_id	 		= implode( '!!', $new_append ); 
			$append_label 		= implode( ' > ', $new_append ); 
			
			if ( in_array( $child_rows_key, array( 'slug', 'name' ) ) ) continue;

			if ( !is_array( $child_rows ) ) {
				$array[] 		= [
					'id'	=> $append_id,
					'text' 	=> $append_label
				];
			} else {
				$array 			= areoi_flatten_theme_json( $child_rows, $array, $new_append );
			}
		}
	}
	return $array;
}

function areoi_get_theme_json_value( $value )
{
	$theme_json = areoi_get_original_theme_json();
	$value 		= str_replace( 'theme-json-', '', $value );
	$array 		= explode( '!!', $value );
	$value 		= '';

	if ( !empty( $array ) ) {
		foreach ( $array as $arr_key => $arr ) {
			if ( !empty( $theme_json[$arr] ) ) {
				$theme_json = $theme_json[$arr];
			}
			if ( !empty( $theme_json['value'] ) ) {
				$value = $theme_json['value'];
			}
		}
	}

	return $theme_json;
}

function areoi_get_parent_block( $id )
{
	global $post;

	$all_blocks = parse_blocks( $post->post_content );

	foreach ( $all_blocks as $block_key => $block ) {
		if ( !empty( $block['attrs']['block_id'] ) && $block['attrs']['block_id'] == $id ) return $block;
	}

	return null;
}

function areoi_get_prepend_content( $attributes )
{
	$prepend = '';

	$prepend_row_class = trim(
		areoi_get_class_name_str( array( 
			'row',
			'position-relative',
			( empty( $attributes['hide_xs'] ) && !empty( $attributes['prepend_horizontal_align_xs'] ) ? $attributes['prepend_horizontal_align_xs'] : '' ),
			( empty( $attributes['hide_sm'] ) && !empty( $attributes['prepend_horizontal_align_sm'] ) ? $attributes['prepend_horizontal_align_sm'] : '' ),
			( empty( $attributes['hide_md'] ) && !empty( $attributes['prepend_horizontal_align_md'] ) ? $attributes['prepend_horizontal_align_md'] : '' ),
			( empty( $attributes['hide_lg'] ) && !empty( $attributes['prepend_horizontal_align_lg'] ) ? $attributes['prepend_horizontal_align_lg'] : '' ),
			( empty( $attributes['hide_xl'] ) && !empty( $attributes['prepend_horizontal_align_xl'] ) ? $attributes['prepend_horizontal_align_xl'] : '' ),
			( empty( $attributes['hide_xxl'] ) && !empty( $attributes['prepend_horizontal_align_xxl'] ) ? $attributes['prepend_horizontal_align_xxl'] : '' ),
		))
	);
	$prepend_col_class = trim(
		areoi_get_class_name_str( array(
			'col',
			( empty( $attributes['hide_xs'] ) && !empty( $attributes['prepend_col_xs'] ) ? $attributes['prepend_col_xs'] : '' ),
			( empty( $attributes['hide_sm'] ) && !empty( $attributes['prepend_col_sm'] ) ? $attributes['prepend_col_sm'] : '' ),
			( empty( $attributes['hide_md'] ) && !empty( $attributes['prepend_col_md'] ) ? $attributes['prepend_col_md'] : '' ),
			( empty( $attributes['hide_lg'] ) && !empty( $attributes['prepend_col_lg'] ) ? $attributes['prepend_col_lg'] : '' ),
			( empty( $attributes['hide_xl'] ) && !empty( $attributes['prepend_col_xl'] ) ? $attributes['prepend_col_xl'] : '' ),
			( empty( $attributes['hide_xxl'] ) && !empty( $attributes['prepend_col_xxl'] ) ? $attributes['prepend_col_xxl'] : '' ),
			( empty( $attributes['hide_xs'] ) && !empty( $attributes['prepend_text_align_xs'] ) ? $attributes['prepend_text_align_xs'] : '' ),
			( empty( $attributes['hide_sm'] ) && !empty( $attributes['prepend_text_align_sm'] ) ? $attributes['prepend_text_align_sm'] : '' ),
			( empty( $attributes['hide_md'] ) && !empty( $attributes['prepend_text_align_md'] ) ? $attributes['prepend_text_align_md'] : '' ),
			( empty( $attributes['hide_lg'] ) && !empty( $attributes['prepend_text_align_lg'] ) ? $attributes['prepend_text_align_lg'] : '' ),
			( empty( $attributes['hide_xl'] ) && !empty( $attributes['prepend_text_align_xl'] ) ? $attributes['prepend_text_align_xl'] : '' ),
			( empty( $attributes['hide_xxl'] ) && !empty( $attributes['prepend_text_align_xxl'] ) ? $attributes['prepend_text_align_xxl'] : '' ),
		) )
	);

	$heading_color = !empty( $attributes['prepend_heading_color'] ) ? $attributes['prepend_heading_color'] : '';
	$intro_color = !empty( $attributes['prepend_intro_color'] ) ? $attributes['prepend_intro_color'] : '';

	if ( !empty( $attributes['prepend_display_heading'] ) || !empty( $attributes['prepend_display_intro'] ) ) {

		$prepend_heading = !empty( $attributes['prepend_display_heading'] ) && !empty( $attributes['prepend_heading'] ) ? '<' . $attributes['prepend_heading_level'] . ' class="' . $heading_color . '">' . $attributes['prepend_heading'] . '</' . $attributes['prepend_heading_level'] . '>' : '';
		$prepend_intro = !empty( $attributes['prepend_intro'] ) && !empty( $attributes['prepend_intro'] ) ? '<p class="' . $intro_color . '">' . $attributes['prepend_intro'] . '</p>' : '';

		$prepend .= '
		<div class="' . $prepend_row_class . '">
			<div class="' . $prepend_col_class . '">
				' . $prepend_heading . '
				' . $prepend_intro . '
			</div>
		</div>
		';
	}

	return $prepend;
}