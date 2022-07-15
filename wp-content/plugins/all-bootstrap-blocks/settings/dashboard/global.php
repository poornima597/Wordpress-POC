<?php
/*
Name: Global
Slug: global
Description: Only untick these options if you plan to include your own version of Bootstrap CSS and JS in your theme, otherwsie your Bootstrap blocks will not be styled and will display incorrectly. When including your own version the block editor may not match up with the front end so we suggest keeping these checked.
Position: 10
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-global-';

return array(
	array(
		'label' => 'Include Bootstrap CSS',
		'name' => $slug . 'bootstrap-css',
		'variable' => '',
		'row' => 'default',
		'input' => 'checkbox',
		'default' => 1,
		'description' => 'If checked, then Bootstrap CSS will automatically be inserted into the head of your website. You will be able to manage all of your Bootstrap settings via Wordpress and each time you save variables, Bootstrap will be recompiled and minified.',
		'allow_reset' => false,
		'options' => array()
	),
	array(
		'label' => 'Bootstrap CSS Priority',
		'name' => $slug . 'bootstrap-css-priority',
		'variable' => '',
		'row' => 'default',
		'input' => 'text',
		'default' => null,
		'exclude_variables' => true,
		'description' => 'If using All Bootstrap Blocks to include your Botstrap CSS you can control where this gets added to the <head> section of the site. Use this field to specify when the CSS should be included. Setting this value below 10 (1 to 9) will include the Bootstrap CSS before the WordPress global styles from your theme.json file.',
		'allow_reset' => false,
		'options' => array()
	),
	array(
		'label' => 'Include Bootstrap JS',
		'name' => $slug . 'bootstrap-js',
		'variable' => '',
		'row' => 'default',
		'input' => 'checkbox',
		'default' => 1,
		'description' => 'If checked, then Bootstrap JS will automatically be inserted into the footer of your website. This will allow you to make use of things like tooltips, popovers and modals as well as all other Bootstrap JS functionality.',
		'allow_reset' => false,
		'options' => array()
	),
	array(
		'label' => 'Default Blocks',
		'name' => '',
		'variable' => '',
		'row' => 'default',
		'input' => 'header',
		'default' => '',
		'description' => 'Wordpress includes a number of blocks by default that this plugin also includes. Below you can hide the default Wordpress blocks if needed to stop confusion when selecting blocks on a page.',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => 'Hide Buttons Block',
		'name' => $slug . 'hide-buttons-block',
		'variable' => '',
		'row' => 'default',
		'input' => 'checkbox',
		'default' => 0,
		'description' => 'If checked the default Wordpress block will not display in the page builder.',
		'allow_reset' => false,
		'options' => array()
	),
	array(
		'label' => 'Hide Columns Block',
		'name' => $slug . 'hide-columns-block',
		'variable' => '',
		'row' => 'default',
		'input' => 'checkbox',
		'default' => 0,
		'description' => 'If checked the default Wordpress block will not display in the page builder.',
		'allow_reset' => false,
		'options' => array()
	),
);