import * as areoi from '../_components/Core.js';
import * as grid from './template-parts-js/grid.js';
import * as stacked from './template-parts-js/stacked.js';
import * as carousel from './template-parts-js/carousel.js';
import meta from './block.json';

const ALLOWED_BLOCKS = ['areoi/banner-item'];
const BLOCKS_TEMPLATE = [
    [ 'areoi/banner-item', {},
        [
            [ 'core/heading', { level: 1, content: 'Enter Heading' } ],
            [ 'core/paragraph', { content: 'Enter description' } ],
            [ 'areoi/button', {} ],
        ]
    ],
    [ 'areoi/banner-item', {},
        [
            [ 'core/heading', { level: 2, content: 'Enter Heading' } ],
        ]
    ],
    [ 'areoi/banner-item', {},
        [
            [ 'core/heading', { level: 2, content: 'Enter Heading' } ],
        ]
    ],
];

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

        let child_blocks    = wp.data.select( 'core/block-editor' ).getBlocks( block_id ),
            layout          = attributes['layout'] ? attributes['layout']: 'grid',
            container       = layout == 'grid' ? 'container-fluid' : 'container',
            has_follows     = child_blocks.length > 3 ? 'areoi-banner-grid-has-follows' : '';
        
        const classes = [
            'areoi-banner-' + layout,
            has_follows,
            ( attributes['size'] && attributes['size'] != 'Default' ? attributes['size'] : '' ),
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
                { areoi.DisplayPreview( areoi, attributes, onChange, 'banner' ) }

                { !attributes.preview &&
                    <div { ...blockProps }>
                        <areoi.editor.InspectorControls key="setting">

                            <areoi.components.PanelBody title={ 'Settings' } initialOpen={ false }>
                                
                                <areoi.components.PanelRow>
                                    <areoi.components.SelectControl
                                        label="Layout"
                                        labelPosition="top"
                                        help="This will change the layout of any banner items you add within this banner."
                                        value={ attributes.layout }
                                        options={ [
                                            { label: 'Carousel', value: 'carousel' },
                                            { label: 'Stacked', value: 'stacked' },
                                            { label: 'Grid', value: 'grid' },
                                        ] }
                                        onChange={ ( value ) => onChange( 'layout', value ) }
                                    />
                                </areoi.components.PanelRow>

                                <areoi.components.PanelRow>
                                    <areoi.components.SelectControl
                                        label="Size"
                                        labelPosition="top"
                                        help="Choose a predefined size for your banner. Small is 50vh, Medium is 75vh and Large is 100vh."
                                        value={ attributes.size }
                                        options={ [
                                            { label: 'Small', value: 'areoi-small' },
                                            { label: 'Medium', value: 'areoi-medium' },
                                            { label: 'Large', value: 'areoi-large' },
                                        ] }
                                        onChange={ ( value ) => onChange( 'size', value ) }
                                    />
                                </areoi.components.PanelRow>

                            </areoi.components.PanelBody>

                            { areoi.ResponsiveTabPanel( tabDevice, meta, props ) }
                                
                        </areoi.editor.InspectorControls>

                        { layout == 'stacked' &&
                            <>
                                { stacked.render( areoi, child_blocks, BLOCKS_TEMPLATE, ALLOWED_BLOCKS ) }
                            </>
                        }

                        { layout == 'grid' &&
                            <>
                                { grid.render( areoi, child_blocks, BLOCKS_TEMPLATE, ALLOWED_BLOCKS ) }
                            </>
                        }

                        { layout == 'carousel' &&
                            <>
                                { carousel.render( areoi, child_blocks, BLOCKS_TEMPLATE, ALLOWED_BLOCKS ) }
                            </>
                        }
                        
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