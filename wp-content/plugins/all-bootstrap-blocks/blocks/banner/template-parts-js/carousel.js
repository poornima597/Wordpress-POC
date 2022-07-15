function render( areoi, child_blocks, BLOCKS_TEMPLATE, ALLOWED_BLOCKS )
{
	var item_count = child_blocks.length;
	
	if ( item_count ) {

		return (

			<div class="areoi-strip">
				<areoi.editor.InnerBlocks template={ BLOCKS_TEMPLATE } allowedBlocks={ ALLOWED_BLOCKS } />
			</div>
		);
	}
}

export {
	render
}