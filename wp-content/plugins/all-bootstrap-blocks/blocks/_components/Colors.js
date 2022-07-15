const Colors = ( areoi, attributes, onChange ) => {
    return (
        <>
            <areoi.components.PanelRow className="areoi-panel-row">
                <areoi.components.SelectControl
                    label="Background"
                    labelPosition="top"
                    help="Use the Bootstrap background utilities to change the background of a card."
                    value={ attributes.background }
                    options={ [
                        { label: 'Default', value: null },
                        { label: 'Primary', value: 'bg-primary' },
                        { label: 'Secondary', value: 'bg-secondary' },
                        { label: 'Success', value: 'bg-success' },
                        { label: 'Danger', value: 'bg-danger' },
                        { label: 'Warning', value: 'bg-warning' },
                        { label: 'Info', value: 'bg-info' },
                        { label: 'Light', value: 'bg-light' },
                        { label: 'Dark', value: 'bg-dark' },
                    ] }
                    onChange={ ( value ) => onChange( 'background', value ) }
                />

            </areoi.components.PanelRow>

            <areoi.components.PanelRow className="areoi-panel-row">
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

            <areoi.components.PanelRow>
                <areoi.components.SelectControl
                    label="Border Color"
                    labelPosition="top"
                    help="Use border utilities to change just the border-color of a card."
                    value={ attributes.border_color }
                    options={ [
                        { label: 'Default', value: null },
                        { label: 'Primary', value: 'border-primary' },
                        { label: 'Secondary', value: 'border-secondary' },
                        { label: 'Success', value: 'border-success' },
                        { label: 'Danger', value: 'border-danger' },
                        { label: 'Warning', value: 'border-warning' },
                        { label: 'Info', value: 'border-info' },
                        { label: 'Light', value: 'border-light' },
                        { label: 'Dark', value: 'border-dark' },
                    ] }
                    onChange={ ( value ) => onChange( 'border_color', value ) }
                />
            </areoi.components.PanelRow>
        </>
    );
}

export default Colors;