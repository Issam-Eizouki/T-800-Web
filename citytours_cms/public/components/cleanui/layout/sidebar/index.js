/////////////////////////////////////////////////////////////////////////////////////////
// "cui-menu-right" module scripts
;(function($) {
  'use strict'
  $(function() {
	/////////////////////////////////////////////////////////////////////////////////////////
	// hide non top menu related settings
	if ($('.cui__menuTop').length) {
	  $('.hideIfMenuTop').css({
		pointerEvents: 'none',
		opacity: 0.4,
	  })
	}

	/////////////////////////////////////////////////////////////////////////////////////////
	// toggle
	$('.cui__sidebar__actionToggle').on('click', function() {
	  $('body').toggleClass('cui__sidebar--toggled')
	})

	/////////////////////////////////////////////////////////////////////////////////////////
	// toggle theme
	function setCookie(name, value) {
		var d = new Date();
		d.setTime(d.getTime() + (30*24*60*60*1000));
		var expires = "expires=" + d.toUTCString();
		document.cookie = name + "=" + value + ";" + expires + ";path=/";
	}

	$('.cui__actionToggleTheme').on('click', function() {
		var theme = document.querySelector('html').getAttribute('data-kit-theme')
		if (theme === 'dark') {
			document.querySelector('html').setAttribute('data-kit-theme', 'default')
			$('body').removeClass(
				'kit__dark cui__menuLeft--gray cui__menuTop--gray cui__menuLeft--dark cui__menuTop--dark'
			)
			$('#span__actionToggleTheme').text('Dark Mode');
			setCookie('theme', 'default');
		}
		if (theme === 'default') {
			document.querySelector('html').setAttribute('data-kit-theme', 'dark')
			$('body').removeClass(
				'cui__menuLeft--gray cui__menuTop--gray cui__menuLeft--dark cui__menuTop--dark'
			)
			$('body').addClass('cui__menuLeft--dark cui__menuTop--dark');
			$('#span__actionToggleTheme').text('Light Mode');
			setCookie('theme', 'dark');
		}
	})
	
	/////////////////////////////////////////////////////////////////////////////////////////
	// currency
	$('.cui__actionCurrency').on('click', function() {
		var currency = $(this).attr('currency');
		setCookie('currency', currency);
		location.reload();
	})
	
	/////////////////////////////////////////////////////////////////////////////////////////
	// switch
	$('.cui__sidebar__switch input').on('change', function() {
	  var el = $(this)
	  var checked = el.is(':checked')
	  var to = el.attr('to')
	  var setting = el.attr('setting')
	  if (checked) {
		$(to).addClass(setting)
	  } else {
		$(to).removeClass(setting)
	  }
	})

	$('.cui__sidebar__switch input').each(function() {
	  var el = $(this)
	  var to = el.attr('to')
	  var setting = el.attr('setting')
	  if ($(to).hasClass(setting)) {
		el.attr('checked', true)
	  }
	})

  })
})(jQuery)
