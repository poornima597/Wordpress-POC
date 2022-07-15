/**
 * External dependencies
 */
import classnames from 'classnames';
import { concat, find } from 'lodash';
import * as areoi from '../_components/Core.js';
import meta from './block.json';

/**
 * WordPress dependencies
 */
import { compose } from '@wordpress/compose';
import {
	BaseControl,
	PanelBody,
	SelectControl,
	ToggleControl,
	withNotices,
	RangeControl,
	Spinner,
} from '@wordpress/components';
import {
	store as blockEditorStore,
	MediaPlaceholder,
	InspectorControls,
	useBlockProps,
	BlockControls,
	MediaReplaceFlow,
} from '@wordpress/block-editor';
import { Platform, useEffect, useMemo } from '@wordpress/element';
import { __, _x, sprintf } from '@wordpress/i18n';
import { useSelect, useDispatch } from '@wordpress/data';
import { withViewportMatch } from '@wordpress/viewport';
import { View } from '@wordpress/primitives';
import { createBlock } from '@wordpress/blocks';
import { createBlobURL } from '@wordpress/blob';
import { store as noticesStore } from '@wordpress/notices';

/**
 * Internal dependencies
 */
import { sharedIcon } from './shared-icon';
import { defaultColumnsNumber, pickRelevantMediaFiles } from './shared';
import { getHrefAndDestination } from './utils';
import {
	getUpdatedLinkTargetSettings,
	getImageSizeAttributes,
} from '../media-grid-image/utils';
import Gallery from './gallery';
import {
	LINK_DESTINATION_ATTACHMENT,
	LINK_DESTINATION_MEDIA,
	LINK_DESTINATION_NONE,
} from './constants';
import useImageSizes from './use-image-sizes';
import useShortCodeTransform from './use-short-code-transform';
import useGetNewImages from './use-get-new-images';
import useGetMedia from './use-get-media';
import GapStyles from './gap-styles';

const MAX_COLUMNS = 8;
const linkOptions = [
	{ value: LINK_DESTINATION_ATTACHMENT, label: __( 'Attachment Page' ) },
	{ value: LINK_DESTINATION_MEDIA, label: __( 'Media File' ) },
	{
		value: LINK_DESTINATION_NONE,
		label: _x( 'None', 'Media item link option' ),
	},
];
const ALLOWED_MEDIA_TYPES = [ 'image' ];

const PLACEHOLDER_TEXT = Platform.isNative
	? __( 'ADD MEDIA' )
	: __( 'Drag images, upload new ones or select files from your library.' );

const MOBILE_CONTROL_PROPS_RANGE_CONTROL = Platform.isNative
	? { type: 'stepper' }
	: {};

function GalleryEdit( props ) {
	const {
		setAttributes,
		attributes,
		className,
		clientId,
		noticeOperations,
		isSelected,
		noticeUI,
		insertBlocksAfter,
	} = props;

	const {
		// columns,
		imageCrop,
		linkTarget,
		linkTo,
		shortCodeTransforms,
		sizeSlug,
	} = attributes;

	const {
		__unstableMarkNextChangeAsNotPersistent,
		replaceInnerBlocks,
		updateBlockAttributes,
		selectBlock,
		clearSelectedBlock,
	} = useDispatch( blockEditorStore );
	const { createSuccessNotice } = useDispatch( noticesStore );

	const { getBlock, getSettings, preferredStyle } = useSelect( ( select ) => {
		const settings = select( blockEditorStore ).getSettings();
		const preferredStyleVariations =
			settings.__experimentalPreferredStyleVariations;
		return {
			getBlock: select( blockEditorStore ).getBlock,
			getSettings: select( blockEditorStore ).getSettings,
			preferredStyle: preferredStyleVariations?.value?.[ 'areoi/media-grid-image' ],
		};
	}, [] );

	const innerBlockImages = useSelect(
		( select ) => {
			return select( blockEditorStore ).getBlock( clientId )?.innerBlocks;
		},
		[ clientId ]
	);

	const wasBlockJustInserted = useSelect(
		( select ) => {
			return select( blockEditorStore ).wasBlockJustInserted(
				clientId,
				'inserter_menu'
			);
		},
		[ clientId ]
	);

	const images = useMemo(
		() =>
			innerBlockImages?.map( ( block ) => ( {
				clientId: block.clientId,
				id: block.attributes.id,
				url: block.attributes.url,
				attributes: block.attributes,
				fromSavedContent: Boolean( block.originalContent ),
			} ) ),
		[ innerBlockImages ]
	);

	const imageData = useGetMedia( innerBlockImages );

	const newImages = useGetNewImages( images, imageData );

	useEffect( () => {
		newImages?.forEach( ( newImage ) => {
			updateBlockAttributes( newImage.clientId, {
				...buildImageAttributes( newImage.attributes ),
				id: newImage.id,
				align: undefined,
			} );
		} );
		if ( newImages?.length > 0 ) {
			clearSelectedBlock();
		}
	}, [ newImages ] );

	const shortCodeImages = useShortCodeTransform( shortCodeTransforms );

	useEffect( () => {
		if ( ! shortCodeTransforms || ! shortCodeImages ) {
			return;
		}
		updateImages( shortCodeImages );
		setAttributes( { shortCodeTransforms: undefined } );
	}, [ shortCodeTransforms, shortCodeImages ] );

	const imageSizeOptions = useImageSizes(
		imageData,
		isSelected,
		getSettings
	);

	function add_parent_id() {
		const blocks = [];
		const changedAttributes = {};
		
		getBlock( clientId ).innerBlocks.forEach( ( block ) => {
			blocks.push( block.clientId );
			const image = block.attributes.id
				? find( imageData, { id: block.attributes.id } )
				: null;
			changedAttributes[ block.clientId ] = {
				parent_id: clientId,
				block_id: block.clientId
			};
		});

		updateBlockAttributes( blocks, changedAttributes, true );
	}

	/**
	 * Determines the image attributes that should be applied to an image block
	 * after the gallery updates.
	 *
	 * The gallery will receive the full collection of images when a new image
	 * is added. As a result we need to reapply the image's original settings if
	 * it already existed in the gallery. If the image is in fact new, we need
	 * to apply the gallery's current settings to the image.
	 *
	 * @param {Object} imageAttributes Media object for the actual image.
	 * @return {Object}                Attributes to set on the new image block.
	 */
	function buildImageAttributes( imageAttributes ) {
		const image = imageAttributes.id
			? find( imageData, { id: imageAttributes.id } )
			: null;

		let newClassName;
		if ( imageAttributes.className && imageAttributes.className !== '' ) {
			newClassName = imageAttributes.className;
		} else {
			newClassName = preferredStyle
				? `is-style-${ preferredStyle }`
				: undefined;
		}

		add_parent_id();

		return {
			...pickRelevantMediaFiles( imageAttributes, sizeSlug ),
			...getHrefAndDestination( image, linkTo ),
			...getUpdatedLinkTargetSettings( linkTarget, attributes ),
			className: newClassName,
			sizeSlug,
		};
	}

	function isValidFileType( file ) {
		return (
			ALLOWED_MEDIA_TYPES.some(
				( mediaType ) => file.type?.indexOf( mediaType ) === 0
			) || file.url?.indexOf( 'blob:' ) === 0
		);
	}

	function updateImages( selectedImages ) {
		const newFileUploads =
			Object.prototype.toString.call( selectedImages ) ===
			'[object FileList]';

		const imageArray = newFileUploads
			? Array.from( selectedImages ).map( ( file ) => {
					if ( ! file.url ) {
						return pickRelevantMediaFiles( {
							url: createBlobURL( file ),
						} );
					}

					return file;
			  } )
			: selectedImages;

		if ( ! imageArray.every( isValidFileType ) ) {
			noticeOperations.removeAllNotices();
			noticeOperations.createErrorNotice(
				__(
					'If uploading to a gallery all files need to be image formats'
				),
				{ id: 'gallery-upload-invalid-file' }
			);
		}

		const processedImages = imageArray
			.filter( ( file ) => file.url || isValidFileType( file ) )
			.map( ( file ) => {
				if ( ! file.url ) {
					return pickRelevantMediaFiles( {
						url: createBlobURL( file ),
					} );
				}

				return file;
			} );

		// Because we are reusing existing innerImage blocks any reordering
		// done in the media library will be lost so we need to reapply that ordering
		// once the new image blocks are merged in with existing.
		const newOrderMap = processedImages.reduce(
			( result, image, index ) => (
				( result[ image.id ] = index ), result
			),
			{}
		);

		const existingImageBlocks = ! newFileUploads
			? innerBlockImages.filter( ( block ) =>
					processedImages.find(
						( img ) => img.id === block.attributes.id
					)
			  )
			: innerBlockImages;

		const newImageList = processedImages.filter(
			( img ) =>
				! existingImageBlocks.find(
					( existingImg ) => img.id === existingImg.attributes.id
				)
		);

		const newBlocks = newImageList.map( ( image ) => {
			
			return createBlock( 'areoi/media-grid-image', {
				id: image.id,
				url: image.url,
				caption: image.caption,
				alt: image.alt,
			} );
		} );

		if ( newBlocks?.length > 0 ) {
			selectBlock( newBlocks[ 0 ].clientId );
		}

		replaceInnerBlocks(
			clientId,
			concat( existingImageBlocks, newBlocks ).sort(
				( a, b ) =>
					newOrderMap[ a.attributes.id ] -
					newOrderMap[ b.attributes.id ]
			)
		);
	}

	function onUploadError( message ) {
		noticeOperations.removeAllNotices();
		noticeOperations.createErrorNotice( message );
	}

	function setLinkTo( value ) {
		setAttributes( { linkTo: value } );
		const changedAttributes = {};
		const blocks = [];
		getBlock( clientId ).innerBlocks.forEach( ( block ) => {
			blocks.push( block.clientId );
			const image = block.attributes.id
				? find( imageData, { id: block.attributes.id } )
				: null;
			changedAttributes[ block.clientId ] = getHrefAndDestination(
				image,
				value
			);
		} );
		updateBlockAttributes( blocks, changedAttributes, true );
		const linkToText = [ ...linkOptions ].find(
			( linkType ) => linkType.value === value
		);

		createSuccessNotice(
			sprintf(
				/* translators: %s: image size settings */
				__( 'All gallery image links updated to: %s' ),
				linkToText.label
			),
			{
				id: 'gallery-attributes-linkTo',
				type: 'snackbar',
			}
		);
	}

	function setColumnsNumber( value ) {
		setAttributes( { columns: value } );
	}

	function toggleImageCrop() {
		setAttributes( { imageCrop: ! imageCrop } );
	}

	function getImageCropHelp( checked ) {
		return checked
			? __( 'Thumbnails are cropped to align.' )
			: __( 'Thumbnails are not cropped.' );
	}

	function toggleOpenInNewTab( openInNewTab ) {
		const newLinkTarget = openInNewTab ? '_blank' : undefined;
		setAttributes( { linkTarget: newLinkTarget } );
		const changedAttributes = {};
		const blocks = [];
		getBlock( clientId ).innerBlocks.forEach( ( block ) => {
			blocks.push( block.clientId );
			changedAttributes[ block.clientId ] = getUpdatedLinkTargetSettings(
				newLinkTarget,
				block.attributes
			);
		} );
		updateBlockAttributes( blocks, changedAttributes, true );
		const noticeText = openInNewTab
			? __( 'All gallery images updated to open in new tab' )
			: __( 'All gallery images updated to not open in new tab' );
		createSuccessNotice( noticeText, {
			id: 'gallery-attributes-openInNewTab',
			type: 'snackbar',
		} );
	}

	function updateImagesSize( newSizeSlug ) {
		setAttributes( { sizeSlug: newSizeSlug } );
		const changedAttributes = {};
		const blocks = [];
		getBlock( clientId ).innerBlocks.forEach( ( block ) => {
			blocks.push( block.clientId );
			const image = block.attributes.id
				? find( imageData, { id: block.attributes.id } )
				: null;
			changedAttributes[ block.clientId ] = getImageSizeAttributes(
				image,
				newSizeSlug
			);
		} );
		updateBlockAttributes( blocks, changedAttributes, true );
		const imageSize = imageSizeOptions.find(
			( size ) => size.value === newSizeSlug
		);

		createSuccessNotice(
			sprintf(
				/* translators: %s: image size settings */
				__( 'All gallery image sizes updated to: %s' ),
				imageSize.label
			),
			{
				id: 'gallery-attributes-sizeSlug',
				type: 'snackbar',
			}
		);
	}

	function setMediaFit( value ) {
        setAttributes( { media_fit: value } );
        const changedAttributes = {};
        const blocks = [];
        getBlock( clientId ).innerBlocks.forEach( ( block ) => {
            blocks.push( block.clientId );
            const image = block.attributes.id
                ? find( imageData, { id: block.attributes.id } )
                : null;
            changedAttributes[ block.clientId ] = {
                media_fit: value
            };
        } );
        updateBlockAttributes( blocks, changedAttributes, true );
    }

    function setMediaHeight( value ) {
        setAttributes( { media_height: value } );
        const changedAttributes = {};
        const blocks = [];
        getBlock( clientId ).innerBlocks.forEach( ( block ) => {
            blocks.push( block.clientId );
            const image = block.attributes.id
                ? find( imageData, { id: block.attributes.id } )
                : null;
            changedAttributes[ block.clientId ] = {
                media_height: value
            };
        } );
        updateBlockAttributes( blocks, changedAttributes, true );
    }

    function setMediaWidth( value ) {
            setAttributes( { media_width: value } );
            const changedAttributes = {};
            const blocks = [];
            getBlock( clientId ).innerBlocks.forEach( ( block ) => {
                blocks.push( block.clientId );
                const image = block.attributes.id
                    ? find( imageData, { id: block.attributes.id } )
                    : null;
                changedAttributes[ block.clientId ] = {
                    media_width: value
                };
            } );
            updateBlockAttributes( blocks, changedAttributes, true );
        }

    function setMediaAlign( value ) {
        setAttributes( { media_align: value } );
        const changedAttributes = {};
        const blocks = [];
        getBlock( clientId ).innerBlocks.forEach( ( block ) => {
            blocks.push( block.clientId );
            const image = block.attributes.id
                ? find( imageData, { id: block.attributes.id } )
                : null;
            changedAttributes[ block.clientId ] = {
                media_align: value
            };
        } );
        updateBlockAttributes( blocks, changedAttributes, true );
    }

    function setMediaStyle( value ) {
        setAttributes( { style: value } );
        const changedAttributes = {};
        const blocks = [];
        getBlock( clientId ).innerBlocks.forEach( ( block ) => {
            blocks.push( block.clientId );
            const image = block.attributes.id
                ? find( imageData, { id: block.attributes.id } )
                : null;
            changedAttributes[ block.clientId ] = {
                style: value
            };
        } );
        updateBlockAttributes( blocks, changedAttributes, true );
    }

	useEffect( () => {
		// linkTo attribute must be saved so blocks don't break when changing image_default_link_type in options.php.
		if ( ! linkTo ) {
			__unstableMarkNextChangeAsNotPersistent();
			setAttributes( {
				linkTo:
					window?.wp?.media?.view?.settings?.defaultProps?.link ||
					LINK_DESTINATION_NONE,
			} );
		}
	}, [ linkTo ] );

	const hasImages = !! images.length;
	const hasImageIds = hasImages && images.some( ( image ) => !! image.id );
	const imagesUploading = images.some(
		( img ) => ! img.id && img.url?.indexOf( 'blob:' ) === 0
	);

	// MediaPlaceholder props are different between web and native hence, we provide a platform-specific set.
	const mediaPlaceholderProps = Platform.select( {
		web: {
			addToGallery: hasImageIds,
			disableMediaButtons: imagesUploading,
			value: hasImageIds ? images : {},
		},
		native: {
			addToGallery: hasImageIds,
			isAppender: hasImages,
			disableMediaButtons:
				( hasImages && ! isSelected ) || imagesUploading,
			value: hasImageIds ? images : {},
			autoOpenMediaUpload:
				! hasImages && isSelected && wasBlockJustInserted,
		},
	} );
	const mediaPlaceholder = (
		<MediaPlaceholder
			handleUpload={ false }
			icon={ sharedIcon }
			labels={ {
				title: __( 'Gallery' ),
				instructions: PLACEHOLDER_TEXT,
			} }
			onSelect={ updateImages }
			accept="image/*"
			allowedTypes={ ALLOWED_MEDIA_TYPES }
			multiple
			onError={ onUploadError }
			notices={ noticeUI }
			{ ...mediaPlaceholderProps }
		/>
	);

	const { block_id } = attributes;
    if ( !block_id || ( block_id != clientId ) ) {
        setAttributes( { block_id: clientId } );
    }

    let layout          = attributes['layout'] ? attributes['layout'] : 'grid',
        container       = attributes['container'] ? attributes['container'] : 'container',
        columns         = attributes['columns'] ? attributes['columns'] : '3',
        size 			= attributes['card_size'] && attributes['card_size'] != 'Default' ? attributes['card_size'] : '',
        style 			= attributes['style'] && attributes['style'] != 'Default' ? attributes['style'] : '';
        
	const classes = [
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
    ];

	const blockProps = useBlockProps( {
		className: areoi.helper.GetClassName( classes ),
        style: { cssText: areoi.helper.GetStyles( attributes ) }
	} );

	const row_classes = [
        'row',
        'h-100',
        'areoi-content-grid-row',
        attributes.vertical_align_xs,
        attributes.vertical_align_sm,
        attributes.vertical_align_md,
        attributes.vertical_align_lg,
        attributes.vertical_align_xl,
        attributes.vertical_align_xxl,
    ];

    const prepend_row_classes = [
        'row',
        'areoi-prepend-row',
        attributes.prepend_horizontal_align_xs,
        attributes.prepend_horizontal_align_sm,
        attributes.prepend_horizontal_align_md,
        attributes.prepend_horizontal_align_lg,
        attributes.prepend_horizontal_align_xl,
        attributes.prepend_horizontal_align_xxl,
    ];

    const prepend_col_classes = [
        'col',
        attributes.prepend_col_xs,
        attributes.prepend_col_sm,
        attributes.prepend_col_md,
        attributes.prepend_col_lg,
        attributes.prepend_col_xl,
        attributes.prepend_col_xxl,
        attributes.prepend_text_align_xs,
        attributes.prepend_text_align_sm,
        attributes.prepend_text_align_md,
        attributes.prepend_text_align_lg,
        attributes.prepend_text_align_xl,
        attributes.prepend_text_align_xxl,
    ];

	if ( ! hasImages ) {
		return <View { ...blockProps }>{ mediaPlaceholder }</View>;
	}

	const hasLinkTo = linkTo && linkTo !== 'none';
    
	function onChange( key, value ) {
        setAttributes( { [key]: value } );
    }

    const tabDevice = ( tab ) => {
        var append = ( tab.name == 'xs' ? '' : '-' + tab.name );

        return (
            <div>
                { areoi.DeviceLayout( areoi, attributes, onChange, tab ) }

                { !attributes['hide_' + tab.name] &&
                    <>
                        <areoi.components.PanelBody title={ 'Settings (' + tab.title + ')' } initialOpen={ false }>                        

                            <areoi.components.PanelRow className="areoi-panel-row">
                                <areoi.components.SelectControl
                                    label="Vertical Align"
                                    labelPosition="top"
                                    help="Align content within body from top to bottom. This will be applied to all greater device sizes unless overridden."
                                    value={ attributes['vertical_align_' + tab.name] }
                                    options={ [
                                        { label: 'Default', value: null },
                                        { label: 'Start', value: 'align-items' + append + '-start' },
                                        { label: 'Center', value: 'align-items' + append + '-center' },
                                        { label: 'End', value: 'align-items' + append + '-end' },
                                    ] }
                                    onChange={ ( value ) => onChange( 'vertical_align_' + tab.name, value ) }
                                />
                            </areoi.components.PanelRow>

                            <areoi.components.PanelRow className="areoi-panel-row">
                                <areoi.components.SelectControl
                                    label="Horizontal Align"
                                    labelPosition="top"
                                    help="Align content within body from left to right. This will be applied to all greater device sizes unless overridden."
                                    value={ attributes['horizontal_align_' + tab.name] }
                                    options={ [
                                        { label: 'Default', value: null },
                                        { label: 'Start', value: 'justify-content' + append + '-start' },
                                        { label: 'Center', value: 'justify-content' + append + '-center' },
                                        { label: 'End', value: 'justify-content' + append + '-end' },
                                    ] }
                                    onChange={ ( value ) => onChange( 'horizontal_align_' + tab.name, value ) }
                                />
                            </areoi.components.PanelRow>

                        </areoi.components.PanelBody>

                        <areoi.components.PanelBody title={ 'Prepend Content (' + tab.title + ')' } initialOpen={ false }> 
                        
                            <areoi.components.PanelRow className="areoi-panel-row">
                                <areoi.components.SelectControl
                                    label="Columns"
                                    labelPosition="top"
                                    help="Number of columns to span."
                                    value={ attributes['prepend_col_' + tab.name] }
                                    options={ areoi.helper.GetCols( 'col', tab.name ) }
                                    onChange={ ( val ) => onChange( 'prepend_col_' + tab.name, val ) }
                                />
                            </areoi.components.PanelRow>

                            <areoi.components.PanelRow className="areoi-panel-row">
                                <areoi.components.SelectControl
                                    label="Horizontal Align"
                                    labelPosition="top"
                                    help="Align content within body from left to right. This will be applied to all greater device sizes unless overridden."
                                    value={ attributes['prepend_horizontal_align_' + tab.name] }
                                    options={ [
                                        { label: 'Default', value: null },
                                        { label: 'Start', value: 'justify-content' + append + '-start' },
                                        { label: 'Center', value: 'justify-content' + append + '-center' },
                                        { label: 'End', value: 'justify-content' + append + '-end' },
                                    ] }
                                    onChange={ ( value ) => onChange( 'prepend_horizontal_align_' + tab.name, value ) }
                                />
                            </areoi.components.PanelRow>

                            <areoi.components.PanelRow className="areoi-panel-row areoi-panel-row-no-border">
                                <areoi.components.SelectControl
                                    label="Text Align"
                                    labelPosition="top"
                                    help="Align text within it's containing column."
                                    value={ attributes['prepend_text_align_' + tab.name] }
                                    options={ [
                                        { label: 'Default', value: null },
                                        { label: 'Start', value: 'text' + append + '-start' },
                                        { label: 'Center', value: 'text' + append + '-center' },
                                        { label: 'End', value: 'text' + append + '-end' },
                                    ] }
                                    onChange={ ( value ) => onChange( 'prepend_text_align_' + tab.name, value ) }
                                />
                            </areoi.components.PanelRow>

                        </areoi.components.PanelBody>
                    </>
                }

                { areoi.DeviceBackground( areoi, attributes, onChange, tab ) }
            </div>
        );
    };

	return (
		<>
            { areoi.DisplayPreview( areoi, attributes, onChange, 'media-grid' ) }

            { !attributes.preview &&
            	<div { ...blockProps }>
					<InspectorControls>
						<areoi.components.PanelBody title={ 'Settings' } initialOpen={ false }>
                            
                            <SelectControl className="areoi-panel-row"
								label={ __( 'Link to' ) }
								value={ linkTo }
								onChange={ setLinkTo }
								options={ linkOptions }
								hideCancelButton={ true }
							/>
							{ hasLinkTo && (
								<ToggleControl
									label={ __( 'Open in new tab' ) }
									checked={ linkTarget === '_blank' }
									onChange={ toggleOpenInNewTab }
								/>
							) }
							{ imageSizeOptions?.length > 0 && (
								<SelectControl className="areoi-panel-row"
									label={ __( 'Image size' ) }
									value={ sizeSlug }
									options={ imageSizeOptions }
									onChange={ updateImagesSize }
									hideCancelButton={ true }
								/>
							) }
							{ Platform.isWeb && ! imageSizeOptions && hasImageIds && (
								<BaseControl className={ 'gallery-image-sizes areoi-panel-row' }>
									<BaseControl.VisualLabel>
										{ __( 'Image size' ) }
									</BaseControl.VisualLabel>
									<View className={ 'gallery-image-sizes__loading' }>
										<Spinner />
										{ __( 'Loading options…' ) }
									</View>
								</BaseControl>
							) }

                            <areoi.components.PanelRow className="areoi-panel-row">
                                <areoi.components.SelectControl
                                    label="Layout"
                                    labelPosition="top"
                                    help="This will change the layout of any grid items you add within this grid."
                                    value={ attributes.layout }
                                    options={ [
                                        { label: 'Grid', value: 'grid' },
                                        { label: 'Masonry', value: 'masonry' },
                                    ] }
                                    onChange={ ( value ) => onChange( 'layout', value ) }
                                />
                            </areoi.components.PanelRow>

                            <areoi.components.PanelRow className="areoi-panel-row">
                                <areoi.components.SelectControl
                                    label="Container"
                                    labelPosition="top"
                                    help="Choose how you would like your items to be contained."
                                    value={ attributes.container }
                                    options={ [
                                        { label: 'Fixed', value: 'container' },
                                        { label: 'Full Width', value: 'container-fluid' },
                                    ] }
                                    onChange={ ( value ) => onChange( 'container', value ) }
                                />
                            </areoi.components.PanelRow>

                            <areoi.components.PanelRow>
                                <areoi.components.SelectControl
                                    label="Columns"
                                    labelPosition="top"
                                    help="Specify how many columns you would like to display in your grid."
                                    value={ attributes.columns }
                                    options={ [
                                        { label: '1', value: '1' },
                                        { label: '2', value: '2' },
                                        { label: '3', value: '3' },
                                        { label: '4', value: '4' },
                                        { label: '5', value: '5' },
                                        { label: '6', value: '6' },
                                    ] }
                                    onChange={ ( value ) => onChange( 'columns', value ) }
                                />
                            </areoi.components.PanelRow>

                        </areoi.components.PanelBody>

                        <areoi.components.PanelBody title={ 'Prepend Content' } initialOpen={ false }>
                            
                            <areoi.components.PanelRow className={ 'areoi-panel-row ' }>
                                <areoi.components.ToggleControl 
                                    label={ 'Display Heading' }
                                    help="Toggle on to display a header before your grid begins."
                                    checked={ attributes.prepend_display_heading }
                                    onChange={ ( value ) => onChange( 'prepend_display_heading', value ) }
                                />
                            </areoi.components.PanelRow>

                            {
                                attributes.prepend_display_heading && 

                                <>
                                    <areoi.components.PanelRow className="areoi-panel-row">
                                        <areoi.components.SelectControl
                                            label="Heading Level"
                                            labelPosition="top"
                                            help="Choose the type of heading you would like to include."
                                            value={ attributes.prepend_heading_level }
                                            options={ [
                                                { label: 'H1', value: 'h1' },
                                                { label: 'H2', value: 'h2' },
                                                { label: 'H3', value: 'h3' },
                                                { label: 'H4', value: 'h4' },
                                                { label: 'H5', value: 'h5' },
                                                { label: 'H6', value: 'h6' },
                                            ] }
                                            onChange={ ( val ) => onChange( 'prepend_heading_level', val ) }
                                        />
                                    </areoi.components.PanelRow>

                                    <areoi.components.PanelRow className="areoi-panel-row">
                                        <areoi.components.SelectControl
                                            label="Heading Color"
                                            labelPosition="top"
                                            help="Use the Bootstrap text color utilities to change the heading color."
                                            value={ attributes.prepend_heading_color }
                                            options={ [
                                                { label: 'Default', value: null },
                                                { label: 'Primary', value: 'text-primary' },
                                                { label: 'Secondary', value: 'text-secondary' },
                                                { label: 'Success', value: 'text-success' },
                                                { label: 'Danger', value: 'text-danger' },
                                                { label: 'Warning', value: 'text-warning' },
                                                { label: 'Info', value: 'text-info' },
                                                { label: 'Light', value: 'text-light' },
                                                { label: 'Dark', value: 'text-dark' },
                                            ] }
                                            onChange={ ( value ) => onChange( 'prepend_heading_color', value ) }
                                        />
                                    </areoi.components.PanelRow>

                                </>
                            }

                            <areoi.components.PanelRow className={ 'areoi-panel-row ' + ( attributes.prepend_display_intro ? 'areoi-panel-row-no-border' : '' ) }>
                                <areoi.components.ToggleControl 
                                    label={ 'Display Intro' }
                                    help="Toggle on to display an introduction before your grid begins."
                                    checked={ attributes.prepend_display_intro }
                                    onChange={ ( value ) => onChange( 'prepend_display_intro', value ) }
                                />
                            </areoi.components.PanelRow>

                            {
                                attributes.prepend_display_intro &&

                                <areoi.components.PanelRow className="areoi-panel-row areoi-panel-row-no-border">
                                    <areoi.components.SelectControl
                                        label="Intro Color"
                                        labelPosition="top"
                                        help="Use the Bootstrap text color utilities to change the intro color."
                                        value={ attributes.prepend_intro_color }
                                        options={ [
                                            { label: 'Default', value: null },
                                            { label: 'Primary', value: 'text-primary' },
                                            { label: 'Secondary', value: 'text-secondary' },
                                            { label: 'Success', value: 'text-success' },
                                            { label: 'Danger', value: 'text-danger' },
                                            { label: 'Warning', value: 'text-warning' },
                                            { label: 'Info', value: 'text-info' },
                                            { label: 'Light', value: 'text-light' },
                                            { label: 'Dark', value: 'text-dark' },
                                        ] }
                                        onChange={ ( value ) => onChange( 'prepend_intro_color', value ) }
                                    />
                                </areoi.components.PanelRow>
                            }

                        </areoi.components.PanelBody>

                        <areoi.components.PanelBody title={ 'Style' } initialOpen={ false }>
                                
                            <areoi.components.PanelRow className={ 'areoi-panel-row' }>
                                <areoi.components.SelectControl
                                    label="Style"
                                    labelPosition="top"
                                    help="Choose how you would like each item in your grid to be styled."
                                    value={ attributes.style }
                                    options={ [
                                        { label: 'Full', value: 'full' },
                                        { label: 'Flush', value: 'flush' },
                                    ] }
                                    onChange={ ( value ) => onChange( 'style', value ) }
                                />
                            </areoi.components.PanelRow>

                            <areoi.components.PanelRow>
                                <areoi.components.SelectControl
                                    label="Card Size"
                                    labelPosition="top"
                                    help="Choose a predefined size for your grid item. Small is 40vh, Medium is 60vh, Large is 80vh and Extra Large is 100vh."
                                    value={ attributes.card_size }
                                    options={ [
                                        { label: 'Extra Small', value: 'areoi-card-extra-small' },
                                        { label: 'Small', value: 'areoi-card-small' },
                                        { label: 'Medium', value: 'areoi-card-medium' },
                                        { label: 'Large', value: 'areoi-card-large' },
                                        { label: 'Extra Large', value: 'areoi-card-extra-large' },
                                    ] }
                                    onChange={ ( value ) => onChange( 'card_size', value ) }
                                />
                            </areoi.components.PanelRow>

                            <areoi.components.PanelRow>
                                <areoi.components.SelectControl
                                    label="Media Fit"
                                    labelPosition="top"
                                    help="Choose a predefined size for how your media will fit within the media container."
                                    value={ attributes.media_fit }
                                    options={ [
                                        { label: 'Cover', value: 'cover' },
                                        { label: 'Contain', value: 'contain' },
                                        { label: 'Set Dimensions', value: 'set' },
                                    ] }
                                    onChange={ setMediaFit }
                                />
                            </areoi.components.PanelRow>

                            {
                                attributes['media_fit'] == 'set' &&
                                <>
                                    <areoi.components.PanelRow className="areoi-panel-row areoi-panel-row-no-border">
                                        <label className="areoi-panel-row__label">Media Height</label>
                                        <table>
                                            <tr>
                                                <td>
                                                    <areoi.components.TextControl
                                                        label=""
                                                        value={ attributes['media_height'] }
                                                        onChange={ setMediaHeight }
                                                    />
                                                </td>
                                                <td>&nbsp;px</td>
                                            </tr>
                                        </table>
                                        <p className="components-base-control__help css-1gbp77-StyledHelp">Specify the height to display all your media. This will be applied to all of your items for consistency.</p>
                                    </areoi.components.PanelRow>

                                    <areoi.components.PanelRow className="areoi-panel-row areoi-panel-row-no-border">
                                            <label className="areoi-panel-row__label">Media Width</label>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <areoi.components.TextControl
                                                            label=""
                                                            value={ attributes['media_width'] }
                                                            onChange={ setMediaWidth }
                                                        />
                                                    </td>
                                                    <td>&nbsp;px</td>
                                                </tr>
                                            </table>
                                            <p className="components-base-control__help css-1gbp77-StyledHelp">Specify the width to display all your media. This will be applied to all of your items for consistency.</p>
                                        </areoi.components.PanelRow>

                                    <areoi.components.PanelRow>
                                        <areoi.components.SelectControl
                                            label="Media Align"
                                            labelPosition="top"
                                            help="Specify how you would like your media to be aligned within the container."
                                            value={ attributes.media_align }
                                            options={ [
                                                { label: 'Start', value: 'start' },
                                                { label: 'Center', value: 'center' },
                                                { label: 'End', value: 'end' },
                                            ] }
                                            onChange={ setMediaAlign }
                                        />
                                    </areoi.components.PanelRow>
                                </>
                            }

                        </areoi.components.PanelBody>

                        { areoi.Background( areoi, attributes, onChange ) }

                        { areoi.ResponsiveTabPanel( tabDevice, meta, props ) }

					</InspectorControls>

					
					{ noticeUI }
					{ Platform.isWeb && (
						<GapStyles
							blockGap={ attributes.style?.spacing?.blockGap }
							clientId={ clientId }
						/>
					) }

					{ areoi.DisplayBackground( areoi, attributes ) }

					<div className={ areoi.helper.GetClassNameStr( [ container, 'h-100' ] ) }>
                        <div className={ areoi.helper.GetClassNameStr( row_classes ) }>
                            <div className="col">
                                
                                <div className={ areoi.helper.GetClassNameStr( prepend_row_classes ) }>
                                    <div className={ areoi.helper.GetClassNameStr( prepend_col_classes ) }>

                                        {
                                            attributes.prepend_display_heading && 

                                            <div className={ attributes.prepend_heading_color }>
                                                <areoi.editor.RichText
                                                    tagName={ attributes.prepend_heading_level }
                                                    value={ attributes.prepend_heading }
                                                    allowedFormats={ [ 'core/bold', 'core/italic' ] }
                                                    onChange={ ( value ) => onChange( 'prepend_heading', value ) }
                                                    placeholder={ 'Heading...' }
                                                />
                                            </div>
                                        }

                                        {
                                            attributes.prepend_display_intro && 

                                            <div className={ attributes.prepend_intro_color }>
                                                <areoi.editor.RichText
                                                    tagName="p"
                                                    value={ attributes.prepend_intro }
                                                    allowedFormats={ [ 'core/bold', 'core/italic' ] }
                                                    onChange={ ( value ) => onChange( 'prepend_intro', value ) }
                                                    placeholder={ 'Intro text...' }
                                                />
                                            </div>
                                        }

                                    </div>
                                </div>

                                <div className={ areoi.helper.GetClassNameStr( [ 'row', 'areoi-content-grid-columns', 'areoi-content-grid-columns-' + columns ] ) }>

                                    <Gallery
										{ ...props }
										images={ images }
										mediaPlaceholder={ mediaPlaceholder }
										blockProps={ blockProps }
										insertBlocksAfter={ insertBlocksAfter }
									/>

                                </div>
                            </div>
                        </div>
                    </div>

					
				</div>
			}
		</>
	);
}
export default compose( [
	withNotices,
	withViewportMatch( { isNarrow: '< small' } ),
] )( GalleryEdit );
