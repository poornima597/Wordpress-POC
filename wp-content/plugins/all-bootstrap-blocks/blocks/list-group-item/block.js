import * as areoi from '../_components/Core.js';
import meta from './block.json';

const ALLOWED_BLOCKS = [];
const BLOCKS_TEMPLATE = null;
const NEW_TAB_REL = 'noreferrer noopener';

const blockIcon = <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><rect fill="none" height="24" width="24"/><path d="M3,5v14h18V5H3z M7,7v2H5V7H7z M5,13v-2h2v2H5z M5,15h2v2H5V15z M19,17H9v-2h10V17z M19,13H9v-2h10V13z M19,9H9V7h10V9z"/></svg>;

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
            'list-group-item',
            attributes.style,
            (attributes.active ? 'active' : ''),
            (attributes.action ? 'list-group-item-action' : ''),
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
            className: areoi.helper.GetClassName( classes ),
            style: { cssText: areoi.helper.GetStyles( attributes ) }
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
            <>
                { areoi.DisplayPreview( areoi, attributes, onChange, 'list-group-item' ) }

                { !attributes.preview &&
                    <>
                        <div { ...blockProps }>
                            <areoi.editor.InspectorControls key="setting">

                                <areoi.components.PanelBody title={ 'Settings' } initialOpen={ false }>
                                    <areoi.components.PanelRow className="areoi-panel-row">
                                        <areoi.components.ToggleControl 
                                            label={ 'Active' }
                                            help="Add .active to a .list-group-item to indicate the current active selection."
                                            checked={ attributes['active'] }
                                            onChange={ ( value ) => onChange( 'active', value ) }
                                        />
                                    </areoi.components.PanelRow>

                                    <areoi.components.PanelRow className="areoi-panel-row">
                                        <areoi.components.ToggleControl 
                                            label={ 'Disabled' }
                                            help="Add .disabled to a .list-group-item to make it appear disabled. Note that some elements with .disabled will also require custom JavaScript to fully disable their click events (e.g., links)."
                                            checked={ attributes['disabled'] }
                                            onChange={ ( value ) => onChange( 'disabled', value ) }
                                        />
                                    </areoi.components.PanelRow>

                                    <areoi.components.PanelRow className="areoi-panel-row">
                                        <areoi.components.ToggleControl 
                                            label={ 'Action' }
                                            help="Contextual classes also work with .list-group-item-action. Note the addition of the hover styles."
                                            checked={ attributes['action'] }
                                            onChange={ ( value ) => onChange( 'action', value ) }
                                        />
                                    </areoi.components.PanelRow>

                                    <areoi.components.PanelRow>
                                        <areoi.components.SelectControl
                                            label="Contextual classes"
                                            labelPosition="top"
                                            help="Use contextual classes to style list items with a stateful background and color."
                                            value={ attributes.style }
                                            options={ [
                                                { label: 'Default', value: null },
                                                { label: 'Primary', value: 'list-group-item-primary' },
                                                { label: 'Secondary', value: 'list-group-item-secondary' },
                                                { label: 'Success', value: 'list-group-item-success' },
                                                { label: 'Danger', value: 'list-group-item-danger' },
                                                { label: 'Warning', value: 'list-group-item-warning' },
                                                { label: 'Info', value: 'list-group-item-info' },
                                                { label: 'Light', value: 'list-group-item-light' },
                                                { label: 'Dark', value: 'list-group-item-dark' },
                                            ] }
                                            onChange={ ( value ) => onChange( 'style', value ) }
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
        return null;
    },
} );