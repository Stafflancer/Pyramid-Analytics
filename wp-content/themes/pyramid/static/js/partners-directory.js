jQuery(document).ready(function ($) {
	jQuery('.partner-description-inner-block').click(function (e) {
		if (jQuery(e.target).hasClass('button-cross') || jQuery(e.target).hasClass('button-image')) {
			console.log('CLOSED');
		} else {
			console.log('NOT CLOSED');
			e.stopPropagation();
		}
	});

	jQuery(document).on('click', '.partner-card', function () {
		let partner = $(this).data('partner');

		$('#' + partner).show();
		$('.page-template-partner-directory').addClass('remove-popup-scroll');
	});

	jQuery('.partner-description').click(function (e) {
		$('.partner-description').hide();
		$('.page-template-partner-directory').removeClass('remove-popup-scroll');
	});

	jQuery(document).on('click', '.button-cross', function () {
		$('.partner-description').hide();
		$('.page-template-partner-directory').removeClass('remove-popup-scroll');
	});
});