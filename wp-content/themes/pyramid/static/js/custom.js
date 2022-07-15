jQuery( document ).ready( function ($) {
	jQuery( '.btn-list .apply' ).click( function ( e ) {
		if ( location.pathname.replace( /^\//, '' ) == this.pathname.replace( /^\//, '' ) && location.hostname == this.hostname ) {
			let target = jQuery( this.hash );
			target = target.length ? target : jQuery( '[name=' + this.hash.slice( 1 ) + ']' );
			if ( target.length ) {
				jQuery( 'html, body' ).animate( {
					scrollTop: (target.offset().top - 120)
				}, 1000 );
				return false;
			}
		}
	} );

	if ( jQuery( '#footer_custom_text' ).length > 0 ) {
		let get_footer_text = jQuery( '#footer_custom_text' ).text();
		jQuery( '.footer-cta h2' ).text( get_footer_text );
	}

	jQuery( '.menu-item-has-children' ).find( '.sub-menu' ).before( '<span class="footer-submenu-toggle"><img src="/wp-content/themes/pyramid/static/images/svgs/menu-drop-white.svg"></span>' );
	jQuery( '.footer-submenu-toggle' ).on( 'click', (function ( e ) {
		e.preventDefault();
		let submenu = $( this ).next( 'ul.sub-menu' );
		submenu.slideToggle();
	}) );

	// window.onload = function () {
	// 	let myiFrame = document.getElementById( 'hs-form-iframe-0' ),
	// 		doc = (null !== myiFrame) ? myiFrame.contentDocument : null;
	//
	// 	if (null !== doc) {
	// 		doc.body.innerHTML = doc.body.innerHTML + '<style>form#hsForm_12cca09f-a05e-4d26-8c4c-8aa173599200{max-width:550px;width:100%;margin:0!important;position:relative}form#hsForm_12cca09f-a05e-4d26-8c4c-8aa173599200 input{border:0!important;background:#f7f9f7 0 0 no-repeat padding-box!important;border-radius:35px!important;height:45px!important}form#hsForm_12cca09f-a05e-4d26-8c4c-8aa173599200 .actions{margin-top:0!important;margin-bottom:0!important;padding:0!important}form#hsForm_12cca09f-a05e-4d26-8c4c-8aa173599200 .hs-button{background:#3e3e3e 0 0 no-repeat padding-box!important;border-radius:25px!important;font:normal normal 600 16px/24px Open Sans!important;letter-spacing:.32px!important;color:#f7f9f7!important;text-transform:uppercase;padding:13.5px 64px;line-height:1!important}form#hsForm_12cca09f-a05e-4d26-8c4c-8aa173599200 .hs_submit{position:absolute;right:0;top:0}label#label-email-12cca09f-a05e-4d26-8c4c-8aa173599200{display:none}</style>';
	// 	}
	// };

	

} );