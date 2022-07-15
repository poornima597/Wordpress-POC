import * as areoi from '../_components/Core.js';
import meta from './block.json';

const ALLOWED_BLOCKS = [ 'areoi/offcanvas-header', 'areoi/offcanvas-body' ];
const BLOCKS_TEMPLATE = [
    [ 'areoi/offcanvas-header', {} ],
    [ 'areoi/offcanvas-body', {} ],
];

const blockIcon = <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M10.09 15.59L11.5 17l5-5-5-5-1.41 1.41L12.67 11H3v2h9.67l-2.58 2.59zM19 3H5c-1.11 0-2 .9-2 2v4h2V5h14v14H5v-4H3v4c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/></svg>;

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
            'offcanvas',
        ];

        const blockProps = areoi.editor.useBlockProps( {
            className: areoi.helper.GetClassName( classes ),
            style: { cssText: areoi.helper.GetStyles( attributes ) }
        } );

        function onChange( key, value ) {
            setAttributes( { [key]: value } );
        }

        return (
            <>
                { areoi.DisplayPreview( areoi, attributes, onChange, 'offcanvas' ) }

                { !attributes.preview &&
                    <div { ...blockProps }>
                        <areoi.editor.InspectorControls key="setting">

                            <areoi.components.PanelBody title={ 'Settings' } initialOpen={ false }>

                                <areoi.components.PanelRow className="areoi-panel-row">
                                    <areoi.components.SelectControl
                                        label="Backdrop"
                                        labelPosition="top"
                                        help="When backdrop is set to static, the offcanvas will not close when clicking outside it. Click the button below to try it."
                                        value={ attributes.backdrop }
                                        options={ [
                                            { label: 'Include Backdrop', value: 'true' },
                                            { label: 'No Backdrop', value: 'false' },
                                        ] }
                                        onChange={ ( value ) => onChange( 'backdrop', value ) }
                                    />
                                </areoi.components.PanelRow>

                                <areoi.components.PanelRow className="areoi-panel-row">
                                    <areoi.components.SelectControl
                                        label="Scrollable"
                                        labelPosition="top"
                                        help="YScrolling the <body> element is disabled when an offcanvas and its backdrop are visible. Use the data-bs-scroll attribute to toggle <body> scrolling"
                                        value={ attributes.scrollable }
                                        options={ [
                                            { label: 'Disable Scrolling', value: 'false' },
                                            { label: 'Allow Scrolling', value: 'true' },
                                        ] }
                                        onChange={ ( value ) => onChange( 'scrollable', value ) }
                                    />
                                </areoi.components.PanelRow>

                                <areoi.components.PanelRow>
                                    <areoi.components.SelectControl
                                        label="Placement"
                                        labelPosition="top"
                                        help=".offcanvas-start places offcanvas on the left of the viewport. .offcanvas-end places offcanvas on the right of the viewport. offcanvas-top places offcanvas on the top of the viewport. .offcanvas-bottom places offcanvas on the bottom of the viewport."
                                        value={ attributes.placement }
                                        options={ [
                                            { label: 'Left', value: 'offcanvas-start' },
                                            { label: 'Right', value: 'offcanvas-end' },
                                            { label: 'Top', value: 'offcanvas-top' },
                                            { label: 'Bottom', value: 'offcanvas-bottom' },
                                        ] }
                                        onChange={ ( value ) => onChange( 'placement', value ) }
                                    />
                                </areoi.components.PanelRow>

                            </areoi.components.PanelBody>
                                
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
});