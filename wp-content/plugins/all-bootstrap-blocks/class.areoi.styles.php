<?php

class AREOI_Styles
{
	private static $initiated = false;

	public static function init() {
		if ( ! self::$initiated ) {
			self::init_hooks();
		}
	}

	private static function init_hooks() 
	{
		self::$initiated = true;

		if ( is_admin() ) {
			add_action( 'admin_enqueue_scripts', array( 'AREOI_Styles', 'enqueue_custom_admin_style' ) );
		} else {
			
			$priority = get_option( 'areoi-dashboard-global-bootstrap-css-priority' );
			$priority = !empty( $priority ) && is_numeric( $priority ) ? $priority : false;
			if ( $priority ) {
				add_action( 'wp_enqueue_scripts', array( 'AREOI_Styles', 'enqueue_custom_style' ), $priority );
			} else {
				add_action( 'wp_enqueue_scripts', array( 'AREOI_Styles', 'enqueue_custom_style' ) );
			}
			
			add_action( 'wp_enqueue_scripts', array( 'AREOI_Styles', 'add_block_styles' ) );
		}
	}

	public static function enqueue_custom_admin_style()
	{
		if ( !did_action( 'wp_enqueue_media' ) ) {
			wp_enqueue_media();
		}

		wp_enqueue_script('wp-color-picker');
    	wp_enqueue_style( 'wp-color-picker' );
    	wp_enqueue_style( 'dashicons' );

    	$css_enqueues = array(
    		'areoi-bootstrap' 	=> 'assets/css/editor-bootstrap.min.css',
    		'areoi-index' 		=> 'build/index.css',
    		'areoi-select2' 	=> 'assets/css/select2.min.css'
    	);
    	areoi_enqueue_css( $css_enqueues );

    	$js_enqueues = array(
    		'areoi-js' 			=> array(
    			'path' 			=> 'assets/js/areoi.js',
    			'includes' 		=> array()
    		),
    		'areoi-color-picker' => array(
    			'path' 			=> 'assets/js/wp-color-picker-alpha.min.js',
    			'includes' 		=> array( 'wp-color-picker' )
    		),
    		'areoi-select2' 	=> array(
    			'path' 			=> 'assets/js/select2.min.js',
    			'includes' 		=> array()
    		),
    	);
    	areoi_enqueue_js( $js_enqueues );

		wp_localize_script( 'areoi-blocks', 'areoi_vars', array( 
			'plugin_url' => AREOI__PLUGIN_URI, 
			'hide_buttons' => get_option( 'areoi-dashboard-global-hide-buttons-block', 0 ),
			'hide_columns' => get_option( 'areoi-dashboard-global-hide-columns-block', 0 ),
			'text_domain' => AREOI__TEXT_DOMAIN
		) );

		wp_set_script_translations( 'areoi-blocks', AREOI__TEXT_DOMAIN );
	}

	public static function enqueue_custom_style()
	{
		if ( get_option( 'areoi-dashboard-global-bootstrap-css', 1 ) ) {
			$css_enqueues = array(
	    		'areoi-bootstrap' 	=> 'assets/css/bootstrap.min.css',
	    	);
	    	areoi_enqueue_css( $css_enqueues );
		}
		$css_enqueues = array(
    		'areoi-style-index' => 'build/style-index.css',
    	);
    	areoi_enqueue_css( $css_enqueues );
		
		if ( get_option( 'areoi-dashboard-global-bootstrap-js', 1 ) ) {

			$js_enqueues = array(
	    		'areoi-bootstrap' 	=> array(
	    			'path' 			=> 'assets/js/bootstrap.min.js',
	    			'includes' 		=> array()
	    		),
	    		'areoi-bootstrap-extra' => array(
	    			'path' 			=> 'assets/js/bootstrap-extra.js',
	    			'includes' 		=> array( 'areoi-bootstrap' )
	    		),
	    	);
	    	areoi_enqueue_js( $js_enqueues );
		}

		$post = get_post(); 
    	$added_styles = array();
    	$added_scripts = array();
		if ( isset( $post->post_content ) && has_blocks( $post->post_content ) ) {
		    $blocks = parse_blocks( $post->post_content );

		    self::traverse_block_styles( $blocks, $added_styles, $added_scripts );
		}
	}

	public static function traverse_block_styles( $blocks, $added_styles, $added_scripts )
	{
		foreach ( $blocks as $block_key => $block ) {
	    	$block_name = str_replace( 'areoi/', '', $block['blockName'] );
	    	if ( $block['blockName'] == 'core/gallery' ) {
	    		$block_name = str_replace( 'core/', '', $block['blockName'] );
	    	}
	    	
	    	if ( file_exists( AREOI__PLUGIN_DIR . 'blocks/' . $block_name . '/style.css' ) && empty( $added_styles[$block_name] ) ) {
	    		areoi_enqueue_css( array( 'areoi-block-' . $block_name => 'blocks/' . $block_name . '/style.css' ) );
	    		$added_styles[$block_name] = true;
	    	}
	    	if ( file_exists( AREOI__PLUGIN_DIR . 'blocks/' . $block_name . '/script.js' ) && empty( $added_scripts[$block_name] ) ) {
	    		$scripts = array( 
	    			'areoi-block-' . $block_name => array(
		    			'path' => 'blocks/' . $block_name . '/script.js',
		    			'includes' => array()
	    			)
	    		);
	    		areoi_enqueue_js( $scripts );
	    		$added_scripts[$block_name] = true;
	    	}
	    	if ( in_array( $block_name, array( 'media-grid', 'post-grid', 'content-grid' ) ) ) {
	    		$added_styles['gallery'] = true;
	    		$added_styles['post-grid'] = true;
	    		$added_styles['media-grid'] = true;
	    	}

	    	if ( !empty( $block['innerBlocks'] ) ) {
	    		self::traverse_block_styles( $block['innerBlocks'], $added_styles, $added_scripts );
	    	}
	    }
	}

	public static function add_block_styles()
	{
		$devices = array( 
			'_xs'	=> 0,
			'_sm'	=> 576,
			'_md'	=> 768,
			'_lg'	=> 992,
			'_xl'	=> 1200,
			'_xxl'	=> 1400
		);
		$styles = '';

		$standard_blocks = parse_blocks( get_the_content() );
		$reuseable_blocks = array();
		if ( !empty( $standard_blocks ) ) {
			foreach ( $standard_blocks as $block_key => $block ) {
				if ( $block['blockName'] == 'core/block' && !empty( $block['attrs']['ref'] ) ) {
					unset( $standard_blocks[$block_key] );
					$post = get_post($block['attrs']['ref']);
					$reuseable_blocks = array_merge( parse_blocks( $post->post_content ), $reuseable_blocks );
				}
				if ( !$block['blockName'] ) {
					unset( $standard_blocks[$block_key] );
				}
			}
		}
		$blocks = array_merge( $standard_blocks, $reuseable_blocks );
		
		foreach ( $devices as $device_key => $device ) {

			$new_styles = '@media ( min-width: ' . $device . 'px ) {';

			$inner_styles = self::add_block_style( $blocks, $device_key );
			
			if ( empty( $inner_styles ) ) {
				continue;
			}
			$new_styles .= $inner_styles;

			$new_styles .= '}';
			$styles .= $new_styles;
		}

		wp_add_inline_style( 'areoi-style-index', $styles );
	}

	public static function add_block_style( $blocks, $device_key )
	{	
		$styles = '';
		if ( !empty( $blocks ) ) {
			foreach ( $blocks as $block_key => $block ) {

				$attributes = $block['attrs'];
				
				if ( empty( $attributes['block_id'] ) ) {
					continue;
				}
				
				$inner_styles = ( !empty( $attributes['height_dimension' . $device_key] ) ? 'height: ' . $attributes['height_dimension' . $device_key] . (!empty( !empty( $attributes['height_unit' . $device_key] ) ) ? $attributes['height_unit' . $device_key] : 'px') . ';' : '' );
			    $inner_styles .= ( !empty( $attributes['padding_top' . $device_key] ) ? 'padding-top: ' . $attributes['padding_top' . $device_key] . 'px;' : '' );
			    $inner_styles .= ( !empty( $attributes['padding_right' . $device_key] ) ? 'padding-right: ' . $attributes['padding_right' . $device_key] . 'px;' : '' );
			    $inner_styles .= ( !empty( $attributes['padding_bottom' . $device_key] ) ? 'padding-bottom: ' . $attributes['padding_bottom' . $device_key] . 'px;' : '' );
			    $inner_styles .= ( !empty( $attributes['padding_left' . $device_key] ) ? 'padding-left: ' . $attributes['padding_left' . $device_key] . 'px;' : '' );
			    $inner_styles .= ( !empty( $attributes['margin_top' . $device_key] ) ? 'margin-top: ' . $attributes['margin_top' . $device_key] . 'px;' : '' );
			    $inner_styles .= ( !empty( $attributes['margin_right' . $device_key] ) ? 'margin-right: ' . $attributes['margin_right' . $device_key] . 'px;' : '' );
			    $inner_styles .= ( !empty( $attributes['margin_bottom' . $device_key] ) ? 'margin-bottom: ' . $attributes['margin_bottom' . $device_key] . 'px;' : '' );
			    $inner_styles .= ( !empty( $attributes['margin_left' . $device_key] ) ? 'margin-left: ' . $attributes['margin_left' . $device_key] . 'px;' : '' );
				
				if ( !empty( $inner_styles ) ) {
					$styles .= '.block-' . $attributes['block_id'] . ' {';
					$styles .= $inner_styles;			
				    $styles .= '}';
				}				

			    if ( !empty( $block['innerBlocks'] ) ) {
			    	$styles .= self::add_block_style( $block['innerBlocks'], $device_key );
			    }
			}
		}
		return $styles;
	}
}
