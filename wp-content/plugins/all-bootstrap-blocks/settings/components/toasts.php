<?php
/*
Name: Toasts
Slug: toasts
Description: 
Position: 10
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-toasts-';

return array(
	array(
		'label' => '$toast-max-width',
		'name' => $slug . 'toast-max-width',
		'variable' => '$toast-max-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '350px',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$toast-padding-x',
		'name' => $slug . 'toast-padding-x',
		'variable' => '$toast-padding-x',
		'row' => 'default',
		'input' => 'text',
		'default' => '.75rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$toast-padding-y',
		'name' => $slug . 'toast-padding-y',
		'variable' => '$toast-padding-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '.5rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$toast-font-size',
		'name' => $slug . 'toast-font-size',
		'variable' => '$toast-font-size',
		'row' => 'default',
		'input' => 'text',
		'default' => '.875rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$toast-color',
		'name' => $slug . 'toast-color',
		'variable' => '$toast-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'null',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$toast-background-color',
		'name' => $slug . 'toast-background-color',
		'variable' => '$toast-background-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'rgba($white, .85)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$toast-border-width',
		'name' => $slug . 'toast-border-width',
		'variable' => '$toast-border-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '1px',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$toast-border-color',
		'name' => $slug . 'toast-border-color',
		'variable' => '$toast-border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'rgba(0, 0, 0, .1)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$toast-border-radius',
		'name' => $slug . 'toast-border-radius',
		'variable' => '$toast-border-radius',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-radius',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$toast-box-shadow',
		'name' => $slug . 'toast-box-shadow',
		'variable' => '$toast-box-shadow',
		'row' => 'default',
		'input' => 'text',
		'default' => '$box-shadow',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$toast-spacing',
		'name' => $slug . 'toast-spacing',
		'variable' => '$toast-spacing',
		'row' => 'default',
		'input' => 'text',
		'default' => '$container-padding-x',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$toast-header-color',
		'name' => $slug . 'toast-header-color',
		'variable' => '$toast-header-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-600',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$toast-header-background-color',
		'name' => $slug . 'toast-header-background-color',
		'variable' => '$toast-header-background-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'rgba($white, .85)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$toast-header-border-color',
		'name' => $slug . 'toast-header-border-color',
		'variable' => '$toast-header-border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'rgba(0, 0, 0, .05)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);