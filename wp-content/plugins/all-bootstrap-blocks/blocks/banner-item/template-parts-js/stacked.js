function render( areoi, attributes, container, BLOCKS_TEMPLATE, ALLOWED_BLOCKS )
{
	var has_media = attributes['image'] || attributes['video'];
	return (
				
		<>
			{ areoi.DisplayBackground( areoi, attributes ) }

			<div className={ areoi.helper.GetClassNameStr( [ 'container' ] ) }>
				<div className={ areoi.helper.GetClassNameStr( [ 'row', 'h-100', 'align-items-center', 'justify-content-' + ( has_media ? 'between' : 'center text-center' ) ] ) }>
					
					<div class="col-11 col-md-8 col-lg-6 col-xl-5 position-relative">
						<div className={ areoi.helper.GetClassNameStr( [ 'areoi-banner-content', 'flex-grow-1' ] ) }>
							<areoi.editor.InnerBlocks template={ BLOCKS_TEMPLATE } allowedBlocks={ ALLOWED_BLOCKS } />
						</div>
					</div>

					{
						has_media &&
						<div class="col-11 col-md-8 col-lg-6 col-xl-5 position-relative">						
							{ attributes['image'] && attributes['image']['url'] && 
	                            <img src={ attributes['image']['url'] } class="img-fluid" />
	                        }

							{ attributes['video'] && attributes['video']['url'] &&
			                    <video>
			                        <source src={ attributes['video']['url'] } />
			                    </video>
			                }
						</div>
					}

				</div>
			</div>
		</>
	);
}

export {
	render
}