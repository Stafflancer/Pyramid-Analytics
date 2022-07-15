jQuery( document ).ready( function () {
	jQuery( '.tab-menu li a' ).on( 'click', function () {
		var target = $( this ).attr( 'data-rel' );
		jQuery( '.tab-menu li a' ).removeClass( 'active' );
		jQuery( this ).addClass( 'active' );
		jQuery( '#' + target ).fadeIn( 'slow' ).siblings( '.tab-box' ).hide();
		return false;
	} );
} );