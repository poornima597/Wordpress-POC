<?php
/*
Name: Body
Slug: body
Description: Settings for the <code>body</code> element.
Position: 30
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-body-';

return array(
	array(
		'label' => '$body-bg',
		'name' => $slug . 'body-bg',
		'variable' => '$body-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$white',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$body-color',
		'name' => $slug . 'body-color',
		'variable' => '$body-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-900',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$body-text-align',
		'name' => $slug . 'body-text-align',
		'variable' => '$body-text-align',
		'row' => 'default',
		'input' => 'select',
		'default' => 'null',
		'description' => '',
		'allow_reset' => true,
		'options' => array(
			array(
				'id'			=> null,
				'label' 		=> 'Default',
				'description' 	=> null
			),
			array(
				'id'			=> 'left',
				'label' 		=> 'Left',
				'description' 	=> null
			),
			array(
				'id'			=> 'center',
				'label' 		=> 'Center',
				'description' 	=> null
			),
			array(
				'id'			=> 'right',
				'label' 		=> 'Right',
				'description' 	=> null
			),
		)
	),
);