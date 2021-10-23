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
	jQuery("select").niceSelect();
	/*-------------------------------------------
    js scrollup
    --------------------------------------------- */
	$.scrollUp({
		scrollText: '<i class="fa fa-angle-up"></i>',
		easingType: "linear",
		scrollSpeed: 900,
		animation: "fade",
	});
	/*----------------------------
    Cart Plus Minus Button
------------------------------ */
	var CartPlusMinus = jQuery('.cart-plus-minus');
	CartPlusMinus.prepend('<div class="dec qtybutton"></div>');
	CartPlusMinus.append('<div class="inc qtybutton"></div>');
	jQuery(".qtybutton").on("click", function() {
		var $button = $(this);
		var oldValue = $button.parent().find("input").val();
		if ($button.text() === "+") {
			var newVal = parseFloat(oldValue) + 1;
		} else {
			// Don't allow decrementing below zero
			if (oldValue > 1) {
				var newVal = parseFloat(oldValue) - 1;
			} else {
				newVal = 1;
			}
		}
		$button.parent().find("input").val(newVal);
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

	/*-------------------------------------------
   product-gallery-slider active
   --------------------------------------------- */
	jQuery('.product-gallery-slider').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: false,
		arrows: false,
		fade: true,
		asNavFor: '.product-thumb-silide'
	});
	jQuery('.product-thumb-silide').slick({
		infinite: true,
		slidesToShow: 4,
		slidesToScroll: 1,
		autoplay: false,
		asNavFor: '.product-gallery-slider',
		dots: false,
		arrows: false,
		centerMode: false,
		focusOnSelect: true
	});

})(jQuery);
