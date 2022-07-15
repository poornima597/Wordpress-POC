<?php
/*
Name: Offcanvas
Slug: offcanvas
Description: 
Position: 10
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-offcanvas-';

return array(
	array(
		'label' => '$offcanvas-padding-y',
		'name' => $slug . 'offcanvas-padding-y',
		'variable' => '$offcanvas-padding-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '$modal-inner-padding',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$offcanvas-padding-x',
		'name' => $slug . 'offcanvas-padding-x',
		'variable' => '$offcanvas-padding-x',
		'row' => 'default',
		'input' => 'text',
		'default' => '$modal-inner-padding',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$offcanvas-horizontal-width',
		'name' => $slug . 'offcanvas-horizontal-width',
		'variable' => '$offcanvas-horizontal-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '400px',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$offcanvas-vertical-height',
		'name' => $slug . 'offcanvas-vertical-height',
		'variable' => '$offcanvas-vertical-height',
		'row' => 'default',
		'input' => 'text',
		'default' => '30vh',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$offcanvas-transition-duration',
		'name' => $slug . 'offcanvas-transition-duration',
		'variable' => '$offcanvas-transition-duration',
		'row' => 'default',
		'input' => 'text',
		'default' => '.3s',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$offcanvas-border-color',
		'name' => $slug . 'offcanvas-border-color',
		'variable' => '$offcanvas-border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$modal-content-border-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$offcanvas-border-width',
		'name' => $slug . 'offcanvas-border-width',
		'variable' => '$offcanvas-border-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '$modal-content-border-width',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$offcanvas-title-line-height',
		'name' => $slug . 'offcanvas-title-line-height',
		'variable' => '$offcanvas-title-line-height',
		'row' => 'default',
		'input' => 'text',
		'default' => '$modal-title-line-height',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$offcanvas-bg-color',
		'name' => $slug . 'offcanvas-bg-color',
		'variable' => '$offcanvas-bg-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$modal-content-bg',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$offcanvas-color',
		'name' => $slug . 'offcanvas-color',
		'variable' => '$offcanvas-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$modal-content-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$offcanvas-box-shadow',
		'name' => $slug . 'offcanvas-box-shadow',
		'variable' => '$offcanvas-box-shadow',
		'row' => 'default',
		'input' => 'text',
		'default' => '$modal-content-box-shadow-xs',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);