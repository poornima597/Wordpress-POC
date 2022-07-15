import * as areoi from '../_components/Core.js';
import meta from './block.json';
import icons from './icons.json';

const ALLOWED_BLOCKS = [];
const BLOCKS_TEMPLATE = null;

const blockIcon = <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/></svg>;

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
            'areoi-icon',
            attributes['horizontal_align_xs'] ? attributes['horizontal_align_xs'] : '',
            attributes['horizontal_align_sm'] ? attributes['horizontal_align_sm'] : '',
            attributes['horizontal_align_md'] ? attributes['horizontal_align_md'] : '',
            attributes['horizontal_align_lg'] ? attributes['horizontal_align_lg'] : '',
            attributes['horizontal_align_xl'] ? attributes['horizontal_align_xl'] : '',
            attributes['horizontal_align_xxl'] ? attributes['horizontal_align_xxl'] : '',
        ];

        const blockProps = areoi.editor.useBlockProps( {
            className: areoi.helper.GetClassName( classes ),
            style: { cssText: areoi.helper.GetStyles( attributes ) }
        } );

        const iconProps = {
            className: areoi.helper.GetClassNameStr( [
                attributes.style,
                attributes.icon,
            ] ),
            style: { 'font-size': attributes.size + 'px' }
        };

        function onChange( key, value ) {
            setAttributes( { [key]: value } );
        }

        const IconControl = areoi.compose.compose(
            wp.data.withSelect( function( select, props ) {
                var search = props.attributes['icon_search'];
                var icons = props.icons;
                if ( search ) {
                    icons = icons.filter(icon => icon.includes(search));
                }
                return {
                    icons
                }
            } ) )( function( props ) {
                
                var attributes = props.attributes;
                var icons = props.icons;

                var icon_output = [];
                icons.forEach((icon) => {

                    var key = 'icon';

                    var new_output = 
                    <div 
                        onClick={ () => setAttributes( { [key]: icon } ) }
                        className={ 'areoi-icon-list-item' + ( attributes[key] == icon ? ' selected' : '' ) }
                    >
                        <i className={ icon }></i> 
                        { icon }
                    </div>
                    icon_output.push( new_output );
                });

                return (
                    <div class="areoi-icon-list">
                        { icon_output }
                    </div>
                );
            }

        );

        const tabDevice = ( tab ) => {
            var append = ( tab.name == 'xs' ? '' : '-' + tab.name );

            return (
                <div>
                    { areoi.DisplayVisibility( areoi, attributes, onChange, tab ) }

                    <areoi.components.PanelBody title={ 'Settings (' + tab.title + ')' } initialOpen={ false }> 
                        <areoi.components.PanelRow>
                            <areoi.components.SelectControl
                                label="Horizontal Align"
                                labelPosition="top"
                                help="Align icon from left to right. This will be applied to all greater device sizes unless overridden."
                                value={ attributes['horizontal_align_' + tab.name] }
                                options={ [
                                    { label: 'Default', value: null },
                                    { label: 'Start', value: 'text' + append + '-start' },
                                    { label: 'Center', value: 'text' + append + '-center' },
                                    { label: 'End', value: 'text' + append + '-end' },
                                ] }
                                onChange={ ( value ) => onChange( 'horizontal_align_' + tab.name, value ) }
                            />
                        </areoi.components.PanelRow>
                    </areoi.components.PanelBody>
                </div>
            );
        };
 
        return (
            <>
                { areoi.DisplayPreview( areoi, attributes, onChange, 'icon' ) }

                { !attributes.preview &&
                    <div { ...blockProps }>
                        <areoi.editor.InspectorControls key="setting">

                            <areoi.components.PanelBody title={ 'Settings' } initialOpen={ false }>
                                <areoi.components.PanelRow className="areoi-panel-row">
                                    <areoi.components.SelectControl
                                        label="Style"
                                        labelPosition="top"
                                        help="Choose the colour of your icon from the available theme colours."
                                        value={ attributes.style }
                                        options={ [
                                            { label: 'Default', value: 'text-primary' },
                                            { label: 'Primary', value: 'text-primary' },
                                            { label: 'Secondary', value: 'text-secondary' },
                                            { label: 'Success', value: 'text-success' },
                                            { label: 'Danger', value: 'text-danger' },
                                            { label: 'Warning', value: 'text-warning' },
                                            { label: 'Info', value: 'text-info' },
                                            { label: 'Light', value: 'text-light' },
                                            { label: 'Dark', value: 'text-dark' },
                                        ] }
                                        onChange={ ( value ) => onChange( 'style', value ) }
                                    />
                                </areoi.components.PanelRow>

                                <areoi.components.PanelRow className="areoi-panel-row">
                                    <areoi.components.SelectControl
                                        label="Size"
                                        labelPosition="top"
                                        help="Choose the size to diaply your icon. Eaxtra small is 12px, Small is 24px, Medium is 36px, Large is 48px, Extra Large is 60px and Extra Extra Large is 80px."
                                        value={ attributes.size }
                                        options={ [
                                            { label: 'Extra Small', value: '12' },
                                            { label: 'Small', value: '24' },
                                            { label: 'Medium', value: '36' },
                                            { label: 'Large', value: '48' },
                                            { label: 'Extra Large', value: '60' },
                                            { label: 'Extra Extra Large', value: '80' },
                                        ] }
                                        onChange={ ( value ) => onChange( 'size', value ) }
                                    />
                                </areoi.components.PanelRow>

                                <div class="components-panel__row">
                                    <div className="components-base-control">
                                        <label>Icon</label>
                                        
                                        <areoi.components.TextControl className="areoi-icon-base-control"
                                            placeholder="Search Icons"
                                            labelPosition="top"
                                            help=""
                                            value={ attributes['icon_search'] }
                                            onChange={ ( value ) => onChange( 'icon_search', value ) }
                                        />

                                        {
                                            attributes['icon'] && 
                                            <div className={ 'areoi-icon-list-item selected highlighted' }>
                                                <i className={ attributes['icon'] }></i>
                                                { attributes['icon'] }
                                            </div>
                                        }
                                    </div>
                                </div>
                                <IconControl attributes={attributes} icons={icons} />

                            </areoi.components.PanelBody>

                            { areoi.ResponsiveTabPanel( tabDevice, meta, props ) }
                                
                        </areoi.editor.InspectorControls>

                        {  attributes.icon &&
                            <i { ...iconProps }></i>
                        }

                        <areoi.editor.InnerBlocks template={ BLOCKS_TEMPLATE } allowedBlocks={ ALLOWED_BLOCKS } />
                    </div>
                }
            </>
        );
    },
    save: ({ attributes }) => { 
        const className = 'areoi-icon ' + areoi.helper.GetClassNameStr([
            attributes['horizontal_align_xs'] ? attributes['horizontal_align_xs'] : '',
            attributes['horizontal_align_sm'] ? attributes['horizontal_align_sm'] : '',
            attributes['horizontal_align_md'] ? attributes['horizontal_align_md'] : '',
            attributes['horizontal_align_lg'] ? attributes['horizontal_align_lg'] : '',
            attributes['horizontal_align_xl'] ? attributes['horizontal_align_xl'] : '',
            attributes['horizontal_align_xxl'] ? attributes['horizontal_align_xxl'] : '',
        ]);

        const iconProps = {
            className: areoi.helper.GetClassNameStr( [
                attributes.style,
                attributes.icon,
            ] ),
            style: { 'font-size': attributes.size + 'px' }
        };

        const icon = (
            <i { ...iconProps }></i>
        );

        return (
            <div { ...areoi.editor.useBlockProps.save( { className: className } ) }>
                { icon }
            </div>
        );
    },
} );