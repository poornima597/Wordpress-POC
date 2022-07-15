<?php
/**
 * Displays header site branding
 *
 * @package Caff
 */

$caff_enable = caff_gtm( 'caff_header_image_visibility' );

if ( caff_display_section( $caff_enable ) ) : ?>
<div id="custom-header">
	<?php is_header_video_active() && has_header_video() ? the_custom_header_markup() : ''; ?>

	<div class="custom-header-content">
		<div class="container">
			<?php caff_header_title(); ?>
		</div> <!-- .container -->
	</div>  <!-- .custom-header-content -->
</div>
<?php
endif;
