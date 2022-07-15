<?php
/*
Name: Z-index
Slug: z-index
Description: Warning: Avoid customizing these values. They're used for a bird's eye view of components dependent on the z-axis and are designed to all work together.
Position: 10
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-z-index-';

return array(
	array(
		'label' => '$zindex-dropdown',
		'name' => $slug . 'zindex-dropdown',
		'variable' => '$zindex-dropdown',
		'row' => 'default',
		'input' => 'text',
		'default' => '1000',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$zindex-sticky',
		'name' => $slug . 'zindex-sticky',
		'variable' => '$zindex-sticky',
		'row' => 'default',
		'input' => 'text',
		'default' => '1020',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$zindex-fixed',
		'name' => $slug . 'zindex-fixed',
		'variable' => '$zindex-fixed',
		'row' => 'default',
		'input' => 'text',
		'default' => '1030',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$zindex-modal-backdrop',
		'name' => $slug . 'zindex-modal-backdrop',
		'variable' => '$zindex-modal-backdrop',
		'row' => 'default',
		'input' => 'text',
		'default' => '1040',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$zindex-offcanvas',
		'name' => $slug . 'zindex-offcanvas',
		'variable' => '$zindex-offcanvas',
		'row' => 'default',
		'input' => 'text',
		'default' => '1050',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$zindex-modal',
		'name' => $slug . 'zindex-modal',
		'variable' => '$zindex-modal',
		'row' => 'default',
		'input' => 'text',
		'default' => '1060',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$zindex-popover',
		'name' => $slug . 'zindex-popover',
		'variable' => '$zindex-popover',
		'row' => 'default',
		'input' => 'text',
		'default' => '1070',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$zindex-tooltip',
		'name' => $slug . 'zindex-tooltip',
		'variable' => '$zindex-tooltip',
		'row' => 'default',
		'input' => 'text',
		'default' => '1080',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);