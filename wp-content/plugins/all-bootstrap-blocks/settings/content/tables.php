<?php
/*
Name: Tables
Slug: tables
Description: Customizes the `.table` component with basic values, each used across all table variations.
Position: 30
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-tables-';

return array(
	array(
		'label' => '$table-cell-padding-y',
		'name' => $slug . 'table-cell-padding-y',
		'variable' => '$table-cell-padding-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '.5rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$table-cell-padding-x',
		'name' => $slug . 'table-cell-padding-x',
		'variable' => '$table-cell-padding-x',
		'row' => 'default',
		'input' => 'text',
		'default' => '.5rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$table-cell-padding-y-sm',
		'name' => $slug . 'table-cell-padding-y-sm',
		'variable' => '$table-cell-padding-y-sm',
		'row' => 'default',
		'input' => 'text',
		'default' => '.25rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$table-cell-padding-x-sm',
		'name' => $slug . 'table-cell-padding-x-sm',
		'variable' => '$table-cell-padding-x-sm',
		'row' => 'default',
		'input' => 'text',
		'default' => '.25rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$table-cell-vertical-align',
		'name' => $slug . 'table-cell-vertical-align',
		'variable' => '$table-cell-vertical-align',
		'row' => 'default',
		'input' => 'text',
		'default' => 'top',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$table-color',
		'name' => $slug . 'table-color',
		'variable' => '$table-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$body-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$table-bg',
		'name' => $slug . 'table-bg',
		'variable' => '$table-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'transparent',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$table-accent-bg',
		'name' => $slug . 'table-accent-bg',
		'variable' => '$table-accent-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'transparent',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$table-th-font-weight',
		'name' => $slug . 'table-th-font-weight',
		'variable' => '$table-th-font-weight',
		'row' => 'default',
		'input' => 'text',
		'default' => 'null',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$table-striped-color',
		'name' => $slug . 'table-striped-color',
		'variable' => '$table-striped-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$table-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$table-striped-bg-factor',
		'name' => $slug . 'table-striped-bg-factor',
		'variable' => '$table-striped-bg-factor',
		'row' => 'default',
		'input' => 'text',
		'default' => '.05',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$table-striped-bg',
		'name' => $slug . 'table-striped-bg',
		'variable' => '$table-striped-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'rgba($black, $table-striped-bg-factor)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$table-active-color',
		'name' => $slug . 'table-active-color',
		'variable' => '$table-active-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$table-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$table-active-bg-factor',
		'name' => $slug . 'table-active-bg-factor',
		'variable' => '$table-active-bg-factor',
		'row' => 'default',
		'input' => 'text',
		'default' => '.1',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$table-active-bg',
		'name' => $slug . 'table-active-bg',
		'variable' => '$table-active-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'rgba($black, $table-active-bg-factor)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$table-hover-color',
		'name' => $slug . 'table-hover-color',
		'variable' => '$table-hover-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$table-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$table-hover-bg-factor',
		'name' => $slug . 'table-hover-bg-factor',
		'variable' => '$table-hover-bg-factor',
		'row' => 'default',
		'input' => 'text',
		'default' => '.075',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$table-hover-bg',
		'name' => $slug . 'table-hover-bg',
		'variable' => '$table-hover-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'rgba($black, $table-hover-bg-factor)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$table-border-factor',
		'name' => $slug . 'table-border-factor',
		'variable' => '$table-border-factor',
		'row' => 'default',
		'input' => 'text',
		'default' => '.1',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$table-border-width',
		'name' => $slug . 'table-border-width',
		'variable' => '$table-border-width',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-width',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$table-border-color',
		'name' => $slug . 'table-border-color',
		'variable' => '$table-border-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$border-color',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$table-striped-order',
		'name' => $slug . 'table-striped-order',
		'variable' => '$table-striped-order',
		'row' => 'default',
		'input' => 'text',
		'default' => 'odd',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$table-group-separator-color',
		'name' => $slug . 'table-group-separator-color',
		'variable' => '$table-group-separator-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'currentColor',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$table-caption-color',
		'name' => $slug . 'table-caption-color',
		'variable' => '$table-caption-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$text-muted',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$table-bg-scale',
		'name' => $slug . 'table-bg-scale',
		'variable' => '$table-bg-scale',
		'row' => 'default',
		'input' => 'text',
		'default' => '-80%',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);