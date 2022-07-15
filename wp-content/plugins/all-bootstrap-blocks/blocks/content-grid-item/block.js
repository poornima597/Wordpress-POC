import * as areoi from '../_components/Core.js';
import * as card from './template-parts-js/card.js';
import * as full from './template-parts-js/full.js';
import * as flush from './template-parts-js/flush.js';
import meta from './block.json';

const ALLOWED_BLOCKS = null;
const BLOCKS_TEMPLATE = null;
const NEW_TAB_REL = 'noreferrer noopener';

const blockIcon = <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><rect fill="none" height="24" width="24"/><path d="M3,5v14h18V5H3z M8.33,17H5V7h3.33V17z M13.67,17h-3.33v-4h3.33V17z M19,17h-3.33v-4H19V17z M19,11h-8.67V7H19V11z"/></svg>;

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
            if ( element.name == 'areoi/content-grid' ) {
                parent_id = element.attributes.block_id;
            }
        });
        if ( parent_id ) {
            setAttributes( { parent_id: parent_id } );
        }

        let style           = attributes['style'] ? attributes['style'] : 'card';
        
        const classes = [
            'areoi-content-grid-item'
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

        const card_classes = [
            attributes.vertical_align_xs,
            attributes.vertical_align_sm,
            attributes.vertical_align_md,
            attributes.vertical_align_lg,
            attributes.vertical_align_xl,
            attributes.vertical_align_xxl,

            attributes.horizontal_align_xs,
            attributes.horizontal_align_sm,
            attributes.horizontal_align_md,
            attributes.horizontal_align_lg,
            attributes.horizontal_align_xl,
            attributes.horizontal_align_xxl,
        ];
        
        function onChange( key, value ) {
            setAttributes( { [key]: value } );
        }

        const tabDevice = ( tab ) => {
            var append = ( tab.name == 'xs' ? '' : '-' + tab.name );

            return (
                <div>
                    { areoi.DeviceLayout( areoi, attributes, onChange, tab ) }

                    { !attributes['hide_' + tab.name] &&
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
                    }

                    { areoi.DeviceBackground( areoi, attributes, onChange, tab ) }
                </div>
            );
        };
 
        return (
            <>
                { areoi.DisplayPreview( areoi, attributes, onChange, 'content-grid-item' ) }

                { !attributes.preview &&
                    <div { ...blockProps }>
                        <areoi.editor.InspectorControls key="setting">

                            { areoi.Background( areoi, attributes, onChange ) }

                            <areoi.components.PanelBody title={ 'Media' } initialOpen={ false }>

                                { areoi.MediaUpload( areoi, attributes, onChange, 'Image', 'image', 'image' ) }

                                { areoi.MediaUpload( areoi, attributes, onChange, 'Video', 'video', 'video' ) }

                            </areoi.components.PanelBody>

                            { areoi.ResponsiveTabPanel( tabDevice, meta, props ) }
                                
                        </areoi.editor.InspectorControls>

                        

                        { style == 'card' &&
                            <>
                                { card.render( areoi, attributes, card_classes, BLOCKS_TEMPLATE, ALLOWED_BLOCKS ) }
                            </>
                        }
                        
                        { style == 'full' &&
                            <>
                                { full.render( areoi, attributes, card_classes, BLOCKS_TEMPLATE, ALLOWED_BLOCKS ) }
                            </>
                        }
                        
                        { style == 'flush' &&
                            <>
                                { flush.render( areoi, attributes, card_classes, BLOCKS_TEMPLATE, ALLOWED_BLOCKS ) }
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