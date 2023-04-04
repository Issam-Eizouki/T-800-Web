$(document).ready(function() {
	var loginEmail		= $("#sign-in-dialog #lemail"); //id of first password field
	var loginErrorInfo = $("#sign-in-dialog #lerrorInfo"); //id of indicator element
	
	$(loginEmail).on('keyup', function() {
		emailCheck(loginEmail, loginErrorInfo);
	});
	
	$('#login-form').submit(function() {
		if (!emailCheck(loginEmail, loginErrorInfo)) {
			return false;
		}
	});
});
