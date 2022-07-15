/**
 * External dependencies
 */
import classnames from 'classnames';
import { isEmpty } from 'lodash';

/**
 * WordPress dependencies
 */
import { RichText, useBlockProps } from '@wordpress/block-editor';
import * as areoi from '../_components/Core.js';
export default function save( { attributes } ) {
	const {
		url,
		alt,
		caption,
		align,
		href,
		rel,
		linkClass,
		width,
		height,
		id,
		linkTarget,
		sizeSlug,
		title,
	} = attributes;

	const newRel = isEmpty( rel ) ? undefined : rel;

	const className = 'areoi-content-grid-item';

	const image = (
		<img
			src={ url }
			alt={ alt }
			className={ id ? `wp-image-${ id }` : null }
			width={ width }
			height={ height }
			title={ title }
		/>
	);

	const figure = (
		<>
			
				{ href ? (
					<a
						className={ linkClass }
						href={ href }
						target={ linkTarget }
						rel={ newRel }
					>
						{ image }
					</a>
				) : (
					<div>{image}</div>
				) }

				{ ! RichText.isEmpty( caption ) && (
					<RichText.Content tagName="figcaption" value={ caption } />
				) }
			
			
		</>
	);

	// return (
	// 	<figure { ...useBlockProps.save( { className: className } ) }>
	// 		{ figure }
	// 	</figure>
	// );

	return (
        <areoi.editor.InnerBlocks.Content/>
    );
}
