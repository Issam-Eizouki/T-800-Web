$(document).ready(function() {
	var email		= $('#register-dialog #email'); //id of first password field
	var password1	= $('#register-dialog #password1'); //id of first password field
	var password2	= $('#register-dialog #password2'); //id of second password field
	var errorInfo 	= $('#register-dialog #errorInfo'); //id of indicator element
	
	$(email).on('keyup', function() {
		emailCheck(email, errorInfo);
	});
	
	$(password1).on('keyup', function() {
		passwordStrengthCheck(password1, errorInfo);
	});
	$(password2).on('keyup', function() {
		if (passwordStrengthCheck(password1, errorInfo)) {
			passwordMatchingCheck(password1, password2, errorInfo);
		}
	});
	
	$('#formRegister').submit(function() {
		if (!emailCheck(email, errorInfo)) {
			return false;
		}
		
		if (!passwordStrengthCheck(password1, errorInfo)) {
			return false;
		} else {
			if (!passwordMatchingCheck(password1, password2, errorInfo)) {
				return false;
			}
		}
	});
});
