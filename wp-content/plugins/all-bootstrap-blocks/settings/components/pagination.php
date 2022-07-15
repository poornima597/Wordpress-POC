<?php
/*
Name: Pagination
Slug: pagination
Description: 
Position: 10
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-pagination-';

return array(
	array(
		'label' => '$pagination-padding-y',
		'name' => $slug . 'pagination-padding-y',
		'variable' => '$pagination-padding-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '.375rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$pagination-padding-x',
		'name' => $slug . 'pagination-padding-x',
		'variable' => '$pagination-padding-x',
		'row' => 'default',
		'input' => 'text',
		'default' => '.75rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$pagination-padding-y-sm',
		'name' => $slug . 'pagination-padding-y-sm',
		'variable' => '$pagination-padding-y-sm',
		'row' => 'default',
		'input' => 'text',
		'default' => '.25rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$pagination-padding-x-sm',
		'name' => $slug . 'pagination-padding-x-sm',
		'variable' => '$pagination-padding-x-sm',
		'row' => 'default',
		'input' => 'text',
		'default' => '.5rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$pagination-padding-y-lg',
		'name' => $slug . 'pagination-padding-y-lg',
		'variable' => '$pagination-padding-y-lg',
		'row' => 'default',
		'input' => 'text',
		'default' => '.75rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$pagination-padding-x-lg',
		'name' => $slug . 'pagination-padding-x-lg',
		'variable' => '$pagination-padding-x-lg',
		'row' => 'default',
		'input' => 'text',
		'default' => '1.5rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$pagination-color',
		'name' => $slug . 'pagination-color',
		'variable' => '$pagination-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$link-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$pagination-bg',
		'name' => $slug . 'pagination-bg',
		'variable' => '$pagination-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$white',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$pagination-border-width',
		'name' => $slug . 'pagination-border-width',
		'variable' => '$pagination-border-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-width',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$pagination-border-radius',
		'name' => $slug . 'pagination-border-radius',
		'variable' => '$pagination-border-radius',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-radius',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$pagination-margin-start',
		'name' => $slug . 'pagination-margin-start',
		'variable' => '$pagination-margin-start',
		'row' => 'default',
		'input' => 'text',
		'default' => '-$pagination-border-width',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$pagination-border-color',
		'name' => $slug . 'pagination-border-color',
		'variable' => '$pagination-border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-300',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$pagination-focus-color',
		'name' => $slug . 'pagination-focus-color',
		'variable' => '$pagination-focus-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$link-hover-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$pagination-focus-bg',
		'name' => $slug . 'pagination-focus-bg',
		'variable' => '$pagination-focus-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-200',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$pagination-focus-box-shadow',
		'name' => $slug . 'pagination-focus-box-shadow',
		'variable' => '$pagination-focus-box-shadow',
		'row' => 'default',
		'input' => 'text',
		'default' => '$input-btn-focus-box-shadow',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$pagination-focus-outline',
		'name' => $slug . 'pagination-focus-outline',
		'variable' => '$pagination-focus-outline',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '0',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$pagination-hover-color',
		'name' => $slug . 'pagination-hover-color',
		'variable' => '$pagination-hover-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$link-hover-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$pagination-hover-bg',
		'name' => $slug . 'pagination-hover-bg',
		'variable' => '$pagination-hover-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-200',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$pagination-hover-border-color',
		'name' => $slug . 'pagination-hover-border-color',
		'variable' => '$pagination-hover-border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-300',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$pagination-active-color',
		'name' => $slug . 'pagination-active-color',
		'variable' => '$pagination-active-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$component-active-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$pagination-active-bg',
		'name' => $slug . 'pagination-active-bg',
		'variable' => '$pagination-active-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$component-active-bg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$pagination-active-border-color',
		'name' => $slug . 'pagination-active-border-color',
		'variable' => '$pagination-active-border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$pagination-active-bg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$pagination-disabled-color',
		'name' => $slug . 'pagination-disabled-color',
		'variable' => '$pagination-disabled-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-600',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$pagination-disabled-bg',
		'name' => $slug . 'pagination-disabled-bg',
		'variable' => '$pagination-disabled-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$white',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$pagination-disabled-border-color',
		'name' => $slug . 'pagination-disabled-border-color',
		'variable' => '$pagination-disabled-border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-300',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$pagination-transition',
		'name' => $slug . 'pagination-transition',
		'variable' => '$pagination-transition',
		'row' => 'default',
		'input' => 'text',
		'default' => 'color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$pagination-border-radius-sm',
		'name' => $slug . 'pagination-border-radius-sm',
		'variable' => '$pagination-border-radius-sm',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-radius-sm',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$pagination-border-radius-lg',
		'name' => $slug . 'pagination-border-radius-lg',
		'variable' => '$pagination-border-radius-lg',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-radius-lg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);