<?php
/*
Name: Text
Slug: text
Description: 
Position: 20
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-text-';

return array(
	array(
		'label' => '$form-text-margin-top',
		'name' => $slug . 'form-text-margin-top',
		'variable' => '$form-text-margin-top',
		'row' => 'default',
		'input' => 'text',
		'default' => '.25rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-text-font-size',
		'name' => $slug . 'form-text-font-size',
		'variable' => '$form-text-font-size',
		'row' => 'default',
		'input' => 'text',
		'default' => '$small-font-size',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-text-font-style',
		'name' => $slug . 'form-text-font-style',
		'variable' => '$form-text-font-style',
		'row' => 'default',
		'input' => 'text',
		'default' => 'null',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-text-font-weight',
		'name' => $slug . 'form-text-font-weight',
		'variable' => '$form-text-font-weight',
		'row' => 'default',
		'input' => 'text',
		'default' => 'null',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-text-color',
		'name' => $slug . 'form-text-color',
		'variable' => '$form-text-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$text-muted',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);