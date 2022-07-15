<?php 
ob_start();

foreach ( $contents as $content_key => $content ) :
	echo $content;
endforeach;

$output .= ob_get_contents();
ob_end_clean();
