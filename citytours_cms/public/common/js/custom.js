$(function() {	
	var scrollLinkClick = function() {
		$(document).on('click', 'a[href^="#"]', function (event) {
			event.preventDefault();
			$('html, body').animate({
				scrollTop: $($.attr(this, 'href')).offset().top - 70
			}, 500, function() {});
		});

	};
	scrollLinkClick();
});

;(function($) {
	'use strict'
	
	$(function() {
		// Init input anti-phising code
		$('.input-gg2fa').mask('XXXXXX', {
			translation: {
				'X': { pattern: /[0-9]/, optional: true }
			},
			placeholder: '******',
		});
	})
})(jQuery)


// Plus and Minus amount of products
function parseAmount(str, type='') {
	if (!isNaN(str) && !isNaN(parseFloat(str))) {
		var i = parseInt(str);
		var t = 0;
		if (type == 'plus') {
			t = i + 1;
		} else {
			if (type == 'minus') {
				t = i - 1;
			} else {
				t = i;
			}
		}
		if (t > 50) return 50;
		if (t < 0) return 0;
		return t;
	}
	return 1;
}

// Set cookie
function setCookie(name, value) {
	var d = new Date();
	d.setTime(d.getTime() + (1*24*60*60*1000));
	var expires = "expires=" + d.toUTCString();
	document.cookie = name + "=" + value + ";" + expires + ";path=/";
}
