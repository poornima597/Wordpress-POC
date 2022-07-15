<?php
/*
Name: Range
Slug: range
Description: 
Position: 90
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-range-';

return array(
	array(
		'label' => '$form-range-track-width',
		'name' => $slug . 'form-range-track-width',
		'variable' => '$form-range-track-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '100%',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-range-track-height',
		'name' => $slug . 'form-range-track-height',
		'variable' => '$form-range-track-height',
		'row' => 'default',
		'input' => 'text',
		'default' => '.5rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-range-track-cursor',
		'name' => $slug . 'form-range-track-cursor',
		'variable' => '$form-range-track-cursor',
		'row' => 'default',
		'input' => 'text',
		'default' => 'pointer',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-range-track-bg',
		'name' => $slug . 'form-range-track-bg',
		'variable' => '$form-range-track-bg',
		'row' => 'default',
		'input' => 'text',
		'default' => '$gray-300',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-range-track-border-radius',
		'name' => $slug . 'form-range-track-border-radius',
		'variable' => '$form-range-track-border-radius',
		'row' => 'default',
		'input' => 'text',
		'default' => '1rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-range-track-box-shadow',
		'name' => $slug . 'form-range-track-box-shadow',
		'variable' => '$form-range-track-box-shadow',
		'row' => 'default',
		'input' => 'text',
		'default' => '$box-shadow-inset',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-range-thumb-width',
		'name' => $slug . 'form-range-thumb-width',
		'variable' => '$form-range-thumb-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '1rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-range-thumb-height',
		'name' => $slug . 'form-range-thumb-height',
		'variable' => '$form-range-thumb-height',
		'row' => 'default',
		'input' => 'text',
		'default' => '$form-range-thumb-width',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-range-thumb-bg',
		'name' => $slug . 'form-range-thumb-bg',
		'variable' => '$form-range-thumb-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$component-active-bg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-range-thumb-border',
		'name' => $slug . 'form-range-thumb-border',
		'variable' => '$form-range-thumb-border',
		'row' => 'default',
		'input' => 'text',
		'default' => '0',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-range-thumb-border-radius',
		'name' => $slug . 'form-range-thumb-border-radius',
		'variable' => '$form-range-thumb-border-radius',
		'row' => 'default',
		'input' => 'text',
		'default' => '1rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-range-thumb-box-shadow',
		'name' => $slug . 'form-range-thumb-box-shadow',
		'variable' => '$form-range-thumb-box-shadow',
		'row' => 'default',
		'input' => 'text',
		'default' => '0 .1rem .25rem rgba($black, .1)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-range-thumb-focus-box-shadow',
		'name' => $slug . 'form-range-thumb-focus-box-shadow',
		'variable' => '$form-range-thumb-focus-box-shadow',
		'row' => 'default',
		'input' => 'text',
		'default' => '0 0 0 1px $body-bg, $input-focus-box-shadow',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-range-thumb-focus-box-shadow-width',
		'name' => $slug . 'form-range-thumb-focus-box-shadow-width',
		'variable' => '$form-range-thumb-focus-box-shadow-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-focus-width',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-range-thumb-active-bg',
		'name' => $slug . 'form-range-thumb-active-bg',
		'variable' => '$form-range-thumb-active-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'tint-color($component-active-bg, 70%)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-range-thumb-disabled-bg',
		'name' => $slug . 'form-range-thumb-disabled-bg',
		'variable' => '$form-range-thumb-disabled-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-500',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-range-thumb-transition',
		'name' => $slug . 'form-range-thumb-transition',
		'variable' => '$form-range-thumb-transition',
		'row' => 'default',
		'input' => 'text',
		'default' => 'background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);