<?php
/*
Name: Badges
Slug: badges
Description: 
Position: 10
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-badges-';

return array(
	array(
		'label' => '$badge-font-size',
		'name' => $slug . 'badge-font-size',
		'variable' => '$badge-font-size',
		'row' => 'default',
		'input' => 'text',
		'default' => '.75em',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$badge-font-weight',
		'name' => $slug . 'badge-font-weight',
		'variable' => '$badge-font-weight',
		'row' => 'default',
		'input' => 'text',
		'default' => '$font-weight-bold',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$badge-color',
		'name' => $slug . 'badge-color',
		'variable' => '$badge-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$white',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$badge-padding-y',
		'name' => $slug . 'badge-padding-y',
		'variable' => '$badge-padding-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '.35em',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$badge-padding-x',
		'name' => $slug . 'badge-padding-x',
		'variable' => '$badge-padding-x',
		'row' => 'default',
		'input' => 'text',
		'default' => '.65em',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$badge-border-radius',
		'name' => $slug . 'badge-border-radius',
		'variable' => '$badge-border-radius',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-radius',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);