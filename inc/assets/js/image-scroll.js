( function( $ ) {
	var WidgetCafeImageScrollHandler = function( $scope, $ ) {
		var $size = $scope.find( '.cafe-image-scroll-container' ).data( 'size' ),
			$direction = $scope.find( '.cafe-image-scroll-container' ).data( 'direction' ),
			$speed = $scope.find( '.cafe-image-scroll-container' ).data( 'speed' ),
			$state = $scope.find( '.cafe-image-scroll-container' ).data( 'state' ),
			$boxWidth = $scope.find( '.cafe-image-scroll-container' ).width(),
			$imgHeight = $scope.find( '.cafe-image-scroll-container img' ).height();
			
			$scope.find( '.cafe-image-scroll-container .cafe-image-scroll-image img' ).css( 'transition', 'transform '+ $speed +'s ease 0s' );
			
			if ($state == 'normal') {
			
				if ($direction == 'horizontal') {
					$positionHorizontal = $boxWidth - $size + 'px';
					$scope.find( '.cafe-image-scroll-container' ).mouseover(function() {
						$( this ).find( '.cafe-image-scroll-image img' ).css( 'transform', 'translateX(' + $positionHorizontal + ')' );
					}).mouseout(function() {
						$( this ).find( '.cafe-image-scroll-image img' ).css( 'transform', '' );
					});
				} else {
					$positionVertical = - $imgHeight + $size + 'px';
					$scope.find( '.cafe-image-scroll-container' ).mouseover(function() {
						$( this ).find( '.cafe-image-scroll-image img' ).css( 'transform', 'translateY(' + $positionVertical + ')' );
					}).mouseout(function() {
						$( this ).find( '.cafe-image-scroll-image img' ).css( 'transform', '' );
					});
				}
				
			} else {
				
				if ($direction == 'horizontal') {
					$positionHorizontal = $boxWidth - $size + 'px';
					$scope.find('.cafe-image-scroll-container .cafe-image-scroll-image img').css( 'transform', 'translateX(' + $positionHorizontal + ')' );
				} else {
					$positionVertical = - $imgHeight + $size + 'px';
					$scope.find('.cafe-image-scroll-container .cafe-image-scroll-image img').css( 'transform', 'translateY(' + $positionVertical + ')' )
				}
				
			}
		
	};
	
	// Make sure we run this code under Elementor
	$( window ).on( 'elementor/frontend/init', function() {
		elementorFrontend.hooks.addAction( 'frontend/element_ready/cafe-image-scroll.default', WidgetCafeImageScrollHandler );
	} );
} )( jQuery );