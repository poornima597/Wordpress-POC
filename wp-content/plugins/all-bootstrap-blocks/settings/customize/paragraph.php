<?php
/*
Name: Paragraph
Slug: paragraph
Description: Style p element.
Position: 50
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-paragraph-';

return array(
	array(
		'label' => '$paragraph-margin-bottom',
		'name' => $slug . 'paragraph-margin-bottom',
		'variable' => '$paragraph-margin-bottom',
		'row' => 'default',
		'input' => 'text',
		'default' => '1rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);