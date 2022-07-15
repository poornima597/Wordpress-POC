<?php if ( !empty( $active_page['sections'] ) ) : ?>

	<?php foreach ( $active_page['sections'] as $section_key => $section ) : ?>
		
		<div 
			class="areoi-card active" 
			style="
				<?php if ( ( sanitize_text_field( !empty( $_GET['section'] ) ) && $section['slug'] == sanitize_text_field( $_GET['section'] ) ) || ( $section_key == 0 && sanitize_text_field( empty( $_GET['section'] ) ) ) ) : ?>
					display:block;
				<?php else : ?>
					display:  none;
				<?php endif; ?>
			">
			
			<div class="areoi-card-body">

				<h2><?php echo esc_attr( $section['name'] ) ?></h2>

				<?php if ( !empty( $section['description'] ) ) : ?>
					<p><?php echo wp_kses_post( $section['description'] ) ?></p>
				<?php endif; ?>

				<?php if ( !empty( $section['options'] ) ) : ?>
					<table class="areoi-form-table form-table" role="presentation">
						<tbody>
							<?php 
							foreach ( $section['options'] as $option_key => $option ) :
								if ( !empty( $option['input'] ) ) :
									include( AREOI__PLUGIN_DIR . 'views/inputs/row.php' ); 
								endif;
							endforeach; 
							?>
						</tbody>
					</table>
				<?php endif; ?>

			</div><!-- .areoi-card-body -->
		</div><!-- .areoi--card -->
	
	<?php endforeach; ?>

<?php endif; ?>