<?php
/*
Name: Feedback
Slug: feedback
Description: 
Position: 120
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-feedback-';

return array(
	array(
		'label' => '$form-feedback-margin-top',
		'name' => $slug . 'form-feedback-margin-top',
		'variable' => '$form-feedback-margin-top',
		'row' => 'default',
		'input' => 'text',
		'default' => '$form-text-margin-top',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-feedback-font-size',
		'name' => $slug . 'form-feedback-font-size',
		'variable' => '$form-feedback-font-size',
		'row' => 'default',
		'input' => 'text',
		'default' => '$form-text-font-size',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-feedback-font-style',
		'name' => $slug . 'form-feedback-font-style',
		'variable' => '$form-feedback-font-style',
		'row' => 'default',
		'input' => 'text',
		'default' => '$form-text-font-style',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-feedback-valid-color',
		'name' => $slug . 'form-feedback-valid-color',
		'variable' => '$form-feedback-valid-color',
		'row' => 'default',
		'input' => 'text',
		'default' => '$success',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-feedback-invalid-color',
		'name' => $slug . 'form-feedback-invalid-color',
		'variable' => '$form-feedback-invalid-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$danger',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$form-feedback-icon-valid-color',
		'name' => $slug . 'form-feedback-icon-valid-color',
		'variable' => '$form-feedback-icon-valid-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$form-feedback-valid-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	/*array(
		'label' => '$form-feedback-icon-valid',
		'name' => $slug . 'form-feedback-icon-valid',
		'variable' => '$form-feedback-icon-valid',
		'row' => 'default',
		'input' => 'image',
		'default' => 'url("data',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),*/
	array(
		'label' => '$form-feedback-icon-invalid-color',
		'name' => $slug . 'form-feedback-icon-invalid-color',
		'variable' => '$form-feedback-icon-invalid-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$form-feedback-invalid-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	/*array(
		'label' => '$form-feedback-icon-invalid',
		'name' => $slug . 'form-feedback-icon-invalid',
		'variable' => '$form-feedback-icon-invalid',
		'row' => 'default',
		'input' => 'image',
		'default' => 'url("data',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),*/
);