<?php
/*
Name: Labels
Slug: labels
Description: 
Position: 30
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-labels-';

return array(
	array(
		'label' => '$form-label-margin-bottom',
		'name' => $slug . 'form-label-margin-bottom',
		'variable' => '$form-label-margin-bottom',
		'row' => 'default',
		'input' => 'text',
		'default' => '.5rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-label-font-size',
		'name' => $slug . 'form-label-font-size',
		'variable' => '$form-label-font-size',
		'row' => 'default',
		'input' => 'text',
		'default' => 'null',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-label-font-style',
		'name' => $slug . 'form-label-font-style',
		'variable' => '$form-label-font-style',
		'row' => 'default',
		'input' => 'text',
		'default' => 'null',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-label-font-weight',
		'name' => $slug . 'form-label-font-weight',
		'variable' => '$form-label-font-weight',
		'row' => 'default',
		'input' => 'text',
		'default' => 'null',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-label-color',
		'name' => $slug . 'form-label-color',
		'variable' => '$form-label-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'null',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);