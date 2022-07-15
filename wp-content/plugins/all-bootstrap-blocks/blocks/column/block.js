import * as areoi from '../_components/Core.js';
import meta from './block.json';

const ALLOWED_BLOCKS = null;
const BLOCKS_TEMPLATE = null;
const NEW_TAB_REL = 'noreferrer noopener';

const blockIcon = <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><rect fill="none" height="24" width="24"/><path d="M3,5v14h18V5H3z M8.33,17H5V7h3.33V17z M13.67,17h-3.33V7h3.33V17z M19,17h-3.33V7H19V17z"/></svg>;

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
            'col',
            attributes.vertical_align_xs,
            attributes.vertical_align_sm,
            attributes.vertical_align_md,
            attributes.vertical_align_lg,
            attributes.vertical_align_xl,
            attributes.vertical_align_xxl,

            attributes.col_xs,
            attributes.col_sm,
            attributes.col_md,
            attributes.col_lg,
            attributes.col_xl,
            attributes.col_xxl,

            attributes.order_xs,
            attributes.order_sm,
            attributes.order_md,
            attributes.order_lg,
            attributes.order_xl,
            attributes.order_xxl,

            attributes.offset_xs,
            attributes.offset_sm,
            attributes.offset_md,
            attributes.offset_lg,
            attributes.offset_xl,
            attributes.offset_xxl
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
            var append = ( tab.name == 'xs' ? '' : '-' + tab.name );

            return (
                <div>
                    { areoi.DeviceLayout( areoi, attributes, onChange, tab ) }

                    { !attributes['hide_' + tab.name] &&
                        <areoi.components.PanelBody title={ 'Settings (' + tab.title + ')' } initialOpen={ false }>
                            
                            <areoi.components.PanelRow className="areoi-panel-row">
                                <areoi.components.SelectControl
                                    label="Vertical Align"
                                    labelPosition="top"
                                    help="Align column from top to bottom. This will be applied to all greater device sizes unless overridden."
                                    value={ attributes['vertical_align_' + tab.name] }
                                    options={ [
                                        { label: 'Default', value: null },
                                        { label: 'Start', value: 'align-self' + append + '-start' },
                                        { label: 'Center', value: 'align-self' + append + '-center' },
                                        { label: 'End', value: 'align-self' + append + '-end' },
                                    ] }
                                    onChange={ ( value ) => onChange( 'vertical_align_' + tab.name, value ) }
                                />
                            </areoi.components.PanelRow>

                            <areoi.components.PanelRow className="areoi-panel-row">
                                <areoi.components.SelectControl
                                    label="Columns"
                                    labelPosition="top"
                                    help="Number of columns to span."
                                    value={ attributes['col_' + tab.name] }
                                    options={ areoi.helper.GetCols( 'col', tab.name ) }
                                    onChange={ ( val ) => onChange( 'col_' + tab.name, val ) }
                                />
                            </areoi.components.PanelRow>
                        
                            <areoi.components.PanelRow className="areoi-panel-row">
                                <areoi.components.SelectControl
                                    label="Order"
                                    labelPosition="top"
                                    help="Use .order- classes for controlling the visual order of your content. These classes are responsive, so you can set the order by breakpoint (e.g., .order-1.order-md-2). Includes support for 1 through 5 across all six grid tiers."
                                    value={ attributes['order_' + tab.name] }
                                    options={ areoi.helper.GetCols( 'order', tab.name ) }
                                    onChange={ ( val ) => onChange( 'order_' + tab.name, val ) }
                                />
                            </areoi.components.PanelRow>
                        
                            <areoi.components.PanelRow>
                                <areoi.components.SelectControl
                                    label="Offset"
                                    labelPosition="top"
                                    help="Move columns to the right using .offset-md-* classes. These classes increase the left margin of a column by * columns. For example, .offset-md-4 moves .col-md-4 over four columns."
                                    value={ attributes['offset_' + tab.name] }
                                    options={ areoi.helper.GetCols( 'offset', tab.name ) }
                                    onChange={ ( val ) => onChange( 'offset_' + tab.name, val ) }
                                />
                            </areoi.components.PanelRow>
                        </areoi.components.PanelBody>
                    }

                    { areoi.DeviceBackground( areoi, attributes, onChange, tab ) }
                </div>
            );
        };
 
        return (
            <>
                { areoi.DisplayPreview( areoi, attributes, onChange, 'column' ) }

                {
                    !attributes.preview &&
                    <>
                        <div { ...blockProps }>
                            <areoi.editor.InspectorControls key="setting">

                                { areoi.Background( areoi, attributes, onChange ) }

                                { areoi.ResponsiveTabPanel( tabDevice, meta, props ) }
                                    
                            </areoi.editor.InspectorControls>

                            { areoi.DisplayBackground( areoi, attributes ) }

                            <areoi.editor.InnerBlocks template={ BLOCKS_TEMPLATE } allowedBlocks={ ALLOWED_BLOCKS } />
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
    save: () => { 
        return (
            <areoi.editor.InnerBlocks.Content/>
        );
    },
} );