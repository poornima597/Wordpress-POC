<?php 
ob_start();
?>

<div class="container-fluid">
	<div class="row h-100">
		<?php foreach ( $contents as $content_key => $content ) : ?>
			<div class="col position-relative">
				<?php echo $content; ?>
			</div>
		<?php endforeach; ?>
	</div>
</div>

<?php
$output .= ob_get_contents();
ob_end_clean();
