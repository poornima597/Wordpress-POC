<?php  
$fonts = array(
	'Roboto',
	'Open Sans',
	'Lato',
	'Montserrat',
	'Oswald',
	'Source Sans Pro',
	'Roboto Condensed',
	'Poppins',
	'Noto Sans',
	'Roboto Mono',
	'Raleway',
	'Ubuntu',
	'PT Sans',
	'Merriweather',
	'Roboto Slab',
	'Nunito',
	'Playfair Display',
	'Lora',
	'Rubik',
	'Open Sans Condensed'
);
?>
<div class="areoi-variable-row <?php echo esc_attr( $is_variable ? 'areoi-is-variable' : '' ) ?>">
	<div class="areoi-field areoi-field-visual">
		<select 
			name="<?php echo esc_attr( $option['name'] ) ?>-font-picker" 
			type="text"
			class="regular-text areoi-font-picker" 
			data-form-type="other"
			data-default="<?php echo esc_attr( $option['default'] ) ?>"
		>
			<option value="<?php echo esc_attr( $option['default'] ) ?>">Default</option>
			<?php foreach ( $fonts as $select_option_key => $select_option ) : ?>
				<option 
					<?php echo esc_attr( $value == $select_option ? 'selected="selected"' : '' ) ?> 
					value="<?php echo esc_attr( $select_option ) ?>"
					style="font-family: <?php echo esc_attr( $select_option ) ?>; font-size: 22px;"
				>
					<?php echo esc_attr( $select_option ) ?>
				</option>
			<?php endforeach; ?>
		</select>
		<div></div>
		<button type="button" class="areoi-toggle-field">Use SASS variable</button>
	</div>

	<div class="areoi-field areoi-field-variable">
		<?php include( AREOI__PLUGIN_DIR . 'views/inputs/text.php' ); ?>
		<div></div>
		<button type="button" class="areoi-toggle-field">Use font picker</button>
	</div>
</div>