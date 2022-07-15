import * as areoi from '../_components/Core.js';
import meta from './block.json';

const ALLOWED_BLOCKS = [];
const BLOCKS_TEMPLATE = [];

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
            'areoi-post-grid',
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

        function onChange( key, value ) {
            setAttributes( { [key]: value } );
        }

        const PostTypesControl = areoi.compose.compose(
            wp.data.withSelect( function( select, props ) {

                return wp.data.select('core').getPostTypes({ 
                    per_page: -1
                });

            } ) )( function( post_types ) {
                
                var output = [{label: 'Loading...', value:''}];

                if ( typeof post_types != 'undefined' ) {
                    
                    var output = [];

                    for (const [ key, post_type ] of Object.entries( post_types ) ) {
                        if ( post_type.viewable && post_type.slug != 'attachment' ) {
                            var new_output = { label: post_type.name, value: post_type.slug }
                            output.push( new_output );
                        }
                    }

                }
                
                return (
                    <areoi.components.PanelRow>
                        <areoi.components.SelectControl
                            label="Post Type"
                            labelPosition="top"
                            help="Specify what posts you would like to display. Child {post type} will display all child posts for the selected post."
                            value={ attributes.post_type }
                            options={ output }
                            onChange={ ( value ) => {
                                setAttributes( { post_type: value } );
                                setAttributes( { post_ids: [] } );
                            } }
                        />
                    </areoi.components.PanelRow>
                );
            }

        );

        const PostsDropdownControl = areoi.compose.compose(
            wp.data.withSelect( function( select, props ) {
                
                return {
                    posts: select( 'core' ).getEntityRecords( 'postType', props.post_type, { 
                        per_page: -1,
                        orderby : 'title',
                        order : 'asc',
                    } ),
                }
            } ) )( function( props ) {
                
                var output = [];
                if( props.posts ) {

                    var key = 'post_ids';

                    var new_output = <areoi.components.CheckboxControl
                        label={ 'Show all ' + props.post_type + ' posts' }
                        labelPosition="top"
                        value={ 'all' }
                        checked={ typeof attributes[key] != 'undefined' ? ( attributes[key] ? attributes[key].includes( 'all' ) : false ) : false }
                        onChange={ function( value ) {
                            
                            var newArr = [];
                            if ( typeof attributes[key] != 'undefined' ) {
                                var newArr = attributes[key].slice();
                            }

                            if ( value ) {
                                newArr.push( 'all' );
                            } else {
                                const index = newArr.indexOf( 'all' );
                                if ( index > -1 ) {
                                    newArr.splice( index, 1 );
                                }
                            }
                            setAttributes({ [key] : newArr });
                        }}
                    />;
                    output.push( new_output );

                    props.posts.forEach((post) => {

                        var new_output = <areoi.components.CheckboxControl
                            label={ post.title.rendered }
                            labelPosition="top"
                            value={ post.id }
                            checked={ typeof attributes[key] != 'undefined' ? ( attributes[key] ? attributes[key].includes( post.id ) : false ) : false }
                            onChange={ function( value ) {
                                
                                var newArr = [];
                                if ( typeof attributes[key] != 'undefined' ) {
                                    var newArr = attributes[key].slice();
                                }

                                if ( value ) {
                                    newArr.push( post.id );
                                } else {
                                    const index = newArr.indexOf( post.id );
                                    if ( index > -1 ) {
                                        newArr.splice( index, 1 );
                                    }
                                }
                                setAttributes({ [key] : newArr });
                            }}
                        />;
                        output.push( new_output );
                    });

                } else {
                   output = <div>
                        <p class="text-center mb-0">Loading posts.</p>
                   </div>; 
                }
                return (
                    <div class="areoi-panel-row">
                        <div class="areoi-post-list">
                            { output }
                        </div>
                    </div>
                );
            }

        );

        const PostsList = areoi.compose.compose(
            wp.data.withSelect( function( select, props ) {
                
                let posts = select( 'core' ).getEntityRecords( 'postType', props.post_type, props.query );

                let medias = {};
                posts?.forEach((post) => {
                    medias[post.id] = select('core').getMedia(post.featured_media);
                });
                return {
                    posts,
                    medias,
                }
            } ) )( function( props ) {
                
                var output = [];
                if( props.posts ) {

                    let post_ids = props.attributes['post_ids'];
                    let posts_per_page = props.attributes['posts_per_page'];
                    let post_type = props.attributes['post_type'];
                    let display_posts = props.attributes['display_posts'];
                    let show_all = attributes['post_ids'].includes( 'all' );
                    let posts = [];
                    let counter = 1;
                    props.posts.forEach( post => {
                        
                        if ( !post_ids && counter <= posts_per_page ) {
                            posts.push( post );
                            counter++;
                        } else if ( show_all && ( display_posts == 'children' && post.parent ) && counter <= posts_per_page ) {
                            posts.push( post );
                            counter++;
                        } else if ( show_all && ( display_posts != 'children' && !post.parent ) && counter <= posts_per_page ) {
                            posts.push( post );
                            counter++;
                        } else if ( post_ids && !show_all && ( ( display_posts != 'children' && post_ids.includes( post.id ) ) || display_posts == 'children' && post_ids.includes( post.parent ) ) && counter <= posts_per_page ) {
                            posts.push( post );
                            counter++;
                        }
                    });

                    posts.forEach((post) => {

                        var key = 'post_ids';
                        var attributes = props.attributes,
                            include_media = attributes['include_media'] ? 'has-image' : null,
                            title_element = attributes['title_element'],
                            text_color = attributes['text_color'],
                            media_layout = attributes['media_layout'];

                        var media      = null;
                        var title      = attributes['include_title'] ? '<' + title_element + ' class="' + text_color + '">' + post.title.rendered + '</' + title_element + '>' : ''; 
                        var excerpt    = attributes['include_excerpt'] ? '<p class="' + text_color + '">' + post.excerpt.rendered + '</p>' : '';

                        var card_class = areoi.helper.GetClassNameStr( [ 
                            'card-body',
                            'd-flex',
                            'position-relative',
                            
                            attributes['item_vertical_align_xs'] ? attributes['item_vertical_align_xs'] : '',
                            attributes['item_vertical_align_sm'] ? attributes['item_vertical_align_sm'] : '',
                            attributes['item_vertical_align_md'] ? attributes['item_vertical_align_md'] : '',
                            attributes['item_vertical_align_lg'] ? attributes['item_vertical_align_lg'] : '',
                            attributes['item_vertical_align_xl'] ? attributes['item_vertical_align_xl'] : '',
                            attributes['item_vertical_align_xxl'] ? attributes['item_vertical_align_xxl'] : '',

                            attributes['item_horizontal_align_xs'] ? attributes['item_horizontal_align_xs'] : '',
                            attributes['item_horizontal_align_sm'] ? attributes['item_horizontal_align_sm'] : '',
                            attributes['item_horizontal_align_md'] ? attributes['item_horizontal_align_md'] : '',
                            attributes['item_horizontal_align_lg'] ? attributes['item_horizontal_align_lg'] : '',
                            attributes['item_horizontal_align_xl'] ? attributes['item_horizontal_align_xl'] : '',
                            attributes['item_horizontal_align_xxl'] ? attributes['item_horizontal_align_xxl'] : '',

                            attributes['item_text_align_xs'] ? attributes['item_text_align_xs'] : '',
                            attributes['item_text_align_sm'] ? attributes['item_text_align_sm'] : '',
                            attributes['item_text_align_md'] ? attributes['item_text_align_md'] : '',
                            attributes['item_text_align_lg'] ? attributes['item_text_align_lg'] : '',
                            attributes['item_text_align_xl'] ? attributes['item_text_align_xl'] : '',
                            attributes['item_text_align_xxl'] ? attributes['item_text_align_xxl'] : '',

                            text_color,
                        ] );

                        var main_class          = areoi.helper.GetClassNameStr( [ 
                            'areoi-content-grid-item',
                            include_media,
                            attributes['card_size'] ? attributes['card_size'] : 'areoi-card-small',
                            attributes['className'] ? attributes['className'] : ''
                        ] );

                        var content     = '<div>' + title + excerpt + '</div>';
                        var media       = '';
                        var new_attributes = [];
                        
                        if ( include_media ) {
                            
                            var full_media = props.medias[post.id] ? props.medias[post.id] : null;

                            if ( media_layout == 'inline' && full_media ) {

                                media += '<div class="card-img-top  position-relative overflow-hidden">';
                                    media += '<div class="areoi-background">';
                                        media += '<img src="' + full_media.source_url + '" />';
                                    media += '</div>';
                                media += '</div>';

                            } else if ( media_layout == 'background' ) {

                                var new_attributes = structuredClone( attributes );
                                new_attributes['background_display']           = true;
                                new_attributes['background_image']             = { 'url': (full_media ? full_media.source_url : null) };
                                new_attributes['background_color']             = attributes['item_background_color'];
                                new_attributes['background_display_overlay']   = attributes['item_display_overlay'];
                                new_attributes['background_overlay']           = attributes['item_overlay'];
                            }
                        }

                        function create_content() { return { __html: title + excerpt }; };
                        function create_media() { return { __html: media }; };

                        switch( attributes['style'] ) {
                            case 'full':

                                var new_output = <div className={ main_class + ' p-0' }>

                                    <div className={ 'd-flex flex-column h-100 overflow-hidden position-relative'  }>
                                        { media_layout != 'background' &&
                                            <div dangerouslySetInnerHTML={ create_media() } />
                                        }
                                        { media_layout == 'background' &&
                                            <>{ areoi.DisplayBackground( areoi, new_attributes ) }</>
                                        }
                                        <div className={ card_class }>
                                            <div dangerouslySetInnerHTML={ create_content() } />
                                        </div>
                                    </div>
                                </div>;

                                break;

                            case 'flush':

                                var new_output = <div className={ main_class }>

                                    <div className={ 'd-flex flex-column h-100 overflow-hidden position-relative'  }>
                                        { media_layout != 'background' &&
                                            <div dangerouslySetInnerHTML={ create_media() } />
                                        }
                                        { media_layout == 'background' &&
                                            <>{ areoi.DisplayBackground( areoi, new_attributes ) }</>
                                        }
                                        <div className={ card_class }>
                                            <div dangerouslySetInnerHTML={ create_content() } />
                                        </div>
                                    </div>
                                </div>;

                                break;

                            case 'card':

                                var new_output = <div className={ main_class }>

                                    <div className={ 'card h-100 overflow-hidden position-relative'  }>
                                        { media_layout != 'background' &&
                                            <div dangerouslySetInnerHTML={ create_media() } />
                                        }
                                        { media_layout == 'background' &&
                                            <>{ areoi.DisplayBackground( areoi, new_attributes ) }</>
                                        }
                                        <div className={ card_class }>
                                            <div dangerouslySetInnerHTML={ create_content() } />
                                        </div>
                                    </div>
                                </div>;

                                break;

                            
                        }

                        output.push( new_output );
                    });

                } else {
                   output = <div>
                        <p class="text-center mb-0">Loading posts.</p>
                   </div>; 
                }
                return ( output );
            }

        );


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

                                <areoi.components.PanelRow className="areoi-panel-row">
                                    <areoi.components.SelectControl
                                        label="Horizontal Align"
                                        labelPosition="top"
                                        help="Align content within body from left to right. This will be applied to all greater device sizes unless overridden."
                                        value={ attributes['horizontal_align_' + tab.name] }
                                        options={ [
                                            { label: 'Default', value: null },
                                            { label: 'Start', value: 'justify-content' + append + '-start' },
                                            { label: 'Center', value: 'justify-content' + append + '-center' },
                                            { label: 'End', value: 'justify-content' + append + '-end' },
                                        ] }
                                        onChange={ ( value ) => onChange( 'horizontal_align_' + tab.name, value ) }
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

                            <areoi.components.PanelBody title={ 'Item Settings (' + tab.title + ')' } initialOpen={ false }>                        

                                <areoi.components.PanelRow className="areoi-panel-row">
                                    <areoi.components.SelectControl
                                        label="Vertical Align"
                                        labelPosition="top"
                                        help="Align content within body of each item from top to bottom. This will be applied to all greater device sizes unless overridden."
                                        value={ attributes['item_vertical_align_' + tab.name] }
                                        options={ [
                                            { label: 'Default', value: null },
                                            { label: 'Start', value: 'align-items' + append + '-start' },
                                            { label: 'Center', value: 'align-items' + append + '-center' },
                                            { label: 'End', value: 'align-items' + append + '-end' },
                                        ] }
                                        onChange={ ( value ) => onChange( 'item_vertical_align_' + tab.name, value ) }
                                    />
                                </areoi.components.PanelRow>

                                <areoi.components.PanelRow className="areoi-panel-row">
                                    <areoi.components.SelectControl
                                        label="Horizontal Align"
                                        labelPosition="top"
                                        help="Align content within body of each item from left to right. This will be applied to all greater device sizes unless overridden."
                                        value={ attributes['item_horizontal_align_' + tab.name] }
                                        options={ [
                                            { label: 'Default', value: null },
                                            { label: 'Start', value: 'justify-content' + append + '-start' },
                                            { label: 'Center', value: 'justify-content' + append + '-center' },
                                            { label: 'End', value: 'justify-content' + append + '-end' },
                                        ] }
                                        onChange={ ( value ) => onChange( 'item_horizontal_align_' + tab.name, value ) }
                                    />
                                </areoi.components.PanelRow>

                                <areoi.components.PanelRow className="areoi-panel-row">
                                    <areoi.components.SelectControl
                                        label="Text Align"
                                        labelPosition="top"
                                        help="Align text within the body of each item."
                                        value={ attributes['item_text_align_' + tab.name] }
                                        options={ [
                                            { label: 'Default', value: null },
                                            { label: 'Start', value: 'text' + append + '-start' },
                                            { label: 'Center', value: 'text' + append + '-center' },
                                            { label: 'End', value: 'text' + append + '-end' },
                                        ] }
                                        onChange={ ( value ) => onChange( 'item_text_align_' + tab.name, value ) }
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

                            <areoi.components.PanelBody title={ 'Posts' } initialOpen={ false }>
                                
                                <PostTypesControl />

                                <areoi.components.PanelRow className="areoi-panel-row">
                                    <areoi.components.SelectControl
                                        label="Display Posts"
                                        labelPosition="top"
                                        help="Choose whether to display the selected posts or children of the selected posts."
                                        value={ attributes.display_posts }
                                        options={ [
                                            { label: 'Show selected posts', value: 'selected' },
                                            { label: 'Show children of selected posts', value: 'children' },
                                        ] }
                                         onChange={ ( value ) => onChange( 'display_posts', value ) }
                                    />
                                </areoi.components.PanelRow>

                                <PostsDropdownControl post_type={ attributes['post_type'] ? attributes['post_type'] : 'post' } />

                                <areoi.components.PanelRow className="areoi-panel-row">
                                    <areoi.components.SelectControl
                                        label="Order By"
                                        labelPosition="top"
                                        help="Sort retrieved posts by parameter."
                                        value={ attributes.orderby }
                                        options={ [
                                            { label: 'None', value: 'none' },
                                            { label: 'Title', value: 'title' },
                                            { label: 'Menu Order', value: 'menu_order' },
                                            { label: 'Date', value: 'date' },
                                            { label: 'Random', value: 'rand' },
                                        ] }
                                         onChange={ ( value ) => onChange( 'orderby', value ) }
                                    />
                                </areoi.components.PanelRow>

                                <areoi.components.PanelRow className="areoi-panel-row">
                                    <areoi.components.SelectControl
                                        label="Order"
                                        labelPosition="top"
                                        help="Designates the ascending or descending order of the 'orderby' parameter."
                                        value={ attributes.order }
                                        options={ [
                                            { label: 'ASC', value: 'asc' },
                                            { label: 'DESC', value: 'desc' },
                                        ] }
                                         onChange={ ( value ) => onChange( 'order', value ) }
                                    />
                                </areoi.components.PanelRow>

                                <areoi.components.PanelRow className="areoi-panel-row">
                                    <areoi.components.TextControl
                                        label="Posts Per Page"
                                        labelPosition="top"
                                        help="Specify the number of posts you would like to display."
                                        value={ attributes.posts_per_page }
                                        onChange={ ( value ) => onChange( 'posts_per_page', value ) }
                                    />
                                </areoi.components.PanelRow>

                                <areoi.components.PanelRow className={ attributes.include_pagination ? 'areoi-panel-row' : '' }>
                                    <areoi.components.ToggleControl 
                                        label={ 'Include Pagination' }
                                        help="Toggle on to display pagination at the bottom of the block."
                                        checked={ attributes.include_pagination }
                                        onChange={ ( value ) => onChange( 'include_pagination', value ) }
                                    />
                                </areoi.components.PanelRow>

                                { attributes.include_pagination &&
                                    <areoi.components.PanelRow>
                                        <areoi.components.SelectControl
                                            label="Pagination Color"
                                            labelPosition="top"
                                            help="Use the Bootstrap btn color utilities to change the button color for pagination."
                                            value={ attributes.pagination_color }
                                            options={ [
                                                { label: 'Default', value: 'btn-primary' },
                                                { label: 'Primary', value: 'btn-primary' },
                                                { label: 'Primary (Outline)', value: 'btn-outline-primary' },
                                                { label: 'Secondary', value: 'btn-secondary' },
                                                { label: 'Secondary (Outline)', value: 'btn-outline-secondary' },
                                                { label: 'Success', value: 'btn-success' },
                                                { label: 'Success (Outline)', value: 'btn-outline-success' },
                                                { label: 'Danger', value: 'btn-danger' },
                                                { label: 'Danger (Outline)', value: 'btn-outline-danger' },
                                                { label: 'Warning', value: 'btn-warning' },
                                                { label: 'Warning (Outline)', value: 'btn-outline-warning' },
                                                { label: 'Info', value: 'btn-info' },
                                                { label: 'Info (Outline)', value: 'btn-outline-info' },
                                                { label: 'Light', value: 'btn-light' },
                                                { label: 'Light (Outline)', value: 'btn-outline-light' },
                                                { label: 'Dark', value: 'btn-dark' },
                                                { label: 'Dark (Outline)', value: 'btn-outline-dark' },
                                            ] }
                                            onChange={ ( value ) => onChange( 'pagination_color', value ) }
                                        />
                                    </areoi.components.PanelRow>
                                }

                            </areoi.components.PanelBody>

                            <areoi.components.PanelBody title={ 'Settings' } initialOpen={ false }>
                                
                                <areoi.components.PanelRow className="areoi-panel-row">
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

                                <areoi.components.PanelRow className="areoi-panel-row">
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

                            <div className="areoi-device-specific">
                                <p><strong>Start Item Specific Settings</strong></p>
                                <p>Item specific settings allow you to control how the individual posts are displayed within the block.</p>
                            </div>

                            <areoi.components.PanelBody title={ 'Content' } initialOpen={ false }>
                                
                                <areoi.components.PanelRow className={ 'areoi-panel-row' }>
                                    <areoi.components.ToggleControl 
                                        label={ 'Include Media' }
                                        help="Toggle on to display the featured image for each item."
                                        checked={ attributes.include_media }
                                        onChange={ ( value ) => onChange( 'include_media', value ) }
                                    />
                                </areoi.components.PanelRow>

                                <areoi.components.PanelRow className={ 'areoi-panel-row' }>
                                    <areoi.components.ToggleControl 
                                        label={ 'Include Title' }
                                        help="Toggle on to display the title for each item."
                                        checked={ attributes.include_title }
                                        onChange={ ( value ) => onChange( 'include_title', value ) }
                                    />
                                </areoi.components.PanelRow>

                                {
                                    attributes.include_title && 
                                    <areoi.components.PanelRow className={ 'areoi-panel-row' }>
                                        <areoi.components.SelectControl
                                            label="Title Element"
                                            labelPosition="top"
                                            help="Specify what type of heading to use for displaying titles."
                                            value={ attributes.title_element }
                                            options={ [
                                                { label: '<h1>', value: 'h1' },
                                                { label: '<h2>', value: 'h2' },
                                                { label: '<h3>', value: 'h3' },
                                                { label: '<h4>', value: 'h4' },
                                                { label: '<h5>', value: 'h5' },
                                                { label: '<h6>', value: 'h6' },
                                                { label: '<p>', value: 'p' },
                                            ] }
                                            onChange={ ( value ) => onChange( 'title_element', value ) }
                                        />
                                    </areoi.components.PanelRow>
                                }

                                <areoi.components.PanelRow className={ 'areoi-panel-row' }>
                                    <areoi.components.ToggleControl 
                                        label={ 'Include Excerpt' }
                                        help="Toggle on to display the excerpt for each item."
                                        checked={ attributes.include_excerpt }
                                        onChange={ ( value ) => onChange( 'include_excerpt', value ) }
                                    />
                                </areoi.components.PanelRow>

                                <areoi.components.PanelRow className={ 'areoi-panel-row areoi-panel-row-no-border' }>
                                    <areoi.components.ToggleControl 
                                        label={ 'Include Permalink' }
                                        help="Toggle on to include a stretched link for each item."
                                        checked={ attributes.include_permalink }
                                        onChange={ ( value ) => onChange( 'include_permalink', value ) }
                                    />
                                </areoi.components.PanelRow>

                            </areoi.components.PanelBody>

                            <areoi.components.PanelBody title={ 'Style' } initialOpen={ false }>
                                
                                <areoi.components.PanelRow className={ 'areoi-panel-row' }>
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
                                        onChange={ ( value ) => onChange( 'style', value ) }
                                    />
                                </areoi.components.PanelRow>

                                <areoi.components.PanelRow className={ 'areoi-panel-row' }>
                                    <areoi.components.SelectControl
                                        label="Card Size"
                                        labelPosition="top"
                                        help="Choose a predefined size for your grid item. Small is 40vh, Medium is 60vh, Large is 80vh and Extra Large is 100vh."
                                        value={ attributes.card_size }
                                        options={ [
                                            { label: 'Extra Small', value: 'areoi-card-extra-small' },
                                            { label: 'Small', value: 'areoi-card-small' },
                                            { label: 'Medium', value: 'areoi-card-medium' },
                                            { label: 'Large', value: 'areoi-card-large' },
                                            { label: 'Extra Large', value: 'areoi-card-extra-large' },
                                        ] }
                                        onChange={ ( value ) => onChange( 'card_size', value ) }
                                    />
                                </areoi.components.PanelRow>

                                {
                                    attributes.include_media && 
                                    
                                    <>
                                        <areoi.components.PanelRow className={ 'areoi-panel-row' }>
                                            <areoi.components.SelectControl
                                                label="Media Layout"
                                                labelPosition="top"
                                                help="Choose how you want media to be displayed."
                                                value={ attributes.media_layout }
                                                options={ [
                                                    { label: 'Inline', value: 'inline' },
                                                    { label: 'Background', value: 'background' },
                                                ] }
                                                onChange={ ( value ) => onChange( 'media_layout', value ) }
                                            />
                                        </areoi.components.PanelRow>                                        

                                        {
                                            attributes.media_layout != 'background' &&
                                            <areoi.components.PanelRow className={ 'areoi-panel-row' }>
                                                <areoi.components.SelectControl
                                                    label="Media Size"
                                                    labelPosition="top"
                                                    help="Choose a predefined size for your grid item media. Small is 20vh, Medium is 30vh, Large is 40vh and Extra Large is 50vh."
                                                    value={ attributes.size }
                                                    options={ [
                                                        { label: 'Small', value: 'areoi-small' },
                                                        { label: 'Medium', value: 'areoi-medium' },
                                                        { label: 'Large', value: 'areoi-large' },
                                                        { label: 'Extra Large', value: 'areoi-extra-large' },
                                                    ] }
                                                    onChange={ ( value ) => onChange( 'size', value ) }
                                                />
                                            </areoi.components.PanelRow>
                                        }
                                        {
                                            attributes.media_layout == 'background' && 
                                            
                                            <>
                                                <areoi.components.PanelRow className="areoi-panel-row">
                                                    <label>Background Color</label>
                                                    <areoi.components.ColorPicker
                                                        color={ attributes.item_background_color }
                                                        onChangeComplete={ ( val ) => onChange( 'item_background_color', val ) }
                                                    />
                                                </areoi.components.PanelRow>

                                                <areoi.components.PanelRow className="areoi-panel-row">
                                                    <areoi.components.ToggleControl 
                                                        label={ 'Display Overlay' }
                                                        help="Toggle on to add an overlay over the top of any image or video added to the background."
                                                        checked={ attributes.item_display_overlay }
                                                        onChange={ ( value ) => onChange( 'item_display_overlay', value ) }
                                                    />
                                                </areoi.components.PanelRow>

                                                { attributes.item_display_overlay &&
                                                    <areoi.components.PanelRow className="areoi-panel-row">
                                                        <label>Overlay</label>
                                                        <areoi.components.ColorPicker
                                                            color={ attributes.item_overlay }
                                                            onChangeComplete={ ( val ) => onChange( 'item_overlay', val ) }
                                                        />
                                                    </areoi.components.PanelRow>
                                                }

                                            </>
                                        }
                                    </>
                                }

                                <areoi.components.PanelRow>
                                    <areoi.components.SelectControl
                                        label="Text Color"
                                        labelPosition="top"
                                        help="Use the Bootstrap text color utilities to change the text color of a card."
                                        value={ attributes.text_color }
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
                                        onChange={ ( value ) => onChange( 'text_color', value ) }
                                    />
                                </areoi.components.PanelRow>

                            </areoi.components.PanelBody>

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

                                        <PostsList post_type={ attributes['post_type'] ? attributes['post_type'] : 'post' } attributes={ attributes } query={ {
                                            per_page: -1,
                                            orderby: attributes['orderby'],
                                            order: attributes['order'],
                                        } } />

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