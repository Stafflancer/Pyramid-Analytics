(function ( $ ) {
	$( document ).on( 'ready', function () {
		let testimonialsSlider = $( '.customer_testimonials_block .testimonials' );
		if ( testimonialsSlider.length && $( window ).width() < 576 ) {
			testimonialsSlider.each( function () {
				$( this ).slick( {
					dots: true,
					arrows: false,
					infinite: false,
					slidesToShow: 1.2,
					slidesToScroll: 1,
				} );
			} );

			function changeDot() {
				let current = testimonialsSlider.find( '.slick-slide.slick-current' ),
					currentNumber = current.attr( 'data-slick-index' ),
					dot = testimonialsSlider.find( '.slick-dots li:nth-child(' + (parseInt( currentNumber ) + 1) + ')' );
				testimonialsSlider.find( '.slick-dots li' ).removeClass( 'active' );
				dot.addClass( 'active' );
			}

			changeDot();

			testimonialsSlider.on( 'afterChange', function () {
				changeDot();
			} );
		}
	} );
})( jQuery );