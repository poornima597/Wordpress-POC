<?php
/*
Name: Buttons
Slug: buttons
Description: For each of Bootstrap's buttons, define text, background, and border color.
Position: 20
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-buttons-';

return array(
	array(
		'label' => '$btn-padding-y',
		'name' => $slug . 'btn-padding-y',
		'variable' => '$btn-padding-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-btn-padding-y',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-padding-x',
		'name' => $slug . 'btn-padding-x',
		'variable' => '$btn-padding-x',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-btn-padding-x',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-font-family',
		'name' => $slug . 'btn-font-family',
		'variable' => '$btn-font-family',
		'row' => 'default',
		'input' => 'font',
		'default' => '$input-btn-font-family',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-font-size',
		'name' => $slug . 'btn-font-size',
		'variable' => '$btn-font-size',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-btn-font-size',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-line-height',
		'name' => $slug . 'btn-line-height',
		'variable' => '$btn-line-height',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-btn-line-height',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-white-space',
		'name' => $slug . 'btn-white-space',
		'variable' => '$btn-white-space',
		'row' => 'default',
		'input' => 'text',
		'default' => 'null',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-padding-y-sm',
		'name' => $slug . 'btn-padding-y-sm',
		'variable' => '$btn-padding-y-sm',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-btn-padding-y-sm',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-padding-x-sm',
		'name' => $slug . 'btn-padding-x-sm',
		'variable' => '$btn-padding-x-sm',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-btn-padding-x-sm',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-font-size-sm',
		'name' => $slug . 'btn-font-size-sm',
		'variable' => '$btn-font-size-sm',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-btn-font-size-sm',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-padding-y-lg',
		'name' => $slug . 'btn-padding-y-lg',
		'variable' => '$btn-padding-y-lg',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-btn-padding-y-lg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-padding-x-lg',
		'name' => $slug . 'btn-padding-x-lg',
		'variable' => '$btn-padding-x-lg',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-btn-padding-x-lg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-font-size-lg',
		'name' => $slug . 'btn-font-size-lg',
		'variable' => '$btn-font-size-lg',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-btn-font-size-lg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-border-width',
		'name' => $slug . 'btn-border-width',
		'variable' => '$btn-border-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-btn-border-width',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-font-weight',
		'name' => $slug . 'btn-font-weight',
		'variable' => '$btn-font-weight',
		'row' => 'default',
		'input' => 'text',
		'default' => '$font-weight-normal',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-box-shadow',
		'name' => $slug . 'btn-box-shadow',
		'variable' => '$btn-box-shadow',
		'row' => 'default',
		'input' => 'text',
		'default' => 'inset 0 1px 0 rgba($white, .15), 0 1px 1px rgba($black, .075)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-focus-width',
		'name' => $slug . 'btn-focus-width',
		'variable' => '$btn-focus-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-btn-focus-width',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-focus-box-shadow',
		'name' => $slug . 'btn-focus-box-shadow',
		'variable' => '$btn-focus-box-shadow',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-btn-focus-box-shadow',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-disabled-opacity',
		'name' => $slug . 'btn-disabled-opacity',
		'variable' => '$btn-disabled-opacity',
		'row' => 'default',
		'input' => 'text',
		'default' => '.65',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-active-box-shadow',
		'name' => $slug . 'btn-active-box-shadow',
		'variable' => '$btn-active-box-shadow',
		'row' => 'default',
		'input' => 'text',
		'default' => 'inset 0 3px 5px rgba($black, .125)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-link-color',
		'name' => $slug . 'btn-link-color',
		'variable' => '$btn-link-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$link-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-link-hover-color',
		'name' => $slug . 'btn-link-hover-color',
		'variable' => '$btn-link-hover-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$link-hover-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-link-disabled-color',
		'name' => $slug . 'btn-link-disabled-color',
		'variable' => '$btn-link-disabled-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-600',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-border-radius',
		'name' => $slug . 'btn-border-radius',
		'variable' => '$btn-border-radius',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-radius',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-border-radius-sm',
		'name' => $slug . 'btn-border-radius-sm',
		'variable' => '$btn-border-radius-sm',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-radius-sm',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-border-radius-lg',
		'name' => $slug . 'btn-border-radius-lg',
		'variable' => '$btn-border-radius-lg',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-radius-lg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-transition',
		'name' => $slug . 'btn-transition',
		'variable' => '$btn-transition',
		'row' => 'default',
		'input' => 'text',
		'default' => 'color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-hover-bg-shade-amount',
		'name' => $slug . 'btn-hover-bg-shade-amount',
		'variable' => '$btn-hover-bg-shade-amount',
		'row' => 'default',
		'input' => 'text',
		'default' => '15%',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-hover-bg-tint-amount',
		'name' => $slug . 'btn-hover-bg-tint-amount',
		'variable' => '$btn-hover-bg-tint-amount',
		'row' => 'default',
		'input' => 'text',
		'default' => '15%',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-hover-border-shade-amount',
		'name' => $slug . 'btn-hover-border-shade-amount',
		'variable' => '$btn-hover-border-shade-amount',
		'row' => 'default',
		'input' => 'text',
		'default' => '20%',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-hover-border-tint-amount',
		'name' => $slug . 'btn-hover-border-tint-amount',
		'variable' => '$btn-hover-border-tint-amount',
		'row' => 'default',
		'input' => 'text',
		'default' => '10%',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-active-bg-shade-amount',
		'name' => $slug . 'btn-active-bg-shade-amount',
		'variable' => '$btn-active-bg-shade-amount',
		'row' => 'default',
		'input' => 'text',
		'default' => '20%',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-active-bg-tint-amount',
		'name' => $slug . 'btn-active-bg-tint-amount',
		'variable' => '$btn-active-bg-tint-amount',
		'row' => 'default',
		'input' => 'text',
		'default' => '20%',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-active-border-shade-amount',
		'name' => $slug . 'btn-active-border-shade-amount',
		'variable' => '$btn-active-border-shade-amount',
		'row' => 'default',
		'input' => 'text',
		'default' => '25%',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-active-border-tint-amount',
		'name' => $slug . 'btn-active-border-tint-amount',
		'variable' => '$btn-active-border-tint-amount',
		'row' => 'default',
		'input' => 'text',
		'default' => '10%',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);