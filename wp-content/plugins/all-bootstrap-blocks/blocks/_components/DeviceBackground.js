const DeviceBackground = ( areoi, attributes, onChange, tab ) => {
    return (
        <>
        {
            !attributes['hide_' + tab.name] && attributes.background_display &&

            <areoi.components.PanelBody title={ 'Background (' + tab.title + ')' } initialOpen={ false }>
                <areoi.components.PanelRow className={ 'areoi-panel-row ' + ( attributes['background_hide_' + tab.name] ? 'areoi-panel-row-no-border' : '' ) }>
                    <areoi.components.ToggleControl 
                        label={ 'Hide Background on ' + tab.title }
                        help={ 'Hide the background for this block on ' + tab.title + ' devices. This will only hide the background from this specific device unless you alter the setting on each device.' }
                        checked={ attributes['background_hide_' + tab.name] }
                        onChange={ ( value ) => onChange( 'background_hide_' + tab.name, value ) }
                    />
                </areoi.components.PanelRow>
                
                { attributes.background_display && !attributes['background_hide_' + tab.name] &&
                    <areoi.components.PanelRow className="areoi-panel-row areoi-panel-row-no-border">
                        <areoi.components.SelectControl
                            label="Columns"
                            labelPosition="top"
                            help="Specify how many columns you would like the background to span on this device."
                            value={ attributes['background_col_' + tab.name] }
                            options={ areoi.helper.GetCols( 'col-' + tab.name, '' ) }
                            onChange={ ( val ) => onChange( 'background_col_' + tab.name, val ) }
                        />
                    </areoi.components.PanelRow>
                }
            </areoi.components.PanelBody>
        }
        </>
    );
}

export default DeviceBackground;