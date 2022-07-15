<?php
/*-------------Custom SMTP Send Mail Starts Here----------------------------*/

use PHPMailer\PHPMailer\PHPMailer;
include(get_stylesheet_directory().'/contact.php');

add_action( 'phpmailer_init', 'smtp_mailer_config_new', 10, 1);
function smtp_mailer_config_new(PHPMailer $mail){
    $mail->IsSMTP();  // Telling the class to use SMTP
    $mail->SMTPDebug = 2;
    $mail->Mailer = "smtp";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Host = gethostbyname(SMTP_HOST);
    $mail->Port = 587;
    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
    );
    $mail->SMTPAuth = true; // Turn ON SMTP authentication
    $mail->Username = SMTP_USERNAME; // SMTP Username
    $mail->Password = SMTP_PASSWORD; // SMTP Password
    $mail->From = SMTP_USERNAME; // SMTP 
    $mail->Priority = 1;
}

add_action('wp_mail_failed', 'smtplog_mailer_errors', 10, 1);

function smtplog_mailer_errors( $wp_error ){ 
 print_r( $wp_error->get_error_message());
} 
add_shortcode('mailtest_sc','mailtest_code');

//add js for email contact form
function custom_schedule_js()
{    
    wp_enqueue_script( 'email_validation.js', get_stylesheet_directory_uri().'/js/email_validation.js', array( 'jquery'), '1.0.0', true );
    wp_localize_script( 'email_validation.js', 'Myajax', array(
   'ajaxurl' => admin_url( 'admin-ajax.php' ),
    ));
}
add_action( 'wp_enqueue_scripts', 'custom_schedule_js' );

 
add_action('wp_ajax_siteWideMessage', 'siteWideMessage');
add_action( 'wp_ajax_nopriv_siteWideMessage', 'siteWideMessage' );
function get_email_body_content() {
    $body = '<!DOCTYPE html>
	<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
	<head>
		<meta charset="utf-8"> <!-- utf-8 works for most cases -->
		<meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn"t be necessary -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
		<meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
		<title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->
	
	
		<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" rel="stylesheet">
	
		<!-- CSS Reset : BEGIN -->
	<style>
	
	html,
	body {
		margin: 0 auto !important;
		padding: 0 !important;
		height: 100% !important;
		width: 100% !important;
		background: #f1f1f1;
	}
	
	/* What it does: Stops email clients resizing small text. */
	* {
		-ms-text-size-adjust: 100%;
		-webkit-text-size-adjust: 100%;
	}
	
	/* What it does: Centers email on Android 4.4 */
	div[style*="margin: 16px 0"] {
		margin: 0 !important;
	}
	
	/* What it does: Stops Outlook from adding extra spacing to tables. */
	table,
	td {
		mso-table-lspace: 0pt !important;
		mso-table-rspace: 0pt !important;
	}
	
	/* What it does: Fixes webkit padding issue. */
	table {
		border-spacing: 0 !important;
		border-collapse: collapse !important;
		table-layout: fixed !important;
		margin: 0 auto !important;
	}
	
	/* What it does: Uses a better rendering method when resizing images in IE. */
	img {
		-ms-interpolation-mode:bicubic;
	}
	
	/* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
	a {
		text-decoration: none;
	}
	
	/* What it does: A work-around for email clients meddling in triggered links. */
	*[x-apple-data-detectors],  /* iOS */
	.unstyle-auto-detected-links *,
	.aBn {
		border-bottom: 0 !important;
		cursor: default !important;
		color: inherit !important;
		text-decoration: none !important;
		font-size: inherit !important;
		font-family: inherit !important;
		font-weight: inherit !important;
		line-height: inherit !important;
	}
	
	/* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
	.a6S {
		display: none !important;
		opacity: 0.01 !important;
	}
	
	/* What it does: Prevents Gmail from changing the text color in conversation threads. */
	.im {
		color: inherit !important;
	}
	
	/* If the above doesn"t work, add a .g-img class to any image in question. */
	img.g-img + div {
		display: none !important;
	}
	
	/* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
	/* Create one of these media queries for each additional viewport size you"d like to fix */
	
	/* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
	@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
		u ~ div .email-container {
			min-width: 320px !important;
		}
	}
	/* iPhone 6, 6S, 7, 8, and X */
	@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
		u ~ div .email-container {
			min-width: 375px !important;
		}
	}
	/* iPhone 6+, 7+, and 8+ */
	@media only screen and (min-device-width: 414px) {
		u ~ div .email-container {
			min-width: 414px !important;
		}
	}
	
	</style>
	
		<!-- CSS Reset : END -->
	
		<!-- Progressive Enhancements : BEGIN -->
	<style>
	
	.primary{
		background: #f3a333;
	}
	
	.bg_white{
		background: #ffffff;
	}
	.bg_light{
		background: #fafafa;
	}
	.bg_black{
		background: #000000;
	}
	.bg_dark{
		background: rgba(0,0,0,.8);
	}
	.email-section{
		padding:2.5em;
	}
	
	/*BUTTON*/
	.btn{
		padding: 10px 15px;
	}
	.btn.btn-primary{
		border-radius: 30px;
		background: #f3a333;
		color: #ffffff;
	}
	
	
	
	h1,h2,h3,h4,h5,h6{
		font-family: "Playfair Display", serif;
		color: #000000;
		margin-top: 0;
	}
	
	body{
		font-family: "Montserrat", sans-serif;
		font-weight: 400;
		font-size: 15px;
		line-height: 1.8;
		color: rgba(0,0,0,.4);
	}
	
	a{
		color: #f3a333;
	}
	
	table{
	}
	/*LOGO*/
	
	.logo h1{
		margin: 0;
	}
	.logo h1 a{
		color: #000;
		font-size: 20px;
		font-weight: 700;
		text-transform: uppercase;
		font-family: "Montserrat", sans-serif;
	}
	
	/*HERO*/
	.hero{
		position: relative;
	}
	.hero img{
	
	}
	.hero .text{
		color: rgba(255,255,255,.8);
	}
	.hero .text h2{
		color: #ffffff;
		font-size: 30px;
		margin-bottom: 0;
	}
	
	
	/*HEADING SECTION*/
	.heading-section{
	}
	.heading-section h2{
		color: #000000;
		font-size: 28px;
		margin-top: 0;
		line-height: 1.4;
	}
	.heading-section .subheading{
		margin-bottom: 20px !important;
		display: inline-block;
		font-size: 13px;
		text-transform: uppercase;
		letter-spacing: 2px;
		color: rgba(0,0,0,.4);
		position: relative;
	}
	.heading-section .subheading::after{
		position: absolute;
		left: 0;
		right: 0;
		bottom: -10px;
		content: "";
		width: 100%;
		height: 2px;
		background: #f3a333;
		margin: 0 auto;
	}
	
	.heading-section-white{
		color: rgba(255,255,255,.8);
	}
	.heading-section-white h2{
		font-size: 28px;
		font-family: 
		line-height: 1;
		padding-bottom: 0;
	}
	.heading-section-white h2{
		color: #ffffff;
	}
	.heading-section-white .subheading{
		margin-bottom: 0;
		display: inline-block;
		font-size: 13px;
		text-transform: uppercase;
		letter-spacing: 2px;
		color: rgba(255,255,255,.4);
	}
	
	
	.icon{
		text-align: center;
	}
	.icon img{
	}
	
	
	/*SERVICES*/
	.text-services{
		padding: 10px 10px 0; 
		text-align: center;
	}
	.text-services h3{
		font-size: 20px;
	}
	
	/*BLOG*/
	.text-services .meta{
		text-transform: uppercase;
		font-size: 14px;
	}
	
	/*TESTIMONY*/
	.text-testimony .name{
		margin: 0;
	}
	.text-testimony .position{
		color: rgba(0,0,0,.3);
	
	}
	
	
	/*VIDEO*/
	.img{
		width: 100%;
		height: auto;
		position: relative;
	}
	.img .icon{
		position: absolute;
		top: 50%;
		left: 0;
		right: 0;
		bottom: 0;
		margin-top: -25px;
	}
	.img .icon a{
		display: block;
		width: 60px;
		position: absolute;
		top: 0;
		left: 50%;
		margin-left: -25px;
	}
	
	
	
	/*COUNTER*/
	.counter-text{
		text-align: center;
	}
	.counter-text .num{
		display: block;
		color: #ffffff;
		font-size: 34px;
		font-weight: 700;
	}
	.counter-text .name{
		display: block;
		color: rgba(255,255,255,.9);
		font-size: 13px;
	}
	
	
	/*FOOTER*/
	
	.footer{
		color: rgba(255,255,255,.5);
	
	}
	.footer .heading{
		color: #ffffff;
		font-size: 20px;
	}
	.footer ul{
		margin: 0;
		padding: 0;
	}
	.footer ul li{
		list-style: none;
		margin-bottom: 10px;
	}
	.footer ul li a{
		color: rgba(255,255,255,1);
	}
	
	
	@media screen and (max-width: 500px) {
	
		.icon{
			text-align: left;
		}
	
		.text-services{
			padding-left: 0;
			padding-right: 20px;
			text-align: left;
		}
	
	}
	
	</style>
	
	
	</head>
	
	<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #222222;">
		<center style="width: 100%; background-color: #f1f1f1;">
		<div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
		  &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
		</div>
		<div style="max-width: 600px; margin: 0 auto;" class="email-container">
			<!-- BEGIN BODY -->
		  <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
			  <tr>
			  <td class="bg_white logo" style="padding: 1em 2.5em; text-align: center">
				<h1><a href="#">PV Cafe</a></h1>
			  </td>
			  </tr><!-- end tr -->
					<tr>
			  <td valign="middle" class="hero" style="background-image: url(https://localhost/Learning-Wordpress/wordpress-POC/wp-content/themes/caff/images/bg_1.jpg);background-size: cover; height: 400px">
				<table>
					<tr>
						<td>
							<div class="text" style="padding: 0 3em; text-align: center;">
								<h2>We Serve Healthy &amp; Delicious Foods</h2>
								<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
								<p><a href="#" class="btn btn-primary">Get Your Order Here!</a></p>
							</div>
						</td>
					</tr>
				</table>
			  </td>
			  </tr><!-- end tr -->
			  <tr>
				  <td class="bg_white">
					<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
					  <tr>
						<td class="bg_dark email-section" style="text-align:center;">
							<div class="heading-section heading-section-white">
							  <h2>Welcome To PV Cafe</h2>
							  <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
							</div>
						</td>
					  </tr><!-- end: tr -->
					  <tr>
						<td class="bg_white email-section">
							<div class="heading-section" style="text-align: center; padding: 0 30px;">
							  <h2>Our Services</h2>
							  <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
							</div>
							<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
						  <td valign="top" width="50%" style="padding-top: 20px;">
							<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
							  <tr>
								<td class="icon">
								  <img src="https://localhost/Learning-Wordpress/wordpress-POC/wp-content/themes/caff/images/001-diet.png" alt="" style="width: 60px; max-width: 600px; height: auto; margin: auto; display: block;">
								</td>
							  </tr>
							  <tr>
								<td class="text-services">
									<h3>Healthy Foods</h3>
									 <p>Far far away, behind the word mountains, far from the countries</p>
								</td>
							  </tr>
							</table>
						  </td>
						  <td valign="top" width="50%" style="padding-top: 20px;">
							<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
							  <tr>
								<td class="icon">
								  <img src="https://localhost/Learning-Wordpress/wordpress-POC/wp-content/themes/caff/images/003-recipe-book.png" alt="" style="width: 60px; max-width: 600px; height: auto; margin: auto; display: block;">
								</td>
							  </tr>
							  <tr>
								<td class="text-services">
									<h3>Original Recipes</h3>
								  <p>Far far away, behind the word mountains, far from the countries</p>
								</td>
							  </tr>
							</table>
						  </td>
						</tr>
							</table>
						</td>
					  </tr><!-- end: tr -->
					  <tr>
						<td class="bg_light email-section" style="text-align:center;">
							<table>
								<tr>
									<td class="img">
										<table>
											<tr>
												<td>
													<img src="https://localhost/Learning-Wordpress/wordpress-POC/wp-content/themes/caff/images/bg_2.jpg" width="600" height="" alt="alt_text" border="0" style="width: 100%; max-width: 600px; height: auto; margin: auto; display: block;" class="g-img">
												</td>
											</tr>
										</table>
										<div class="icon">
											<a href="#">
									<img src="https://localhost/Learning-Wordpress/wordpress-POC/wp-content/themes/caff/images/002-play-button.png" alt="" style="width: 60px; max-width: 600px; height: auto; margin: auto; display: block;">
								  </a>
							  </div>
									</td>
								</tr>							
							</table>
						</td>
					  </tr><!-- end: tr -->					 
					</table>	
				  </td>
				</tr><!-- end:tr -->
		  <!-- 1 Column Text + Button : END -->
		  </table>	 
	
		</div>
	  </center>
	</body>
	</html>';
    return $body;
}
function siteWideMessage() {
   
    if ( empty( $_POST["name"] ) ) {
        echo "Insert your name please";
        wp_die();
    }
 
    if ( empty( $_POST["email"]) ) {
        echo 'Insert your email please';
        wp_die();
    }

    // $site_title = get_bloginfo( 'name' );
    // $site_url = get_bloginfo( 'url' );
    $to = $_POST["email"]; //sendto@example.com
    $subject = 'PV Cafe';
    $body = get_email_body_content();
    $headers = array('Content-Type: text/html; charset=UTF-8');
    $headers[] = 'From: <'.SMTP_USERNAME.'>';
    wp_mail( $to, $subject, $body, $headers );
    
   // echo "Done";
    wp_die();
}

/*-------------Custom SMTP Send Mail Ends Here----------------------------*/

/**
 * Caff functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Caff
 */

/**
 * Returns theme mod value saved for option merging with default option if available.
 * @since 1.0
 */
function caff_gtm( $option ) {
	// Get our Customizer defaults
	$defaults = apply_filters( 'caff_customizer_defaults', true );

	return isset( $defaults[ $option ] ) ? get_theme_mod( $option, $defaults[ $option ] ) : get_theme_mod( $option );
}

if ( ! function_exists( 'caff_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function caff_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Caff, use a find and replace
		 * to change 'caff' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'caff', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// Used in archive content, featured content.
		set_post_thumbnail_size( 825, 620, false );

		// Used in slider.
		add_image_size( 'caff-slider', 1920, 1000, false );

		// Used in hero content.
		add_image_size( 'caff-hero', 600, 650, false );

		// Used in portfolio, team.
		add_image_size( 'caff-portfolio', 400, 450, false );

		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary Menu', 'caff' ),
			'social' => esc_html__( 'Social Menu', 'caff' ),
		) );


		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'caff_custom_background_args', array(
			'default-color' => '000000',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// Add theme editor style
		add_editor_style( array( 'css/editor-style.css' ) );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'caff_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 */
function caff_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'caff_content_width', 1230 );
}
add_action( 'after_setup_theme', 'caff_content_width', 0 );

if ( ! function_exists( 'caff_custom_content_width' ) ) :
	/**
	 * Custom content width.
	 *
	 * @since 1.0
	 */
	function caff_custom_content_width() {
		$layout  = caff_get_theme_layout();

		if ( 'no-sidebar-full-width' !== $layout ) {
			$GLOBALS['content_width'] = apply_filters( 'caff_content_width', 890 );
		}
	}
endif;
add_filter( 'template_redirect', 'caff_custom_content_width' );
add_filter( 'auth_cookie_expiration', 'keep_me_logged_in_for_1_year' );

function keep_me_logged_in_for_1_year( $expirein ) {
    return 31556926; // 1 year in seconds
}
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function caff_widgets_init() {
	$args = array(
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	);

	register_sidebar( array(
		'name'        => esc_html__( 'Sidebar', 'caff' ),
		'id'          => 'sidebar-1',
		'description' => esc_html__( 'Add widgets here.', 'caff' ),
		) + $args
	);

	register_sidebar( array(
		'name'        => esc_html__( 'Footer 1', 'caff' ),
		'id'          => 'sidebar-2',
		'description' => esc_html__( 'Add widgets here to appear in your footer.', 'caff' ),
		) + $args
	);

	register_sidebar( array(
		'name'        => esc_html__( 'Footer 2', 'caff' ),
		'id'          => 'sidebar-3',
		'description' => esc_html__( 'Add widgets here to appear in your footer.', 'caff' ),
		) + $args
	);

	register_sidebar( array(
		'name'        => esc_html__( 'Footer 3', 'caff' ),
		'id'          => 'sidebar-4',
		'description' => esc_html__( 'Add widgets here to appear in your footer.', 'caff' ),
		) + $args
	);
}
add_action( 'widgets_init', 'caff_widgets_init' );

/**
 * Count the number of footer sidebars to enable dynamic classes for the footer
 *
 * @since 1.0
 */
function caff_footer_sidebar_class() {
	$count = 0;

	if ( is_active_sidebar( 'sidebar-2' ) ) {
		$count++;
	}

	if ( is_active_sidebar( 'sidebar-3' ) ) {
		$count++;
	}

	if ( is_active_sidebar( 'sidebar-4' ) ) {
		$count++;
	}

	$class = '';

	switch ( $count ) {
		case '1':
			$class = 'one';
			break;
		case '2':
			$class = 'two';
			break;
		case '3':
			$class = 'three';
			break;
	}

	if ( $class ) {
		echo 'class="widget-area footer-widget-area ' . $class . '"'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}



if ( ! function_exists( 'caff_fonts_url' ) ) :
	/**
	 * Register Google fonts for FF Multipurpose
	 *
	 * Create your own caff_fonts_url() function to override in a child theme.
	 *
	 * @return string Google fonts URL for the theme.
	 *
	 * @since 0.1
	 */
	function caff_fonts_url() {
		$fonts_url = '';

		/* Translators: If there are characters in your language that are not
		* supported by Heebo, translate this to 'off'. Do not translate
		* into your own language.
		*/
		$poppins = _x( 'on', 'Poppins font: on or off', 'caff' );
		$great_vibes = _x( 'on', 'Great Vibes font: on or off', 'caff' );
		$roboto_condensed = _x( 'on', 'Roboto Condensed font: on or off', 'caff' );

		if ( 'off' !== $roboto_condensed && 'off' !== $great_vibes && 'off' !== $poppins ) {
			$font_families = array();

			if ( 'off' !== $roboto_condensed ) {
				$font_families[] = 'Roboto Condensed:300,400,500,600,700';
			}

			if ( 'off' !== $great_vibes ) {
				$font_families[] = 'Great Vibes';
			}

			if ( 'off' !== $poppins ) {
				$font_families[] = 'Poppins:300,400,500,600,700';
			}

			$query_args = array(
				'family' => urlencode( implode( '|', $font_families ) ),
				'subset' => urlencode( 'latin,latin-ext' ),
			);

			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		}

		// Load Google fonts from Local.
		require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

		return esc_url( wptt_get_webfont_url( $fonts_url ) );
	}
endif;

/**
 * Enqueue scripts and styles.
 */
function caff_scripts() {
	$min  = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	// FontAwesome.
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome/css/all' . $min . '.css', array(), '5.15.3', 'all' );

	// Theme stylesheet.
	wp_enqueue_style( 'caff-style', get_stylesheet_uri(), array(), caff_get_file_mod_date( 'style.css' ) );

	// Add google fonts.
	wp_enqueue_style( 'caff-fonts', caff_fonts_url(), array(), null );

	// Theme block stylesheet.
	wp_enqueue_style( 'caff-block-style', get_template_directory_uri() . '/css/blocks' . $min . '.css', array( 'caff-style' ), caff_get_file_mod_date( 'css/blocks' . $min . '.css' ) );

	$scripts = array(
		'caff-skip-link-focus-fix' => array(
			'src'      => '/js/skip-link-focus-fix' . $min . '.js',
			'deps'      => array(),
			'in_footer' => true,
		),
		'caff-keyboard-image-navigation' => array(
			'src'      => '/js/keyboard-image-navigation' . $min . '.js',
			'deps'      => array(),
			'in_footer' => true,
		),
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	$deps = array( 'jquery', 'masonry' );

	$enable_food_menu = caff_gtm( 'caff_food_menu_visibility' );

	if ( caff_display_section( $enable_food_menu ) ) {
		$deps[] = 'jquery-ui-tabs';
	}

	$scripts['caff-script'] = array(
		'src'       => '/js/functions' . $min . '.js',
		'deps'      => $deps,
		'in_footer' => true,
	);

	// Slider Scripts.
	$enable_slider                  = caff_gtm( 'caff_slider_visibility' );

	if ( caff_display_section( $enable_slider ) ) {
		wp_enqueue_style( 'swiper-css', get_template_directory_uri() . '/css/swiper' . $min . '.css', array(), caff_get_file_mod_date( '/css/swiper' . $min . '.css' ), false );

		$scripts['swiper'] = array(
			'src'      => '/js/swiper' . $min . '.js',
			'deps'      => null,
			'in_footer' => true,
		);

		$scripts['swiper-custom'] = array(
			'src'      => '/js/swiper-custom' . $min . '.js',
			'deps'      => array( 'swiper' ),
			'in_footer' => true,
		);
	}

	foreach ( $scripts as $handle => $script ) {
		wp_enqueue_script( $handle, get_theme_file_uri( $script['src'] ), $script['deps'], caff_get_file_mod_date( $script['src'] ), $script['in_footer'] );
	}

	wp_localize_script( 'caff-script', 'caffScreenReaderText', array(
		'expand'   => esc_html__( 'expand child menu', 'caff' ),
		'collapse' => esc_html__( 'collapse child menu', 'caff' ),
	) );

	if ( caff_display_section( $enable_slider ) ) {
		// Localize the script with new data.
		$slider_options = array(
			'slider'      => array(
				'autoplay'      => esc_js( caff_gtm( 'caff_slider_autoplay' ) ),
				'autoplayDelay' => esc_js( caff_gtm( 'caff_slider_autoplay_delay' ) ),
				'pauseOnHover'  => esc_js( caff_gtm( 'caff_slider_pause_on_hover' ) ),
			),
		);

		wp_localize_script( 'swiper-custom', 'caffSliderOptions', $slider_options );
	}
}
add_action( 'wp_enqueue_scripts', 'caff_scripts' );

/**
 * Get file modified date
 */
function caff_get_file_mod_date( $file ) {
	return date( 'Ymd-Gis', filemtime( get_theme_file_path( $file ) ) );
}

/**
 * Enqueue editor styles for Gutenberg
 */
function caff_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'caff-block-editor-style', trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'css/editor-blocks.css' );

	// Add custom fonts.
	wp_enqueue_style( 'caff-fonts', caff_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'caff_block_editor_styles' );

/**
 * Implement the Custom Header feature.
 */
require get_theme_file_path( '/inc/custom-header.php' );

/**
 * Breadcrumb.
 */
require get_theme_file_path( '/inc/breadcrumb.php' );

/**
 * Custom template tags for this theme.
 */
require get_theme_file_path( '/inc/template-tags.php' );

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_theme_file_path( '/inc/customizer/customizer.php' );

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_theme_file_path( '/inc/jetpack.php' );
}

/**
 * Load Theme About Page
 */
require get_parent_theme_file_path( '/inc/theme-about.php' );



