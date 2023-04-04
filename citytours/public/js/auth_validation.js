function emailCheck(email, errorInfo) {
	var validEmail = /^[A-Za-z0-9_!#$%&'*+\/=?`{|}~^.-]+@[A-Za-z0-9.-]+$/gm;
	if(!validEmail.test(email.val())) {
		errorInfo.removeClass().addClass('weakpass').html("Email is invalid");
		return false;
	} else {
		errorInfo.removeClass().addClass('clearfix').html('');
		return true;
	}
}

function passwordStrengthCheck(password1, errorInfo) {
	//Must contain 5 characters or more
	var WeakPass = /(?=.{5,}).*/; 
	//Must contain at least one upper case letter, one lower case letter and one digit.
	var StrongPass = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])\S{5,}$/; 
	//Must contain at least one upper case letter, one lower case letter and one digit.
	var VryStrongPass = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])(?=\S*?[^\w\*])\S{5,}$/; 
	
	if(VryStrongPass.test(password1.val())) {
		errorInfo.removeClass().addClass('vrystrongpass').html("Very Strong! (Awesome, please don't forget your pass now!)");
		return true;
	}
	else if(StrongPass.test(password1.val())) {
		errorInfo.removeClass().addClass('strongpass').html("Strong! (Enter special chars to make even stronger");
		return true;
	}
	else if(WeakPass.test(password1.val())) {
		errorInfo.removeClass().addClass('goodpass').html("Good! (Enter uppercase letter to make strong)");
		return true;
	}
	else {
		errorInfo.removeClass().addClass('weakpass').html("Very Weak! (Must be 5 or more chars)");
		return false;
	}
}

function passwordMatchingCheck(password1, password2, errorInfo) {
	if(password1.val() !== password2.val()) {
		errorInfo.removeClass().addClass('weakpass').html("Passwords do not match!");
		return false;
	} else {
		errorInfo.removeClass().addClass('clearfix').html('');
		return true;
	}
}