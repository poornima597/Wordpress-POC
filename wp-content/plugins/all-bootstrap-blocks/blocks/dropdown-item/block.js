import * as areoi from '../_components/Core.js';
import meta from './block.json';

const ALLOWED_BLOCKS = null;
const BLOCKS_TEMPLATE = null;
const NEW_TAB_REL = 'noreferrer noopener';

const blockIcon = <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/><path d="M22,9v6c0,1.1-0.9,2-2,2h-1l0-2h1V9H4v6h6v2H4c-1.1,0-2-0.9-2-2V9c0-1.1,0.9-2,2-2h16C21.1,7,22,7.9,22,9z M14.5,19 l1.09-2.41L18,15.5l-2.41-1.09L14.5,12l-1.09,2.41L11,15.5l2.41,1.09L14.5,19z M17,14l0.62-1.38L19,12l-1.38-0.62L17,10l-0.62,1.38 L15,12l1.38,0.62L17,14z M14.5,19l1.09-2.41L18,15.5l-2.41-1.09L14.5,12l-1.09,2.41L11,15.5l2.41,1.09L14.5,19z M17,14l0.62-1.38 L19,12l-1.38-0.62L17,10l-0.62,1.38L15,12l1.38,0.62L17,14z"/></g></svg>;

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
            attributes.type,
            attributes.active ? 'active' : ''
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
            ref,
            className: classes
        } );
        const btnProps = {
            className: areoi.helper.GetClassNameStr( classes ),
            style: { cssText: areoi.helper.GetStyles( attributes ) }
        };

        function onChange( key, value ) {
            setAttributes( { [key]: value } );
        }
 
        return (
            <>
                { areoi.DisplayPreview( areoi, attributes, onChange, 'dropdown-item' ) }

                { !attributes.preview &&
                    <>
                        <div { ...blockProps }>
                            <areoi.editor.InspectorControls key="setting">

                                <areoi.components.PanelBody title={ 'Settings' } initialOpen={ false }>
                                    <areoi.components.PanelRow className="areoi-panel-row">
                                        <areoi.components.SelectControl
                                            label="Type"
                                            labelPosition="top"
                                            help="Choose how you would like the item to be displayed."
                                            value={ attributes.type }
                                            options={ [
                                                { label: 'Link', value: 'dropdown-item' },
                                                { label: 'Header', value: 'dropdown-header' },
                                                { label: 'Divider', value: 'dropdown-divider' },
                                                { label: 'Text', value: 'p-3' },
                                            ] }
                                            onChange={ ( value ) => onChange( 'type', value ) }
                                        />
                                    </areoi.components.PanelRow>

                                    <areoi.components.PanelRow className="areoi-panel-row">
                                        <areoi.components.ToggleControl 
                                            label={ 'Active' }
                                            help="Add .active to items in the dropdown to style them as active. "
                                            checked={ attributes['active'] }
                                            onChange={ ( value ) => onChange( 'active', value ) }
                                        />
                                    </areoi.components.PanelRow>

                                    <areoi.components.PanelRow>
                                        <areoi.components.ToggleControl 
                                            label={ 'Disabled' }
                                            help="Add .disabled to items in the dropdown to style them as disabled."
                                            checked={ attributes['disabled'] }
                                            onChange={ ( value ) => onChange( 'disabled', value ) }
                                        />
                                    </areoi.components.PanelRow>

                                </areoi.components.PanelBody>
                                    
                            </areoi.editor.InspectorControls>

                            {
                                attributes.type != 'dropdown-divider' &&
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
                            }
                                
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
                    </>
                }
            </>
        );
    },
    save: ({ attributes, className }) => { 
        return (
            <areoi.editor.InnerBlocks.Content/>
        );
    },
} );