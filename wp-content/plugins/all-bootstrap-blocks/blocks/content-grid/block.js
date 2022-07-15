import * as areoi from '../_components/Core.js';
import meta from './block.json';
import { useSelect, useDispatch } from '@wordpress/data';
import {
    store as blockEditorStore
} from '@wordpress/block-editor';

const ALLOWED_BLOCKS = ['areoi/content-grid-item'];
const BLOCKS_TEMPLATE = [
    ['areoi/content-grid-item'],
    ['areoi/content-grid-item'],
    ['areoi/content-grid-item'],
];

const blockIcon = <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><rect fill="none" height="24" width="24"/><path d="M3,5v14h18V5H3z M8.33,17H5V7h3.33V17z M13.67,17h-3.33v-4h3.33V17z M19,17h-3.33v-4H19V17z M19,11h-8.67V7H19V11z"/></svg>;

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
            layout          = attributes['layout'] ? attributes['layout'] : 'grid',
            container       = attributes['container'] ? attributes['container'] : 'container',
            columns         = attributes['columns'] ? attributes['columns'] : '3';
        
        const classes = [
            'areoi-content-grid',
            'areoi-content-grid-' + layout,
            ( attributes['size'] && attributes['size'] != 'Default' ? attributes['size'] : '' ),
        ];
        
        const blockProps = areoi.editor.useBlockProps( {
            className: areoi.helper.GetClassName( classes ),
            style: { cssText: areoi.helper.GetStyles( attributes ) }
        } );

        const row_classes = [
            'row',
            'h-100',
            'areoi-content-grid-row',
            attributes.vertical_align_xs,
            attributes.vertical_align_sm,
            attributes.vertical_align_md,
            attributes.vertical_align_lg,
            attributes.vertical_align_xl,
            attributes.vertical_align_xxl,
        ];

        const prepend_row_classes = [
            'row',
            'areoi-prepend-row',
            attributes.prepend_horizontal_align_xs,
            attributes.prepend_horizontal_align_sm,
            attributes.prepend_horizontal_align_md,
            attributes.prepend_horizontal_align_lg,
            attributes.prepend_horizontal_align_xl,
            attributes.prepend_horizontal_align_xxl,
        ];

        const prepend_col_classes = [
            'col',
            attributes.prepend_col_xs,
            attributes.prepend_col_sm,
            attributes.prepend_col_md,
            attributes.prepend_col_lg,
            attributes.prepend_col_xl,
            attributes.prepend_col_xxl,
            attributes.prepend_text_align_xs,
            attributes.prepend_text_align_sm,
            attributes.prepend_text_align_md,
            attributes.prepend_text_align_lg,
            attributes.prepend_text_align_xl,
            attributes.prepend_text_align_xxl,
        ];

        const {
            replaceInnerBlocks,
            updateBlockAttributes,
        } = useDispatch( blockEditorStore );

        const { getBlock } = useSelect( ( select ) => {
            return {
                getBlock: select( blockEditorStore ).getBlock,
            };
        }, [] );

        function onChange( key, value ) {
            setAttributes( { [key]: value } );
        }

        function setMediaFit( value ) {
            setAttributes( { media_fit: value } );
            const changedAttributes = {};
            const blocks = [];
            getBlock( clientId ).innerBlocks.forEach( ( block ) => {
                blocks.push( block.clientId );
                const image = block.attributes.id
                    ? find( imageData, { id: block.attributes.id } )
                    : null;
                changedAttributes[ block.clientId ] = {
                    media_fit: value
                };
            } );
            updateBlockAttributes( blocks, changedAttributes, true );
        }

        function setMediaHeight( value ) {
            setAttributes( { media_height: value } );
            const changedAttributes = {};
            const blocks = [];
            getBlock( clientId ).innerBlocks.forEach( ( block ) => {
                blocks.push( block.clientId );
                const image = block.attributes.id
                    ? find( imageData, { id: block.attributes.id } )
                    : null;
                changedAttributes[ block.clientId ] = {
                    media_height: value
                };
            } );
            updateBlockAttributes( blocks, changedAttributes, true );
        }

        function setMediaWidth( value ) {
            setAttributes( { media_width: value } );
            const changedAttributes = {};
            const blocks = [];
            getBlock( clientId ).innerBlocks.forEach( ( block ) => {
                blocks.push( block.clientId );
                const image = block.attributes.id
                    ? find( imageData, { id: block.attributes.id } )
                    : null;
                changedAttributes[ block.clientId ] = {
                    media_width: value
                };
            } );
            updateBlockAttributes( blocks, changedAttributes, true );
        }

        function setMediaAlign( value ) {
            setAttributes( { media_align: value } );
            const changedAttributes = {};
            const blocks = [];
            getBlock( clientId ).innerBlocks.forEach( ( block ) => {
                blocks.push( block.clientId );
                const image = block.attributes.id
                    ? find( imageData, { id: block.attributes.id } )
                    : null;
                changedAttributes[ block.clientId ] = {
                    media_align: value
                };
            } );
            updateBlockAttributes( blocks, changedAttributes, true );
        }

        function setMediaStyle( value ) {
            setAttributes( { style: value } );
            const changedAttributes = {};
            const blocks = [];
            getBlock( clientId ).innerBlocks.forEach( ( block ) => {
                blocks.push( block.clientId );
                const image = block.attributes.id
                    ? find( imageData, { id: block.attributes.id } )
                    : null;
                changedAttributes[ block.clientId ] = {
                    style: value
                };
            } );
            updateBlockAttributes( blocks, changedAttributes, true );
        }

        const tabDevice = ( tab ) => {
            var append = ( tab.name == 'xs' ? '' : '-' + tab.name );

            return (
                <div>
                    { areoi.DeviceLayout( areoi, attributes, onChange, tab ) }

                    { !attributes['hide_' + tab.name] &&
                        <>
                            <areoi.components.PanelBody title={ 'Settings (' + tab.title + ')' } initialOpen={ false }>                        
                                
                                <areoi.components.PanelRow className="areoi-panel-row">
                                    <areoi.components.SelectControl
                                        label="Vertical Align"
                                        labelPosition="top"
                                        help="Align content within body from top to bottom. This will be applied to all greater device sizes unless overridden."
                                        value={ attributes['vertical_align_' + tab.name] }
                                        options={ [
                                            { label: 'Default', value: null },
                                            { label: 'Start', value: 'align-items' + append + '-start' },
                                            { label: 'Center', value: 'align-items' + append + '-center' },
                                            { label: 'End', value: 'align-items' + append + '-end' },
                                        ] }
                                        onChange={ ( value ) => onChange( 'vertical_align_' + tab.name, value ) }
                                    />
                                </areoi.components.PanelRow>

                            </areoi.components.PanelBody>

                            <areoi.components.PanelBody title={ 'Prepend Content (' + tab.title + ')' } initialOpen={ false }> 
                            
                                <areoi.components.PanelRow className="areoi-panel-row">
                                    <areoi.components.SelectControl
                                        label="Columns"
                                        labelPosition="top"
                                        help="Number of columns to span."
                                        value={ attributes['prepend_col_' + tab.name] }
                                        options={ areoi.helper.GetCols( 'col', tab.name ) }
                                        onChange={ ( val ) => onChange( 'prepend_col_' + tab.name, val ) }
                                    />
                                </areoi.components.PanelRow>

                                <areoi.components.PanelRow className="areoi-panel-row">
                                    <areoi.components.SelectControl
                                        label="Horizontal Align"
                                        labelPosition="top"
                                        help="Align content within body from left to right. This will be applied to all greater device sizes unless overridden."
                                        value={ attributes['prepend_horizontal_align_' + tab.name] }
                                        options={ [
                                            { label: 'Default', value: null },
                                            { label: 'Start', value: 'justify-content' + append + '-start' },
                                            { label: 'Center', value: 'justify-content' + append + '-center' },
                                            { label: 'End', value: 'justify-content' + append + '-end' },
                                        ] }
                                        onChange={ ( value ) => onChange( 'prepend_horizontal_align_' + tab.name, value ) }
                                    />
                                </areoi.components.PanelRow>

                                <areoi.components.PanelRow className="areoi-panel-row areoi-panel-row-no-border">
                                    <areoi.components.SelectControl
                                        label="Text Align"
                                        labelPosition="top"
                                        help="Align text within it's containing column."
                                        value={ attributes['prepend_text_align_' + tab.name] }
                                        options={ [
                                            { label: 'Default', value: null },
                                            { label: 'Start', value: 'text' + append + '-start' },
                                            { label: 'Center', value: 'text' + append + '-center' },
                                            { label: 'End', value: 'text' + append + '-end' },
                                        ] }
                                        onChange={ ( value ) => onChange( 'prepend_text_align_' + tab.name, value ) }
                                    />
                                </areoi.components.PanelRow>

                            </areoi.components.PanelBody>

                        </>
                    }

                    { areoi.DeviceBackground( areoi, attributes, onChange, tab ) }
                </div>
            );
        };
 
        return (
            <>
                { areoi.DisplayPreview( areoi, attributes, onChange, 'content-grid' ) }

                { !attributes.preview &&
                    <div { ...blockProps }>
                        <areoi.editor.InspectorControls key="setting">

                            <areoi.components.PanelBody title={ 'Settings' } initialOpen={ false }>
                                
                                <areoi.components.PanelRow>
                                    <areoi.components.SelectControl
                                        label="Layout"
                                        labelPosition="top"
                                        help="This will change the layout of any grid items you add within this grid."
                                        value={ attributes.layout }
                                        options={ [
                                            { label: 'Grid', value: 'grid' },
                                            { label: 'Masonry', value: 'masonry' },
                                        ] }
                                        onChange={ ( value ) => onChange( 'layout', value ) }
                                    />
                                </areoi.components.PanelRow>

                                <areoi.components.PanelRow>
                                    <areoi.components.SelectControl
                                        label="Container"
                                        labelPosition="top"
                                        help="Choose how you would like your items to be contained."
                                        value={ attributes.container }
                                        options={ [
                                            { label: 'Fixed', value: 'container' },
                                            { label: 'Full Width', value: 'container-fluid' },
                                        ] }
                                        onChange={ ( value ) => onChange( 'container', value ) }
                                    />
                                </areoi.components.PanelRow>

                                <areoi.components.PanelRow>
                                    <areoi.components.SelectControl
                                        label="Columns"
                                        labelPosition="top"
                                        help="Specify how many columns you would like to display in your grid."
                                        value={ attributes.columns }
                                        options={ [
                                            { label: '1', value: '1' },
                                            { label: '2', value: '2' },
                                            { label: '3', value: '3' },
                                            { label: '4', value: '4' },
                                            { label: '5', value: '5' },
                                            { label: '6', value: '6' },
                                        ] }
                                        onChange={ ( value ) => onChange( 'columns', value ) }
                                    />
                                </areoi.components.PanelRow>

                                <areoi.components.PanelRow>
                                    <areoi.components.SelectControl
                                        label="Style"
                                        labelPosition="top"
                                        help="Choose how you would like each item in your grid to be styled."
                                        value={ attributes.style }
                                        options={ [
                                            { label: 'Card', value: 'card' },
                                            { label: 'Full', value: 'full' },
                                            { label: 'Flush', value: 'flush' },
                                        ] }
                                        onChange={ setMediaStyle }
                                    />
                                </areoi.components.PanelRow>

                                <areoi.components.PanelRow>
                                    <areoi.components.SelectControl
                                        label="Media Container Size"
                                        labelPosition="top"
                                        help="Choose a predefined size for your grid item media. Small is 20vh, Medium is 30vh, Large is 40vh and Extra Large is 50vh."
                                        value={ attributes.size }
                                        options={ [
                                            { label: 'Extra Small', value: 'areoi-extra-small' },
                                            { label: 'Small', value: 'areoi-small' },
                                            { label: 'Medium', value: 'areoi-medium' },
                                            { label: 'Large', value: 'areoi-large' },
                                            { label: 'Extra Large', value: 'areoi-extra-large' },
                                        ] }
                                        onChange={ ( value ) => onChange( 'size', value ) }
                                    />
                                </areoi.components.PanelRow>

                                <areoi.components.PanelRow>
                                    <areoi.components.SelectControl
                                        label="Media Fit"
                                        labelPosition="top"
                                        help="Choose a predefined size for how your media will fit within the media container."
                                        value={ attributes.media_fit }
                                        options={ [
                                            { label: 'Cover', value: 'cover' },
                                            { label: 'Contain', value: 'contain' },
                                            { label: 'Set Dimensions', value: 'set' },
                                        ] }
                                        onChange={ setMediaFit }
                                    />
                                </areoi.components.PanelRow>

                                {
                                    attributes['media_fit'] == 'set' &&
                                    <>
                                        <areoi.components.PanelRow className="areoi-panel-row areoi-panel-row-no-border">
                                            <label className="areoi-panel-row__label">Media Height</label>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <areoi.components.TextControl
                                                            label=""
                                                            value={ attributes['media_height'] }
                                                            onChange={ setMediaHeight }
                                                        />
                                                    </td>
                                                    <td>&nbsp;px</td>
                                                </tr>
                                            </table>
                                            <p className="components-base-control__help css-1gbp77-StyledHelp">Specify the height to display all your media. This will be applied to all of your items for consistency.</p>
                                        </areoi.components.PanelRow>

                                        <areoi.components.PanelRow className="areoi-panel-row areoi-panel-row-no-border">
                                            <label className="areoi-panel-row__label">Media Width</label>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <areoi.components.TextControl
                                                            label=""
                                                            value={ attributes['media_width'] }
                                                            onChange={ setMediaWidth }
                                                        />
                                                    </td>
                                                    <td>&nbsp;px</td>
                                                </tr>
                                            </table>
                                            <p className="components-base-control__help css-1gbp77-StyledHelp">Specify the width to display all your media. This will be applied to all of your items for consistency.</p>
                                        </areoi.components.PanelRow>

                                        <areoi.components.PanelRow>
                                            <areoi.components.SelectControl
                                                label="Media Align"
                                                labelPosition="top"
                                                help="Specify how you would like your media to be aligned within the container."
                                                value={ attributes.media_align }
                                                options={ [
                                                    { label: 'Start', value: 'start' },
                                                    { label: 'Center', value: 'center' },
                                                    { label: 'End', value: 'end' },
                                                ] }
                                                onChange={ setMediaAlign }
                                            />
                                        </areoi.components.PanelRow>
                                    </>
                                }

                            </areoi.components.PanelBody>

                            <areoi.components.PanelBody title={ 'Prepend Content' } initialOpen={ false }>
                                
                                <areoi.components.PanelRow className={ 'areoi-panel-row ' }>
                                    <areoi.components.ToggleControl 
                                        label={ 'Display Heading' }
                                        help="Toggle on to display a header before your grid begins."
                                        checked={ attributes.prepend_display_heading }
                                        onChange={ ( value ) => onChange( 'prepend_display_heading', value ) }
                                    />
                                </areoi.components.PanelRow>

                                {
                                    attributes.prepend_display_heading && 

                                    <>
                                        <areoi.components.PanelRow className="areoi-panel-row">
                                            <areoi.components.SelectControl
                                                label="Heading Level"
                                                labelPosition="top"
                                                help="Choose the type of heading you would like to include."
                                                value={ attributes.prepend_heading_level }
                                                options={ [
                                                    { label: 'H1', value: 'h1' },
                                                    { label: 'H2', value: 'h2' },
                                                    { label: 'H3', value: 'h3' },
                                                    { label: 'H4', value: 'h4' },
                                                    { label: 'H5', value: 'h5' },
                                                    { label: 'H6', value: 'h6' },
                                                ] }
                                                onChange={ ( val ) => onChange( 'prepend_heading_level', val ) }
                                            />
                                        </areoi.components.PanelRow>

                                        <areoi.components.PanelRow className="areoi-panel-row">
                                            <areoi.components.SelectControl
                                                label="Heading Color"
                                                labelPosition="top"
                                                help="Use the Bootstrap text color utilities to change the heading color."
                                                value={ attributes.prepend_heading_color }
                                                options={ [
                                                    { label: 'Default', value: null },
                                                    { label: 'Primary', value: 'text-primary' },
                                                    { label: 'Secondary', value: 'text-secondary' },
                                                    { label: 'Success', value: 'text-success' },
                                                    { label: 'Danger', value: 'text-danger' },
                                                    { label: 'Warning', value: 'text-warning' },
                                                    { label: 'Info', value: 'text-info' },
                                                    { label: 'Light', value: 'text-light' },
                                                    { label: 'Dark', value: 'text-dark' },
                                                ] }
                                                onChange={ ( value ) => onChange( 'prepend_heading_color', value ) }
                                            />
                                        </areoi.components.PanelRow>

                                    </>
                                }

                                <areoi.components.PanelRow className={ 'areoi-panel-row ' + ( attributes.prepend_display_intro ? 'areoi-panel-row-no-border' : '' ) }>
                                    <areoi.components.ToggleControl 
                                        label={ 'Display Intro' }
                                        help="Toggle on to display an introduction before your grid begins."
                                        checked={ attributes.prepend_display_intro }
                                        onChange={ ( value ) => onChange( 'prepend_display_intro', value ) }
                                    />
                                </areoi.components.PanelRow>

                                {
                                    attributes.prepend_display_intro &&

                                    <areoi.components.PanelRow className="areoi-panel-row areoi-panel-row-no-border">
                                        <areoi.components.SelectControl
                                            label="Intro Color"
                                            labelPosition="top"
                                            help="Use the Bootstrap text color utilities to change the intro color."
                                            value={ attributes.prepend_intro_color }
                                            options={ [
                                                { label: 'Default', value: null },
                                                { label: 'Primary', value: 'text-primary' },
                                                { label: 'Secondary', value: 'text-secondary' },
                                                { label: 'Success', value: 'text-success' },
                                                { label: 'Danger', value: 'text-danger' },
                                                { label: 'Warning', value: 'text-warning' },
                                                { label: 'Info', value: 'text-info' },
                                                { label: 'Light', value: 'text-light' },
                                                { label: 'Dark', value: 'text-dark' },
                                            ] }
                                            onChange={ ( value ) => onChange( 'prepend_intro_color', value ) }
                                        />
                                    </areoi.components.PanelRow>
                                }

                            </areoi.components.PanelBody>

                            { areoi.Background( areoi, attributes, onChange ) }

                            { areoi.ResponsiveTabPanel( tabDevice, meta, props ) }
                                
                        </areoi.editor.InspectorControls>

                        { areoi.DisplayBackground( areoi, attributes ) }

                        <div className={ areoi.helper.GetClassNameStr( [ container, 'h-100' ] ) }>
                            <div className={ areoi.helper.GetClassNameStr( row_classes ) }>
                                <div className="col">
                                    
                                    <div className={ areoi.helper.GetClassNameStr( prepend_row_classes ) }>
                                        <div className={ areoi.helper.GetClassNameStr( prepend_col_classes ) }>

                                            {
                                                attributes.prepend_display_heading && 

                                                <div className={ attributes.prepend_heading_color }>
                                                    <areoi.editor.RichText
                                                        tagName={ attributes.prepend_heading_level }
                                                        value={ attributes.prepend_heading }
                                                        allowedFormats={ [ 'core/bold', 'core/italic' ] }
                                                        onChange={ ( value ) => onChange( 'prepend_heading', value ) }
                                                        placeholder={ 'Heading...' }
                                                    />
                                                </div>
                                            }

                                            {
                                                attributes.prepend_display_intro && 

                                                <div className={ attributes.prepend_intro_color }>
                                                    <areoi.editor.RichText
                                                        tagName="p"
                                                        value={ attributes.prepend_intro }
                                                        allowedFormats={ [ 'core/bold', 'core/italic' ] }
                                                        onChange={ ( value ) => onChange( 'prepend_intro', value ) }
                                                        placeholder={ 'Intro text...' }
                                                    />
                                                </div>
                                            }

                                        </div>
                                    </div>

                                    <div className={ areoi.helper.GetClassNameStr( [ 'row', 'areoi-content-grid-columns', 'areoi-content-grid-columns-' + columns ] ) }>

                                        <areoi.editor.InnerBlocks template={ BLOCKS_TEMPLATE } allowedBlocks={ ALLOWED_BLOCKS } />

                                    </div>
                                </div>
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