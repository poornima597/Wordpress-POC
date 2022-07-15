const DisplayPreview = ( areoi, attributes, onChange, block ) => {

    return (
        <>
            { 
                attributes.preview &&  
                <img src={ areoi.directory + block + '/cover.png'} />
            }
        </>
    );
}

export default DisplayPreview;