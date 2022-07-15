(function ( $ ) {
	jQuery( document ).ready( function () {
		jQuery( '.cross' ).click( function () {
			jQuery( '.popup' ).hide();
			jQuery( 'header' ).show();
			jQuery( 'body' ).css( 'overflow', 'auto' );
			jQuery( '.team_members_block' ).css( 'z-index', 'inherit' );
		} );
	} );
})( jQuery );