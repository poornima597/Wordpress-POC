<?php
/*
Name: Options
Slug: options
Description: Quickly customize Bootstrap with built-in variables to easily toggle global CSS preferences for controlling style and behavior.
Position: 20
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-options-';

return array(
	array(
		'label' => '$enable-caret',
		'name' => $slug . 'enable-caret',
		'variable' => '$enable-caret',
		'row' => 'default',
		'input' => 'checkbox',
		'default' => '1',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$enable-rounded',
		'name' => $slug . 'enable-rounded',
		'variable' => '$enable-rounded',
		'row' => 'default',
		'input' => 'checkbox',
		'default' => '1',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$enable-shadows',
		'name' => $slug . 'enable-shadows',
		'variable' => '$enable-shadows',
		'row' => 'default',
		'input' => 'checkbox',
		'default' => '0',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$enable-gradients',
		'name' => $slug . 'enable-gradients',
		'variable' => '$enable-gradients',
		'row' => 'default',
		'input' => 'checkbox',
		'default' => '0',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$enable-transitions',
		'name' => $slug . 'enable-transitions',
		'variable' => '$enable-transitions',
		'row' => 'default',
		'input' => 'checkbox',
		'default' => '1',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$enable-reduced-motion',
		'name' => $slug . 'enable-reduced-motion',
		'variable' => '$enable-reduced-motion',
		'row' => 'default',
		'input' => 'checkbox',
		'default' => '1',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$enable-smooth-scroll',
		'name' => $slug . 'enable-smooth-scroll',
		'variable' => '$enable-smooth-scroll',
		'row' => 'default',
		'input' => 'checkbox',
		'default' => '1',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$enable-grid-classes',
		'name' => $slug . 'enable-grid-classes',
		'variable' => '$enable-grid-classes',
		'row' => 'default',
		'input' => 'checkbox',
		'default' => '1',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$enable-button-pointers',
		'name' => $slug . 'enable-button-pointers',
		'variable' => '$enable-button-pointers',
		'row' => 'default',
		'input' => 'checkbox',
		'default' => '1',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$enable-rfs',
		'name' => $slug . 'enable-rfs',
		'variable' => '$enable-rfs',
		'row' => 'default',
		'input' => 'checkbox',
		'default' => '1',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$enable-validation-icons',
		'name' => $slug . 'enable-validation-icons',
		'variable' => '$enable-validation-icons',
		'row' => 'default',
		'input' => 'checkbox',
		'default' => '1',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$enable-negative-margins',
		'name' => $slug . 'enable-negative-margins',
		'variable' => '$enable-negative-margins',
		'row' => 'default',
		'input' => 'checkbox',
		'default' => '0',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$enable-deprecation-messages',
		'name' => $slug . 'enable-deprecation-messages',
		'variable' => '$enable-deprecation-messages',
		'row' => 'default',
		'input' => 'checkbox',
		'default' => '1',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$enable-important-utilities',
		'name' => $slug . 'enable-important-utilities',
		'variable' => '$enable-important-utilities',
		'row' => 'default',
		'input' => 'checkbox',
		'default' => '1',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$spacer',
		'name' => $slug . 'spacer',
		'variable' => '$spacer',
		'row' => 'default',
		'input' => 'text',
		'default' => '1rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);