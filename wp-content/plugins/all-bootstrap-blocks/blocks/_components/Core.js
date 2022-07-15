import * as blocks from '@wordpress/blocks';
import * as components from '@wordpress/components';
import * as compose from '@wordpress/compose';
import * as editor from '@wordpress/block-editor';
import * as element from '@wordpress/element';
import { __ } from '@wordpress/i18n';
import * as icon from '@wordpress/icons';
import * as keycodes from '@wordpress/keycodes';


import * as helper from './Helpers.js';

// Custom Components
import ResponsiveTabPanel from './ResponsiveTabPanel.js';
import MediaUpload from './MediaUpload.js';
import URLPicker from './URLPicker.js'

// Setting Groups
import Background from './Background.js';
import Colors from './Colors.js';

// Device Setting Groups
import DeviceBackground from './DeviceBackground.js';
import DeviceLayout from './DeviceLayout.js';

// Editor Displays
import DisplayBackground from './DisplayBackground.js';
import DisplayPreview from './DisplayPreview.js';
import DisplayVisibility from './DisplayVisibility.js';

const el = element.createElement;
const blockIcon = el('svg', { width: 20, height: 20 },
  el('path', { d: "M9.5,0.4L0.4,21.2l0,0c2.9,0,5.6-1.8,6.8-4.4l7.2-16.3H9.5z" } ),
  el('path', { d: "M15.4,16.5c1.9,0,3.7,0.7,5,2.1l-5-11.3l-5,11.3C11.7,17.3,13.5,16.5,15.4,16.5z" } )
);

const directory = areoi_vars.plugin_url + 'blocks/';

export {
    blocks,
    components,
    compose,
    editor,
    element,
    icon,
    keycodes,
    blockIcon,
    directory,
    __,
    helper,
    ResponsiveTabPanel,
    MediaUpload,
    URLPicker,

    Background,
    Colors,

    DeviceBackground,
    DeviceLayout,

    DisplayBackground,
    DisplayPreview,
    DisplayVisibility
}