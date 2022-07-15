<?php
/*
Name: Tooltip
Slug: tooltip
Description: 
Position: 10
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-tooltip-';

return array(
	array(
		'label' => '$tooltip-font-size',
		'name' => $slug . 'tooltip-font-size',
		'variable' => '$tooltip-font-size',
		'row' => 'default',
		'input' => 'text',
		'default' => '$font-size-sm',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$tooltip-max-width',
		'name' => $slug . 'tooltip-max-width',
		'variable' => '$tooltip-max-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '200px',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$tooltip-color',
		'name' => $slug . 'tooltip-color',
		'variable' => '$tooltip-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$white',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$tooltip-bg',
		'name' => $slug . 'tooltip-bg',
		'variable' => '$tooltip-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$black',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$tooltip-border-radius',
		'name' => $slug . 'tooltip-border-radius',
		'variable' => '$tooltip-border-radius',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-radius',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$tooltip-opacity',
		'name' => $slug . 'tooltip-opacity',
		'variable' => '$tooltip-opacity',
		'row' => 'default',
		'input' => 'text',
		'default' => '.9',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$tooltip-padding-y',
		'name' => $slug . 'tooltip-padding-y',
		'variable' => '$tooltip-padding-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '$spacer * .25',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$tooltip-padding-x',
		'name' => $slug . 'tooltip-padding-x',
		'variable' => '$tooltip-padding-x',
		'row' => 'default',
		'input' => 'text',
		'default' => '$spacer * .5',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$tooltip-margin',
		'name' => $slug . 'tooltip-margin',
		'variable' => '$tooltip-margin',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '0',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$tooltip-arrow-width',
		'name' => $slug . 'tooltip-arrow-width',
		'variable' => '$tooltip-arrow-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '.8rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$tooltip-arrow-height',
		'name' => $slug . 'tooltip-arrow-height',
		'variable' => '$tooltip-arrow-height',
		'row' => 'default',
		'input' => 'text',
		'default' => '.4rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$tooltip-arrow-color',
		'name' => $slug . 'tooltip-arrow-color',
		'variable' => '$tooltip-arrow-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$tooltip-bg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-feedback-tooltip-padding-y',
		'name' => $slug . 'form-feedback-tooltip-padding-y',
		'variable' => '$form-feedback-tooltip-padding-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '$tooltip-padding-y',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-feedback-tooltip-padding-x',
		'name' => $slug . 'form-feedback-tooltip-padding-x',
		'variable' => '$form-feedback-tooltip-padding-x',
		'row' => 'default',
		'input' => 'text',
		'default' => '$tooltip-padding-x',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-feedback-tooltip-font-size',
		'name' => $slug . 'form-feedback-tooltip-font-size',
		'variable' => '$form-feedback-tooltip-font-size',
		'row' => 'default',
		'input' => 'text',
		'default' => '$tooltip-font-size',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-feedback-tooltip-line-height',
		'name' => $slug . 'form-feedback-tooltip-line-height',
		'variable' => '$form-feedback-tooltip-line-height',
		'row' => 'default',
		'input' => 'text',
		'default' => 'null',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-feedback-tooltip-opacity',
		'name' => $slug . 'form-feedback-tooltip-opacity',
		'variable' => '$form-feedback-tooltip-opacity',
		'row' => 'default',
		'input' => 'text',
		'default' => '$tooltip-opacity',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-feedback-tooltip-border-radius',
		'name' => $slug . 'form-feedback-tooltip-border-radius',
		'variable' => '$form-feedback-tooltip-border-radius',
		'row' => 'default',
		'input' => 'text',
		'default' => '$tooltip-border-radius',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);