<?php
/*
Name: Dropdown
Slug: dropdown
Description: Dropdown menu container and contents.
Position: 10
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-dropdown-';

return array(
	array(
		'label' => '$dropdown-min-width',
		'name' => $slug . 'dropdown-min-width',
		'variable' => '$dropdown-min-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '10rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-padding-x',
		'name' => $slug . 'dropdown-padding-x',
		'variable' => '$dropdown-padding-x',
		'row' => 'default',
		'input' => 'text',
		'default' => '0',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-padding-y',
		'name' => $slug . 'dropdown-padding-y',
		'variable' => '$dropdown-padding-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '.5rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-spacer',
		'name' => $slug . 'dropdown-spacer',
		'variable' => '$dropdown-spacer',
		'row' => 'default',
		'input' => 'text',
		'default' => '.125rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-font-size',
		'name' => $slug . 'dropdown-font-size',
		'variable' => '$dropdown-font-size',
		'row' => 'default',
		'input' => 'text',
		'default' => '$font-size-base',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-color',
		'name' => $slug . 'dropdown-color',
		'variable' => '$dropdown-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$body-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-bg',
		'name' => $slug . 'dropdown-bg',
		'variable' => '$dropdown-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$white',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-border-color',
		'name' => $slug . 'dropdown-border-color',
		'variable' => '$dropdown-border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'rgba($black, .15)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-border-radius',
		'name' => $slug . 'dropdown-border-radius',
		'variable' => '$dropdown-border-radius',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-radius',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-border-width',
		'name' => $slug . 'dropdown-border-width',
		'variable' => '$dropdown-border-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-width',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-inner-border-radius',
		'name' => $slug . 'dropdown-inner-border-radius',
		'variable' => '$dropdown-inner-border-radius',
		'row' => 'default',
		'input' => 'text',
		'default' => 'subtract($dropdown-border-radius, $dropdown-border-width)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-divider-bg',
		'name' => $slug . 'dropdown-divider-bg',
		'variable' => '$dropdown-divider-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$dropdown-border-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-divider-margin-y',
		'name' => $slug . 'dropdown-divider-margin-y',
		'variable' => '$dropdown-divider-margin-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '$spacer * .5',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-box-shadow',
		'name' => $slug . 'dropdown-box-shadow',
		'variable' => '$dropdown-box-shadow',
		'row' => 'default',
		'input' => 'text',
		'default' => '$box-shadow',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-link-color',
		'name' => $slug . 'dropdown-link-color',
		'variable' => '$dropdown-link-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-900',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-link-hover-color',
		'name' => $slug . 'dropdown-link-hover-color',
		'variable' => '$dropdown-link-hover-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'shade-color($gray-900, 10%)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-link-hover-bg',
		'name' => $slug . 'dropdown-link-hover-bg',
		'variable' => '$dropdown-link-hover-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-200',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-link-active-color',
		'name' => $slug . 'dropdown-link-active-color',
		'variable' => '$dropdown-link-active-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$component-active-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-link-active-bg',
		'name' => $slug . 'dropdown-link-active-bg',
		'variable' => '$dropdown-link-active-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$component-active-bg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-link-disabled-color',
		'name' => $slug . 'dropdown-link-disabled-color',
		'variable' => '$dropdown-link-disabled-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-500',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-item-padding-y',
		'name' => $slug . 'dropdown-item-padding-y',
		'variable' => '$dropdown-item-padding-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '$spacer * .25',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-item-padding-x',
		'name' => $slug . 'dropdown-item-padding-x',
		'variable' => '$dropdown-item-padding-x',
		'row' => 'default',
		'input' => 'text',
		'default' => '$spacer',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-header-color',
		'name' => $slug . 'dropdown-header-color',
		'variable' => '$dropdown-header-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-600',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-header-padding',
		'name' => $slug . 'dropdown-header-padding',
		'variable' => '$dropdown-header-padding',
		'row' => 'default',
		'input' => 'text',
		'default' => '$dropdown-padding-y $dropdown-item-padding-x',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-dark-color',
		'name' => $slug . 'dropdown-dark-color',
		'variable' => '$dropdown-dark-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-300',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-dark-bg',
		'name' => $slug . 'dropdown-dark-bg',
		'variable' => '$dropdown-dark-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-800',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-dark-border-color',
		'name' => $slug . 'dropdown-dark-border-color',
		'variable' => '$dropdown-dark-border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$dropdown-border-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-dark-divider-bg',
		'name' => $slug . 'dropdown-dark-divider-bg',
		'variable' => '$dropdown-dark-divider-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$dropdown-divider-bg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-dark-box-shadow',
		'name' => $slug . 'dropdown-dark-box-shadow',
		'variable' => '$dropdown-dark-box-shadow',
		'row' => 'default',
		'input' => 'text',
		'default' => 'null',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-dark-link-color',
		'name' => $slug . 'dropdown-dark-link-color',
		'variable' => '$dropdown-dark-link-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$dropdown-dark-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-dark-link-hover-color',
		'name' => $slug . 'dropdown-dark-link-hover-color',
		'variable' => '$dropdown-dark-link-hover-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$white',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-dark-link-hover-bg',
		'name' => $slug . 'dropdown-dark-link-hover-bg',
		'variable' => '$dropdown-dark-link-hover-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'rgba($white, .15)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-dark-link-active-color',
		'name' => $slug . 'dropdown-dark-link-active-color',
		'variable' => '$dropdown-dark-link-active-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$dropdown-link-active-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-dark-link-active-bg',
		'name' => $slug . 'dropdown-dark-link-active-bg',
		'variable' => '$dropdown-dark-link-active-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$dropdown-link-active-bg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-dark-link-disabled-color',
		'name' => $slug . 'dropdown-dark-link-disabled-color',
		'variable' => '$dropdown-dark-link-disabled-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-500',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dropdown-dark-header-color',
		'name' => $slug . 'dropdown-dark-header-color',
		'variable' => '$dropdown-dark-header-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-500',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);