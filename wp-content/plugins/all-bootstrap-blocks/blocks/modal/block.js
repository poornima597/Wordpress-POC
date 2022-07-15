import * as areoi from '../_components/Core.js';
import meta from './block.json';

const ALLOWED_BLOCKS = [ 'areoi/modal-header', 'areoi/modal-body', 'areoi/modal-footer' ];
const BLOCKS_TEMPLATE = [
    [ 'areoi/modal-header', {} ],
    [ 'areoi/modal-body', {} ],
    [ 'areoi/modal-footer', {} ],
];

const blockIcon = <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/><path d="M19,3H5C3.89,3,3,3.9,3,5v14c0,1.1,0.89,2,2,2h14c1.1,0,2-0.9,2-2V5C21,3.9,20.11,3,19,3z M19,19H5V7h14V19z M17,12H7v-2 h10V12z M13,16H7v-2h6V16z"/></g></svg>;

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
            'modal',
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
                { areoi.DisplayPreview( areoi, attributes, onChange, 'modal' ) }

                { !attributes.preview &&
                    <div { ...blockProps }>
                        <areoi.editor.InspectorControls key="setting">

                            <areoi.components.PanelBody title={ 'Settings' } initialOpen={ false }>

                                <areoi.components.PanelRow className="areoi-panel-row">
                                    <areoi.components.SelectControl
                                        label="Backdrop"
                                        labelPosition="top"
                                        help="When backdrop is set to static, the modal will not close when clicking outside it. Click the button below to try it."
                                        value={ attributes.backdrop }
                                        options={ [
                                            { label: 'Default', value: null },
                                            { label: 'Static', value: 'static' },
                                        ] }
                                        onChange={ ( value ) => onChange( 'backdrop', value ) }
                                    />
                                </areoi.components.PanelRow>

                                <areoi.components.PanelRow className="areoi-panel-row">
                                    <areoi.components.SelectControl
                                        label="Scrollable Dialog"
                                        labelPosition="top"
                                        help="You can also create a scrollable modal that allows scroll the modal body by adding .modal-dialog-scrollable to .modal-dialog."
                                        value={ attributes.scrollable }
                                        options={ [
                                            { label: 'Default', value: null },
                                            { label: 'Scrollable', value: 'modal-dialog-scrollable' },
                                        ] }
                                        onChange={ ( value ) => onChange( 'scrollable', value ) }
                                    />
                                </areoi.components.PanelRow>

                                <areoi.components.PanelRow>
                                    <areoi.components.SelectControl
                                        label="Vertically Centered Dialog"
                                        labelPosition="top"
                                        help="Add .modal-dialog-centered to .modal-dialog to vertically center the modal."
                                        value={ attributes.centered }
                                        options={ [
                                            { label: 'Default', value: null },
                                            { label: 'Centered', value: 'modal-dialog-centered' },
                                        ] }
                                        onChange={ ( value ) => onChange( 'centered', value ) }
                                    />
                                </areoi.components.PanelRow>

                                <areoi.components.PanelRow>
                                    <areoi.components.SelectControl
                                        label="Dialog Size"
                                        labelPosition="top"
                                        help="Modals have optional sizes, available via modifier classes to be placed on a .modal-dialog. These sizes kick in at certain breakpoints to avoid horizontal scrollbars on narrower viewports."
                                        value={ attributes.size }
                                        options={ [
                                            { value: null, label: 'Default' },
                                            { value: 'modal-sm', label: 'Small' },
                                            { value: null, label: 'Medium' },
                                            { value: 'modal-lg', label: 'Large' },
                                            { value: 'modal-xl', label: 'Extra Large' },
                                            { value: 'modal-fullscreen', label: 'Fullscreen' },
                                        ] }
                                        onChange={ ( value ) => onChange( 'size', value ) }
                                    />
                                </areoi.components.PanelRow>

                            </areoi.components.PanelBody>
                                
                        </areoi.editor.InspectorControls>

                        <div className={'modal-dialog ' + attributes['size']}>
                            <div class="modal-content">
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
});