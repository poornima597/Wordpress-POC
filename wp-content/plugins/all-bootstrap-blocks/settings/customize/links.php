<?php
/*
Name: Links
Slug: links
Description: Style anchor elements.
Position: 40
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-links-';

return array(
	array(
		'label' => '$link-color',
		'name' => $slug . 'link-color',
		'variable' => '$link-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$primary',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$link-decoration',
		'name' => $slug . 'link-decoration',
		'variable' => '$link-decoration',
		'row' => 'default',
		'input' => 'select',
		'default' => 'underline',
		'description' => '',
		'allow_reset' => true,
		'options' => array(
			array(
				'id'			=> 'none',
				'label' 		=> 'Default',
				'description' 	=> null
			),
			array(
				'id'			=> 'underline',
				'label' 		=> 'Underline',
				'description' 	=> null
			),
			array(
				'id'			=> 'overline',
				'label' 		=> 'Overline',
				'description' 	=> null
			),
			array(
				'id'			=> 'none',
				'label' 		=> 'None',
				'description' 	=> null
			),
		)
	),
	array(
		'label' => '$link-shade-percentage',
		'name' => $slug . 'link-shade-percentage',
		'variable' => '$link-shade-percentage',
		'row' => 'default',
		'input' => 'text',
		'default' => '20%',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$link-hover-color',
		'name' => $slug . 'link-hover-color',
		'variable' => '$link-hover-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'shift-color($link-color, $link-shade-percentage)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$link-hover-decoration',
		'name' => $slug . 'link-hover-decoration',
		'variable' => '$link-hover-decoration',
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
				'id'			=> 'underline',
				'label' 		=> 'Underline',
				'description' 	=> null
			),
			array(
				'id'			=> 'overline',
				'label' 		=> 'Overline',
				'description' 	=> null
			),
			array(
				'id'			=> 'none',
				'label' 		=> 'None',
				'description' 	=> null
			),
		)
	),
	array(
		'label' => '$stretched-link-pseudo-element',
		'name' => $slug . 'stretched-link-pseudo-element',
		'variable' => '$stretched-link-pseudo-element',
		'row' => 'default',
		'input' => 'text',
		'default' => 'after',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$stretched-link-z-index',
		'name' => $slug . 'stretched-link-z-index',
		'variable' => '$stretched-link-z-index',
		'row' => 'default',
		'input' => 'text',
		'default' => '1',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);