<label for="<?php echo esc_attr( $option['name'] ) ?>">
	<input 
		name="<?php echo esc_attr( $option['name'] ) ?>" 
		type="checkbox" 
		id="<?php echo esc_attr( $option['name'] ) ?>" 
		value="1" 
		data-form-type="other"
		<?php echo esc_attr( $value ? 'checked="checked"' : '' ) ?>
		data-default="<?php echo esc_attr( $option['default'] ) ?>"
	>
</label>