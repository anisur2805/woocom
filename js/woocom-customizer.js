;(function($){
	wp.customize('woocom_hero_title1', function(oldVal){
		oldVal.bind(function( newVal) {
			$('h1.animated').html(newVal);
		});
	});
	wp.customize('woocom_hero_slider_bg_color', function(oldVal){
		oldVal.bind(function( newVal) {
			$('.slider-area .swiper-slide').css('background',newVal);
		});
	});
})(jQuery);