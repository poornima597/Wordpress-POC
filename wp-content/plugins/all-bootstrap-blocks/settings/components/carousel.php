<?php
/*
Name: Carousel
Slug: carousel
Description: 
Position: 10
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-carousel-';

return array(
	array(
		'label' => '$carousel-control-color',
		'name' => $slug . 'carousel-control-color',
		'variable' => '$carousel-control-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$white',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$carousel-control-width',
		'name' => $slug . 'carousel-control-width',
		'variable' => '$carousel-control-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '15%',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$carousel-control-opacity',
		'name' => $slug . 'carousel-control-opacity',
		'variable' => '$carousel-control-opacity',
		'row' => 'default',
		'input' => 'text',
		'default' => '.5',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$carousel-control-hover-opacity',
		'name' => $slug . 'carousel-control-hover-opacity',
		'variable' => '$carousel-control-hover-opacity',
		'row' => 'default',
		'input' => 'text',
		'default' => '.9',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$carousel-control-transition',
		'name' => $slug . 'carousel-control-transition',
		'variable' => '$carousel-control-transition',
		'row' => 'default',
		'input' => 'text',
		'default' => 'opacity .15s ease',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$carousel-indicator-width',
		'name' => $slug . 'carousel-indicator-width',
		'variable' => '$carousel-indicator-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '30px',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$carousel-indicator-height',
		'name' => $slug . 'carousel-indicator-height',
		'variable' => '$carousel-indicator-height',
		'row' => 'default',
		'input' => 'text',
		'default' => '3px',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$carousel-indicator-hit-area-height',
		'name' => $slug . 'carousel-indicator-hit-area-height',
		'variable' => '$carousel-indicator-hit-area-height',
		'row' => 'default',
		'input' => 'text',
		'default' => '10px',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$carousel-indicator-spacer',
		'name' => $slug . 'carousel-indicator-spacer',
		'variable' => '$carousel-indicator-spacer',
		'row' => 'default',
		'input' => 'text',
		'default' => '3px',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$carousel-indicator-opacity',
		'name' => $slug . 'carousel-indicator-opacity',
		'variable' => '$carousel-indicator-opacity',
		'row' => 'default',
		'input' => 'text',
		'default' => '.5',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$carousel-indicator-active-bg',
		'name' => $slug . 'carousel-indicator-active-bg',
		'variable' => '$carousel-indicator-active-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$white',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$carousel-indicator-active-opacity',
		'name' => $slug . 'carousel-indicator-active-opacity',
		'variable' => '$carousel-indicator-active-opacity',
		'row' => 'default',
		'input' => 'text',
		'default' => '1',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$carousel-indicator-transition',
		'name' => $slug . 'carousel-indicator-transition',
		'variable' => '$carousel-indicator-transition',
		'row' => 'default',
		'input' => 'text',
		'default' => 'opacity .6s ease',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$carousel-caption-width',
		'name' => $slug . 'carousel-caption-width',
		'variable' => '$carousel-caption-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '70%',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$carousel-caption-color',
		'name' => $slug . 'carousel-caption-color',
		'variable' => '$carousel-caption-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$white',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$carousel-caption-padding-y',
		'name' => $slug . 'carousel-caption-padding-y',
		'variable' => '$carousel-caption-padding-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '1.25rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$carousel-caption-spacer',
		'name' => $slug . 'carousel-caption-spacer',
		'variable' => '$carousel-caption-spacer',
		'row' => 'default',
		'input' => 'text',
		'default' => '1.25rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$carousel-control-icon-width',
		'name' => $slug . 'carousel-control-icon-width',
		'variable' => '$carousel-control-icon-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '2rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	/*array(
		'label' => '$carousel-control-prev-icon-bg',
		'name' => $slug . 'carousel-control-prev-icon-bg',
		'variable' => '$carousel-control-prev-icon-bg',
		'row' => 'default',
		'input' => 'text',
		'default' => 'url("data',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),*/
	/*array(
		'label' => '$carousel-control-next-icon-bg',
		'name' => $slug . 'carousel-control-next-icon-bg',
		'variable' => '$carousel-control-next-icon-bg',
		'row' => 'default',
		'input' => 'text',
		'default' => 'url("data',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),*/
	array(
		'label' => '$carousel-transition-duration',
		'name' => $slug . 'carousel-transition-duration',
		'variable' => '$carousel-transition-duration',
		'row' => 'default',
		'input' => 'text',
		'default' => '.6s',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$carousel-transition',
		'name' => $slug . 'carousel-transition',
		'variable' => '$carousel-transition',
		'row' => 'default',
		'input' => 'text',
		'default' => 'transform $carousel-transition-duration ease-in-out',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$carousel-dark-indicator-active-bg',
		'name' => $slug . 'carousel-dark-indicator-active-bg',
		'variable' => '$carousel-dark-indicator-active-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$black',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$carousel-dark-caption-color',
		'name' => $slug . 'carousel-dark-caption-color',
		'variable' => '$carousel-dark-caption-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$black',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$carousel-dark-control-icon-filter',
		'name' => $slug . 'carousel-dark-control-icon-filter',
		'variable' => '$carousel-dark-control-icon-filter',
		'row' => 'default',
		'input' => 'text',
		'default' => 'invert(1) grayscale(100)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);