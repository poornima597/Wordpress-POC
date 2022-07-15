<?php
/*
Name: Accordion
Slug: accordion
Description: 
Position: 10
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-accordion-';

return array(
	array(
		'label' => '$accordion-padding-y',
		'name' => $slug . 'accordion-padding-y',
		'variable' => '$accordion-padding-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '1rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$accordion-padding-x',
		'name' => $slug . 'accordion-padding-x',
		'variable' => '$accordion-padding-x',
		'row' => 'default',
		'input' => 'text',
		'default' => '1.25rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$accordion-color',
		'name' => $slug . 'accordion-color',
		'variable' => '$accordion-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$body-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$accordion-bg',
		'name' => $slug . 'accordion-bg',
		'variable' => '$accordion-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$body-bg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$accordion-border-width',
		'name' => $slug . 'accordion-border-width',
		'variable' => '$accordion-border-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-width',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$accordion-border-color',
		'name' => $slug . 'accordion-border-color',
		'variable' => '$accordion-border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'rgba($black, .125)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$accordion-border-radius',
		'name' => $slug . 'accordion-border-radius',
		'variable' => '$accordion-border-radius',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-radius',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$accordion-inner-border-radius',
		'name' => $slug . 'accordion-inner-border-radius',
		'variable' => '$accordion-inner-border-radius',
		'row' => 'default',
		'input' => 'text',
		'default' => 'subtract($accordion-border-radius, $accordion-border-width)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$accordion-body-padding-y',
		'name' => $slug . 'accordion-body-padding-y',
		'variable' => '$accordion-body-padding-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '$accordion-padding-y',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$accordion-body-padding-x',
		'name' => $slug . 'accordion-body-padding-x',
		'variable' => '$accordion-body-padding-x',
		'row' => 'default',
		'input' => 'text',
		'default' => '$accordion-padding-x',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$accordion-button-padding-y',
		'name' => $slug . 'accordion-button-padding-y',
		'variable' => '$accordion-button-padding-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '$accordion-padding-y',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$accordion-button-padding-x',
		'name' => $slug . 'accordion-button-padding-x',
		'variable' => '$accordion-button-padding-x',
		'row' => 'default',
		'input' => 'text',
		'default' => '$accordion-padding-x',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$accordion-button-color',
		'name' => $slug . 'accordion-button-color',
		'variable' => '$accordion-button-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$accordion-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$accordion-button-bg',
		'name' => $slug . 'accordion-button-bg',
		'variable' => '$accordion-button-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$accordion-bg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$accordion-transition',
		'name' => $slug . 'accordion-transition',
		'variable' => '$accordion-transition',
		'row' => 'default',
		'input' => 'text',
		'default' => '$btn-transition, border-radius .15s ease',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$accordion-button-active-bg',
		'name' => $slug . 'accordion-button-active-bg',
		'variable' => '$accordion-button-active-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'tint-color($component-active-bg, 90%)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$accordion-button-active-color',
		'name' => $slug . 'accordion-button-active-color',
		'variable' => '$accordion-button-active-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'shade-color($primary, 10%)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$accordion-button-focus-border-color',
		'name' => $slug . 'accordion-button-focus-border-color',
		'variable' => '$accordion-button-focus-border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$input-focus-border-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$accordion-button-focus-box-shadow',
		'name' => $slug . 'accordion-button-focus-box-shadow',
		'variable' => '$accordion-button-focus-box-shadow',
		'row' => 'default',
		'input' => 'text',
		'default' => '$btn-focus-box-shadow',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$accordion-icon-width',
		'name' => $slug . 'accordion-icon-width',
		'variable' => '$accordion-icon-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '1.25rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$accordion-icon-color',
		'name' => $slug . 'accordion-icon-color',
		'variable' => '$accordion-icon-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$accordion-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$accordion-icon-active-color',
		'name' => $slug . 'accordion-icon-active-color',
		'variable' => '$accordion-icon-active-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$accordion-button-active-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$accordion-icon-transition',
		'name' => $slug . 'accordion-icon-transition',
		'variable' => '$accordion-icon-transition',
		'row' => 'default',
		'input' => 'text',
		'default' => 'transform .2s ease-in-out',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$accordion-icon-transform',
		'name' => $slug . 'accordion-icon-transform',
		'variable' => '$accordion-icon-transform',
		'row' => 'default',
		'input' => 'text',
		'default' => 'rotate(-180deg)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	/*array(
		'label' => '$accordion-button-icon',
		'name' => $slug . 'accordion-button-icon',
		'variable' => '$accordion-button-icon',
		'row' => 'default',
		'input' => 'text',
		'default' => 'url("data',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),*/
	/*array(
		'label' => '$accordion-button-active-icon',
		'name' => $slug . 'accordion-button-active-icon',
		'variable' => '$accordion-button-active-icon',
		'row' => 'default',
		'input' => 'text',
		'default' => 'url("data',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),*/
);