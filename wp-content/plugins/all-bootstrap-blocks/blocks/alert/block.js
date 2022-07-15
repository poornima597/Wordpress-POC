import * as areoi from '../_components/Core.js';
import meta from './block.json';

const ALLOWED_BLOCKS = null;
const BLOCKS_TEMPLATE = null;

const blockIcon = <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 5.99L19.53 19H4.47L12 5.99M12 2L1 21h22L12 2zm1 14h-2v2h2v-2zm0-6h-2v4h2v-4z"/></svg>;

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

        const classes = [
            'alert',
            attributes.style,
            attributes.close ? 'alert-dismissible fade show' : '',
            attributes.icon ? 'd-flex align-items-center' : ''
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
                { areoi.DisplayPreview( areoi, attributes, onChange, 'alert' ) }

                { !attributes.preview &&
                    <div { ...blockProps }>
                        <areoi.editor.InspectorControls key="setting">

                            <areoi.components.PanelBody title={ 'Settings' } initialOpen={ false }>
                                <areoi.components.PanelRow className="areoi-panel-row">
                                    <areoi.components.SelectControl
                                        label="Style"
                                        labelPosition="top"
                                        help="Alerts are available for any length of text, as well as an optional close button. For proper styling, use one of the eight required contextual classes (e.g., .alert-success)."
                                        value={ attributes.style }
                                        options={ [
                                            { label: 'Default', value: 'alert-primary' },
                                            { label: 'Primary', value: 'alert-primary' },
                                            { label: 'Secondary', value: 'alert-secondary' },
                                            { label: 'Success', value: 'alert-success' },
                                            { label: 'Danger', value: 'alert-danger' },
                                            { label: 'Warning', value: 'alert-warning' },
                                            { label: 'Info', value: 'alert-info' },
                                            { label: 'Light', value: 'alert-light' },
                                            { label: 'Dark', value: 'alert-dark' },
                                        ] }
                                        onChange={ ( value ) => onChange( 'style', value ) }
                                    />
                                </areoi.components.PanelRow>

                                { areoi.MediaUpload( areoi, attributes, onChange, 'Icon', 'image', 'icon' ) }

                                <areoi.components.PanelRow>
                                    <areoi.components.ToggleControl 
                                        label={ 'Display Close Button' }
                                        help="Add a close button and the .alert-dismissible class, which adds extra padding to the right of the alert and positions the close button."
                                        checked={ attributes.close }
                                        onChange={ ( value ) => onChange( 'close', value ) }
                                    />
                                </areoi.components.PanelRow>
                                

                            </areoi.components.PanelBody>

                            { areoi.ResponsiveTabPanel( tabDevice, meta, props ) }
                                
                        </areoi.editor.InspectorControls>

                        {   attributes.icon &&
                            <img 
                                class="icon bi flex-shrink-0 me-2" 
                                src={ attributes.icon.url }
                                width={ attributes.icon.width }
                                height={ attributes.icon.height }
                                alt={ attributes.icon.alt }
                            />
                        }

                        {   attributes.close &&
                            <button 
                                type="button" 
                                class="btn-close" 
                                data-bs-dismiss="alert" 
                                aria-label="Close">
                            </button>
                        }

                        <areoi.editor.InnerBlocks template={ BLOCKS_TEMPLATE } allowedBlocks={ ALLOWED_BLOCKS } />
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