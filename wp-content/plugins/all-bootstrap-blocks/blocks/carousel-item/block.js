import * as areoi from '../_components/Core.js';
import meta from './block.json';

const ALLOWED_BLOCKS = null;
const BLOCKS_TEMPLATE = [
    [ 'areoi/strip', {
        height_dimension_xs: '800',
        height_unit_xs: 'px'
    }, [
        [ 'areoi/container', {
            height_dimension_xs: '100',
            height_unit_xs: '%'
        }, [
            [ 'areoi/row', {
                height_dimension_xs: '100',
                height_unit_xs: '%',
                vertical_align: 'align-items-center',
                horizontal_align: 'justify-content-center',
            }, [
                [ 'areoi/column', {
                    col_xs: 'col-6'
                } ]
            ] ]
        ] ]
    ]]
];

const blockIcon = <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><rect fill="none" height="24" width="24"/><path d="M2,7h4v10H2V7z M7,19h10V5H7V19z M9,7h6v10H9V7z M18,7h4v10h-4V7z"/></svg>;

areoi.blocks.registerBlockType( meta, {
    icon: blockIcon,
    icon: areoi.blockIcon,
    edit: props => {
        const {
            attributes,
            setAttributes,
            clientId
        } = props;

        setAttributes( attributes );

        const { block_id } = attributes;
        if ( !block_id || ( block_id != clientId ) ) {
            setAttributes( { block_id: clientId } );
        }

        const parentBlocks      = wp.data.select( 'core/block-editor' ).getBlockParents(props.clientId); 
        const parentAttributes  = wp.data.select('core/block-editor').getBlocksByClientId(parentBlocks);
        
        var parent_id = false;
        parentAttributes.forEach(element => {
            if ( element.name == 'areoi/carousel' ) {
                parent_id = element.attributes.block_id;
            }
        });
        if ( parent_id ) {
            setAttributes( { parent_id: parent_id } );
        }

        const classes = [
            'carousel-item',
            'active'
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
                { areoi.DisplayPreview( areoi, attributes, onChange, 'carousel-item' ) }

                { !attributes.preview &&
                    <div { ...blockProps }>
                        <areoi.editor.InspectorControls key="setting">

                            <areoi.components.PanelBody title={ 'Settings' } initialOpen={ false }>
                                <areoi.components.PanelRow>
                                    <areoi.components.TextControl 
                                        label={ 'Interval' }
                                        help="Add data-bs-interval to a .carousel-item to change the amount of time to delay between automatically cycling to the next item."
                                        value={ attributes.interval }
                                        onChange={ ( value ) => onChange( 'interval', value ) }
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
} );