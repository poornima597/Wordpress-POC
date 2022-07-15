/**
 * External dependencies
 */
import classnames from 'classnames';
import * as areoi from '../_components/Core.js';

/**
 * WordPress dependencies
 */
import {
	RichText,
	useBlockProps,
	useInnerBlocksProps,
} from '@wordpress/block-editor';

/**
 * Internal dependencies
 */
import saveWithoutInnerBlocks from './v1/save';
import { isGalleryV2Enabled } from './shared';

export default function saveWithInnerBlocks( { attributes } ) {
	if ( ! isGalleryV2Enabled() ) {
		return saveWithoutInnerBlocks( { attributes } );
	}

	const { caption, imageCrop } = attributes;

	let layout          = attributes['layout'] ? attributes['layout'] : 'grid',
        container       = attributes['container'] ? attributes['container'] : 'container',
        columns         = attributes['columns'] ? attributes['columns'] : '3',
        size 			= attributes['card_size'] && attributes['card_size'] != 'Default' ? attributes['card_size'] : '',
        style 			= attributes['style'] && attributes['style'] != 'Default' ? attributes['style'] : '';
        
	const classes = [
		'block-' + attributes['block_id'],
        'areoi-media-grid',
        'areoi-content-grid',
        'areoi-content-grid-' + layout,
        size,
        'areoi-content-grid-' + style,
        attributes.vertical_align_xs,
        attributes.vertical_align_sm,
        attributes.vertical_align_md,
        attributes.vertical_align_lg,
        attributes.vertical_align_xl,
        attributes.vertical_align_xxl,
        'position-relative',
        'd-flex'
    ];

    const className = classnames( classes );
	const blockProps = useBlockProps.save( { className } );
	const innerBlocksProps = useInnerBlocksProps.save( blockProps );

	var background_row_class 	= areoi.helper.GetClassNameStr( [
		attributes['background_horizontal_align'] ? attributes['background_horizontal_align'] : ''
	]);

	var background_col_class 	= 	areoi.helper.GetClassNameStr( [
		attributes['background_col_xs'] ? attributes['background_col_xs'] : '',
		attributes['background_col_sm'] ? attributes['background_col_sm'] : '',
		attributes['background_col_md'] ? attributes['background_col_md'] : '',
		attributes['background_col_lg'] ? attributes['background_col_lg'] : '',
		attributes['background_col_xl'] ? attributes['background_col_xl'] : '',
		attributes['background_col_xxl'] ? attributes['background_col_xxl'] : ''
	]);
	var background = '';
	if ( attributes['background_display'] ) {
		
		background = 
			<div className="areoi-background">
				<div className="container-fluid p-0">
					<div className={'row' + background_row_class }>
						<div className={ 'col' + background_col_class }>

				            { attributes['background_color'] && 
		                        <div className={ areoi.helper.GetClassNameStr( [ 
			                            'areoi-background__color'
			                        ] ) }
		                        	style={ { 'background': areoi.helper.GetRGB( attributes['background_color']['rgb'] ) } }>
		                        </div>
		                    }

		                    { attributes['background_image'] && 
		                        <div className="areoi-background__image" style={ { 'background-image': 'url(' + attributes['background_image']['url'] + ')' } }></div>
		                    }

		                    { attributes['background_video'] && 
		                        <video autoplay loop playsinline muted>
		                            <source src={ attributes['background_video']['url'] } />
		                        </video>
		                    }

		                    { attributes['background_display_overlay'] && attributes['background_overlay'] && 
		                        <div className={ areoi.helper.GetClassNameStr( [
			                            'areoi-background__overlay'
			                        ] ) } 
		                        	style={ { 'background': areoi.helper.GetRGB( attributes['background_overlay']['rgb'] ) } }>
		                        </div>
		                    }
		    			</div>
		    		</div>
		    	</div>
		    </div>;
	}

	var prepend = '';
	var prepend_row_class = areoi.helper.GetClassNameStr( [ 
			'row',
			attributes['prepend_horizontal_align_xs'] ? attributes['prepend_horizontal_align_xs'] : '',
			attributes['prepend_horizontal_align_sm'] ? attributes['prepend_horizontal_align_sm'] : '',
			attributes['prepend_horizontal_align_md'] ? attributes['prepend_horizontal_align_md'] : '',
			attributes['prepend_horizontal_align_lg'] ? attributes['prepend_horizontal_align_lg'] : '',
			attributes['prepend_horizontal_align_xl'] ? attributes['prepend_horizontal_align_xl'] : '',
			attributes['prepend_horizontal_align_xxl'] ? attributes['prepend_horizontal_align_xxl'] : '',
		]
	);
	var prepend_col_class = areoi.helper.GetClassNameStr( [ 
			'col',
			attributes['prepend_col_xs'] ? attributes['prepend_col_xs'] : '',
			attributes['prepend_col_sm'] ? attributes['prepend_col_sm'] : '',
			attributes['prepend_col_md'] ? attributes['prepend_col_md'] : '',
			attributes['prepend_col_lg'] ? attributes['prepend_col_lg'] : '',
			attributes['prepend_col_xl'] ? attributes['prepend_col_xl'] : '',
			attributes['prepend_col_xxl'] ? attributes['prepend_col_xxl'] : '',
			attributes['prepend_text_align_xs'] ? attributes['prepend_text_align_xs'] : '',
			attributes['prepend_text_align_sm'] ? attributes['prepend_text_align_sm'] : '',
			attributes['prepend_text_align_md'] ? attributes['prepend_text_align_md'] : '',
			attributes['prepend_text_align_lg'] ? attributes['prepend_text_align_lg'] : '',
			attributes['prepend_text_align_xl'] ? attributes['prepend_text_align_xl'] : '',
			attributes['prepend_text_align_xxl'] ? attributes['prepend_text_align_xxl'] : '',
		]
	);

	var heading_color = attributes['prepend_heading_color'] ? attributes['prepend_heading_color'] : '';
	var intro_color = attributes['prepend_intro_color'] ? attributes['prepend_intro_color'] : '';

	if ( attributes['prepend_display_heading'] || attributes['prepend_display_intro'] ) {

		var prepend_heading = attributes['prepend_display_heading'] && attributes['prepend_heading'] ? '<' + attributes['prepend_heading_level'] + ' class="' + heading_color + '">' + attributes['prepend_heading'] + '</' + attributes['prepend_heading_level'] + '>' : '';
		var prepend_intro = attributes['prepend_intro'] && attributes['prepend_intro'] ? '<p class="' + intro_color + '">' + attributes['prepend_intro'] + '</p>' : '';

		function createMarkup() {
		  return {__html: prepend_heading + prepend_intro };
		}

		prepend = 
		<div className={ prepend_row_class }>
			<div className={ prepend_col_class } dangerouslySetInnerHTML={createMarkup()}></div>
		</div>;
	}

	// return (
	// 	<div { ...innerBlocksProps }>
	// 		{ background }

	// 		<div className={ areoi.helper.GetClassNameStr( [ container, 'position-relative' ] ) }>

	// 			<div className="row h-100">
	//  				<div className="col">

	//  					{ prepend }

	// 	                <div className={ areoi.helper.GetClassNameStr( [ 'row', 'areoi-content-grid-columns', 'areoi-content-grid-columns-' + columns ] ) }>
	// 						{ innerBlocksProps.children }
	// 						{ ! RichText.isEmpty( caption ) && (
	// 							<RichText.Content
	// 								tagName="figcaption"
	// 								className="blocks-gallery-caption"
	// 								value={ caption }
	// 							/>
	// 						) }
	// 					</div>
	// 				</div>
	// 			</div>
	// 		</div>
	// 	</div>
	// );

	return (
        <areoi.editor.InnerBlocks.Content/>
    );
}
