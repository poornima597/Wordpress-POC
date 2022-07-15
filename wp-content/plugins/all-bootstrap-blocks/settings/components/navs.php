<?php
/*
Name: Navs
Slug: navs
Description: 
Position: 10
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-navs-';

return array(
	array(
		'label' => '$nav-link-padding-y',
		'name' => $slug . 'nav-link-padding-y',
		'variable' => '$nav-link-padding-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '.5rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$nav-link-padding-x',
		'name' => $slug . 'nav-link-padding-x',
		'variable' => '$nav-link-padding-x',
		'row' => 'default',
		'input' => 'text',
		'default' => '1rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$nav-link-font-size',
		'name' => $slug . 'nav-link-font-size',
		'variable' => '$nav-link-font-size',
		'row' => 'default',
		'input' => 'text',
		'default' => 'null',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$nav-link-font-weight',
		'name' => $slug . 'nav-link-font-weight',
		'variable' => '$nav-link-font-weight',
		'row' => 'default',
		'input' => 'text',
		'default' => 'null',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$nav-link-color',
		'name' => $slug . 'nav-link-color',
		'variable' => '$nav-link-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$link-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$nav-link-hover-color',
		'name' => $slug . 'nav-link-hover-color',
		'variable' => '$nav-link-hover-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$link-hover-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$nav-link-transition',
		'name' => $slug . 'nav-link-transition',
		'variable' => '$nav-link-transition',
		'row' => 'default',
		'input' => 'text',
		'default' => 'color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$nav-link-disabled-color',
		'name' => $slug . 'nav-link-disabled-color',
		'variable' => '$nav-link-disabled-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-600',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$nav-tabs-border-color',
		'name' => $slug . 'nav-tabs-border-color',
		'variable' => '$nav-tabs-border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-300',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$nav-tabs-border-width',
		'name' => $slug . 'nav-tabs-border-width',
		'variable' => '$nav-tabs-border-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-width',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$nav-tabs-border-radius',
		'name' => $slug . 'nav-tabs-border-radius',
		'variable' => '$nav-tabs-border-radius',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-radius',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$nav-tabs-link-hover-border-color',
		'name' => $slug . 'nav-tabs-link-hover-border-color',
		'variable' => '$nav-tabs-link-hover-border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-200 $gray-200 $nav-tabs-border-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$nav-tabs-link-active-color',
		'name' => $slug . 'nav-tabs-link-active-color',
		'variable' => '$nav-tabs-link-active-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-700',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$nav-tabs-link-active-bg',
		'name' => $slug . 'nav-tabs-link-active-bg',
		'variable' => '$nav-tabs-link-active-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$body-bg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$nav-tabs-link-active-border-color',
		'name' => $slug . 'nav-tabs-link-active-border-color',
		'variable' => '$nav-tabs-link-active-border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-300 $gray-300 $nav-tabs-link-active-bg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$nav-pills-border-radius',
		'name' => $slug . 'nav-pills-border-radius',
		'variable' => '$nav-pills-border-radius',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-radius',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$nav-pills-link-active-color',
		'name' => $slug . 'nav-pills-link-active-color',
		'variable' => '$nav-pills-link-active-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$component-active-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$nav-pills-link-active-bg',
		'name' => $slug . 'nav-pills-link-active-bg',
		'variable' => '$nav-pills-link-active-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$component-active-bg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);