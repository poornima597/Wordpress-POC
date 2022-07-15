<?php
/*
Name: Input Group
Slug: input-group
Description: 
Position: 70
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-input-group-';

return array(
	array(
		'label' => '$input-group-addon-padding-y',
		'name' => $slug . 'input-group-addon-padding-y',
		'variable' => '$input-group-addon-padding-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-padding-y',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-group-addon-padding-x',
		'name' => $slug . 'input-group-addon-padding-x',
		'variable' => '$input-group-addon-padding-x',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-padding-x',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-group-addon-font-weight',
		'name' => $slug . 'input-group-addon-font-weight',
		'variable' => '$input-group-addon-font-weight',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-font-weight',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-group-addon-color',
		'name' => $slug . 'input-group-addon-color',
		'variable' => '$input-group-addon-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$input-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-group-addon-bg',
		'name' => $slug . 'input-group-addon-bg',
		'variable' => '$input-group-addon-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-200',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-group-addon-border-color',
		'name' => $slug . 'input-group-addon-border-color',
		'variable' => '$input-group-addon-border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$input-border-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);