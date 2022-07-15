function render( areoi, attributes, card_classes, BLOCKS_TEMPLATE, ALLOWED_BLOCKS )
{
	return (
				
		<div className={ areoi.helper.GetClassNameStr( [ 'h-100', 'mt-0', 'p-0', 'overflow-hidden', ( attributes.image || attributes.video ? 'has-image' : '' ) ] ) }>
		
			{ areoi.DisplayBackground( areoi, attributes ) }

			<div class="card-body pb-0">
				<div class="card-img-top position-relative">
					<div class="background">
						{ 
		                    attributes.image && 
		                    <div 
		                        className={ areoi.helper.GetClassNameStr( [ 'background__image' ] ) } 
		                        style={ { 
		                            cssText: 'background-image: url( ' + attributes.image.url + ' );'
		                        } }
		                    ></div>
		                }

		                { 
		                    attributes.video && 
		                    <video>
		                        <source src={ attributes.video.url } />
		                    </video>
		                }
	                </div>
				</div>
			</div>

			<div className={ areoi.helper.GetClassNameStr( card_classes ) + ' card-body d-flex h-100'  }>
				<div>
					<areoi.editor.InnerBlocks template={ BLOCKS_TEMPLATE } allowedBlocks={ ALLOWED_BLOCKS } />
				</div>
			</div>
		</div>
	);
}

export {
	render
}