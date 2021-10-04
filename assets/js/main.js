(function ($) {
	"use strict";

	/*-------------------------------------------
    preloader active
    --------------------------------------------- */
	jQuery(window).load(function () {
		jQuery(".preloader").fadeOut("slow");
	});
	$('[data-background]').each(function() {
		$(this).css('background-image', 'url('+ $(this).attr('data-background') + ')');
	});
	/*-------------------------------------------
    Sticky Header
    --------------------------------------------- */
	$(window).on("scroll", function () {
		if ($(window).scrollTop() > 80) {
			$("#sticky").addClass("stick");
		} else {
			$("#sticky").removeClass("stick");
		}
	});

	jQuery(document).ready(function () {
		/*---------------------------------
        offcanvase menu active
        -----------------------------------*/
		jQuery(".menu-bar span").on("click", function () {
			jQuery('.mobile-menu').addClass('open-menu');
			jQuery('.menu-overlay').addClass('open')
		});

		jQuery('.menu-overlay').on('click', function () {
			jQuery('.mobile-menu').removeClass('open-menu')
			jQuery('.menu-overlay').removeClass('open')
		});
		/* Sub Menu Toggle*/
		if($('.mobile-menu li.menu-item-has-children ul').length){
			$('.mobile-menu li.menu-item-has-children').append('<div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>');
			$('.mobile-menu li.menu-item-has-children .dropdown-btn').on('click', function() {
				$(this).prev('ul').slideToggle(500);
			});
		}
	});

})(jQuery);
