<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Caff
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'caff' ); ?></a>

	<?php get_template_part( 'template-parts/header/header-one' ); ?>

	<?php get_template_part( 'template-parts/header/custom-header' ); ?>

	<?php //get_template_part( 'template-parts/header/breadcrumb' ); ?>

	<?php do_action( 'caff_before_content' ); ?>

	<?php
	$show_content = caff_gtm( 'caff_show_homepage_content' );

	if ( $show_content || ! is_front_page() ) : ?>
	<div id="content" class="site-content">
		<div class="container">
			<div class="row">
	<?php endif; ?>
