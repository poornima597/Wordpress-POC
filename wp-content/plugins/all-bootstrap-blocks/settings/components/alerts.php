<?php
/*
Name: Alerts
Slug: alerts
Description: 
Position: 10
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-alerts-';

return array(
	array(
		'label' => '$alert-padding-y',
		'name' => $slug . 'alert-padding-y',
		'variable' => '$alert-padding-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '$spacer',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$alert-padding-x',
		'name' => $slug . 'alert-padding-x',
		'variable' => '$alert-padding-x',
		'row' => 'default',
		'input' => 'text',
		'default' => '$spacer',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$alert-margin-bottom',
		'name' => $slug . 'alert-margin-bottom',
		'variable' => '$alert-margin-bottom',
		'row' => 'default',
		'input' => 'text',
		'default' => '1rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$alert-border-radius',
		'name' => $slug . 'alert-border-radius',
		'variable' => '$alert-border-radius',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-radius',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$alert-link-font-weight',
		'name' => $slug . 'alert-link-font-weight',
		'variable' => '$alert-link-font-weight',
		'row' => 'default',
		'input' => 'text',
		'default' => '$font-weight-bold',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$alert-border-width',
		'name' => $slug . 'alert-border-width',
		'variable' => '$alert-border-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-width',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$alert-bg-scale',
		'name' => $slug . 'alert-bg-scale',
		'variable' => '$alert-bg-scale',
		'row' => 'default',
		'input' => 'text',
		'default' => '-80%',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$alert-border-scale',
		'name' => $slug . 'alert-border-scale',
		'variable' => '$alert-border-scale',
		'row' => 'default',
		'input' => 'text',
		'default' => '-70%',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$alert-color-scale',
		'name' => $slug . 'alert-color-scale',
		'variable' => '$alert-color-scale',
		'row' => 'default',
		'input' => 'text',
		'default' => '40%',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$alert-dismissible-padding-r',
		'name' => $slug . 'alert-dismissible-padding-r',
		'variable' => '$alert-dismissible-padding-r',
		'row' => 'default',
		'input' => 'text',
		'default' => '$alert-padding-x * 3',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);