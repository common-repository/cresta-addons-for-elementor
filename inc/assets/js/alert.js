( function( $ ) {
	var WidgetCafeAlertMessageHandler = function( $scope, $ ) {
		$scope.find( '.cafe-alert-close-button' ).click( function() {

	        $( this ).parents( 'div[class^="cafe-alert"]' ).fadeOut( 500 );

	    } );
	};
	
	// Make sure we run this code under Elementor
	$( window ).on( 'elementor/frontend/init', function() {
		elementorFrontend.hooks.addAction( 'frontend/element_ready/cafe-alert-message.default', WidgetCafeAlertMessageHandler );
	} );
} )( jQuery );