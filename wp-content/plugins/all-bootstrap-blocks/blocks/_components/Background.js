const Background = ( areoi, attributes, onChange ) => {
    return (
        <areoi.components.PanelBody title={ 'Background' } initialOpen={ false }>
            <areoi.components.PanelRow className={ 'areoi-panel-row ' + ( !attributes.background_display ? 'areoi-panel-row-no-border' : '' ) }>
                <areoi.components.ToggleControl 
                    label={ 'Display Background' }
                    help="Toggle on to display a background and all available background options."
                    checked={ attributes.background_display }
                    onChange={ ( value ) => onChange( 'background_display', value ) }
                />
            </areoi.components.PanelRow>

            { attributes.background_display &&
                <>
                    <areoi.components.PanelRow className="areoi-panel-row">
                        <areoi.components.SelectControl
                            label="Horizontal Align"
                            labelPosition="top"
                            help="Align the background to the left of the strip, in the center or to the right. This will be applied for all devices."
                            value={ attributes.background_horizontal_align }
                            options={ [
                                { label: 'Left', value: 'justify-content-start' },
                                { label: 'Center', value: 'justify-content-center' },
                                { label: 'Right', value: 'justify-content-end' }
                            ] }
                            onChange={ ( val ) => onChange( 'background_horizontal_align', val ) }
                        />
                    </areoi.components.PanelRow>

                    <areoi.components.PanelRow className="areoi-panel-row">
                        <label>Color</label>
                        <areoi.components.ColorPicker
                            color={ attributes.background_color }
                            onChangeComplete={ ( val ) => onChange( 'background_color', val ) }
                        />
                    </areoi.components.PanelRow>

                    { areoi.MediaUpload( areoi, attributes, onChange, 'Image', 'image', 'background_image' ) }

                    { areoi.MediaUpload( areoi, attributes, onChange, 'Video', 'video', 'background_video' ) }

                    <areoi.components.ToggleControl 
                        label={ 'Display Overlay' }
                        help="Toggle on to add an overlay over the top of any image or video added to the background."
                        checked={ attributes.background_display_overlay }
                        onChange={ ( value ) => onChange( 'background_display_overlay', value ) }
                    />

                    { attributes.background_display_overlay &&
                        <areoi.components.PanelRow className="areoi-panel-row">
                            <label>Overlay</label>
                            <areoi.components.ColorPicker
                                color={ attributes.background_overlay }
                                onChangeComplete={ ( val ) => onChange( 'background_overlay', val ) }
                            />
                        </areoi.components.PanelRow>
                    }                    
                </>
            }
        </areoi.components.PanelBody>
    );
}

export default Background;