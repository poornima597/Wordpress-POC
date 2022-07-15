function render( areoi, attributes, container, BLOCKS_TEMPLATE, ALLOWED_BLOCKS )
{
	return (
				
		<div class="col position-relative">
			{ areoi.DisplayBackground( areoi, attributes ) }

			<div className={ areoi.helper.GetClassNameStr( [ 'areoi-banner-content', 'flex-grow-1' ] ) }>
				<areoi.editor.InnerBlocks template={ BLOCKS_TEMPLATE } allowedBlocks={ ALLOWED_BLOCKS } />
			</div>
		</div>
	);
}

export {
	render
}