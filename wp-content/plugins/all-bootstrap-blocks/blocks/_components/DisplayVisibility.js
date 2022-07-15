const DisplayVisibility = ( areoi, attributes, onChange, tab ) => {

    return (
        <areoi.components.PanelBody title={ 'Display (' + tab.title + ')' } initialOpen={ false }>
            <areoi.components.ToggleControl 
                label={ 'Hide on ' + tab.title }
                help={ 'Hide this block on ' + tab.title + ' devices. This will only hide the block from this specific device unless you alter the setting on each device.' }
                checked={ attributes['hide_' + tab.name] }
                onChange={ ( value ) => onChange( 'hide_' + tab.name, value ) }
            />
        </areoi.components.PanelBody>
    );
}

export default DisplayVisibility;