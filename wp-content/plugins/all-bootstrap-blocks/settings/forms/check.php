<?php
/*
Name: Check
Slug: check
Description: 
Position: 50
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-check-';

return array(
	array(
		'label' => '$form-check-input-width',
		'name' => $slug . 'form-check-input-width',
		'variable' => '$form-check-input-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '1em',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-check-min-height',
		'name' => $slug . 'form-check-min-height',
		'variable' => '$form-check-min-height',
		'row' => 'default',
		'input' => 'text',
		'default' => '$font-size-base * $line-height-base',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-check-padding-start',
		'name' => $slug . 'form-check-padding-start',
		'variable' => '$form-check-padding-start',
		'row' => 'default',
		'input' => 'text',
		'default' => '$form-check-input-width + .5em',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-check-margin-bottom',
		'name' => $slug . 'form-check-margin-bottom',
		'variable' => '$form-check-margin-bottom',
		'row' => 'default',
		'input' => 'text',
		'default' => '.125rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-check-label-color',
		'name' => $slug . 'form-check-label-color',
		'variable' => '$form-check-label-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'null',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-check-label-cursor',
		'name' => $slug . 'form-check-label-cursor',
		'variable' => '$form-check-label-cursor',
		'row' => 'default',
		'input' => 'text',
		'default' => 'null',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-check-transition',
		'name' => $slug . 'form-check-transition',
		'variable' => '$form-check-transition',
		'row' => 'default',
		'input' => 'text',
		'default' => 'null',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-check-input-active-filter',
		'name' => $slug . 'form-check-input-active-filter',
		'variable' => '$form-check-input-active-filter',
		'row' => 'default',
		'input' => 'text',
		'default' => 'brightness(90%)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-check-input-bg',
		'name' => $slug . 'form-check-input-bg',
		'variable' => '$form-check-input-bg',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-bg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-check-input-border',
		'name' => $slug . 'form-check-input-border',
		'variable' => '$form-check-input-border',
		'row' => 'default',
		'input' => 'text',
		'default' => '1px solid rgba($black, .25)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-check-input-border-radius',
		'name' => $slug . 'form-check-input-border-radius',
		'variable' => '$form-check-input-border-radius',
		'row' => 'default',
		'input' => 'text',
		'default' => '.25em',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-check-radio-border-radius',
		'name' => $slug . 'form-check-radio-border-radius',
		'variable' => '$form-check-radio-border-radius',
		'row' => 'default',
		'input' => 'text',
		'default' => '50%',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-check-input-focus-border',
		'name' => $slug . 'form-check-input-focus-border',
		'variable' => '$form-check-input-focus-border',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$input-focus-border-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-check-input-focus-box-shadow',
		'name' => $slug . 'form-check-input-focus-box-shadow',
		'variable' => '$form-check-input-focus-box-shadow',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-btn-focus-box-shadow',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-check-input-checked-color',
		'name' => $slug . 'form-check-input-checked-color',
		'variable' => '$form-check-input-checked-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$component-active-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-check-input-checked-bg-color',
		'name' => $slug . 'form-check-input-checked-bg-color',
		'variable' => '$form-check-input-checked-bg-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$component-active-bg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-check-input-checked-border-color',
		'name' => $slug . 'form-check-input-checked-border-color',
		'variable' => '$form-check-input-checked-border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$form-check-input-checked-bg-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-check-input-checked-bg-image',
		'name' => $slug . 'form-check-input-checked-bg-image',
		'variable' => '$form-check-input-checked-bg-image',
		'row' => 'default',
		'input' => 'text',
		'default' => '',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-check-radio-checked-bg-image',
		'name' => $slug . 'form-check-radio-checked-bg-image',
		'variable' => '$form-check-radio-checked-bg-image',
		'row' => 'default',
		'input' => 'text',
		'default' => '',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-check-input-indeterminate-color',
		'name' => $slug . 'form-check-input-indeterminate-color',
		'variable' => '$form-check-input-indeterminate-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$component-active-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-check-input-indeterminate-bg-color',
		'name' => $slug . 'form-check-input-indeterminate-bg-color',
		'variable' => '$form-check-input-indeterminate-bg-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$component-active-bg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-check-input-indeterminate-border-color',
		'name' => $slug . 'form-check-input-indeterminate-border-color',
		'variable' => '$form-check-input-indeterminate-border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$form-check-input-indeterminate-bg-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-check-input-indeterminate-bg-image',
		'name' => $slug . 'form-check-input-indeterminate-bg-image',
		'variable' => '$form-check-input-indeterminate-bg-image',
		'row' => 'default',
		'input' => 'text',
		'default' => '',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-check-input-disabled-opacity',
		'name' => $slug . 'form-check-input-disabled-opacity',
		'variable' => '$form-check-input-disabled-opacity',
		'row' => 'default',
		'input' => 'text',
		'default' => '.5',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-check-label-disabled-opacity',
		'name' => $slug . 'form-check-label-disabled-opacity',
		'variable' => '$form-check-label-disabled-opacity',
		'row' => 'default',
		'input' => 'text',
		'default' => '$form-check-input-disabled-opacity',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-check-btn-check-disabled-opacity',
		'name' => $slug . 'form-check-btn-check-disabled-opacity',
		'variable' => '$form-check-btn-check-disabled-opacity',
		'row' => 'default',
		'input' => 'text',
		'default' => '$btn-disabled-opacity',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-check-inline-margin-end',
		'name' => $slug . 'form-check-inline-margin-end',
		'variable' => '$form-check-inline-margin-end',
		'row' => 'default',
		'input' => 'text',
		'default' => '1rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);