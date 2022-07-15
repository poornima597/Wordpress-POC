<?php
/*
Name: List Group
Slug: list-group
Description: 
Position: 10
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-list-group-';

return array(
	array(
		'label' => '$list-group-color',
		'name' => $slug . 'list-group-color',
		'variable' => '$list-group-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-900',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$list-group-bg',
		'name' => $slug . 'list-group-bg',
		'variable' => '$list-group-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$white',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$list-group-border-color',
		'name' => $slug . 'list-group-border-color',
		'variable' => '$list-group-border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'rgba($black, .125)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$list-group-border-width',
		'name' => $slug . 'list-group-border-width',
		'variable' => '$list-group-border-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-width',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$list-group-border-radius',
		'name' => $slug . 'list-group-border-radius',
		'variable' => '$list-group-border-radius',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-radius',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$list-group-item-padding-y',
		'name' => $slug . 'list-group-item-padding-y',
		'variable' => '$list-group-item-padding-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '$spacer * .5',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$list-group-item-padding-x',
		'name' => $slug . 'list-group-item-padding-x',
		'variable' => '$list-group-item-padding-x',
		'row' => 'default',
		'input' => 'text',
		'default' => '$spacer',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$list-group-item-bg-scale',
		'name' => $slug . 'list-group-item-bg-scale',
		'variable' => '$list-group-item-bg-scale',
		'row' => 'default',
		'input' => 'text',
		'default' => '-80%',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$list-group-item-color-scale',
		'name' => $slug . 'list-group-item-color-scale',
		'variable' => '$list-group-item-color-scale',
		'row' => 'default',
		'input' => 'text',
		'default' => '40%',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$list-group-hover-bg',
		'name' => $slug . 'list-group-hover-bg',
		'variable' => '$list-group-hover-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-100',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$list-group-active-color',
		'name' => $slug . 'list-group-active-color',
		'variable' => '$list-group-active-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$component-active-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$list-group-active-bg',
		'name' => $slug . 'list-group-active-bg',
		'variable' => '$list-group-active-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$component-active-bg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$list-group-active-border-color',
		'name' => $slug . 'list-group-active-border-color',
		'variable' => '$list-group-active-border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$list-group-active-bg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$list-group-disabled-color',
		'name' => $slug . 'list-group-disabled-color',
		'variable' => '$list-group-disabled-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-600',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$list-group-disabled-bg',
		'name' => $slug . 'list-group-disabled-bg',
		'variable' => '$list-group-disabled-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$list-group-bg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$list-group-action-color',
		'name' => $slug . 'list-group-action-color',
		'variable' => '$list-group-action-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-700',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$list-group-action-hover-color',
		'name' => $slug . 'list-group-action-hover-color',
		'variable' => '$list-group-action-hover-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$list-group-action-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$list-group-action-active-color',
		'name' => $slug . 'list-group-action-active-color',
		'variable' => '$list-group-action-active-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$body-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$list-group-action-active-bg',
		'name' => $slug . 'list-group-action-active-bg',
		'variable' => '$list-group-action-active-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-200',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);