<?php
/*
Name: Typography
Slug: typography
Description: Font, line-height, and color for body text, headings, and more.
Position: 20
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-typography-';

return array(
	array(
		'label' => 'Base',
		'name' => '',
		'variable' => '',
		'row' => 'default',
		'input' => 'header',
		'default' => '',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$font-family-sans-serif',
		'name' => $slug . 'font-family-sans-serif',
		'variable' => '$font-family-sans-serif',
		'row' => 'default',
		'input' => 'font',
		'default' => 'system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$font-family-monospace',
		'name' => $slug . 'font-family-monospace',
		'variable' => '$font-family-monospace',
		'row' => 'default',
		'input' => 'font',
		'default' => 'SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$font-family-base',
		'name' => $slug . 'font-family-base',
		'variable' => '$font-family-base',
		'row' => 'default',
		'input' => 'font',
		'default' => 'var(--#{$variable-prefix}font-sans-serif)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$font-family-code',
		'name' => $slug . 'font-family-code',
		'variable' => '$font-family-code',
		'row' => 'default',
		'input' => 'font',
		'default' => 'var(--#{$variable-prefix}font-monospace)',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),

	array(
		'label' => 'Size',
		'name' => '',
		'variable' => '',
		'row' => 'default',
		'input' => 'header',
		'default' => '',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$font-size-root',
		'name' => $slug . 'font-size-root',
		'variable' => '$font-size-root',
		'row' => 'default',
		'input' => 'text',
		'default' => 'null',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$font-size-base',
		'name' => $slug . 'font-size-base',
		'variable' => '$font-size-base',
		'row' => 'default',
		'input' => 'text',
		'default' => '1rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$font-size-sm',
		'name' => $slug . 'font-size-sm',
		'variable' => '$font-size-sm',
		'row' => 'default',
		'input' => 'text',
		'default' => '$font-size-base * .875',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$font-size-lg',
		'name' => $slug . 'font-size-lg',
		'variable' => '$font-size-lg',
		'row' => 'default',
		'input' => 'text',
		'default' => '$font-size-base * 1.25',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),

	array(
		'label' => 'Weight',
		'name' => '',
		'variable' => '',
		'row' => 'default',
		'input' => 'header',
		'default' => '',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$font-weight-lighter',
		'name' => $slug . 'font-weight-lighter',
		'variable' => '$font-weight-lighter',
		'row' => 'default',
		'input' => 'text',
		'default' => 'lighter',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$font-weight-light',
		'name' => $slug . 'font-weight-light',
		'variable' => '$font-weight-light',
		'row' => 'default',
		'input' => 'text',
		'default' => '300',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$font-weight-normal',
		'name' => $slug . 'font-weight-normal',
		'variable' => '$font-weight-normal',
		'row' => 'default',
		'input' => 'text',
		'default' => '400',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$font-weight-bold',
		'name' => $slug . 'font-weight-bold',
		'variable' => '$font-weight-bold',
		'row' => 'default',
		'input' => 'text',
		'default' => '700',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$font-weight-bolder',
		'name' => $slug . 'font-weight-bolder',
		'variable' => '$font-weight-bolder',
		'row' => 'default',
		'input' => 'text',
		'default' => 'bolder',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$font-weight-base',
		'name' => $slug . 'font-weight-base',
		'variable' => '$font-weight-base',
		'row' => 'default',
		'input' => 'text',
		'default' => '$font-weight-normal',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),

	array(
		'label' => 'Line Height',
		'name' => '',
		'variable' => '',
		'row' => 'default',
		'input' => 'header',
		'default' => '',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$line-height-base',
		'name' => $slug . 'line-height-base',
		'variable' => '$line-height-base',
		'row' => 'default',
		'input' => 'text',
		'default' => '1.5',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$line-height-sm',
		'name' => $slug . 'line-height-sm',
		'variable' => '$line-height-sm',
		'row' => 'default',
		'input' => 'text',
		'default' => '1.25',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$line-height-lg',
		'name' => $slug . 'line-height-lg',
		'variable' => '$line-height-lg',
		'row' => 'default',
		'input' => 'text',
		'default' => '2',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),

	array(
		'label' => 'Heading Size',
		'name' => '',
		'variable' => '',
		'row' => 'default',
		'input' => 'header',
		'default' => '',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$h1-font-size',
		'name' => $slug . 'h1-font-size',
		'variable' => '$h1-font-size',
		'row' => 'default',
		'input' => 'text',
		'default' => '$font-size-base * 2.5',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$h2-font-size',
		'name' => $slug . 'h2-font-size',
		'variable' => '$h2-font-size',
		'row' => 'default',
		'input' => 'text',
		'default' => '$font-size-base * 2',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$h3-font-size',
		'name' => $slug . 'h3-font-size',
		'variable' => '$h3-font-size',
		'row' => 'default',
		'input' => 'text',
		'default' => '$font-size-base * 1.75',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$h4-font-size',
		'name' => $slug . 'h4-font-size',
		'variable' => '$h4-font-size',
		'row' => 'default',
		'input' => 'text',
		'default' => '$font-size-base * 1.5',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$h5-font-size',
		'name' => $slug . 'h5-font-size',
		'variable' => '$h5-font-size',
		'row' => 'default',
		'input' => 'text',
		'default' => '$font-size-base * 1.25',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$h6-font-size',
		'name' => $slug . 'h6-font-size',
		'variable' => '$h6-font-size',
		'row' => 'default',
		'input' => 'text',
		'default' => '$font-size-base',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),

	array(
		'label' => 'Headings',
		'name' => '',
		'variable' => '',
		'row' => 'default',
		'input' => 'header',
		'default' => '',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$headings-margin-bottom',
		'name' => $slug . 'headings-margin-bottom',
		'variable' => '$headings-margin-bottom',
		'row' => 'default',
		'input' => 'text',
		'default' => '$spacer * .5',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$headings-font-family',
		'name' => $slug . 'headings-font-family',
		'variable' => '$headings-font-family',
		'row' => 'default',
		'input' => 'text',
		'default' => 'null',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$headings-font-style',
		'name' => $slug . 'headings-font-style',
		'variable' => '$headings-font-style',
		'row' => 'default',
		'input' => 'text',
		'default' => 'null',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$headings-font-weight',
		'name' => $slug . 'headings-font-weight',
		'variable' => '$headings-font-weight',
		'row' => 'default',
		'input' => 'text',
		'default' => '500',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$headings-line-height',
		'name' => $slug . 'headings-line-height',
		'variable' => '$headings-line-height',
		'row' => 'default',
		'input' => 'text',
		'default' => '1.2',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$headings-color',
		'name' => $slug . 'headings-color',
		'variable' => '$headings-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'null',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),

	array(
		'label' => 'Display',
		'name' => '',
		'variable' => '',
		'row' => 'default',
		'input' => 'header',
		'default' => '',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$display-font-weight',
		'name' => $slug . 'display-font-weight',
		'variable' => '$display-font-weight',
		'row' => 'default',
		'input' => 'text',
		'default' => '300',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$display-line-height',
		'name' => $slug . 'display-line-height',
		'variable' => '$display-line-height',
		'row' => 'default',
		'input' => 'text',
		'default' => '$headings-line-height',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),

	array(
		'label' => 'Blockquote',
		'name' => '',
		'variable' => '',
		'row' => 'default',
		'input' => 'header',
		'default' => '',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$blockquote-margin-y',
		'name' => $slug . 'blockquote-margin-y',
		'variable' => '$blockquote-margin-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '$spacer',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$blockquote-font-size',
		'name' => $slug . 'blockquote-font-size',
		'variable' => '$blockquote-font-size',
		'row' => 'default',
		'input' => 'text',
		'default' => '$font-size-base * 1.25',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$blockquote-footer-color',
		'name' => $slug . 'blockquote-footer-color',
		'variable' => '$blockquote-footer-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '$gray-600',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$blockquote-footer-font-size',
		'name' => $slug . 'blockquote-footer-font-size',
		'variable' => '$blockquote-footer-font-size',
		'row' => 'default',
		'input' => 'text',
		'default' => '$small-font-size',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),

	array(
		'label' => 'HR',
		'name' => '',
		'variable' => '',
		'row' => 'default',
		'input' => 'header',
		'default' => '',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$hr-margin-y',
		'name' => $slug . 'hr-margin-y',
		'variable' => '$hr-margin-y',
		'row' => 'default',
		'input' => 'text',
		'default' => '$spacer',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$hr-color',
		'name' => $slug . 'hr-color',
		'variable' => '$hr-color',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => 'inherit',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$hr-height',
		'name' => $slug . 'hr-height',
		'variable' => '$hr-height',
		'row' => 'default',
		'input' => 'text',
		'default' => '$border-width',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$hr-opacity',
		'name' => $slug . 'hr-opacity',
		'variable' => '$hr-opacity',
		'row' => 'default',
		'input' => 'text',
		'default' => '.25',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),

	array(
		'label' => 'Legend',
		'name' => '',
		'variable' => '',
		'row' => 'default',
		'input' => 'header',
		'default' => '',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$legend-margin-bottom',
		'name' => $slug . 'legend-margin-bottom',
		'variable' => '$legend-margin-bottom',
		'row' => 'default',
		'input' => 'text',
		'default' => '.5rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$legend-font-size',
		'name' => $slug . 'legend-font-size',
		'variable' => '$legend-font-size',
		'row' => 'default',
		'input' => 'text',
		'default' => '1.5rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$legend-font-weight',
		'name' => $slug . 'legend-font-weight',
		'variable' => '$legend-font-weight',
		'row' => 'default',
		'input' => 'text',
		'default' => 'null',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),

	array(
		'label' => 'Miscallaneous',
		'name' => '',
		'variable' => '',
		'row' => 'default',
		'input' => 'header',
		'default' => '',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$lead-font-size',
		'name' => $slug . 'lead-font-size',
		'variable' => '$lead-font-size',
		'row' => 'default',
		'input' => 'text',
		'default' => '$font-size-base * 1.25',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$lead-font-weight',
		'name' => $slug . 'lead-font-weight',
		'variable' => '$lead-font-weight',
		'row' => 'default',
		'input' => 'text',
		'default' => '300',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$small-font-size',
		'name' => $slug . 'small-font-size',
		'variable' => '$small-font-size',
		'row' => 'default',
		'input' => 'text',
		'default' => '.875em',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$sub-sup-font-size',
		'name' => $slug . 'sub-sup-font-size',
		'variable' => '$sub-sup-font-size',
		'row' => 'default',
		'input' => 'text',
		'default' => '.75em',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$text-muted',
		'name' => $slug . 'text-muted',
		'variable' => '$text-muted',
		'row' => 'default',
		'input' => 'text',
		'default' => '$gray-600',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$initialism-font-size',
		'name' => $slug . 'initialism-font-size',
		'variable' => '$initialism-font-size',
		'row' => 'default',
		'input' => 'text',
		'default' => '$small-font-size',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$mark-padding',
		'name' => $slug . 'mark-padding',
		'variable' => '$mark-padding',
		'row' => 'default',
		'input' => 'text',
		'default' => '.2em',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$dt-font-weight',
		'name' => $slug . 'dt-font-weight',
		'variable' => '$dt-font-weight',
		'row' => 'default',
		'input' => 'text',
		'default' => '$font-weight-bold',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$nested-kbd-font-weight',
		'name' => $slug . 'nested-kbd-font-weight',
		'variable' => '$nested-kbd-font-weight',
		'row' => 'default',
		'input' => 'text',
		'default' => '$font-weight-bold',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$list-inline-padding',
		'name' => $slug . 'list-inline-padding',
		'variable' => '$list-inline-padding',
		'row' => 'default',
		'input' => 'text',
		'default' => '.5rem',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => '$mark-bg',
		'name' => $slug . 'mark-bg',
		'variable' => '$mark-bg',
		'row' => 'default',
		'input' => 'color-picker',
		'default' => '#fcf8e3',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
);