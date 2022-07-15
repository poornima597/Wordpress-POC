import * as areoi from '../_components/Core.js';
import meta from './block.json';

const ALLOWED_BLOCKS = [ 'areoi/nav-and-tab-item' ];
const BLOCKS_TEMPLATE = [ 
    ['areoi/nav-and-tab-item', {} ],
    ['areoi/nav-and-tab-item', {} ]
];

const blockIcon = <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"/><path d="M21 3H3c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H3V5h10v4h8v10z"/></svg>;

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
            'nav',
            attributes.style,
            attributes.vertical,
            attributes.fill,

            attributes.horizontal_align_xs,
            attributes.horizontal_align_sm,
            attributes.horizontal_align_md,
            attributes.horizontal_align_lg,
            attributes.horizontal_align_xl,
            attributes.horizontal_align_xxl,

            attributes.vertical_align_xs,
            attributes.vertical_align_sm,
            attributes.vertical_align_md,
            attributes.vertical_align_lg,
            attributes.vertical_align_xl,
            attributes.vertical_align_xxl,
        ];

        const blockProps = areoi.editor.useBlockProps( {
            className: areoi.helper.GetClassName( classes ),
            style: { cssText: areoi.helper.GetStyles( attributes ) }
        } );

        function onChange( key, value ) {
            setAttributes( { [key]: value } );
        }

        const tabDevice = ( tab ) => {
            var append = ( tab.name == 'xs' ? '' : '-' + tab.name );

            return (
                <>
                    { areoi.DisplayVisibility( areoi, attributes, onChange, tab ) }

                    { !attributes['hide_' + tab.name] &&
                        <areoi.components.PanelBody title={ 'Settings (' + tab.title + ')' } initialOpen={ false }> 
                            
                            <areoi.components.PanelRow className="areoi-panel-row">
                                <areoi.components.SelectControl
                                    label="Horizontal Align"
                                    labelPosition="top"
                                    help="Change the horizontal alignment of your nav with flexbox utilities. By default, navs are left-aligned, but you can easily change them to center or right aligned."
                                    value={ attributes['horizontal_align_' + tab.name] }
                                    options={ [
                                        { label: 'Default', value: null },
                                        { label: 'Start', value: 'justify-content' + append + '-start' },
                                        { label: 'Center', value: 'justify-content' + append + '-center' },
                                        { label: 'End', value: 'justify-content' + append + '-end' },
                                        { label: 'Around', value: 'justify-content' + append + '-around' },
                                        { label: 'Between', value: 'justify-content' + append + '-between' },
                                        { label: 'Evenly', value: 'justify-content' + append + '-evenly' },
                                    ] }
                                    onChange={ ( value ) => onChange( 'horizontal_align_' + tab.name, value ) }
                                />
                            </areoi.components.PanelRow>

                            <areoi.components.PanelRow>
                                <areoi.components.SelectControl
                                    label="Vertical Align"
                                    labelPosition="top"
                                    help="Stack your navigation by changing the flex item direction with the .flex-column utility. Need to stack them on some viewports but not others? Use the responsive versions (e.g., .flex-sm-column)."
                                    value={ attributes['vertical_align_' + tab.name] }
                                    options={ [
                                        { label: 'Default', value: null },
                                        { label: 'Vertical', value: 'flex' + append + '-column' },
                                    ] }
                                    onChange={ ( value ) => onChange( 'vertical_align_' + tab.name, value ) }
                                />
                            </areoi.components.PanelRow>

                        </areoi.components.PanelBody>
                    }
                </>
            );
        };
 
        return (
            <>
                { areoi.DisplayPreview( areoi, attributes, onChange, 'nav-and-tab' ) }

                { !attributes.preview &&
                    <div { ...blockProps }>
                        <areoi.editor.InspectorControls key="setting">

                            <areoi.components.PanelBody title={ 'Settings' } initialOpen={ false }>

                                <areoi.components.PanelRow className="areoi-panel-row">
                                    <areoi.components.SelectControl
                                        label="Style"
                                        help=""
                                        labelPosition="top"
                                        value={ attributes.style }
                                        options={ [
                                            { label: 'Default', value: null },
                                            { label: 'Tabs', value: 'nav-tabs' },
                                            { label: 'Pills', value: 'nav-pills' },
                                        ] }
                                        onChange={ ( value ) => onChange( 'style', value ) }
                                    />
                                </areoi.components.PanelRow>

                                <areoi.components.PanelRow>
                                    <areoi.components.SelectControl
                                        label="Fill & Justify"
                                        help="Force your .nav’s contents to extend the full available width one of two modifier classes. To proportionately fill all available space with your .nav-items, use .nav-fill. Notice that all horizontal space is occupied, but not every nav item has the same width."
                                        labelPosition="top"
                                        value={ attributes.fill }
                                        options={ [
                                            { label: 'Default', value: null },
                                            { label: 'Fill', value: 'nav-fill' },
                                            { label: 'Justify', value: 'nav-justified' },
                                        ] }
                                        onChange={ ( value ) => onChange( 'fill', value ) }
                                    />
                                </areoi.components.PanelRow>

                            </areoi.components.PanelBody>

                            { areoi.ResponsiveTabPanel( tabDevice, meta, props ) }
                                
                        </areoi.editor.InspectorControls>

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