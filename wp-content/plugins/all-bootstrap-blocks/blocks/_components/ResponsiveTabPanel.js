import { 
    TabPanel, 
} from '@wordpress/components';

function reset(meta, props, is_device)
{
    const {
        attributes,
        setAttributes
    } = props;

    var meta_attrs = meta.attributes;
    var terms = ['xs','sm','md','lg','xl','xxl'];

    for (const [key, value] of Object.entries(attributes)) {
        var meta_current = meta_attrs[key];
        var is_reset = false;

        if ( ( is_device == 1 || is_device == 2 ) && !terms.some(term => key.includes( term ) ) ) is_reset = true;
        if ( ( is_device == 1 || is_device == 3 ) && terms.some(term => key.includes( term ) ) ) is_reset = true;

        if ( is_reset && meta_current && meta_current.default != value ) {
            setAttributes( { [key]: meta_current.default } );
        }
    }
}

function get_class_name(meta, props, size)
{
    const {
        attributes,
        setAttributes
    } = props;

    var meta_attrs = meta.attributes;

    var is_highlight = false;

    var class_name = 'tab-' + size;

    for (const [key, value] of Object.entries(attributes)) {
        var meta_current = meta_attrs[key];
        if ( key.includes( size ) ) {
            if ( meta_current && meta_current.default != value ) {
                is_highlight = true;
            }
        }
    }
    if ( is_highlight ) {
        class_name += ' areoi-tab-highlight';
    }

    return class_name;
}

const ResetPanel = ( meta, props ) => {
    return (
        <div>
            <div className="areoi-device-specific">
                <p><strong>Reset Settings</strong></p>
                <p>Use the buttons below to quickly reset multiple settings at once. 'All' will reset all of the Bootstrap Settings, 'Global' will reset settings outside of Device Specific and 'Devices' will reset all settings under Device Specific.</p>
                <button onClick={() => reset(meta, props, 1)} className="button">All</button>&nbsp;
                <button onClick={() => reset(meta, props, 2)} className="button">Global</button>&nbsp;
                <button onClick={() => reset(meta, props, 3)} className="button">Devices</button>
            </div>
        </div>
    );
}

const ResponsiveTabPanel = ( tabDevice, meta, props ) => {
    return (
        <div>
            <div className="areoi-device-specific">
                <p><strong>Start Device Specific Settings</strong></p>
                <p>Device specific settings allow you to control elements across every device. When you change a setting within a device the tab will be highlighted green.</p>
            </div>
            <TabPanel
                className="responsive-tab-panel"
                activeClass="active-tab"
                tabs={ [
                    {
                        name: 'xs',
                        title: 'XS',
                        className: get_class_name(meta, props, 'xs'),
                    },
                    {
                        name: 'sm',
                        title: 'SM',
                        className: get_class_name(meta, props, 'sm'),
                    },
                    {
                        name: 'md',
                        title: 'MD',
                        className: get_class_name(meta, props, 'md'),
                    },
                    {
                        name: 'lg',
                        title: 'LG',
                        className: get_class_name(meta, props, 'lg'),
                    },
                    {
                        name: 'xl',
                        title: 'XL',
                        className: get_class_name(meta, props, 'xl'),
                    },
                    {
                        name: 'xxl',
                        title: 'XXL',
                        className: get_class_name(meta, props, 'xxl'),
                    },
                ] }
            >
            
                { ( tab ) => {
                    return tabDevice( tab );
                }}
            </TabPanel>
            <div className="areoi-device-specific">
                <strong>End Device Specific Settings</strong>
            </div>

            { ResetPanel( meta, props ) }

        </div>
    );
}

export default ResponsiveTabPanel;