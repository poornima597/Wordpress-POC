import * as areoi from '../_components/Core.js';
import meta from './block.json';

const ALLOWED_BLOCKS = null;
const BLOCKS_TEMPLATE = null;
const NEW_TAB_REL = 'noreferrer noopener';

const blockIcon = <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M22 13h-8v-2h8v2zm0-6h-8v2h8V7zm-8 10h8v-2h-8v2zm-2-8v6c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V9c0-1.1.9-2 2-2h6c1.1 0 2 .9 2 2zm-1.5 6l-2.25-3-1.75 2.26-1.25-1.51L3.5 15h7z"/></svg>;

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

        var order = ( attributes['alignment'] == 'start' ) ? 0 : 1;
        var background_row = ( order == 0 ) ? 'justify-content-end' : 'justify-content-start';
        
        const classes = [
            'areoi-content-with-media',
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
                { areoi.DisplayPreview( areoi, attributes, onChange, 'content-with-media' ) }

                { !attributes.preview &&
                    <div { ...blockProps }>
                        <areoi.editor.InspectorControls key="setting">

                            <areoi.components.PanelBody title={ 'Settings' } initialOpen={ false }>

                                <areoi.components.PanelRow>
                                    <areoi.components.SelectControl
                                        label="Layout"
                                        labelPosition="top"
                                        help="Choose whether to display fixed media or media that bleeds to the edge of the page."
                                        value={ attributes.layout }
                                        options={ [
                                            { label: 'Fixed', value: 'fixed' },
                                            { label: 'Full Width', value: 'full-width' },
                                        ] }
                                        onChange={ ( value ) => onChange( 'layout', value ) }
                                    />
                                </areoi.components.PanelRow>

                                <areoi.components.PanelRow>
                                    <areoi.components.SelectControl
                                        label="Alignment"
                                        labelPosition="top"
                                        help="Specify which side the content and media should be on."
                                        value={ attributes.alignment }
                                        options={ [
                                            { label: 'Content Left, Media Right', value: 'start' },
                                            { label: 'Content Right, Media Left', value: 'end' },
                                        ] }
                                        onChange={ ( value ) => onChange( 'alignment', value ) }
                                    />
                                </areoi.components.PanelRow>

                            </areoi.components.PanelBody>

                            { areoi.Background( areoi, attributes, onChange ) }

                            <areoi.components.PanelBody title={ 'Media' } initialOpen={ false }>

                                { areoi.MediaUpload( areoi, attributes, onChange, 'Image', 'image', 'image' ) }

                                { areoi.MediaUpload( areoi, attributes, onChange, 'Video', 'video', 'video' ) }

                            </areoi.components.PanelBody>


                            { areoi.ResponsiveTabPanel( tabDevice, meta, props ) }
                                
                        </areoi.editor.InspectorControls>

                        { areoi.DisplayBackground( areoi, attributes ) }

                        <div class="d-flex flex-grow-1 align-items-center position-relative">
                            { attributes['layout'] == 'full-width' &&

                                <div className={ areoi.helper.GetClassNameStr( [ 
                                    'background'
                                ] ) }>
                                    <div className="container-fluid">
                                        <div className={ areoi.helper.GetClassNameStr( [ 
                                                'row',
                                                'd-flex',
                                                background_row 
                                            ] ) }>
                                            <div className={ areoi.helper.GetClassNameStr( [ 
                                                'col-6',
                                                'position-relative',
                                                'overflow-hidden'
                                            ] ) }>

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
                                </div>

                            }
                        
                            <div class="container">
                                <div class="row justify-content-between align-items-center">
                                    <div className={ areoi.helper.GetClassNameStr( [ 'order-lg-' + order, 'col-11', 'col-md-8', 'col-lg-6', 'col-xl-5', 'position-relative', 'areoi-content-with-media-content' ] ) }>
                                        <areoi.editor.InnerBlocks template={ BLOCKS_TEMPLATE } allowedBlocks={ ALLOWED_BLOCKS } />
                                    </div>

                                    <div class="col-12 col-lg-6 position-relative"> 
                                        { attributes['layout'] == 'fixed' &&
                                            <>                      
                                                { attributes['image'] && attributes['image']['url'] && 
                                                    <img src={ attributes['image']['url'] } class="img-fluid" />
                                                }

                                                { attributes['video'] && attributes['video']['url'] &&
                                                    <video>
                                                        <source src={ attributes['video']['url'] } />
                                                    </video>
                                                }
                                            </>
                                        }
                                    </div>

                                </div>
                            </div>
                        </div>

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