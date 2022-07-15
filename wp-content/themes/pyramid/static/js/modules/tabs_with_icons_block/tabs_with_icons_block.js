jQuery(document).ready(function($) {
    $('.tab-menu li a').on('click', function(){
        var target = $(this).attr('data-rel');
        $('.tab-menu li a').removeClass('active');
        $(this).addClass('active');
       	var indexnumber = $("#"+target).attr('data-slick-index');
       	$('.tabs-slider').slick('slickGoTo', indexnumber);

        return false;
    });

	window.onload=function() {
	 	$('.tabs-slider').slick({
	    	dots: false,
	        arrows: true,
	        slidesToShow: 1,
	        slidesToScroll: 1,
	        prevArrow: '<div class="slick-prev"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 64 64" fill="#0EAFDB"><path d="M50.2201 3.99996C50.2199 3.61663 50.1095 3.24144 49.902 2.91907C49.6946 2.5967 49.3989 2.34072 49.0502 2.18162C48.7014 2.02252 48.3143 1.967 47.9349 2.02166C47.5555 2.07633 47.1998 2.23888 46.9101 2.48996L14.4701 30.49C14.2573 30.6776 14.0868 30.9085 13.9701 31.1671C13.8533 31.4257 13.793 31.7062 13.793 31.99C13.793 32.2737 13.8533 32.5542 13.9701 32.8128C14.0868 33.0715 14.2573 33.3023 14.4701 33.49L46.9101 61.49C47.1985 61.74 47.5523 61.9022 47.93 61.9576C48.3076 62.013 48.6931 61.9592 49.0412 61.8025C49.3892 61.6459 49.6851 61.3929 49.894 61.0735C50.1029 60.7541 50.2161 60.3816 50.2201 60V3.99996Z"/></svg></div>',
	        nextArrow: '<div class="slick-next"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 64 64" fill="#0EAFDB"><path d="M49.53 30.49L17.09 2.48996C16.8004 2.23888 16.4447 2.07633 16.0652 2.02166C15.6858 1.967 15.2987 2.02252 14.9499 2.18162C14.6012 2.34072 14.3055 2.5967 14.0981 2.91907C13.8907 3.24144 13.7803 3.61663 13.78 3.99996V60C13.7803 60.3833 13.8907 60.7585 14.0981 61.0809C14.3055 61.4032 14.6012 61.6592 14.9499 61.8183C15.2987 61.9774 15.6858 62.0329 16.0652 61.9783C16.4447 61.9236 16.8004 61.761 17.09 61.51L49.53 33.51C49.7462 33.3222 49.9195 33.0903 50.0383 32.8298C50.1571 32.5692 50.2186 32.2863 50.2186 32C50.2186 31.7137 50.1571 31.4307 50.0383 31.1702C49.9195 30.9097 49.7462 30.6777 49.53 30.49V30.49Z"></path></svg></div>',
	        responsive: [{
	        breakpoint: 768,
	        settings: {
	            slidesToShow: 1 }
	    	}]
	  	});
	  	$('.slick-prev').click(function() {
		  	$('.tab-wrap').removeClass('active');
		  	var currentid = $('.slick-current').attr('id');
		  	$('.'+currentid).addClass('active');
			return false;
	  	});
	  	$('.slick-next').click(function() {
		  	$('.tab-wrap').removeClass('active');
		  	var currentid = $('.slick-current').attr('id');
		  	$('.'+currentid).addClass('active');
			return false;
	  	});
	};
});