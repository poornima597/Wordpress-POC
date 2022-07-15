import * as areoi from '../_components/Core.js';
import * as grid from './template-parts-js/grid.js';
import * as stacked from './template-parts-js/stacked.js';
import * as carousel from './template-parts-js/carousel.js';
import meta from './block.json';

const ALLOWED_BLOCKS    = [ 'core/heading', 'core/paragraph', 'areoi/button', 'core/image', 'core/video', 'areoi/icon' ];
const BLOCKS_TEMPLATE   = null;
const NEW_TAB_REL       = 'noreferrer noopener';
const blockIcon         = <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><rect fill="none" height="24" width="24"/><path d="M19,3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2V5C21,3.9,20.1,3,19,3z M19,5v3H5V5H19z M19,10v4H5v-4H19z M5,19v-3h14v3H5z"/></svg>;

areoi.blocks.registerBlockType( meta, {
    icon: blockIcon,
    edit: props => {
        const {
            attributes,
            setAttributes,
            className,
            isSelected,
            onReplace,
            mergeBlocks,
            clientId
        } = props;

        const { block_id } = attributes;
        if ( !block_id || ( block_id != clientId ) ) {
            setAttributes( { block_id: clientId } );
        }

        const parentBlocks      = wp.data.select( 'core/block-editor' ).getBlockParents(props.clientId); 
        const parentAttributes  = wp.data.select('core/block-editor').getBlocksByClientId(parentBlocks);
        
        var parent_id = false;
        parentAttributes.forEach(element => {
            if ( element.name == 'areoi/banner' ) {
                parent_id = element.attributes.block_id;
            }
        });
        if ( parent_id ) {
            setAttributes( { parent_id: parent_id } );
        }

        let parent          = wp.data.select( 'core/block-editor' ).getBlock( parent_id ).attributes,
            layout          = parent['layout'] ? parent['layout'] : 'stacked',
            container       = layout == 'grid' ? 'container-fluid' : 'container';
        
        const classes = [
            'banner-item'
        ];

        const {
            linkTarget,
            rel,
            text,
            url,
        } = attributes;
        const onSetLinkRel = areoi.element.useCallback(
            ( value ) => {
                setAttributes( { rel: value } );
            },
            [ setAttributes ]
        );

        const onToggleOpenInNewTab = areoi.element.useCallback(
            ( value ) => {
                const newLinkTarget = value ? '_blank' : undefined;

                let updatedRel = rel;
                if ( newLinkTarget && ! rel ) {
                    updatedRel = NEW_TAB_REL;
                } else if ( ! newLinkTarget && rel === NEW_TAB_REL ) {
                    updatedRel = undefined;
                }

                setAttributes( {
                    linkTarget: newLinkTarget,
                    rel: updatedRel,
                } );
            },
            [ rel, setAttributes ]
        );

        const ref = areoi.element.useRef();
        const richTextRef = areoi.element.useRef();
        const blockProps = areoi.editor.useBlockProps( {
            ref,
            className: areoi.helper.GetClassName( classes ),
            style: { cssText: areoi.helper.GetStyles( attributes ) }
        } );

        function onChange( key, value ) {
            setAttributes( { [key]: value } );
        }

        const tabDevice = ( tab ) => {
            var append = ( tab.name == 'xs' ? '' : '-' + tab.name );

            return (
                <div>
                    { areoi.DeviceLayout( areoi, attributes, onChange, tab ) }

                    { areoi.DeviceBackground( areoi, attributes, onChange, tab ) }
                </div>
            );
        };
 
        return (
            <>
                { areoi.DisplayPreview( areoi, attributes, onChange, 'banner-item' ) }

                { !attributes.preview &&
                    <div { ...blockProps }>
                        <areoi.editor.InspectorControls key="setting">

                            { areoi.Background( areoi, attributes, onChange ) }

                            { layout != 'grid' &&
                                <areoi.components.PanelBody title={ 'Media' } initialOpen={ false }>

                                    { areoi.MediaUpload( areoi, attributes, onChange, 'Image', 'image', 'image' ) }

                                    { areoi.MediaUpload( areoi, attributes, onChange, 'Video', 'video', 'video' ) }

                                </areoi.components.PanelBody>
                            }


                            { areoi.ResponsiveTabPanel( tabDevice, meta, props ) }
                                
                        </areoi.editor.InspectorControls>

                        

                        { layout == 'stacked' &&
                            <>
                                { stacked.render( areoi, attributes, container, BLOCKS_TEMPLATE, ALLOWED_BLOCKS ) }
                            </>
                        }
                        
                        { layout == 'grid' &&
                            <>
                                { grid.render( areoi, attributes, container, BLOCKS_TEMPLATE, ALLOWED_BLOCKS ) }
                            </>
                        }
                        
                        { layout == 'carousel' &&
                            <>
                                { carousel.render( areoi, attributes, container, BLOCKS_TEMPLATE, ALLOWED_BLOCKS ) }
                            </>
                        }

                        <areoi.URLPicker
                            areoi={ areoi }
                            url={ url }
                            setAttributes={ setAttributes }
                            isSelected={ isSelected }
                            opensInNewTab={ linkTarget === '_blank' }
                            onToggleOpenInNewTab={ onToggleOpenInNewTab }
                            anchorRef={ ref }
                            richTextRef={ richTextRef }
                        />
                    </div>
                }
            </>
        );
    },
    save: () => { 
        return (
            <areoi.editor.InnerBlocks.Content/>
        );
    },
} );