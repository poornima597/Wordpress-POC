<?php
/**
 * Adds Theme page
 *
 * @package JetBlack
 */

function caff_about_admin_style( $hook ) {
	if ( 'appearance_page_caff-about' === $hook ) {
		wp_enqueue_style( 'caff-theme-about', get_theme_file_uri( 'css/theme-about.css' ), null, '1.0' );
	}
}
add_action( 'admin_enqueue_scripts', 'caff_about_admin_style' );

/**
 * Add theme page
 */
function caff_menu() {
	add_theme_page( esc_html__( 'About Theme', 'caff' ), esc_html__( 'About Theme', 'caff' ), 'edit_theme_options', 'caff-about', 'caff_about_display' );
}
add_action( 'admin_menu', 'caff_menu' );

/**
 * Display About page
 */
function caff_about_display() {
	$theme = wp_get_theme();
	?>
	<div class="wrap about-wrap full-width-layout">
		<h1><?php echo esc_html( $theme ); ?></h1>
		<div class="about-theme">
			<div class="theme-description">
				<p class="about-text">
					<?php
					// Remove last sentence of description.
					$description = explode( '. ', $theme->get( 'Description' ) );

					array_pop( $description );

					$description = implode( '. ', $description );

					echo esc_html( $description . '.' );
				?></p>
				<p class="actions">
					<a href="https://fireflythemes.com/themes/caff" class="button button-secondary" target="_blank"><?php esc_html_e( 'Info', 'caff' ); ?></a>

					<a href="https://fireflythemes.com/documentation/caff/" class="button button-primary" target="_blank"><?php esc_html_e( 'Documentation', 'caff' ); ?></a>

					<a href="https://demo.fireflythemes.com/caff" class="button button-primary green" target="_blank"><?php esc_html_e( 'Demo', 'caff' ); ?></a>

					<a href="https://fireflythemes.com/support" class="button button-secondary" target="_blank"><?php esc_html_e( 'Support', 'caff' ); ?></a>
				</p>
			</div>

			<div class="theme-screenshot">
				<img src="<?php echo esc_url( $theme->get_screenshot() ); ?>" />
			</div>

		</div>

		<nav class="nav-tab-wrapper wp-clearfix" aria-label="<?php esc_attr_e( 'Secondary menu', 'caff' ); ?>">
			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'caff-about' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['page'] ) && 'caff-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'About', 'caff' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'caff-about', 'tab' => 'changelog' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Changelog', 'caff' ); ?></a>
		</nav>

		<?php caff_main_screen(); ?>

		<div class="return-to-dashboard">
			<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
				<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
					<?php is_multisite() ? esc_html_e( 'Return to Updates', 'caff' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'caff' ); ?>
				</a> |
			<?php endif; ?>
			<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'caff' ) : esc_html_e( 'Go to Dashboard', 'caff' ); ?></a>
		</div>
	</div>
	<?php
}

/**
 * Output the main about screen.
 */
function caff_main_screen() {
	if ( isset( $_GET['page'] ) && 'caff-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) {
	?>
		<div class="feature-section two-col">
			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'caff' ); ?></h2>
				<p><?php esc_html_e( 'All Theme Options are available via Customize screen.', 'caff' ) ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customize', 'caff' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Got theme support question?', 'caff' ); ?></h2>
				<p><?php esc_html_e( 'Get genuine support from genuine people. Whether it\'s customization or compatibility, our seasoned developers deliver tailored solutions to your queries.', 'caff' ) ?></p>
				<p><a href="https://fireflythemes.com/support" class="button button-primary"><?php esc_html_e( 'Support Forum', 'caff' ); ?></a></p>
			</div>
		</div>
	<?php
	}
}
