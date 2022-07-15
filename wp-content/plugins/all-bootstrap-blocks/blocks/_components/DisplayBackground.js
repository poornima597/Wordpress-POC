const DisplayBackground = ( areoi, attributes, onChange, tab ) => {
    return (
        <div>
        { attributes.background_display &&
            <div className={ areoi.helper.GetClassNameStr( [ 
                'background'
            ] ) }>
                <div className="container-fluid">
                    <div className={ areoi.helper.GetClassNameStr( [ 
                            'row',
                            'd-flex',
                            attributes.background_horizontal_align 
                        ] ) }>
                        <div className={ areoi.helper.GetClassNameStr( [ 
                            'col',
                            attributes.background_col_xs,
                            attributes.background_col_sm,
                            attributes.background_col_md,
                            attributes.background_col_lg,
                            attributes.background_col_xl,
                            attributes.background_col_xxl 
                        ] ) }>
                            { 
                                attributes.background_color && 
                                <div className={ areoi.helper.GetClassNameStr( [ 
                                    'background__color'
                                ] ) } style={ {
                                    background: areoi.helper.GetRGB( attributes.background_color.rgb )
                                } }></div>
                            }
                            { 
                                attributes.background_image && 
                                <div 
                                    className={ areoi.helper.GetClassNameStr( [ 'background__image' ] ) } 
                                    style={ { 
                                        cssText: 'background-image: url( ' + attributes.background_image.url + ' );'
                                    } }
                                ></div>
                            }
                            { 
                                attributes.background_video && 
                                <video>
                                    <source src={ attributes.background_video.url } />
                                </video>
                            }
                            { 
                                attributes.background_overlay && attributes.background_display_overlay && 
                                <div className={ areoi.helper.GetClassNameStr( [ 
                                    'background__overlay'
                                ] ) } style={ {
                                    background: areoi.helper.GetRGB( attributes.background_overlay.rgb )
                                } }></div>
                            }
                        </div>
                    </div>
                </div>
            </div>
        }
        </div>
    );
}

export default DisplayBackground;