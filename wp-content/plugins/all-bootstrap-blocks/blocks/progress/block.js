import * as areoi from '../_components/Core.js';
import meta from './block.json';

const ALLOWED_BLOCKS = [];
const BLOCKS_TEMPLATE = null;

const blockIcon = <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/></g><g><g><path d="M12,2C6.48,2,2,6.48,2,12c0,5.52,4.48,10,10,10s10-4.48,10-10C22,6.48,17.52,2,12,2z M12,20c-4.42,0-8-3.58-8-8 c0-4.42,3.58-8,8-8s8,3.58,8,8C20,16.42,16.42,20,12,20z"/><circle cx="7" cy="12" r="1.5"/><circle cx="12" cy="12" r="1.5"/><circle cx="17" cy="12" r="1.5"/></g></g></svg>;

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
            'progress'
        ];

        const bar_classes = [
            'progress-bar',
            attributes.background,
            attributes.striped ? 'progress-bar-striped' : '',
            attributes.animated ? 'progress-bar-animated' : ''
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
                    { areoi.DeviceLayout( areoi, attributes, onChange, tab ) }
                </div>
            );
        };
 
        return (
            <>
                { areoi.DisplayPreview( areoi, attributes, onChange, 'progress' ) }

                { !attributes.preview &&
                    <div { ...blockProps }>
                        <areoi.editor.InspectorControls key="setting">

                            <areoi.components.PanelBody title={ 'Settings' } initialOpen={ false }>

                                <areoi.components.PanelRow className="areoi-panel-row">
                                    <label className="areoi-panel-row__label">Width</label>
                                    <table>
                                        <tr>
                                            <td>
                                                <areoi.components.TextControl
                                                    label="Dimensions"
                                                    value={ attributes['width'] }
                                                    onChange={ ( value ) => onChange( 'width', value ) }
                                                />
                                            </td>
                                            <td>
                                                %
                                            </td>
                                        </tr>
                                    </table>
                                    <p className="components-base-control__help css-1gbp77-StyledHelp">Specify the width of the inner progress bar.</p>
                                </areoi.components.PanelRow>

                                <areoi.components.PanelRow className="areoi-panel-row">
                                    <areoi.components.ToggleControl 
                                        label={ 'Include Label' }
                                        help="Add labels to your progress bars by placing text within the .progress-bar."
                                        checked={ attributes['label'] }
                                        onChange={ ( value ) => onChange( 'label', value ) }
                                    />
                                </areoi.components.PanelRow>

                                <areoi.components.PanelRow className="areoi-panel-row">
                                    <areoi.components.ToggleControl 
                                        label={ 'Include Stripes' }
                                        help="Add .progress-bar-striped to any .progress-bar to apply a stripe via CSS gradient over the progress bar’s background color."
                                        checked={ attributes['striped'] }
                                        onChange={ ( value ) => onChange( 'striped', value ) }
                                    />
                                </areoi.components.PanelRow>

                                <areoi.components.PanelRow className="areoi-panel-row">
                                    <areoi.components.ToggleControl 
                                        label={ 'Include Animation' }
                                        help="The striped gradient can also be animated. Add .progress-bar-animated to .progress-bar to animate the stripes right to left via CSS3 animations."
                                        checked={ attributes['animated'] }
                                        onChange={ ( value ) => onChange( 'animated', value ) }
                                    />
                                </areoi.components.PanelRow>

                                <areoi.components.PanelRow>
                                    <areoi.components.SelectControl
                                        label="Background"
                                        labelPosition="top"
                                        help="Use background utility classes to change the appearance of individual progress bars."
                                        value={ attributes.background }
                                        options={ [
                                            { label: 'Default', value: null },
                                            { label: 'Primary', value: 'bg-primary' },
                                            { label: 'Secondary', value: 'bg-secondary' },
                                            { label: 'Success', value: 'bg-success' },
                                            { label: 'Danger', value: 'bg-danger' },
                                            { label: 'Warning', value: 'bg-warning' },
                                            { label: 'Info', value: 'bg-info' },
                                            { label: 'Light', value: 'bg-light' },
                                            { label: 'Dark', value: 'bg-dark' },
                                        ] }
                                        onChange={ ( value ) => onChange( 'background', value ) }
                                    />
                                </areoi.components.PanelRow>

                            </areoi.components.PanelBody>

                            { areoi.ResponsiveTabPanel( tabDevice, meta, props ) }
                                
                        </areoi.editor.InspectorControls>

                        <div style={{ width: attributes.width + '%' } } className={ areoi.helper.GetClassNameStr( bar_classes ) }>
                            { attributes.label ? attributes.width + '%' : '' }
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