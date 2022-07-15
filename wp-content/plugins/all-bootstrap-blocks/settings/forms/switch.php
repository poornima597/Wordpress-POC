<?php
/*
Name: Switch
Slug: switch
Description: 
Position: 60
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-switch-';

return array(
	array(
		'label' => '$form-switch-color',
		'name' => $slug . 'form-switch-color',
		'variable' => '$form-switch-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'rgba(0, 0, 0, .25)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-switch-width',
		'name' => $slug . 'form-switch-width',
		'variable' => '$form-switch-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '2em',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-switch-padding-start',
		'name' => $slug . 'form-switch-padding-start',
		'variable' => '$form-switch-padding-start',
		'row' => 'default',
		'input' => 'text',
		'default' => '$form-switch-width + .5em',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	/*array(
		'label' => '$form-switch-bg-image',
		'name' => $slug . 'form-switch-bg-image',
		'variable' => '$form-switch-bg-image',
		'row' => 'default',
		'input' => 'text',
		'default' => 'url("data',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),*/
	array(
		'label' => '$form-switch-border-radius',
		'name' => $slug . 'form-switch-border-radius',
		'variable' => '$form-switch-border-radius',
		'row' => 'default',
		'input' => 'text',
		'default' => '$form-switch-width',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-switch-transition',
		'name' => $slug . 'form-switch-transition',
		'variable' => '$form-switch-transition',
		'row' => 'default',
		'input' => 'text',
		'default' => 'background-position .15s ease-in-out',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-switch-focus-color',
		'name' => $slug . 'form-switch-focus-color',
		'variable' => '$form-switch-focus-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$input-focus-border-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	/*array(
		'label' => '$form-switch-focus-bg-image',
		'name' => $slug . 'form-switch-focus-bg-image',
		'variable' => '$form-switch-focus-bg-image',
		'row' => 'default',
		'input' => 'text',
		'default' => 'url("data',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),*/
	array(
		'label' => '$form-switch-checked-color',
		'name' => $slug . 'form-switch-checked-color',
		'variable' => '$form-switch-checked-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$component-active-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	/*array(
		'label' => '$form-switch-checked-bg-image',
		'name' => $slug . 'form-switch-checked-bg-image',
		'variable' => '$form-switch-checked-bg-image',
		'row' => 'default',
		'input' => 'text',
		'default' => 'url("data',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),*/
	array(
		'label' => '$form-switch-checked-bg-position',
		'name' => $slug . 'form-switch-checked-bg-position',
		'variable' => '$form-switch-checked-bg-position',
		'row' => 'default',
		'input' => 'text',
		'default' => 'right center',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);