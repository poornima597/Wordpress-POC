const MediaUpload = ( areoi, attributes, onChange, label, type, key ) => {
    return (
        <areoi.components.PanelRow className="areoi-panel-row">
            
            <label>{ label }</label>
            
            <areoi.editor.MediaUploadCheck>
                <areoi.editor.MediaUpload
                    label="Image"
                    allowedTypes={ [type] }
                    onSelect={ ( val ) => onChange( key, val ) }
                    value={ attributes[key] ? attributes[key].id : null }
                    render={({ open}) => (
                        <areoi.components.Button 
                            className={ 'editor-post-featured-image__toggle areoi-components-button-img' }
                            onClick={ open }
                        >
                            { !attributes[key] && areoi.__('Choose ' + label, 'awp') }

                            { type == 'image' && attributes[key] != undefined && 
                                <areoi.components.ResponsiveWrapper
                                    naturalWidth={ attributes[key].width }
                                    naturalHeight={ attributes[key].height }
                                >
                                    <img src={attributes[key].url} />
                                </areoi.components.ResponsiveWrapper>
                            }

                            { type == 'video' && attributes[key] != undefined && 
                                <video>
                                    <source src={ attributes[key].url } />
                                </video>
                            }

                        </areoi.components.Button>
                    )}
                />
            </areoi.editor.MediaUploadCheck>

            {attributes[key] && 
                <areoi.editor.MediaUploadCheck>
                    <areoi.components.Button onClick={ ( image ) => onChange( key, null ) } isLink isDestructive>
                        {areoi.__('Remove ' + label, 'awp')}
                    </areoi.components.Button>
                </areoi.editor.MediaUploadCheck>
            }

        </areoi.components.PanelRow>
    );
}

export default MediaUpload;