const DeviceLayout = ( areoi, attributes, onChange, tab ) => {

    var append = '';
    if ( tab.name != 'default' ) {
        append = '_' + tab.name;
    }

    return (
        <areoi.components.PanelBody title={ 'Display (' + tab.title + ')' } initialOpen={ false }>
            <areoi.components.PanelRow className={ 'areoi-panel-row ' + ( attributes['hide_' + tab.name] ? 'areoi-panel-row-no-border' : '' ) }>
                <areoi.components.ToggleControl 
                    label={ 'Hide on ' + tab.title }
                    help={ 'Hide this block on ' + tab.title + ' devices. This will only hide the block from this specific device unless you alter the setting on each device.' }
                    checked={ attributes['hide_' + tab.name] }
                    onChange={ ( value ) => onChange( 'hide_' + tab.name, value ) }
                />
            </areoi.components.PanelRow>

            {
                !attributes['hide_' + tab.name] && 

                <>
                    <areoi.components.PanelRow className="areoi-panel-row">
                        <label className="areoi-panel-row__label">Height</label>
                        <table>
                            <tr>
                                <td>
                                    <areoi.components.TextControl
                                        label="Dimensions"
                                        value={ attributes['height_dimension' + append] }
                                        onChange={ ( value ) => onChange( 'height_dimension' + append, value ) }
                                    />
                                </td>
                                <td>
                                    <areoi.components.SelectControl
                                        label="Units"
                                        labelPosition="top"
                                        value={ attributes['height_unit' + append] }
                                        options={ [
                                            { label: 'px', value: 'px' },
                                            { label: '%', value: '%' },
                                            { label: 'vh', value: 'vh' },
                                            { label: 'rem', value: 'rem' },
                                        ] }
                                        onChange={ ( value ) => onChange( 'height_unit' + append, value ) }
                                    />
                                </td>
                            </tr>
                        </table>
                        <p className="components-base-control__help css-1gbp77-StyledHelp">Dimenions will be applied to all devices greater than this one unless overridden in each devices settings.</p>
                    </areoi.components.PanelRow>

                    <areoi.components.PanelRow className="areoi-panel-row">
                        <label className="areoi-panel-row__label">Padding (px)</label>
                        <table>
                            <tr>
                                <td width="25%">
                                    <areoi.components.TextControl
                                        label="Top"
                                        value={ attributes['padding_top' + append] }
                                        onChange={ ( value ) => onChange( 'padding_top' + append, value ) }
                                    />
                                </td>
                                <td width="25%">
                                    <areoi.components.TextControl
                                        label="Right"
                                        value={ attributes['padding_right' + append] }
                                        onChange={ ( value ) => onChange( 'padding_right' + append, value ) }
                                    />
                                </td>
                                <td width="25%">
                                    <areoi.components.TextControl
                                        label="Bottom"
                                        value={ attributes['padding_bottom' + append] }
                                        onChange={ ( value ) => onChange( 'padding_bottom' + append, value ) }
                                    />
                                </td>
                                <td width="25%">
                                    <areoi.components.TextControl
                                        label="Left"
                                        value={ attributes['padding_left' + append] }
                                        onChange={ ( value ) => onChange( 'padding_left' + append, value ) }
                                    />
                                </td>
                            </tr>
                        </table>
                        <p className="components-base-control__help css-1gbp77-StyledHelp">Padding will be applied to all devices greater than this one unless overridden in each devices settings.</p>
                    </areoi.components.PanelRow>

                    <areoi.components.PanelRow className="areoi-panel-row areoi-panel-row-no-border">
                        <label className="areoi-panel-row__label">Margin (px)</label>
                        <table>
                            <tr>
                                <td width="25%">
                                    <areoi.components.TextControl
                                        label="Top"
                                        value={ attributes['margin_top' + append] }
                                        onChange={ ( value ) => onChange( 'margin_top' + append, value ) }
                                    />
                                </td>
                                <td width="25%">
                                    <areoi.components.TextControl
                                        label="Right"
                                        value={ attributes['margin_right' + append] }
                                        onChange={ ( value ) => onChange( 'margin_right' + append, value ) }
                                    />
                                </td>
                                <td width="25%">
                                    <areoi.components.TextControl
                                        label="Bottom"
                                        value={ attributes['margin_bottom' + append] }
                                        onChange={ ( value ) => onChange( 'margin_bottom' + append, value ) }
                                    />
                                </td>
                                <td width="25%">
                                    <areoi.components.TextControl
                                        label="Left"
                                        value={ attributes['margin_left' + append] }
                                        onChange={ ( value ) => onChange( 'margin_left' + append, value ) }
                                    />
                                </td>
                            </tr>
                        </table>
                        <p className="components-base-control__help css-1gbp77-StyledHelp">Margin will be applied to all devices greater than this one unless overridden in each devices settings.</p>
                    </areoi.components.PanelRow>
                </>
            }

        </areoi.components.PanelBody>
    );
}

export default DeviceLayout;