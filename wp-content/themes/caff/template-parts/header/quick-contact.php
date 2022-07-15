<?php
/**
 * Header Search
 *
 * @package Caff
 */

$caff_phone      = caff_gtm( 'caff_header_phone' );
$caff_email      = caff_gtm( 'caff_header_email' );
$caff_address    = caff_gtm( 'caff_header_address' );
$caff_open_hours = caff_gtm( 'caff_header_open_hours' );

if ( $caff_phone || $caff_email || $caff_address || $caff_open_hours ) : ?>
	<div class="inner-quick-contact">
		<ul>
			<?php if ( $caff_phone ) : ?>
				<li class="quick-call">
					<span><?php esc_html_e( 'Phone', 'caff' ); ?></span><a href="tel:<?php echo preg_replace( '/\s+/', '', esc_attr( $caff_phone ) ); ?>"><?php echo esc_html( $caff_phone ); ?></a> </li>
			<?php endif; ?>

			<?php if ( $caff_email ) : ?>
				<li class="quick-email"><span><?php esc_html_e( 'Email', 'caff' ); ?></span><a href="<?php echo esc_url( 'mailto:' . esc_attr( antispambot( $caff_email ) ) ); ?>"><?php echo esc_html( antispambot( $caff_email ) ); ?></a> </li>
			<?php endif; ?>

			<?php if ( $caff_address ) : ?>
				<li class="quick-address"><span><?php esc_html_e( 'Address', 'caff' ); ?></span><?php echo esc_html( $caff_address ); ?></li>
			<?php endif; ?>

			<?php if ( $caff_open_hours ) : ?>
				<li class="quick-open-hours"><span><?php esc_html_e( 'Open Hours', 'caff' ); ?></span><?php echo esc_html( $caff_open_hours ); ?></li>
			<?php endif; ?>
		</ul>
	</div><!-- .inner-quick-contact -->
<?php endif; ?>

