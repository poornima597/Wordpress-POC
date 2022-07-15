<?php
/*
Name: Modals
Slug: modals
Description: 
Position: 10
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-modals-';

return array(
	array(
		'label' => '$modal-inner-padding',
		'name' => $slug . 'modal-inner-padding',
		'variable' => '$modal-inner-padding',
		'row' => 'default',
		'input' => 'text',
		'default' => '$spacer',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$modal-footer-margin-between',
		'name' => $slug . 'modal-footer-margin-between',
		'variable' => '$modal-footer-margin-between',
		'row' => 'default',
		'input' => 'text',
		'default' => '.5rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$modal-dialog-margin',
		'name' => $slug . 'modal-dialog-margin',
		'variable' => '$modal-dialog-margin',
		'row' => 'default',
		'input' => 'text',
		'default' => '.5rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$modal-dialog-margin-y-sm-up',
		'name' => $slug . 'modal-dialog-margin-y-sm-up',
		'variable' => '$modal-dialog-margin-y-sm-up',
		'row' => 'default',
		'input' => 'text',
		'default' => '1.75rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$modal-title-line-height',
		'name' => $slug . 'modal-title-line-height',
		'variable' => '$modal-title-line-height',
		'row' => 'default',
		'input' => 'text',
		'default' => '$line-height-base',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$modal-content-color',
		'name' => $slug . 'modal-content-color',
		'variable' => '$modal-content-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'null',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$modal-content-bg',
		'name' => $slug . 'modal-content-bg',
		'variable' => '$modal-content-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$white',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$modal-content-border-color',
		'name' => $slug . 'modal-content-border-color',
		'variable' => '$modal-content-border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'rgba($black, .2)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$modal-content-border-width',
		'name' => $slug . 'modal-content-border-width',
		'variable' => '$modal-content-border-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-width',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$modal-content-border-radius',
		'name' => $slug . 'modal-content-border-radius',
		'variable' => '$modal-content-border-radius',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-radius-lg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$modal-content-inner-border-radius',
		'name' => $slug . 'modal-content-inner-border-radius',
		'variable' => '$modal-content-inner-border-radius',
		'row' => 'default',
		'input' => 'text',
		'default' => 'subtract($modal-content-border-radius, $modal-content-border-width)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$modal-content-box-shadow-xs',
		'name' => $slug . 'modal-content-box-shadow-xs',
		'variable' => '$modal-content-box-shadow-xs',
		'row' => 'default',
		'input' => 'text',
		'default' => '$box-shadow-sm',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$modal-content-box-shadow-sm-up',
		'name' => $slug . 'modal-content-box-shadow-sm-up',
		'variable' => '$modal-content-box-shadow-sm-up',
		'row' => 'default',
		'input' => 'text',
		'default' => '$box-shadow',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$modal-backdrop-bg',
		'name' => $slug . 'modal-backdrop-bg',
		'variable' => '$modal-backdrop-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$black',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$modal-backdrop-opacity',
		'name' => $slug . 'modal-backdrop-opacity',
		'variable' => '$modal-backdrop-opacity',
		'row' => 'default',
		'input' => 'text',
		'default' => '.5',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$modal-header-border-color',
		'name' => $slug . 'modal-header-border-color',
		'variable' => '$modal-header-border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$border-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$modal-footer-border-color',
		'name' => $slug . 'modal-footer-border-color',
		'variable' => '$modal-footer-border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$modal-header-border-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$modal-header-border-width',
		'name' => $slug . 'modal-header-border-width',
		'variable' => '$modal-header-border-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '$modal-content-border-width',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$modal-footer-border-width',
		'name' => $slug . 'modal-footer-border-width',
		'variable' => '$modal-footer-border-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '$modal-header-border-width',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$modal-header-padding-y',
		'name' => $slug . 'modal-header-padding-y',
		'variable' => '$modal-header-padding-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '$modal-inner-padding',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$modal-header-padding-x',
		'name' => $slug . 'modal-header-padding-x',
		'variable' => '$modal-header-padding-x',
		'row' => 'default',
		'input' => 'text',
		'default' => '$modal-inner-padding',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$modal-header-padding',
		'name' => $slug . 'modal-header-padding',
		'variable' => '$modal-header-padding',
		'row' => 'default',
		'input' => 'text',
		'default' => '$modal-header-padding-y $modal-header-padding-x',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$modal-sm',
		'name' => $slug . 'modal-sm',
		'variable' => '$modal-sm',
		'row' => 'default',
		'input' => 'text',
		'default' => '300px',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$modal-md',
		'name' => $slug . 'modal-md',
		'variable' => '$modal-md',
		'row' => 'default',
		'input' => 'text',
		'default' => '500px',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$modal-lg',
		'name' => $slug . 'modal-lg',
		'variable' => '$modal-lg',
		'row' => 'default',
		'input' => 'text',
		'default' => '800px',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$modal-xl',
		'name' => $slug . 'modal-xl',
		'variable' => '$modal-xl',
		'row' => 'default',
		'input' => 'text',
		'default' => '1140px',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$modal-fade-transform',
		'name' => $slug . 'modal-fade-transform',
		'variable' => '$modal-fade-transform',
		'row' => 'default',
		'input' => 'text',
		'default' => 'translate(0, -50px)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$modal-show-transform',
		'name' => $slug . 'modal-show-transform',
		'variable' => '$modal-show-transform',
		'row' => 'default',
		'input' => 'text',
		'default' => 'none',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$modal-transition',
		'name' => $slug . 'modal-transition',
		'variable' => '$modal-transition',
		'row' => 'default',
		'input' => 'text',
		'default' => 'transform .3s ease-out',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$modal-scale-transform',
		'name' => $slug . 'modal-scale-transform',
		'variable' => '$modal-scale-transform',
		'row' => 'default',
		'input' => 'text',
		'default' => 'scale(1.02)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);