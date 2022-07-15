(function ( $ ) {
	$( document ).on( 'ready', function () {
		var columnsWithIcons = $( '.columns_with_icons_block .columns' );
		if ( columnsWithIcons.length && $( window ).width() < 576 ) {
			columnsWithIcons.each( function () {
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