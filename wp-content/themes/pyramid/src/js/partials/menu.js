(function ( $ ) {
	// Mobile menu open/close.
	// let burgerBtn = $( '.burger-btn' ),
	// 	menu = $( 'header .h-menu-holder .h-menu' );
	// if ( burgerBtn.length && menu.length ) {
	// 	burgerBtn.on( 'click', function () {
	// 		menu.fadeToggle( 150 );
	// 	} );
	// }

	// Click on menu item with children.
	let menuItemHasChildren = $( 'header .menu-item-has-children > a' );
	if ( menuItemHasChildren.length ) {
		menuItemHasChildren.on( 'click', function ( e ) {
			e.preventDefault();

			let subMenus = $( 'header' ).find( 'ul.sub-menu' ),
				subMenu = $( this ).next( 'ul.sub-menu' );

			if ( subMenus.length ) {
				if ( !subMenu.is( ':visible' ) ) {
					subMenus.slideUp( 150 );
				}

				subMenu.slideToggle( 150 );
			}
		} );
	}

	// Click on footer menu item with children.
	// let footerMenuItemHasChildren = $( 'footer .menu-item-has-children > a' );
	// if ( footerMenuItemHasChildren.length && $( window ).width() < 576 ) {
	// 	footerMenuItemHasChildren.on( 'click', function ( e ) {
	// 		e.preventDefault();
	//
	// 		let subMenus = $( 'footer' ).find( 'ul.sub-menu' ),
	// 			subMenu = $( this ).next( 'ul.sub-menu' );
	//
	// 		if ( subMenus.length ) {
	// 			if ( !subMenu.is( ':visible' ) ) {
	// 				subMenus.slideUp( 150 );
	// 			}
	//
	// 			subMenu.slideToggle( 150 );
	// 		}
	// 	} );
	// }
})( jQuery );