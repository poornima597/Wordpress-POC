function render( areoi, child_blocks, BLOCKS_TEMPLATE, ALLOWED_BLOCKS )
{
	var item_count = child_blocks.length;
	
	if ( item_count ) {

		return (

			<div className={ areoi.helper.GetClassNameStr( [ 'container-fluid' ] ) }>
				<div className={ areoi.helper.GetClassNameStr( [ 'row', 'h-100' ] ) }>
					<areoi.editor.InnerBlocks template={ BLOCKS_TEMPLATE } allowedBlocks={ ALLOWED_BLOCKS } />
				</div>
			</div>
		);
	}
}

export {
	render
}