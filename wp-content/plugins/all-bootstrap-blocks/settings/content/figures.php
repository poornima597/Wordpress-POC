<?php
/*
Name: Figures
Slug: figures
Description: 
Position: 50
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-figures-';

return array(
	array(
		'label' => '$figure-caption-font-size',
		'name' => $slug . 'figure-caption-font-size',
		'variable' => '$figure-caption-font-size',
		'row' => 'default',
		'input' => 'text',
		'default' => '$small-font-size',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$figure-caption-color',
		'name' => $slug . 'figure-caption-color',
		'variable' => '$figure-caption-color',
		'row' => 'default',
		'input' => 'text',
		'default' => '$gray-600',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);