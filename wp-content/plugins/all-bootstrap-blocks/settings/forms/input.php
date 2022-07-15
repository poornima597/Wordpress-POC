<?php
/*
Name: Input
Slug: input
Description: 
Position: 40
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-input-';

return array(
	array(
		'label' => '$input-padding-y',
		'name' => $slug . 'input-padding-y',
		'variable' => '$input-padding-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-btn-padding-y',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-padding-x',
		'name' => $slug . 'input-padding-x',
		'variable' => '$input-padding-x',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-btn-padding-x',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-padding-y-sm',
		'name' => $slug . 'input-padding-y-sm',
		'variable' => '$input-padding-y-sm',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-btn-padding-y-sm',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-padding-x-sm',
		'name' => $slug . 'input-padding-x-sm',
		'variable' => '$input-padding-x-sm',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-btn-padding-x-sm',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-padding-y-lg',
		'name' => $slug . 'input-padding-y-lg',
		'variable' => '$input-padding-y-lg',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-btn-padding-y-lg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-padding-x-lg',
		'name' => $slug . 'input-padding-x-lg',
		'variable' => '$input-padding-x-lg',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-btn-padding-x-lg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),

	array(
		'label' => '$input-font-family',
		'name' => $slug . 'input-font-family',
		'variable' => '$input-font-family',
		'row' => 'default',
		'input' => 'font',
		'default' => '$input-btn-font-family',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-font-size',
		'name' => $slug . 'input-font-size',
		'variable' => '$input-font-size',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-btn-font-size',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-font-weight',
		'name' => $slug . 'input-font-weight',
		'variable' => '$input-font-weight',
		'row' => 'default',
		'input' => 'text',
		'default' => '$font-weight-base',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-line-height',
		'name' => $slug . 'input-line-height',
		'variable' => '$input-line-height',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-btn-line-height',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-font-size-sm',
		'name' => $slug . 'input-font-size-sm',
		'variable' => '$input-font-size-sm',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-btn-font-size-sm',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-font-size-lg',
		'name' => $slug . 'input-font-size-lg',
		'variable' => '$input-font-size-lg',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-btn-font-size-lg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),

	array(
		'label' => '$input-bg',
		'name' => $slug . 'input-bg',
		'variable' => '$input-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$white',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-disabled-bg',
		'name' => $slug . 'input-disabled-bg',
		'variable' => '$input-disabled-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-200',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-disabled-border-color',
		'name' => $slug . 'input-disabled-border-color',
		'variable' => '$input-disabled-border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'null',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-color',
		'name' => $slug . 'input-color',
		'variable' => '$input-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$body-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	
	array(
		'label' => '$input-border-color',
		'name' => $slug . 'input-border-color',
		'variable' => '$input-border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-400',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-border-width',
		'name' => $slug . 'input-border-width',
		'variable' => '$input-border-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-btn-border-width',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-box-shadow',
		'name' => $slug . 'input-box-shadow',
		'variable' => '$input-box-shadow',
		'row' => 'default',
		'input' => 'text',
		'default' => '$box-shadow-inset',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-border-radius',
		'name' => $slug . 'input-border-radius',
		'variable' => '$input-border-radius',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-radius',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-border-radius-sm',
		'name' => $slug . 'input-border-radius-sm',
		'variable' => '$input-border-radius-sm',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-radius-sm',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-border-radius-lg',
		'name' => $slug . 'input-border-radius-lg',
		'variable' => '$input-border-radius-lg',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-radius-lg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-focus-bg',
		'name' => $slug . 'input-focus-bg',
		'variable' => '$input-focus-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$input-bg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-focus-border-color',
		'name' => $slug . 'input-focus-border-color',
		'variable' => '$input-focus-border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'tint-color($component-active-bg, 50%)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-focus-color',
		'name' => $slug . 'input-focus-color',
		'variable' => '$input-focus-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$input-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-focus-width',
		'name' => $slug . 'input-focus-width',
		'variable' => '$input-focus-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-btn-focus-width',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-focus-box-shadow',
		'name' => $slug . 'input-focus-box-shadow',
		'variable' => '$input-focus-box-shadow',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-btn-focus-box-shadow',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-placeholder-color',
		'name' => $slug . 'input-placeholder-color',
		'variable' => '$input-placeholder-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-600',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-plaintext-color',
		'name' => $slug . 'input-plaintext-color',
		'variable' => '$input-plaintext-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$body-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-height-border',
		'name' => $slug . 'input-height-border',
		'variable' => '$input-height-border',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-border-width * 2',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-height-inner',
		'name' => $slug . 'input-height-inner',
		'variable' => '$input-height-inner',
		'row' => 'default',
		'input' => 'text',
		'default' => 'add($input-line-height * 1em, $input-padding-y * 2)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-height-inner-half',
		'name' => $slug . 'input-height-inner-half',
		'variable' => '$input-height-inner-half',
		'row' => 'default',
		'input' => 'text',
		'default' => 'add($input-line-height * .5em, $input-padding-y)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-height-inner-quarter',
		'name' => $slug . 'input-height-inner-quarter',
		'variable' => '$input-height-inner-quarter',
		'row' => 'default',
		'input' => 'text',
		'default' => 'add($input-line-height * .25em, $input-padding-y * .5)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-height',
		'name' => $slug . 'input-height',
		'variable' => '$input-height',
		'row' => 'default',
		'input' => 'text',
		'default' => 'add($input-line-height * 1em, add($input-padding-y * 2, $input-height-border, false))',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-height-sm',
		'name' => $slug . 'input-height-sm',
		'variable' => '$input-height-sm',
		'row' => 'default',
		'input' => 'text',
		'default' => 'add($input-line-height * 1em, add($input-padding-y-sm * 2, $input-height-border, false))',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-height-lg',
		'name' => $slug . 'input-height-lg',
		'variable' => '$input-height-lg',
		'row' => 'default',
		'input' => 'text',
		'default' => 'add($input-line-height * 1em, add($input-padding-y-lg * 2, $input-height-border, false))',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$input-transition',
		'name' => $slug . 'input-transition',
		'variable' => '$input-transition',
		'row' => 'default',
		'input' => 'text',
		'default' => 'border-color .15s ease-in-out, box-shadow .15s ease-in-out',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);