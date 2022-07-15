<?php
/*
Name: Navbar
Slug: navbar
Description: 
Position: 10
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-navbar-';

return array(
	array(
		'label' => '$navbar-padding-y',
		'name' => $slug . 'navbar-padding-y',
		'variable' => '$navbar-padding-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '$spacer * .5',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$navbar-padding-x',
		'name' => $slug . 'navbar-padding-x',
		'variable' => '$navbar-padding-x',
		'row' => 'default',
		'input' => 'text',
		'default' => 'null',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$navbar-nav-link-padding-x',
		'name' => $slug . 'navbar-nav-link-padding-x',
		'variable' => '$navbar-nav-link-padding-x',
		'row' => 'default',
		'input' => 'text',
		'default' => '.5rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$navbar-brand-font-size',
		'name' => $slug . 'navbar-brand-font-size',
		'variable' => '$navbar-brand-font-size',
		'row' => 'default',
		'input' => 'text',
		'default' => '$font-size-lg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$nav-link-height',
		'name' => $slug . 'nav-link-height',
		'variable' => '$nav-link-height',
		'row' => 'default',
		'input' => 'text',
		'default' => '$font-size-base * $line-height-base + $nav-link-padding-y * 2',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$navbar-brand-height',
		'name' => $slug . 'navbar-brand-height',
		'variable' => '$navbar-brand-height',
		'row' => 'default',
		'input' => 'text',
		'default' => '$navbar-brand-font-size * $line-height-base',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$navbar-brand-padding-y',
		'name' => $slug . 'navbar-brand-padding-y',
		'variable' => '$navbar-brand-padding-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '($nav-link-height - $navbar-brand-height) * .5',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$navbar-brand-margin-end',
		'name' => $slug . 'navbar-brand-margin-end',
		'variable' => '$navbar-brand-margin-end',
		'row' => 'default',
		'input' => 'text',
		'default' => '1rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$navbar-toggler-padding-y',
		'name' => $slug . 'navbar-toggler-padding-y',
		'variable' => '$navbar-toggler-padding-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '.25rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$navbar-toggler-padding-x',
		'name' => $slug . 'navbar-toggler-padding-x',
		'variable' => '$navbar-toggler-padding-x',
		'row' => 'default',
		'input' => 'text',
		'default' => '.75rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$navbar-toggler-font-size',
		'name' => $slug . 'navbar-toggler-font-size',
		'variable' => '$navbar-toggler-font-size',
		'row' => 'default',
		'input' => 'text',
		'default' => '$font-size-lg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$navbar-toggler-border-radius',
		'name' => $slug . 'navbar-toggler-border-radius',
		'variable' => '$navbar-toggler-border-radius',
		'row' => 'default',
		'input' => 'text',
		'default' => '$btn-border-radius',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$navbar-toggler-focus-width',
		'name' => $slug . 'navbar-toggler-focus-width',
		'variable' => '$navbar-toggler-focus-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '$btn-focus-width',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$navbar-toggler-transition',
		'name' => $slug . 'navbar-toggler-transition',
		'variable' => '$navbar-toggler-transition',
		'row' => 'default',
		'input' => 'text',
		'default' => 'box-shadow .15s ease-in-out',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$navbar-dark-color',
		'name' => $slug . 'navbar-dark-color',
		'variable' => '$navbar-dark-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'rgba($white, .55)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$navbar-dark-hover-color',
		'name' => $slug . 'navbar-dark-hover-color',
		'variable' => '$navbar-dark-hover-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'rgba($white, .75)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$navbar-dark-active-color',
		'name' => $slug . 'navbar-dark-active-color',
		'variable' => '$navbar-dark-active-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$white',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$navbar-dark-disabled-color',
		'name' => $slug . 'navbar-dark-disabled-color',
		'variable' => '$navbar-dark-disabled-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'rgba($white, .25)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	/*array(
		'label' => '$navbar-dark-toggler-icon-bg',
		'name' => $slug . 'navbar-dark-toggler-icon-bg',
		'variable' => '$navbar-dark-toggler-icon-bg',
		'row' => 'default',
		'input' => 'text',
		'default' => 'url("data',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),*/
	array(
		'label' => '$navbar-dark-toggler-border-color',
		'name' => $slug . 'navbar-dark-toggler-border-color',
		'variable' => '$navbar-dark-toggler-border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'rgba($white, .1)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$navbar-light-color',
		'name' => $slug . 'navbar-light-color',
		'variable' => '$navbar-light-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'rgba($black, .55)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$navbar-light-hover-color',
		'name' => $slug . 'navbar-light-hover-color',
		'variable' => '$navbar-light-hover-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'rgba($black, .7)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$navbar-light-active-color',
		'name' => $slug . 'navbar-light-active-color',
		'variable' => '$navbar-light-active-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'rgba($black, .9)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$navbar-light-disabled-color',
		'name' => $slug . 'navbar-light-disabled-color',
		'variable' => '$navbar-light-disabled-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'rgba($black, .3)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	/*array(
		'label' => '$navbar-light-toggler-icon-bg',
		'name' => $slug . 'navbar-light-toggler-icon-bg',
		'variable' => '$navbar-light-toggler-icon-bg',
		'row' => 'default',
		'input' => 'text',
		'default' => 'url("data',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),*/
	array(
		'label' => '$navbar-light-toggler-border-color',
		'name' => $slug . 'navbar-light-toggler-border-color',
		'variable' => '$navbar-light-toggler-border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'rgba($black, .1)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$navbar-light-brand-color',
		'name' => $slug . 'navbar-light-brand-color',
		'variable' => '$navbar-light-brand-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$navbar-light-active-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$navbar-light-brand-hover-color',
		'name' => $slug . 'navbar-light-brand-hover-color',
		'variable' => '$navbar-light-brand-hover-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$navbar-light-active-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$navbar-dark-brand-color',
		'name' => $slug . 'navbar-dark-brand-color',
		'variable' => '$navbar-dark-brand-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$navbar-dark-active-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$navbar-dark-brand-hover-color',
		'name' => $slug . 'navbar-dark-brand-hover-color',
		'variable' => '$navbar-dark-brand-hover-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$navbar-dark-active-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);