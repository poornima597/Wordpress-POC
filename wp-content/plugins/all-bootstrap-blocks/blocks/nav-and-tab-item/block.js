import * as areoi from '../_components/Core.js';
import meta from './block.json';

const ALLOWED_BLOCKS = [ 'areoi/nav-and-tab-item' ];
const BLOCKS_TEMPLATE = null;
const NEW_TAB_REL = 'noreferrer noopener';

const blockIcon = <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"/><path d="M21 3H3c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H3V5h10v4h8v10z"/></svg>;

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

        const classes = [
            'nav-link',
            attributes.active ? 'active' : '',
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

        const setButtonText = ( newText ) => {
            // Remove anchor tags from button text content.
            setAttributes( { text: newText.replace( /<\/?a[^>]*>/g, '' ) } );
        };

        const ref = areoi.element.useRef();
        const richTextRef = areoi.element.useRef();
        const blockProps = areoi.editor.useBlockProps( {
            className: areoi.helper.GetClassName( classes ),
            style: { cssText: areoi.helper.GetStyles( attributes ) },
            ref
        } );

        function onChange( key, value ) {
            setAttributes( { [key]: value } );
        }

        const tabDevice = ( tab ) => {
            return (
                <div>
                    { areoi.DisplayVisibility( areoi, attributes, onChange, tab ) }
                </div>
            );
        };
 
        return (
            <div { ...blockProps }>
                { areoi.DisplayPreview( areoi, attributes, onChange, 'nav-and-tab-item' ) }

                { !attributes.preview &&
                    <>
                        <areoi.editor.InspectorControls key="setting">

                            <areoi.components.PanelBody title={ 'Settings' } initialOpen={ false }>

                                <areoi.components.PanelRow className="areoi-panel-row">
                                    <areoi.components.ToggleControl 
                                        label={ 'Active' }
                                        help="Add .active to a .nav-item to indicate the current active selection."
                                        checked={ attributes['active'] }
                                        onChange={ ( value ) => onChange( 'active', value ) }
                                    />
                                </areoi.components.PanelRow>

                                <areoi.components.PanelRow>
                                    <areoi.components.ToggleControl 
                                        label={ 'Disabled' }
                                        help="Add .disabled to a .nav-item to make it appear disabled. Note that some elements with .disabled will also require custom JavaScript to fully disable their click events (e.g., links)."
                                        checked={ attributes['disabled'] }
                                        onChange={ ( value ) => onChange( 'disabled', value ) }
                                    />
                                </areoi.components.PanelRow>                                    

                            </areoi.components.PanelBody>

                            { areoi.ResponsiveTabPanel( tabDevice, meta, props ) }
                                
                        </areoi.editor.InspectorControls>
                        
                        <areoi.editor.RichText
                            ref={ richTextRef }
                            aria-label={ areoi.__( 'Button text' ) }
                            placeholder={ areoi.__( 'Add text…' ) }
                            value={ text }
                            onChange={ ( value ) => setButtonText( value ) }
                            withoutInteractiveFormatting
                            onSplit={ ( value ) =>
                                createBlock( 'areoi/button', {
                                    ...attributes,
                                    text: value,
                                } )
                            }
                            onReplace={ onReplace }
                            onMerge={ mergeBlocks }
                            identifier="text"
                        />

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
                    </>
                }
            </div>
        );
    },
    save: ({ attributes, className }) => { 
        return (
            <areoi.editor.InnerBlocks.Content/>
        );
    },
} );