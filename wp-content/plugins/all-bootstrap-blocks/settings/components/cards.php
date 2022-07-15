<?php
/*
Name: Cards
Slug: cards
Description: 
Position: 10
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-cards-';

return array(
	array(
		'label' => '$card-spacer-y',
		'name' => $slug . 'card-spacer-y',
		'variable' => '$card-spacer-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '$spacer',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$card-spacer-x',
		'name' => $slug . 'card-spacer-x',
		'variable' => '$card-spacer-x',
		'row' => 'default',
		'input' => 'text',
		'default' => '$spacer',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$card-title-spacer-y',
		'name' => $slug . 'card-title-spacer-y',
		'variable' => '$card-title-spacer-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '$spacer * .5',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$card-border-width',
		'name' => $slug . 'card-border-width',
		'variable' => '$card-border-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-width',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$card-border-radius',
		'name' => $slug . 'card-border-radius',
		'variable' => '$card-border-radius',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-radius',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$card-border-color',
		'name' => $slug . 'card-border-color',
		'variable' => '$card-border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'rgba($black, .125)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$card-inner-border-radius',
		'name' => $slug . 'card-inner-border-radius',
		'variable' => '$card-inner-border-radius',
		'row' => 'default',
		'input' => 'text',
		'default' => 'subtract($card-border-radius, $card-border-width)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$card-cap-padding-y',
		'name' => $slug . 'card-cap-padding-y',
		'variable' => '$card-cap-padding-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '$card-spacer-y * .5',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$card-cap-padding-x',
		'name' => $slug . 'card-cap-padding-x',
		'variable' => '$card-cap-padding-x',
		'row' => 'default',
		'input' => 'text',
		'default' => '$card-spacer-x',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$card-cap-bg',
		'name' => $slug . 'card-cap-bg',
		'variable' => '$card-cap-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'rgba($black, .03)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$card-cap-color',
		'name' => $slug . 'card-cap-color',
		'variable' => '$card-cap-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'null',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$card-height',
		'name' => $slug . 'card-height',
		'variable' => '$card-height',
		'row' => 'default',
		'input' => 'text',
		'default' => 'null',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$card-color',
		'name' => $slug . 'card-color',
		'variable' => '$card-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'null',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$card-bg',
		'name' => $slug . 'card-bg',
		'variable' => '$card-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$white',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$card-img-overlay-padding',
		'name' => $slug . 'card-img-overlay-padding',
		'variable' => '$card-img-overlay-padding',
		'row' => 'default',
		'input' => 'text',
		'default' => '$spacer',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$card-group-margin',
		'name' => $slug . 'card-group-margin',
		'variable' => '$card-group-margin',
		'row' => 'default',
		'input' => 'text',
		'default' => '$grid-gutter-width * .5',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);