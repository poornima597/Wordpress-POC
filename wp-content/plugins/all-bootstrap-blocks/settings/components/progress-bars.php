<?php
/*
Name: Progress Bars
Slug: progress-bars
Description: 
Position: 10
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-progress-bars-';

return array(
	array(
		'label' => '$progress-height',
		'name' => $slug . 'progress-height',
		'variable' => '$progress-height',
		'row' => 'default',
		'input' => 'text',
		'default' => '1rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$progress-font-size',
		'name' => $slug . 'progress-font-size',
		'variable' => '$progress-font-size',
		'row' => 'default',
		'input' => 'text',
		'default' => '$font-size-base * .75',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$progress-bg',
		'name' => $slug . 'progress-bg',
		'variable' => '$progress-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-200',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$progress-border-radius',
		'name' => $slug . 'progress-border-radius',
		'variable' => '$progress-border-radius',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-radius',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$progress-box-shadow',
		'name' => $slug . 'progress-box-shadow',
		'variable' => '$progress-box-shadow',
		'row' => 'default',
		'input' => 'text',
		'default' => '$box-shadow-inset',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$progress-bar-color',
		'name' => $slug . 'progress-bar-color',
		'variable' => '$progress-bar-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$white',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$progress-bar-bg',
		'name' => $slug . 'progress-bar-bg',
		'variable' => '$progress-bar-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$primary',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$progress-bar-animation-timing',
		'name' => $slug . 'progress-bar-animation-timing',
		'variable' => '$progress-bar-animation-timing',
		'row' => 'default',
		'input' => 'text',
		'default' => '1s linear infinite',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$progress-bar-transition',
		'name' => $slug . 'progress-bar-transition',
		'variable' => '$progress-bar-transition',
		'row' => 'default',
		'input' => 'text',
		'default' => 'width .6s ease',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);