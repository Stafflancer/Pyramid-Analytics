(function ( $ ) {
	$( document ).on( 'ready', function () {
		var awardsSlider = $( '.awards_block .awards' );
		if ( awardsSlider.length && $( window ).width() < 576 ) {
			awardsSlider.each( function () {
				$( this ).slick( {
					dots: true,
					arrows: false,
					slidesToShow: 1,
					slidesToScroll: 1,
				} );
			} );
		}
	} );
})( jQuery );