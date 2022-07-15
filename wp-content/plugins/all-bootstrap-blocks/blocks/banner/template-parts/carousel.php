<?php 
ob_start();
?>
	
	<div id="<?php echo areoi_return_id( $attributes ) ?>-carousel" class="carousel slide" data-bs-ride="carousel">

		<div class="carousel-indicators">
			<?php foreach ( $contents as $content_key => $content ) : ?>
				<button type="button" data-bs-target="#<?php echo areoi_return_id( $attributes ) ?>-carousel" data-bs-slide-to="<?php echo $content_key; ?>" class="<?php echo $content_key == 0 ? 'active' : '' ?>" aria-label="Slide <?php echo $content_key + 1; ?>"></button>
			<?php endforeach; ?>
		</div>

		<div class="carousel-inner">
			<?php foreach ( $contents as $content_key => $content ) : ?>
				<div class="carousel-item <?php echo $content_key == 0 ? 'active' : '' ?>">
					<?php echo $content ?>
				</div>
			<?php endforeach; ?>
		</div>

	</div>

<?php
$output .= ob_get_contents();
ob_end_clean();
