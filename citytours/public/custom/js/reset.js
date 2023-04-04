$(document).ready(function() {
	var password1	= $('#reset-form #rpassword1'); //id of first password field
	var password2	= $('#reset-form #rpassword2'); //id of second password field
	var rerrorInfo 	= $('#reset-form #rerrorInfo'); //id of indicator element
	
	$(password1).on('keyup', function() {
		passwordStrengthCheck(password1, rerrorInfo);
	});
	$(password2).on('keyup', function() {
		if (passwordStrengthCheck(password1, rerrorInfo)) {
			passwordMatchingCheck(password1, password2, rerrorInfo);
		}
	});
	
	$('#reset-form').submit(function() {
		if (!passwordStrengthCheck(password1, rerrorInfo)) {
			return false;
		} else {
			if (!passwordMatchingCheck(password1, password2, rerrorInfo)) {
				return false;
			}
		}
	});
});
