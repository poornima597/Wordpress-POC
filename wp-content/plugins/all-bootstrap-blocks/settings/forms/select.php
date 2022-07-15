<?php
/*
Name: Select
Slug: select
Description: 
Position: 80
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-select-';

return array(
	array(
		'label' => '$form-select-padding-y',
		'name' => $slug . 'form-select-padding-y',
		'variable' => '$form-select-padding-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-padding-y',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-select-padding-x',
		'name' => $slug . 'form-select-padding-x',
		'variable' => '$form-select-padding-x',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-padding-x',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-select-font-family',
		'name' => $slug . 'form-select-font-family',
		'variable' => '$form-select-font-family',
		'row' => 'default',
		'input' => 'font',
		'default' => '$input-font-family',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-select-font-size',
		'name' => $slug . 'form-select-font-size',
		'variable' => '$form-select-font-size',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-font-size',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-select-indicator-padding',
		'name' => $slug . 'form-select-indicator-padding',
		'variable' => '$form-select-indicator-padding',
		'row' => 'default',
		'input' => 'text',
		'default' => '$form-select-padding-x * 3',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-select-font-weight',
		'name' => $slug . 'form-select-font-weight',
		'variable' => '$form-select-font-weight',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-font-weight',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-select-line-height',
		'name' => $slug . 'form-select-line-height',
		'variable' => '$form-select-line-height',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-line-height',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-select-color',
		'name' => $slug . 'form-select-color',
		'variable' => '$form-select-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$input-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-select-bg',
		'name' => $slug . 'form-select-bg',
		'variable' => '$form-select-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$input-bg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-select-disabled-color',
		'name' => $slug . 'form-select-disabled-color',
		'variable' => '$form-select-disabled-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'null',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-select-disabled-bg',
		'name' => $slug . 'form-select-disabled-bg',
		'variable' => '$form-select-disabled-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-200',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-select-disabled-border-color',
		'name' => $slug . 'form-select-disabled-border-color',
		'variable' => '$form-select-disabled-border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$input-disabled-border-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-select-bg-position',
		'name' => $slug . 'form-select-bg-position',
		'variable' => '$form-select-bg-position',
		'row' => 'default',
		'input' => 'text',
		'default' => 'right $form-select-padding-x center',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-select-bg-size',
		'name' => $slug . 'form-select-bg-size',
		'variable' => '$form-select-bg-size',
		'row' => 'default',
		'input' => 'text',
		'default' => '16px 12px',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-select-indicator-color',
		'name' => $slug . 'form-select-indicator-color',
		'variable' => '$form-select-indicator-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-800',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	/*array(
		'label' => '$form-select-indicator',
		'name' => $slug . 'form-select-indicator',
		'variable' => '$form-select-indicator',
		'row' => 'default',
		'input' => 'text',
		'default' => 'url("data',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),*/
	array(
		'label' => '$form-select-feedback-icon-padding-end',
		'name' => $slug . 'form-select-feedback-icon-padding-end',
		'variable' => '$form-select-feedback-icon-padding-end',
		'row' => 'default',
		'input' => 'text',
		'default' => '$form-select-padding-x * 2.5 + $form-select-indicator-padding',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-select-feedback-icon-position',
		'name' => $slug . 'form-select-feedback-icon-position',
		'variable' => '$form-select-feedback-icon-position',
		'row' => 'default',
		'input' => 'text',
		'default' => 'center right $form-select-indicator-padding',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-select-feedback-icon-size',
		'name' => $slug . 'form-select-feedback-icon-size',
		'variable' => '$form-select-feedback-icon-size',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-height-inner-half $input-height-inner-half',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-select-border-width',
		'name' => $slug . 'form-select-border-width',
		'variable' => '$form-select-border-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-border-width',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-select-border-color',
		'name' => $slug . 'form-select-border-color',
		'variable' => '$form-select-border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$input-border-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-select-border-radius',
		'name' => $slug . 'form-select-border-radius',
		'variable' => '$form-select-border-radius',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-radius',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-select-box-shadow',
		'name' => $slug . 'form-select-box-shadow',
		'variable' => '$form-select-box-shadow',
		'row' => 'default',
		'input' => 'text',
		'default' => '$box-shadow-inset',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-select-focus-border-color',
		'name' => $slug . 'form-select-focus-border-color',
		'variable' => '$form-select-focus-border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$input-focus-border-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-select-focus-width',
		'name' => $slug . 'form-select-focus-width',
		'variable' => '$form-select-focus-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-focus-width',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-select-focus-box-shadow',
		'name' => $slug . 'form-select-focus-box-shadow',
		'variable' => '$form-select-focus-box-shadow',
		'row' => 'default',
		'input' => 'text',
		'default' => '0 0 0 $form-select-focus-width $input-btn-focus-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-select-padding-y-sm',
		'name' => $slug . 'form-select-padding-y-sm',
		'variable' => '$form-select-padding-y-sm',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-padding-y-sm',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-select-padding-x-sm',
		'name' => $slug . 'form-select-padding-x-sm',
		'variable' => '$form-select-padding-x-sm',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-padding-x-sm',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-select-font-size-sm',
		'name' => $slug . 'form-select-font-size-sm',
		'variable' => '$form-select-font-size-sm',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-font-size-sm',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-select-padding-y-lg',
		'name' => $slug . 'form-select-padding-y-lg',
		'variable' => '$form-select-padding-y-lg',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-padding-y-lg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-select-padding-x-lg',
		'name' => $slug . 'form-select-padding-x-lg',
		'variable' => '$form-select-padding-x-lg',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-padding-x-lg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-select-font-size-lg',
		'name' => $slug . 'form-select-font-size-lg',
		'variable' => '$form-select-font-size-lg',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-font-size-lg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-select-transition',
		'name' => $slug . 'form-select-transition',
		'variable' => '$form-select-transition',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-transition',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);