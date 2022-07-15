<?php  
$get_section = sanitize_text_field( !empty( $_GET['section'] ) ) ? sanitize_text_field( $_GET['section'] ) : false;
?>
<div class="areoi-sidebar">
	<div class="areoi-sidebar__content">
		<h1><img style="display: block;" src="<?php echo esc_url( AREOI__PLUGIN_URI . 'assets/img/areoi-logo-dark.svg' ) ?>" width="150"></h1>

		<ul class="areoi-sidebar__list">
			<?php foreach ( $page['children'] as $child_key => $child) : ?>
				<?php if ( $child_key == 'areoi-dashboard' || get_option( 'areoi-dashboard-global-bootstrap-css', 1 ) == 1 ) : ?>
					<li class="
						areoi-sidebar__link 
						<?php echo esc_attr( $child['slug'] == $active_page['slug'] ? 'active' : '' ) ?>
						<?php echo esc_attr( !empty( $child['sections'] ) && count( $child['sections'] ) > 1 ? 'has-children' : '' ) ?>
					">
						<a href="?page=<?php echo esc_attr( $child['slug'] ) ?>">
							<?php echo esc_attr( $child['name'] ) ?>
						</a>

						<?php if ( !empty( $child['sections'] ) && count( $child['sections'] ) > 1 ) : ?>
							<ul class="areoi-sidebar__sub-list">
								<?php foreach ( $child['sections'] as $section_key => $section ) : ?>
									<li class="areoi-sidebar__sub-link <?php echo esc_attr( ( $section_key == 0 && !$get_section || $section['slug'] == $get_section ) ? 'active' : '' ) ?>">
										<a href="?page=<?php echo esc_attr( $child['slug'] ) ?>&section=<?php echo esc_attr( $section['slug'] ) ?>">
											<?php echo esc_attr( $section['name'] ) ?>
										</a>

										<?php if ( !empty( $section['options'] ) ) : ?>
											<ul class="areoi-sidebar__sub-sub-list">
												<?php foreach ( $section['options'] as $option_key => $option ) : ?>
													<?php if ( $option['input'] == 'header' ) : ?>
														<li class="areoi-sidebar__sub-sub-link">
															<a href="#<?php echo esc_attr( sanitize_title( $option['label'] ) ) ?>"><?php echo esc_attr( $option['label'] ) ?></a>
														</li>
													<?php endif; ?>
												<?php endforeach; ?>
											</ul>
										<?php endif; ?>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</li>
				<?php endif; ?>
			<?php endforeach; ?>
		</ul><!-- .areoi-sidebar__list-->
	</div><!-- .areoi-sidebar__content -->
</div><!-- .areoi-sidebar -->