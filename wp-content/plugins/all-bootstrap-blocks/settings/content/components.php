<?php
/*
Name: Components
Slug: components
Description: Define common padding and border radius sizes and more.
Position: 10
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-components-';

return array(
	array(
		'label' => 'Borders',
		'name' => '',
		'variable' => '',
		'row' => 'default',
		'input' => 'header',
		'default' => '',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$border-width',
		'name' => $slug . 'border-width',
		'variable' => '$border-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '1px',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$border-color',
		'name' => $slug . 'border-color',
		'variable' => '$border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-300',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$border-radius',
		'name' => $slug . 'border-radius',
		'variable' => '$border-radius',
		'row' => 'default',
		'input' => 'text',
		'default' => '.25rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$border-radius-sm',
		'name' => $slug . 'border-radius-sm',
		'variable' => '$border-radius-sm',
		'row' => 'default',
		'input' => 'text',
		'default' => '.2rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$border-radius-lg',
		'name' => $slug . 'border-radius-lg',
		'variable' => '$border-radius-lg',
		'row' => 'default',
		'input' => 'text',
		'default' => '.3rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$border-radius-pill',
		'name' => $slug . 'border-radius-pill',
		'variable' => '$border-radius-pill',
		'row' => 'default',
		'input' => 'text',
		'default' => '50rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),

	array(
		'label' => 'Box Shadow',
		'name' => '',
		'variable' => '',
		'row' => 'default',
		'input' => 'header',
		'default' => '',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$box-shadow',
		'name' => $slug . 'box-shadow',
		'variable' => '$box-shadow',
		'row' => 'default',
		'input' => 'text',
		'default' => '0 .5rem 1rem rgba($black, .15)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$box-shadow-sm',
		'name' => $slug . 'box-shadow-sm',
		'variable' => '$box-shadow-sm',
		'row' => 'default',
		'input' => 'text',
		'default' => '0 .125rem .25rem rgba($black, .075)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$box-shadow-lg',
		'name' => $slug . 'box-shadow-lg',
		'variable' => '$box-shadow-lg',
		'row' => 'default',
		'input' => 'text',
		'default' => '0 1rem 3rem rgba($black, .175)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$box-shadow-inset',
		'name' => $slug . 'box-shadow-inset',
		'variable' => '$box-shadow-inset',
		'row' => 'default',
		'input' => 'text',
		'default' => 'inset 0 1px 2px rgba($black, .075)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),

	array(
		'label' => 'Colors',
		'name' => '',
		'variable' => '',
		'row' => 'default',
		'input' => 'header',
		'default' => '',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$component-active-color',
		'name' => $slug . 'component-active-color',
		'variable' => '$component-active-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$white',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$component-active-bg',
		'name' => $slug . 'component-active-bg',
		'variable' => '$component-active-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$primary',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),

	array(
		'label' => 'Caret',
		'name' => '',
		'variable' => '',
		'row' => 'default',
		'input' => 'header',
		'default' => '',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$caret-width',
		'name' => $slug . 'caret-width',
		'variable' => '$caret-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '.3em',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$caret-vertical-align',
		'name' => $slug . 'caret-vertical-align',
		'variable' => '$caret-vertical-align',
		'row' => 'default',
		'input' => 'text',
		'default' => '$caret-width * .85',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$caret-spacing',
		'name' => $slug . 'caret-spacing',
		'variable' => '$caret-spacing',
		'row' => 'default',
		'input' => 'text',
		'default' => '$caret-width * .85',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),

	array(
		'label' => 'Transition',
		'name' => '',
		'variable' => '',
		'row' => 'default',
		'input' => 'header',
		'default' => '',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$transition-base',
		'name' => $slug . 'transition-base',
		'variable' => '$transition-base',
		'row' => 'default',
		'input' => 'text',
		'default' => 'all .2s ease-in-out',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$transition-fade',
		'name' => $slug . 'transition-fade',
		'variable' => '$transition-fade',
		'row' => 'default',
		'input' => 'text',
		'default' => 'opacity .15s linear',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$transition-collapse',
		'name' => $slug . 'transition-collapse',
		'variable' => '$transition-collapse',
		'row' => 'default',
		'input' => 'text',
		'default' => 'height .35s ease',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);