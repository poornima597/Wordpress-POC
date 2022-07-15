<?php
/*
Name: Code
Slug: code
Description: 
Position: 10
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-code-';

return array(
	array(
		'label' => '$code-font-size',
		'name' => $slug . 'code-font-size',
		'variable' => '$code-font-size',
		'row' => 'default',
		'input' => 'text',
		'default' => '$small-font-size',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$code-color',
		'name' => $slug . 'code-color',
		'variable' => '$code-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$pink',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$kbd-padding-y',
		'name' => $slug . 'kbd-padding-y',
		'variable' => '$kbd-padding-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '.2rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$kbd-padding-x',
		'name' => $slug . 'kbd-padding-x',
		'variable' => '$kbd-padding-x',
		'row' => 'default',
		'input' => 'text',
		'default' => '.4rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$kbd-font-size',
		'name' => $slug . 'kbd-font-size',
		'variable' => '$kbd-font-size',
		'row' => 'default',
		'input' => 'text',
		'default' => '$code-font-size',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$kbd-color',
		'name' => $slug . 'kbd-color',
		'variable' => '$kbd-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$white',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$kbd-bg',
		'name' => $slug . 'kbd-bg',
		'variable' => '$kbd-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-900',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$pre-color',
		'name' => $slug . 'pre-color',
		'variable' => '$pre-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'null',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);