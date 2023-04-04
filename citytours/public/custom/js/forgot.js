$(document).ready(function() {
	var forgotEmail		= $('#femail'); //email
	var forgotErrorInfo = $("#ferrorInfo"); //id of indicator element
	
	$(forgotEmail).on('keyup', function() {
		emailCheck(forgotEmail, forgotErrorInfo);
	});
	
	$('#forgotForm').submit(function() {
		if (!emailCheck(forgotEmail, forgotErrorInfo)) {
			return false;
		}
	});
});
