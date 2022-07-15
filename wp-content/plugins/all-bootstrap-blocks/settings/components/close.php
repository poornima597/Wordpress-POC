<?php
/*
Name: Close
Slug: close
Description: 
Position: 10
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-close-';

return array(
	array(
		'label' => '$btn-close-width',
		'name' => $slug . 'btn-close-width',
		'variable' => '$btn-close-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '1em',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-close-height',
		'name' => $slug . 'btn-close-height',
		'variable' => '$btn-close-height',
		'row' => 'default',
		'input' => 'text',
		'default' => '$btn-close-width',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-close-padding-x',
		'name' => $slug . 'btn-close-padding-x',
		'variable' => '$btn-close-padding-x',
		'row' => 'default',
		'input' => 'text',
		'default' => '.25em',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-close-padding-y',
		'name' => $slug . 'btn-close-padding-y',
		'variable' => '$btn-close-padding-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '$btn-close-padding-x',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-close-color',
		'name' => $slug . 'btn-close-color',
		'variable' => '$btn-close-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$black',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	/*array(
		'label' => '$btn-close-bg',
		'name' => $slug . 'btn-close-bg',
		'variable' => '$btn-close-bg',
		'row' => 'default',
		'input' => 'text',
		'default' => 'url("data',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),*/
	array(
		'label' => '$btn-close-focus-shadow',
		'name' => $slug . 'btn-close-focus-shadow',
		'variable' => '$btn-close-focus-shadow',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-btn-focus-box-shadow',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-close-opacity',
		'name' => $slug . 'btn-close-opacity',
		'variable' => '$btn-close-opacity',
		'row' => 'default',
		'input' => 'text',
		'default' => '.5',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-close-hover-opacity',
		'name' => $slug . 'btn-close-hover-opacity',
		'variable' => '$btn-close-hover-opacity',
		'row' => 'default',
		'input' => 'text',
		'default' => '.75',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-close-focus-opacity',
		'name' => $slug . 'btn-close-focus-opacity',
		'variable' => '$btn-close-focus-opacity',
		'row' => 'default',
		'input' => 'text',
		'default' => '1',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-close-disabled-opacity',
		'name' => $slug . 'btn-close-disabled-opacity',
		'variable' => '$btn-close-disabled-opacity',
		'row' => 'default',
		'input' => 'text',
		'default' => '.25',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$btn-close-white-filter',
		'name' => $slug . 'btn-close-white-filter',
		'variable' => '$btn-close-white-filter',
		'row' => 'default',
		'input' => 'text',
		'default' => 'invert(1) grayscale(100%) brightness(200%)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);