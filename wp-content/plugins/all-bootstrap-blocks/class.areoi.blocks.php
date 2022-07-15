<?php

class AREOI_Blocks
{
	private static $initiated = false;

	public static function init() {

		if ( !self::$initiated ) {

			$asset_file = include( AREOI__PLUGIN_DIR . 'build/index.asset.php');
			
			wp_register_script(
			   'areoi-blocks',
			   AREOI__PLUGIN_URI . 'build/index.js',
			    $asset_file['dependencies'],
			    $asset_file['version']
			);

			add_filter( 'block_categories_all', [ 'AREOI_Blocks', 'add_block_categories' ], 10, 2 );

			require AREOI__PLUGIN_DIR . '/blocks/index.php';
		}
	}

	public static function add_block_categories( $categories, $post ) 
	{
		$new_category = [
			'slug' => 'areoi-layout',
			'title' => __( 'Bootstrap Layout', 'areoi-layout' ),
			'icon'	=> ''
		];
		$new_categories[] = $new_category;

		$new_category = [
			'slug' => 'areoi-components',
			'title' => __( 'Bootstrap Components', 'areoi-components' ),
			'icon'	=> ''
		];
		$new_categories[] = $new_category;

		$new_category = [
			'slug' => 'areoi-strips',
			'title' => __( 'Bootstrap Strips (Beta)', 'areoi-strips' ),
			'icon'	=> ''
		];
		$new_categories[] = $new_category;
		
		// Merge original categories with newly added from framework
		return array_merge( $new_categories, $categories);
	}
}
