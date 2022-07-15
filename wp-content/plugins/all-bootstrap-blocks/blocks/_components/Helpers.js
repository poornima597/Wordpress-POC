export const GetClassName = ( classes ) => {
    let newClasses = [];
    classes.forEach(element => {
        if ( typeof element !== 'undefined' && element ) {
            newClasses.push( element );
        }
    });
    return newClasses;
}

export const GetClassNameStr = ( classes ) => {
    let newClasses = '';
    classes.forEach(element => {
        if ( typeof element !== 'undefined' && element ) {
            newClasses += element + ' ';
        }
    });
    return newClasses;
}

export const GetStyles = ( attributes ) => {

    var devices = [ 'xs', 'sm', 'md', 'lg', 'xl', 'xxl' ];

    let styles = '';

    devices.forEach( device => {
        styles += ( attributes['height_dimension_' + device] ? 'height: ' + attributes['height_dimension_' + device] + attributes['height_unit_' + device] + ';' : '' );
        styles += ( attributes['padding_top_' + device] ? 'padding-top: ' + attributes['padding_top_' + device] + 'px;' : '' );
        styles += ( attributes['padding_right_' + device] ? 'padding-right: ' + attributes['padding_right_' + device] + 'px;' : '' );
        styles += ( attributes['padding_bottom_' + device] ? 'padding-bottom: ' + attributes['padding_bottom_' + device] + 'px;' : '' );
        styles += ( attributes['padding_left_' + device] ? 'padding-left: ' + attributes['padding_left_' + device] + 'px;' : '' );
        styles += ( attributes['margin_top_' + device] ? 'margin-top: ' + attributes['margin_top_' + device] + 'px;' : '' );
        styles += ( attributes['margin_right_' + device] ? 'margin-right: ' + attributes['margin_right_' + device] + 'px;' : '' );
        styles += ( attributes['margin_bottom_' + device] ? 'margin-bottom: ' + attributes['margin_bottom_' + device] + 'px;' : '' );
        styles += ( attributes['margin_left_' + device] ? 'margin-left: ' + attributes['margin_left_' + device] + 'px;' : '' );
    })

    return styles;
}

export const GetRGB = ( values ) => {
    
    let rgb = 'rgba( ' + values.r + ', ' + values.g + ', ' + values.b + ', ' + values.a + ' )';
    
    return rgb;
}

export const GetCols = ( field, key ) => {
    if ( field == 'col-xs' ) {
        field = 'col';
    }
    if ( key == 'xs' ) {
        key = null;
    }
    const device = field + ( key ? '-' + key : '' );

    if ( field == 'row-cols' ) {
        return [
            { label: 'Default', value: null },
            { label: '1', value: device + '-1' },
            { label: '2', value: device + '-2' },
            { label: '3', value: device + '-3' },
            { label: '4', value: device + '-4' },
            { label: '5', value: device + '-5' },
            { label: '6', value: device + '-6' }
        ];
    } else {
        return [
            { label: 'Default', value: null },
            { label: '0', value: device + '-0' },
            { label: '1', value: device + '-1' },
            { label: '2', value: device + '-2' },
            { label: '3', value: device + '-3' },
            { label: '4', value: device + '-4' },
            { label: '5', value: device + '-5' },
            { label: '6', value: device + '-6' },
            { label: '7', value: device + '-7' },
            { label: '8', value: device + '-8' },
            { label: '9', value: device + '-9' },
            { label: '10', value: device + '-10' },
            { label: '11', value: device + '-11' },
            { label: '12', value: device + '-12' }
        ];
    }
}