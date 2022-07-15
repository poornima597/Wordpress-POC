<?php
/*
Name: Spinners
Slug: spinners
Description: 
Position: 10
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-spinners-';

return array(
	array(
		'label' => '$spinner-width',
		'name' => $slug . 'spinner-width',
		'variable' => '$spinner-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '2rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$spinner-height',
		'name' => $slug . 'spinner-height',
		'variable' => '$spinner-height',
		'row' => 'default',
		'input' => 'text',
		'default' => '$spinner-width',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$spinner-vertical-align',
		'name' => $slug . 'spinner-vertical-align',
		'variable' => '$spinner-vertical-align',
		'row' => 'default',
		'input' => 'text',
		'default' => '-.125em',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$spinner-border-width',
		'name' => $slug . 'spinner-border-width',
		'variable' => '$spinner-border-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '.25em',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$spinner-animation-speed',
		'name' => $slug . 'spinner-animation-speed',
		'variable' => '$spinner-animation-speed',
		'row' => 'default',
		'input' => 'text',
		'default' => '.75s',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$spinner-width-sm',
		'name' => $slug . 'spinner-width-sm',
		'variable' => '$spinner-width-sm',
		'row' => 'default',
		'input' => 'text',
		'default' => '1rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$spinner-height-sm',
		'name' => $slug . 'spinner-height-sm',
		'variable' => '$spinner-height-sm',
		'row' => 'default',
		'input' => 'text',
		'default' => '$spinner-width-sm',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$spinner-border-width-sm',
		'name' => $slug . 'spinner-border-width-sm',
		'variable' => '$spinner-border-width-sm',
		'row' => 'default',
		'input' => 'text',
		'default' => '.2em',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);