<input 
	name="<?php echo esc_attr( $option['name'] ) ?>" 
	type="text" 
	id="<?php echo esc_attr( $option['name'] ) ?>" 
	value="<?php echo esc_attr( $value ) ?>" 
	class="areoi-input-text" 
	data-form-type="other"
	data-default="<?php echo esc_attr( $option['default'] ) ?>"
	placeholder="<?php echo esc_attr( $option['default'] ) ?>"
>
<?php if ( empty( $option['exclude_variables'] ) ) : ?>
	<select class="areoi-select-variable" name="areoi-select-variable">
		<option value="">Populate with variable</option>
	</select>

	<?php if ( !empty( $has_theme_json ) ) : ?>
		<select class="areoi-select-theme-json" name="areoi-select-theme-json">
			<option value="">Populate with theme.json</option>
		</select>
	<?php endif; ?>
<?php endif; ?>