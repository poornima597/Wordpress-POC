import * as areoi from '../_components/Core.js';
import meta from './block.json';

const ALLOWED_BLOCKS = null;
const BLOCKS_TEMPLATE = null;

const blockIcon = <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><rect fill="none" height="24" width="24"/><path d="M19,3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2V5C21,3.9,20.1,3,19,3z M19,5v3H5V5H19z M19,10v4H5v-4H19z M5,19v-3h14v3H5z"/></svg>;

areoi.blocks.registerBlockType( meta, {
    icon: blockIcon,
    edit: props => {
        const {
            attributes,
            setAttributes,
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
            if ( element.name == 'areoi/accordion' ) {
                parent_id = element.attributes.block_id;
            }
        });
        if ( parent_id ) {
            setAttributes( { parent_id: parent_id } );
        }

        const classes = [
            'accordion-item'
        ];

        const blockProps = areoi.editor.useBlockProps( {
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
                { areoi.DisplayPreview( areoi, attributes, onChange, 'accordion-item' ) }

                { !attributes.preview &&
                    <div { ...blockProps }>
                        <areoi.editor.InspectorControls key="setting">

                            <areoi.components.PanelBody title={ 'Settings' } initialOpen={ false }>
                                <areoi.components.PanelRow className="areoi-panel-row">
                                    <areoi.components.ToggleControl 
                                        label={ 'Open' }
                                        help="The accordion uses collapse internally to make it collapsible. To render an accordion that’s expanded, add the .open class on the .accordion."
                                        checked={ attributes['open'] }
                                        onChange={ ( value ) => onChange( 'open', value ) }
                                    />
                                </areoi.components.PanelRow>

                                <areoi.components.PanelRow className="areoi-panel-row">
                                    <areoi.components.ToggleControl 
                                        label={ 'Always Open' }
                                        help="Omit the data-bs-parent attribute on each .accordion-collapse to make accordion items stay open when another item is opened."
                                        checked={ attributes['always_open'] }
                                        onChange={ ( value ) => onChange( 'always_open', value ) }
                                    />
                                </areoi.components.PanelRow>

                                <areoi.components.PanelRow>
                                    <areoi.components.SelectControl
                                        label="Heading"
                                        labelPosition="top"
                                        help="Specify the element type to apply to the accordion header."
                                        value={ attributes.heading }
                                        options={ [
                                            { label: 'Default', value: 'h1' },
                                            { label: 'H1', value: 'h1' },
                                            { label: 'H2', value: 'h2' },
                                            { label: 'H3', value: 'h3' },
                                            { label: 'H4', value: 'h4' },
                                            { label: 'H5', value: 'h5' },
                                            { label: 'H6', value: 'h6' },
                                            { label: 'p', value: 'p' },
                                        ] }
                                        onChange={ ( value ) => onChange( 'heading', value ) }
                                    />
                                </areoi.components.PanelRow>

                            </areoi.components.PanelBody>

                            { areoi.ResponsiveTabPanel( tabDevice, meta, props ) }
                                
                        </areoi.editor.InspectorControls>

                        <div className="accordion-header">
                            <areoi.editor.RichText
                                tagName={ attributes.heading }
                                className="accordion-button"
                                value={ attributes.title }
                                allowedFormats={ [ 'core/bold', 'core/italic' ] }
                                onChange={ ( value ) => onChange( 'title', value ) }
                                placeholder={ areoi.__( 'Heading...' ) }
                            />
                        </div>
                        <div className="accordion-collapse collapse show">
                            <div className="accordion-body">
                                <areoi.editor.InnerBlocks template={ BLOCKS_TEMPLATE } allowedBlocks={ ALLOWED_BLOCKS } />
                            </div>
                        </div>
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