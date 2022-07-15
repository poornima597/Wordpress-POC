<?php
/*
Name: Buttons and Fonts
Slug: buttons-and-fonts
Description: Shared variables that are reassigned to `$input-` and `$btn-` specific variables.
Position: 10
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-buttons-and-fonts-';

return array(
	array(
		'label' => '$input-btn-padding-y',
		'name' => $slug . 'input-btn-padding-y',
		'variable' => '$input-btn-padding-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '.375rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-btn-padding-x',
		'name' => $slug . 'input-btn-padding-x',
		'variable' => '$input-btn-padding-x',
		'row' => 'default',
		'input' => 'text',
		'default' => '.75rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-btn-font-family',
		'name' => $slug . 'input-btn-font-family',
		'variable' => '$input-btn-font-family',
		'row' => 'default',
		'input' => 'font',
		'default' => 'null',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-btn-font-size',
		'name' => $slug . 'input-btn-font-size',
		'variable' => '$input-btn-font-size',
		'row' => 'default',
		'input' => 'text',
		'default' => '$font-size-base',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-btn-line-height',
		'name' => $slug . 'input-btn-line-height',
		'variable' => '$input-btn-line-height',
		'row' => 'default',
		'input' => 'text',
		'default' => '$line-height-base',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-btn-focus-width',
		'name' => $slug . 'input-btn-focus-width',
		'variable' => '$input-btn-focus-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '.25rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-btn-focus-color-opacity',
		'name' => $slug . 'input-btn-focus-color-opacity',
		'variable' => '$input-btn-focus-color-opacity',
		'row' => 'default',
		'input' => 'text',
		'default' => '.25',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-btn-focus-color',
		'name' => $slug . 'input-btn-focus-color',
		'variable' => '$input-btn-focus-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'rgba($component-active-bg, $input-btn-focus-color-opacity)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-btn-focus-blur',
		'name' => $slug . 'input-btn-focus-blur',
		'variable' => '$input-btn-focus-blur',
		'row' => 'default',
		'input' => 'text',
		'default' => '0',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-btn-focus-box-shadow',
		'name' => $slug . 'input-btn-focus-box-shadow',
		'variable' => '$input-btn-focus-box-shadow',
		'row' => 'default',
		'input' => 'text',
		'default' => '0 0 $input-btn-focus-blur $input-btn-focus-width $input-btn-focus-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-btn-padding-y-sm',
		'name' => $slug . 'input-btn-padding-y-sm',
		'variable' => '$input-btn-padding-y-sm',
		'row' => 'default',
		'input' => 'text',
		'default' => '.25rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-btn-padding-x-sm',
		'name' => $slug . 'input-btn-padding-x-sm',
		'variable' => '$input-btn-padding-x-sm',
		'row' => 'default',
		'input' => 'text',
		'default' => '.5rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-btn-font-size-sm',
		'name' => $slug . 'input-btn-font-size-sm',
		'variable' => '$input-btn-font-size-sm',
		'row' => 'default',
		'input' => 'text',
		'default' => '$font-size-sm',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-btn-padding-y-lg',
		'name' => $slug . 'input-btn-padding-y-lg',
		'variable' => '$input-btn-padding-y-lg',
		'row' => 'default',
		'input' => 'text',
		'default' => '.5rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-btn-padding-x-lg',
		'name' => $slug . 'input-btn-padding-x-lg',
		'variable' => '$input-btn-padding-x-lg',
		'row' => 'default',
		'input' => 'text',
		'default' => '1rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-btn-font-size-lg',
		'name' => $slug . 'input-btn-font-size-lg',
		'variable' => '$input-btn-font-size-lg',
		'row' => 'default',
		'input' => 'text',
		'default' => '$font-size-lg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-btn-border-width',
		'name' => $slug . 'input-btn-border-width',
		'variable' => '$input-btn-border-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-width',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);