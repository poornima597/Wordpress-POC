<?php
/*
Name: Popovers
Slug: popovers
Description: 
Position: 10
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-popovers-';

return array(
	array(
		'label' => '$popover-font-size',
		'name' => $slug . 'popover-font-size',
		'variable' => '$popover-font-size',
		'row' => 'default',
		'input' => 'text',
		'default' => '$font-size-sm',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$popover-bg',
		'name' => $slug . 'popover-bg',
		'variable' => '$popover-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$white',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$popover-max-width',
		'name' => $slug . 'popover-max-width',
		'variable' => '$popover-max-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '276px',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$popover-border-width',
		'name' => $slug . 'popover-border-width',
		'variable' => '$popover-border-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-width',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$popover-border-color',
		'name' => $slug . 'popover-border-color',
		'variable' => '$popover-border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'rgba($black, .2)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$popover-border-radius',
		'name' => $slug . 'popover-border-radius',
		'variable' => '$popover-border-radius',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-radius-lg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$popover-inner-border-radius',
		'name' => $slug . 'popover-inner-border-radius',
		'variable' => '$popover-inner-border-radius',
		'row' => 'default',
		'input' => 'text',
		'default' => 'subtract($popover-border-radius, $popover-border-width)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$popover-box-shadow',
		'name' => $slug . 'popover-box-shadow',
		'variable' => '$popover-box-shadow',
		'row' => 'default',
		'input' => 'text',
		'default' => '$box-shadow',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$popover-header-bg',
		'name' => $slug . 'popover-header-bg',
		'variable' => '$popover-header-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'shade-color($popover-bg, 6%)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$popover-header-color',
		'name' => $slug . 'popover-header-color',
		'variable' => '$popover-header-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$headings-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$popover-header-padding-y',
		'name' => $slug . 'popover-header-padding-y',
		'variable' => '$popover-header-padding-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '.5rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$popover-header-padding-x',
		'name' => $slug . 'popover-header-padding-x',
		'variable' => '$popover-header-padding-x',
		'row' => 'default',
		'input' => 'text',
		'default' => '$spacer',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$popover-body-color',
		'name' => $slug . 'popover-body-color',
		'variable' => '$popover-body-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$body-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$popover-body-padding-y',
		'name' => $slug . 'popover-body-padding-y',
		'variable' => '$popover-body-padding-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '$spacer',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$popover-body-padding-x',
		'name' => $slug . 'popover-body-padding-x',
		'variable' => '$popover-body-padding-x',
		'row' => 'default',
		'input' => 'text',
		'default' => '$spacer',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$popover-arrow-width',
		'name' => $slug . 'popover-arrow-width',
		'variable' => '$popover-arrow-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '1rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$popover-arrow-height',
		'name' => $slug . 'popover-arrow-height',
		'variable' => '$popover-arrow-height',
		'row' => 'default',
		'input' => 'text',
		'default' => '.5rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$popover-arrow-color',
		'name' => $slug . 'popover-arrow-color',
		'variable' => '$popover-arrow-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$popover-bg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$popover-arrow-outer-color',
		'name' => $slug . 'popover-arrow-outer-color',
		'variable' => '$popover-arrow-outer-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'fade-in($popover-border-color, .05)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);