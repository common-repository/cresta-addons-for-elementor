( function( $ ) {
	var WidgetcafeNewsTickerHandler = function( $scope, $ ) {
	    if ( $( 'body' ).hasClass( 'no-carousel' ) ) {
			return;
		}

		var $carousel = $scope.find( '.cafe-news-ticker-all-posts' ).eq(0);

		if ( $carousel.length > 0 ) {

			var $settings = $carousel.data( 'settings' );

			// If RTL
			var rtl = $('body').hasClass('rtl') ? true : false;
			
			$carousel.owlCarousel( {
				loop: true,
				items: 1,
				autoplay: $settings['autoplay'],
				autoplaySpeed: $settings['playspeed'],
				animateOut: $settings['animateOut'],
				animateIn: $settings['animateIn'],
				dots: false,
				nav: $settings['arrows'],
				navContainer: '.cafe-news-ticker-arrows.id_' + $settings['ticker_id'],
				navText: ['<div class="slick-prev id_' + $settings['ticker_id'] + ' owlArrow"><span class="fa fa-angle-left"></span></div>','<div class="slick-next id_' + $settings['ticker_id'] + ' owlArrow"><span class="fa fa-angle-right"></span></div>'],
				autoplayHoverPause: $settings['pause'],
				rtl: rtl
			} );

		}
	};
	
	// Make sure we run this code under Elementor
	$( window ).on( 'elementor/frontend/init', function() {
		elementorFrontend.hooks.addAction( 'frontend/element_ready/cafe-news-ticker.default', WidgetcafeNewsTickerHandler );
	} );
} )( jQuery );