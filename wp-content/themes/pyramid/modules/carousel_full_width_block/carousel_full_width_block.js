(function ( $ ) {
	$( document ).on( 'ready', function () {
		var carouselfullwidthblock_slider = $( '.carousel_full_width_block .s_carousel' );
		if ( carouselfullwidthblock_slider.length ) {
			carouselfullwidthblock_slider.each( function () {
				$( this ).slick( {
					dots: true,
					appendDots: carouselfullwidthblock_slider.find( '.slick-slider-dots' ),
					arrows: true,
					slidesToShow: 1,
					slidesToScroll: 1,
				} );
			} );

			carouselfullwidthblock_slider.on( 'afterChange', function () {
				let current = carouselfullwidthblock_slider.find( '.slick-slide.slick-current' );
				let currentnumber = current.attr( 'data-slick-index' );
				let dot = current.find( '.slick-dots li:nth-child(' + (parseInt( currentnumber ) + 1) + ')' );
				dot.addClass( 'active' );
			} );

			let current = carouselfullwidthblock_slider.find( '.slick-slide.slick-current' );
			let dot = current.find( '.slick-dots li:nth-child(1)' );
			dot.addClass( 'active' );
		}
	} );
})( jQuery );