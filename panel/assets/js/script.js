(function($) {
	$(document).ready(function() {
		$('.cresta-addons-for-elementor-panel .switch.disabled').click(function() {
			$('.update-to-pro-version, .update-to-pro-version-box').fadeIn(400);
		});
		$('.update-to-pro-version-box').click(function() {
			$('.update-to-pro-version, .update-to-pro-version-box').fadeOut(400);
		});
	});
})(jQuery);