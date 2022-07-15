<div class="areoi-variable-row <?php echo esc_attr( $is_variable ? 'areoi-is-variable' : '' ) ?>">
	<div class="areoi-field areoi-field-visual">
		<input 
			name="<?php echo esc_attr( $option['name'] ) ?>-color-picker" 
			type="text"  
			value="<?php echo esc_attr( $is_variable ? '' : $value ) ?>" 
			class="regular-text areoi-colour-picker" 
			data-form-type="other"
			data-default="<?php echo esc_attr( $option['default'] ) ?>"
			data-alpha-enabled="true"
		>
		<div></div>
		<button type="button" class="areoi-toggle-field">Use SASS variable</button>
	</div>

	<div class="areoi-field areoi-field-variable">
		<?php include( AREOI__PLUGIN_DIR . 'views/inputs/text.php' ); ?>
		<div></div>
		<button type="button" class="areoi-toggle-field">Use color picker</button>
	</div>
</div>