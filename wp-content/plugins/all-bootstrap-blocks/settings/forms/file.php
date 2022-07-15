<?php
/*
Name: File
Slug: file
Description: 
Position: 100
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-file-';

return array(
	array(
		'label' => '$form-file-button-color',
		'name' => $slug . 'form-file-button-color',
		'variable' => '$form-file-button-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$input-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-file-button-bg',
		'name' => $slug . 'form-file-button-bg',
		'variable' => '$form-file-button-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$input-group-addon-bg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-file-button-hover-bg',
		'name' => $slug . 'form-file-button-hover-bg',
		'variable' => '$form-file-button-hover-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'shade-color($form-file-button-bg, 5%)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);