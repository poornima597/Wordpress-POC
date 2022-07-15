var caffSliderAutoplay = false;

if ( '1' == caffSliderOptions.slider.autoplay ) {
	caffSliderAutoplay = {
	    delay: caffSliderOptions.slider.autoplayDelay,
	};
}

var mainSlider = new Swiper ( '#slider-section', {
	autoHeight: true, //enable auto height
	// If we need pagination
	pagination: {
		el: '#slider-section .swiper-pagination',
		type: 'bullets',
		clickable: 'true',
	},

	autoplay: caffSliderAutoplay,
	// Navigation arrows
	navigation: {
		nextEl: '#slider-section .swiper-button-next',
		prevEl: '#slider-section .swiper-button-prev',
	},

	// And if we need scrollbar
	scrollbar: {
		el: '#slider-section .swiper-scrollbar',
	},
});

if ( 'undefined' != typeof mainSlider.el && '1' == caffSliderOptions.slider.autoplay && '1' == caffSliderOptions.slider.pauseOnHover ) {
	mainSlider.el.addEventListener( 'mouseenter', function( event ) {
		mainSlider.autoplay.stop();
	}, false);

	mainSlider.el.addEventListener( 'mouseleave', function( event ) {
		mainSlider.autoplay.start();
	}, false);
}
