function render( areoi, attributes, card_classes, BLOCKS_TEMPLATE, ALLOWED_BLOCKS )
{
	var fit_class = attributes['media_fit'] ? attributes['media_fit'] : 'cover';
	var align_class = attributes['media_align'] ? attributes['media_align'] : 'center';
	var height = attributes['media_fit'] && attributes['media_fit'] == 'set' ? ( attributes['media_height'] ? attributes['media_height'] : '50' ) : false;
	var width = attributes['media_fit'] && attributes['media_fit'] == 'set' ? ( attributes['media_width'] ? attributes['media_width'] : '100' ) : false;
	
	var style = {};
	if ( height ) {
		style['max-height'] = height + 'px';
	}
	if ( width ) {
		style['max-width'] = width + 'px';
	}

	return (
				
		<div className={ 
			areoi.helper.GetClassNameStr( [ 'card', 'h-100', 'mt-0', 'p-0', 'overflow-hidden', ( attributes.image || attributes.video ? 'has-image' : '' ) ] )
		}>
			{ areoi.DisplayBackground( areoi, attributes ) }

			<div class="card-img-top areoi-media position-relative">
				<div class={ 'areoi-media-container ' + fit_class + ' ' + align_class }>
					{ 
	                    attributes.image && 
	                    <img 
		                    src={attributes.image.url} 
		                    width={attributes.image.width} 
		                    height={attributes.image.height} 
		                    alt={attributes.image.alt} 
		                    style={ style }
	                    />
	                }

	                { 
	                    attributes.video && 
	                    <video style={ style }>
	                        <source src={ attributes.video.url } />
	                    </video>
	                }
                </div>
			</div>

			<div className={ areoi.helper.GetClassNameStr( card_classes ) + ' card-body d-flex'  }>
				<div className="w-100">
					<areoi.editor.InnerBlocks template={ BLOCKS_TEMPLATE } allowedBlocks={ ALLOWED_BLOCKS } />
				</div>
			</div>
		</div>
	);
}

export {
	render
}