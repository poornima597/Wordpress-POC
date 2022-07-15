<?php
/*
Name: Colors
Slug: colors
Description: All Bootstrap colors are available as Sass variables and a Sass map in scss/_variables.scss file. To avoid increased file sizes, we don’t create text or background color classes for each of these variables. Instead, we choose a subset of these colors for a theme palette.
Position: 0
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-colors-';

return array(
	array(
		'label' => '$blue',
		'name' => $slug . 'blue',
		'variable' => '$blue',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '#0d6efd',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$indigo',
		'name' => $slug . 'indigo',
		'variable' => '$indigo',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '#6610f2',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$purple',
		'name' => $slug . 'purple',
		'variable' => '$purple',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '#6f42c1',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$pink',
		'name' => $slug . 'pink',
		'variable' => '$pink',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '#d63384',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$red',
		'name' => $slug . 'red',
		'variable' => '$red',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '#dc3545',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$orange',
		'name' => $slug . 'orange',
		'variable' => '$orange',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '#fd7e14',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$yellow',
		'name' => $slug . 'yellow',
		'variable' => '$yellow',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '#ffc107',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$green',
		'name' => $slug . 'green',
		'variable' => '$green',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '#198754',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$teal',
		'name' => $slug . 'teal',
		'variable' => '$teal',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '#20c997',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$cyan',
		'name' => $slug . 'cyan',
		'variable' => '$cyan',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '#0dcaf0',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);