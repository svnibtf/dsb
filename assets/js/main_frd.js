function runToggleSideBars_frd() {
	var configAnimation, extendOptions, globalOptions = {
		duration: 10,
		easing: "ease",
		mobileHA: true,
		progress: function() {
			activeAnimation = true;
		}
	};
	$(".sb-toggle-left_frd").on("click", function(e) {
		if (activeAnimation == false) {
			if ($windowWidth > 991) {
				$body.removeClass("sidebar-mobile-open");
				if ($body.hasClass("sidebar-close")) {
					if ($body.hasClass("layout-boxed") || $body.hasClass("isMobile")) {
						$body.removeClass("sidebar-close");
						closedbar.removeClass("open");
						$(window).trigger('resize');
					} else {
						closedbar.removeClass("open").hide();
						closedbar.css({
							//translateZ: 0,
							left: -closedbar.width()
						});

						extendOptions = {
							complete: function() {
								$body.removeClass("sidebar-close");
								$(".main-container, #pageslide-left, #footer .footer-inner, #horizontal-menu .container, .closedbar").attr('style', '');
								$(window).trigger('resize');
								activeAnimation = false;
							}
						};
						configAnimation = $.extend({}, extendOptions, globalOptions);
						$(".main-container, footer .footer-inner, #horizontal-menu .container").velocity({
							//translateZ: 0,
							marginLeft: sidebarWidth
						}, configAnimation);

					}

				} else {
					if ($body.hasClass("layout-boxed") || $body.hasClass("isMobile")) {
						$body.addClass("sidebar-close");
						closedbar.addClass("open");
						$(window).trigger('resize');
					} else {
						sideLeft.css({
							zIndex: 0

						});
						extendOptions = {
							complete: function() {
								closedbar.show().velocity({
									//translateZ: 0,
									left: 0
								}, 100, 'ease', function() {
									activeAnimation = false;
									closedbar.addClass("open");
									$body.addClass("sidebar-close");
									$(".main-container, footer .footer-inner, #horizontal-menu .container, .closedbar").attr('style', '');
									$(window).trigger('resize');
								});
							}
						};
						configAnimation = $.extend({}, extendOptions, globalOptions);
						$(".main-container, footer .footer-inner, #horizontal-menu .container").velocity({
							//translateZ: 0,
							marginLeft: 0
						}, configAnimation);
					}
				}

			} else {
				if ($body.hasClass("sidebar-mobile-open")) {
					if (supportTransition) {
						extendOptions = {
							complete: function() {
								inner.attr('style', '').removeClass("inner-transform");
								// remove inner-transform (hardware acceleration) for restore z-index
								$body.removeClass("sidebar-mobile-open");
								activeAnimation = false;
							}
						};
						configAnimation = $.extend({}, extendOptions, globalOptions);

						inner.velocity({
							translateZ: 0,
							translateX: [-sidebarWidth, 0]
						}, configAnimation);
					} else {
						$body.removeClass("sidebar-mobile-open");
					}
				} else {
					if (supportTransition) {
						inner.addClass("inner-transform");
						// add inner-transform for hardware acceleration
						extendOptions = {
							complete: function() {
								inner.attr('style', '');
								$body.addClass("sidebar-mobile-open");
								activeAnimation = false;
							}
						};
						configAnimation = $.extend({}, extendOptions, globalOptions);
						inner.velocity({
							translateZ: 0,
							translateX: [sidebarWidth, 0]
						}, configAnimation);
					} else {
						$body.addClass("sidebar-mobile-open");
					}

				}
			}
		}
		e.preventDefault();
	});
};// JavaScript Document