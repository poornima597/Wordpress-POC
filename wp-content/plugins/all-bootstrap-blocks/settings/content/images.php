<?php
/*
Name: Images
Slug: images
Description: 
Position: 40
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-images-';

return array(
	array(
		'label' => '$thumbnail-padding',
		'name' => $slug . 'thumbnail-padding',
		'variable' => '$thumbnail-padding',
		'row' => 'default',
		'input' => 'text',
		'default' => '.25rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$thumbnail-bg',
		'name' => $slug . 'thumbnail-bg',
		'variable' => '$thumbnail-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$body-bg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$thumbnail-border-width',
		'name' => $slug . 'thumbnail-border-width',
		'variable' => '$thumbnail-border-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-width',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$thumbnail-border-color',
		'name' => $slug . 'thumbnail-border-color',
		'variable' => '$thumbnail-border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-300',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$thumbnail-border-radius',
		'name' => $slug . 'thumbnail-border-radius',
		'variable' => '$thumbnail-border-radius',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-radius',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$thumbnail-box-shadow',
		'name' => $slug . 'thumbnail-box-shadow',
		'variable' => '$thumbnail-box-shadow',
		'row' => 'default',
		'input' => 'text',
		'default' => '$box-shadow-sm',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);