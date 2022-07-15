<?php
/*
Name: Theme Colors
Slug: theme-colors
Description: We use a subset of all colors to create a smaller color palette for generating color schemes, also available as Sass variables and a Sass map in Bootstrap’s scss/_variables.scss file.
Position: 10
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-theme-colors-';

return array(
	array(
		'label' => '$primary',
		'name' => $slug . 'primary',
		'variable' => '$primary',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$blue',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$secondary',
		'name' => $slug . 'secondary',
		'variable' => '$secondary',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-600',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$success',
		'name' => $slug . 'success',
		'variable' => '$success',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$green',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$info',
		'name' => $slug . 'info',
		'variable' => '$info',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$cyan',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$warning',
		'name' => $slug . 'warning',
		'variable' => '$warning',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$yellow',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$danger',
		'name' => $slug . 'danger',
		'variable' => '$danger',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$red',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$light',
		'name' => $slug . 'light',
		'variable' => '$light',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-100',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dark',
		'name' => $slug . 'dark',
		'variable' => '$dark',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-900',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);