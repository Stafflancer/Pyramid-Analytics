jQuery( document ).ready( function () {
	// jQuery( '.regular' ).slick( {
	// 	dots: false,
	// 	slidesToShow: 3,
	// 	slidesToScroll: 1,
	// 	responsive: [
	// 		{
	// 			breakpoint: 991,
	// 			settings: {
	// 				arrows: false,
	// 				centerMode: false,
	// 				slidesToShow: 2
	// 			}
	// 		},
	// 		{
	// 			breakpoint: 600,
	// 			settings: {
	// 				arrows: false,
	// 				centerMode: false,
	// 				slidesToShow: 1
	// 			}
	// 		}
	// 	]
	// } );

	jQuery( '.sf-field-submit' ).html( '<button type="submit" name="_sf_submit"><img src="/wp-content/uploads/2022/02/search.png"/></button>' );
	jQuery( '.sf-field-category ul li:nth-child(1)' ).remove();
	jQuery( '.sf-field-category ul li:nth-child(1)' ).addClass( 'sf-option-active' );
} );