<?php if ( $option['input'] == 'header' ) : ?>

	<tr>
		<th scope="row" colspan="2">
			<h3 id="<?php echo esc_attr( sanitize_title( $option['label'] ) ) ?>" class="areoi-table-header">
				<?php echo esc_attr( $option['label'] ) ?>	
			</h3>

			<?php if ( $option['description'] ) : ?>
				<p style="margin: 1rem 0; font-weight: normal;"><?php echo esc_attr( $option['description'] ) ?></p>
			<?php endif; ?>
		</th>
	</tr>
	
<?php else : ?>
	<tr class="areoi-row-input">
		<th>
			<label for="<?php echo esc_attr( $option['name'] ) ?>">
				<?php echo esc_attr( $option['label'] ) ?>
			</label>
			<div></div>
			<?php if ( !empty( $option['allow_reset'] ) ) : ?>
				<button 
					class="areoi-reset" 
					type="button" 
					data-id="<?php echo esc_attr( $option['name'] ) ?>"
				>
					Reset to Bootstrap default
				</button>
			<?php endif; ?>
		</th>

		<td>
			<?php  
			if ( !empty( $option['input'] ) ) :
				$value 			= get_option( $option['name'], $option['default'] );
				$is_variable 	= ( strpos( $value, '$' ) === false ) && ( strpos( $value, 'theme-json-' ) === false ) ? false : true;
				include( AREOI__PLUGIN_DIR . 'views/inputs/' . $option['input'] . '.php' ); 
			endif;
			?>

			<?php if ( $option['description'] ) : ?>
				<p class="areoi-description" id="<?php echo esc_attr( $option['name'] ) ?>-description">
					<?php echo esc_attr( $option['description'] ) ?> 
				</p>
			<?php endif; ?>
		</td>
	</tr>
<?php endif; ?>