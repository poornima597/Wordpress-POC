<?php
/*
Name: Breadcrumbs
Slug: breadcrumbs
Description: 
Position: 10
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-breadcrumbs-';

return array(
	array(
		'label' => '$breadcrumb-font-size',
		'name' => $slug . 'breadcrumb-font-size',
		'variable' => '$breadcrumb-font-size',
		'row' => 'default',
		'input' => 'text',
		'default' => 'null',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$breadcrumb-padding-y',
		'name' => $slug . 'breadcrumb-padding-y',
		'variable' => '$breadcrumb-padding-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '0',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$breadcrumb-padding-x',
		'name' => $slug . 'breadcrumb-padding-x',
		'variable' => '$breadcrumb-padding-x',
		'row' => 'default',
		'input' => 'text',
		'default' => '0',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$breadcrumb-item-padding-x',
		'name' => $slug . 'breadcrumb-item-padding-x',
		'variable' => '$breadcrumb-item-padding-x',
		'row' => 'default',
		'input' => 'text',
		'default' => '.5rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$breadcrumb-margin-bottom',
		'name' => $slug . 'breadcrumb-margin-bottom',
		'variable' => '$breadcrumb-margin-bottom',
		'row' => 'default',
		'input' => 'text',
		'default' => '1rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$breadcrumb-bg',
		'name' => $slug . 'breadcrumb-bg',
		'variable' => '$breadcrumb-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'null',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$breadcrumb-divider-color',
		'name' => $slug . 'breadcrumb-divider-color',
		'variable' => '$breadcrumb-divider-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-600',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$breadcrumb-active-color',
		'name' => $slug . 'breadcrumb-active-color',
		'variable' => '$breadcrumb-active-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-600',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	/*array(
		'label' => '$breadcrumb-divider',
		'name' => $slug . 'breadcrumb-divider',
		'variable' => '$breadcrumb-divider',
		'row' => 'default',
		'input' => 'text',
		'default' => 'quote("/")',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),*/
	array(
		'label' => '$breadcrumb-divider-flipped',
		'name' => $slug . 'breadcrumb-divider-flipped',
		'variable' => '$breadcrumb-divider-flipped',
		'row' => 'default',
		'input' => 'text',
		'default' => '$breadcrumb-divider',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$breadcrumb-border-radius',
		'name' => $slug . 'breadcrumb-border-radius',
		'variable' => '$breadcrumb-border-radius',
		'row' => 'default',
		'input' => 'text',
		'default' => 'null',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);