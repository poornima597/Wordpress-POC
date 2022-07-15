/* global caffScreenReaderText */
/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */
(function($) {
	// Masonry
	if ( typeof $.fn.masonry === 'function' ) { 
		//Masonry blocks
		$blocks = $('.infinite-grid');

		$blocks.imagesLoaded(function() {
			$blocks.masonry({
				itemSelector: '.grid-item',
				columnWidth: '.grid-item',
				// slow transitions
				transitionDuration: '1s'
			});

			// Fade blocks in after images are ready (prevents jumping and re-rendering)
			$('.grid-item').fadeIn();

			$blocks.find('.grid-item').animate({
				'opacity': 1
			});
		});

		$(function() {
			setTimeout(function() {
				$blocks.masonry();
			}, 2000);
		});

		$(window).on( 'resize',function() {
			$blocks.masonry();
		});
	}

	// When Jetpack Infinite scroll posts have loaded
	$(document.body).on('post-load', function() {
		$blocks.masonry('reloadItems');

		$blocks.imagesLoaded(function() {
			$blocks.masonry({
				itemSelector: '.grid-item',
				columnWidth: '.grid-item',
				// slow transitions
				transitionDuration: '1s',
			});

			// Fade blocks in after images are ready (prevents jumping and re-rendering)
			$('.grid-item').fadeIn();
			$blocks.find('.grid-item').animate({
				'opacity': 1
			});
		});

		$(document).ready(function() {
			setTimeout(function() {
				$blocks.masonry();
			}, 2000);
		});
	});

	// Add header video class after the video is loaded.
	$(document).on('wp-custom-header-video-loaded', function() {
		$('body').addClass('has-header-video');
	});

	/**
	 * Functionality for scroll to top button
	 */
	$(function() {
		$(window).on( 'scroll', function() {
			if ($(this).scrollTop() > 100) {
				$('#scrollup').fadeIn('slow');
				$('#scrollup').show();
			} else {
				$('#scrollup').fadeOut('slow');
				$("#scrollup").hide();
			}
		});

		$('#scrollup').on('click', function() {
			$('body, html').animate({
				scrollTop: 0
			}, 500);
			return false;
		});
	});

	// Fixed header.
	$(window).on('scroll', function() {
		if ($('.sticky-enabled').length && $(window).scrollTop() > $('.sticky-enabled').offset().top && !($('.sticky-enabled').hasClass('sticky-header'))) {
			$('.sticky-enabled').addClass('sticky-header');
		} else if (0 === $(window).scrollTop()) {
			$('.sticky-enabled').removeClass('sticky-header');
		}
	});

	var body, masthead, menuToggle, siteNavigation, searchNavigation, siteHeaderMenu, resizeTimer;

	function initMainNavigation(container) {
		// Add dropdown toggle that displays child menu items.
		var dropdownToggle = $('<button />', {
				'class': 'dropdown-toggle',
				'aria-expanded': false
			})
			.append(caffScreenReaderText.icon)
			.append($('<span />', {
				'class': 'screen-reader-text',
				text: caffScreenReaderText.expand
			}));

		container.find('.menu-item-has-children > a, .page_item_has_children > a').after(dropdownToggle);

		// Set the active submenu dropdown toggle button initial state.
		container.find('.current-menu-ancestor > button')
			.addClass('toggled-on')
			.attr('aria-expanded', 'true')
			.find('.screen-reader-text')
			.text(caffScreenReaderText.collapse);
		// Set the active submenu initial state.
		container.find('.current-menu-ancestor > .sub-menu').addClass('toggled-on');

		// Add menu items with submenus to aria-haspopup="true".
		container.find('.menu-item-has-children').attr('aria-haspopup', 'true');

		container.find('.dropdown-toggle').on( 'click', function(e) {
			var _this = $(this),
				screenReaderSpan = _this.find('.screen-reader-text');

			e.preventDefault();
			_this.toggleClass('toggled-on');
			_this.next('.children, .sub-menu').toggleClass('toggled-on');

			// jscs:disable
			_this.attr('aria-expanded', _this.attr('aria-expanded') === 'false' ? 'true' : 'false');
			// jscs:enable
			screenReaderSpan.text(screenReaderSpan.text() === caffScreenReaderText.expand ? caffScreenReaderText.collapse : caffScreenReaderText.expand);
		});
	}

	menuToggle = $('#primary-menu-toggle');
	siteHeaderMenu = $('#site-header-menu');
	siteNavigation = $('#site-primary-navigation');
	searchNavigation = $('#search-container');
	initMainNavigation(siteNavigation);

	// Enable menuToggle.
	(function() {

		// Return early if menuToggle is missing.
		if (!menuToggle.length) {
			return;
		}

		// Add an initial values for the attribute.
		menuToggle.add(siteNavigation).add(searchNavigation).attr('aria-expanded', 'false');

		menuToggle.on('click.caff', function() {
			$(this).add(siteHeaderMenu).toggleClass('toggled-on');

			// jscs:disable
			$(this).add(siteNavigation).add(searchNavigation).attr('aria-expanded', $(this).add(siteNavigation).add(searchNavigation).attr('aria-expanded') === 'false' ? 'true' : 'false');
			// jscs:enable
		});
	})();

	// Fix sub-menus for touch devices and better focus for hidden submenu items for accessibility.
	(function() {
		if (!siteNavigation.length || !siteNavigation.children().length) {
			return;
		}

		// Toggle `focus` class to allow submenu access on tablets.
		function toggleFocusClassTouchScreen() {
			if (window.innerWidth >= 910) {
				$(document.body).on('touchstart.caff', function(e) {
					if (!$(e.target).closest('.main-navigation li').length) {
						$('.main-navigation li').removeClass('focus');
					}
				});
				siteNavigation.find( '.menu-item-has-children > a, .page_item_has_children > a' ).on( 'touchstart.caff', function( e ) {
					var el = $( this ).parent( 'li' );

					if ( ! el.hasClass( 'focus' ) ) {
						e.preventDefault();
						el.toggleClass( 'focus' );
						el.siblings( '.focus' ).removeClass( 'focus' );
					}
				} );
			} else {
				siteNavigation.find('.menu-item-has-children > a').off('touchstart.caff');
			}
		}

		if ('ontouchstart' in window) {
			$(window).on('resize.caff', toggleFocusClassTouchScreen);
			toggleFocusClassTouchScreen();
		}

		siteNavigation.find('a').on('focus.caff blur.caff', function() {
			$(this).parents('.menu-item, .page_item').toggleClass('focus');
		});
	})();

	// Add the default ARIA attributes for the menu toggle and the navigations.
	function onResizeARIA() {
		if (window.innerWidth < 910) {
			if (menuToggle.hasClass('toggled-on')) {
				menuToggle.attr('aria-expanded', 'true');
			} else {
				menuToggle.attr('aria-expanded', 'false');
			}

			if (siteHeaderMenu.hasClass('toggled-on')) {
				siteNavigation.attr('aria-expanded', 'true');
				searchNavigation.attr('aria-expanded', 'true');
			} else {
				siteNavigation.attr('aria-expanded', 'false');
				searchNavigation.attr('aria-expanded', 'false');
			}

			menuToggle.attr('aria-controls', 'site-navigation social-navigation');
		} else {
			menuToggle.removeAttr('aria-expanded');
			siteNavigation.removeAttr('aria-expanded');
			searchNavigation.removeAttr('aria-expanded');
			menuToggle.removeAttr('aria-controls');
		}
	}

	//Search Toggle
	var jQueryheader_search = $('#search-toggle');
	jQueryheader_search.on( 'click', function() {

		$(this).toggleClass('toggled-on');

		var jQuerythis_el_search = $(this),
			jQueryform_search = jQuerythis_el_search.siblings('#search-container');

		if (jQueryform_search.hasClass('displaynone')) {
			jQueryform_search.removeClass('displaynone').addClass('displayblock').animate({
				opacity: 1
			}, 300);
		} else {
			jQueryform_search.removeClass('displayblock').addClass('displaynone').animate({
				opacity: 0
			}, 300);
		}

		return false;
	});

	$('.skillbar').each(function() {
		$(this).find('.skillbar-bar').animate({
			width: $(this).attr('data-percent')
		}, 6000);
	});

	$('.header-top-toggle').on( 'click', function() {
		$('#site-top-header-mobile-container').toggle("fast");
	});

	$(".section:odd").addClass("odd-section");
	$(".section:even").addClass("even-section");
	$(".portfolio-item:odd").addClass("odd-item");
	$(".portfolio-item:even").addClass("even-item");

	$(document).ready(function() {
		$(window).on('load.caff resize.caff', function() {
			if (window.innerWidth < 910) {
				$('#site-primary-navigation .primary-menu').on('focusout', function() {
					var $elem = $(this);

					// let the browser set focus on the newly clicked elem before check
					setTimeout(function() {
						if (!$elem.find(':focus').length) {
							$('#primary-menu-toggle').trigger('focus');
						}
					}, 0);
				});

				$('#site-top-header-mobile-container').on('focusout', function() {
					var $elem = $(this);

					// let the browser set focus on the newly clicked elem before check
					setTimeout(function() {
						if (!$elem.find(':focus').length) {
							$('#header-top-toggle').trigger('focus');
						}
					}, 0);
				});
			}
			
			$('#search-container').on('focusout', function() {
				var $elem = $(this);

				// let the browser set focus on the newly clicked elem before check
				setTimeout(function() {
					if (!$elem.find(':focus').length) {
						$('#search-toggle').trigger('focus');
					}
				}, 0);
			});
		});
	});

	//Light Box for videos section
	if ( typeof $.fn.tabs === 'function' ) { 
		$(".tabs").tabs();
	}
})(jQuery);
