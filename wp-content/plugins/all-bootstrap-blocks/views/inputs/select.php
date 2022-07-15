<select 
	name="<?php echo esc_attr( $option['name'] ) ?>" 
	type="text" 
	id="<?php echo esc_attr( $option['name'] ) ?>" 
	data-form-type="other"
	data-default="<?php echo esc_attr( $option['default'] ) ?>"
>
	<?php foreach ( $option['options'] as $select_option_key => $select_option ) : ?>
		<option 
			<?php echo esc_attr( ( $value == $select_option['id'] ) || ( !$value && $select_option['id'] == $option['default'] ) ? 'selected="selected"' : '' ) ?> 
			value="<?php echo esc_attr( $select_option['id'] ) ?>" 
		>
			<?php echo esc_attr( $select_option['label'] ) ?>
		</option>
	<?php endforeach; ?>
</select>