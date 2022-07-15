(function ( $ ) {
	$( document ).on( 'ready', function () {
		var videoTestimonialsSlider = $( '.carousel_video_testimonials_block .s_carousel' );
		if ( videoTestimonialsSlider.length ) {
			videoTestimonialsSlider.each( function () {
				$( this ).slick( {
					dots: true,
					appendDots: videoTestimonialsSlider.find( '.slick-slider-dots' ),
					arrows: true,
					prevArrow: '<button type="button" class="slick-prev"></button>',
					nextArrow: '<button type="button" class="slick-next"></button>',
					adaptiveHeight: true,
					slidesToShow: 1,
					slidesToScroll: 1,
				} );
			} );

			videoTestimonialsSlider.on( 'afterChange', function () {
				let current = videoTestimonialsSlider.find( '.slick-slide.slick-current' ),
					currentNumber = current.attr( 'data-slick-index' ),
					dot = current.find( '.slick-dots li:nth-child(' + (parseInt( currentNumber ) + 1) + ')' );
				dot.addClass( 'active' );
			} );

			let current = videoTestimonialsSlider.find( '.slick-slide.slick-current' ),
				dot = current.find( '.slick-dots li:nth-child(1)' );
			dot.addClass( 'active' );
		}
	} );
})( jQuery );