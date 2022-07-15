<?php
/*
Name: Floating
Slug: floating
Description: 
Position: 110
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-floating-';

return array(
	array(
		'label' => '$form-floating-height',
		'name' => $slug . 'form-floating-height',
		'variable' => '$form-floating-height',
		'row' => 'default',
		'input' => 'text',
		'default' => 'add(3.5rem, $input-height-border)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-floating-line-height',
		'name' => $slug . 'form-floating-line-height',
		'variable' => '$form-floating-line-height',
		'row' => 'default',
		'input' => 'text',
		'default' => '1.25',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-floating-padding-x',
		'name' => $slug . 'form-floating-padding-x',
		'variable' => '$form-floating-padding-x',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-padding-x',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-floating-padding-y',
		'name' => $slug . 'form-floating-padding-y',
		'variable' => '$form-floating-padding-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '1rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-floating-input-padding-t',
		'name' => $slug . 'form-floating-input-padding-t',
		'variable' => '$form-floating-input-padding-t',
		'row' => 'default',
		'input' => 'text',
		'default' => '1.625rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-floating-input-padding-b',
		'name' => $slug . 'form-floating-input-padding-b',
		'variable' => '$form-floating-input-padding-b',
		'row' => 'default',
		'input' => 'text',
		'default' => '.625rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-floating-label-opacity',
		'name' => $slug . 'form-floating-label-opacity',
		'variable' => '$form-floating-label-opacity',
		'row' => 'default',
		'input' => 'text',
		'default' => '.65',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-floating-label-transform',
		'name' => $slug . 'form-floating-label-transform',
		'variable' => '$form-floating-label-transform',
		'row' => 'default',
		'input' => 'text',
		'default' => 'scale(.85) translateY(-.5rem) translateX(.15rem)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-floating-transition',
		'name' => $slug . 'form-floating-transition',
		'variable' => '$form-floating-transition',
		'row' => 'default',
		'input' => 'text',
		'default' => 'opacity .1s ease-in-out, transform .1s ease-in-out',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);