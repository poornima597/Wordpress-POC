<?php
/*
Name: Grid
Slug: grid
Description: Set the number of columns and specify the width of the gutters.
Position: 10
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-grid-';

return array(
	array(
		'label' => '$grid-columns',
		'name' => $slug . 'grid-columns',
		'variable' => '$grid-columns',
		'row' => 'default',
		'input' => 'text',
		'default' => '12',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$grid-gutter-width',
		'name' => $slug . 'grid-gutter-width',
		'variable' => '$grid-gutter-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '1.5rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$grid-row-columns',
		'name' => $slug . 'grid-row-columns',
		'variable' => '$grid-row-columns',
		'row' => 'default',
		'input' => 'text',
		'default' => '6',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$gutters',
		'name' => $slug . 'gutters',
		'variable' => '$gutters',
		'row' => 'default',
		'input' => 'text',
		'default' => '$spacers',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);