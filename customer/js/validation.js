function signupValidation(){
	var valid = false;
	var email = document.forms["registerForm"]["email"].value;
	var confirmEmail = document.forms["registerForm"]["confirmEmail"].value;
	var password = document.forms["registerForm"]["password"].value;
	var confirmPassword = document.forms["registerForm"]["confirmPassword"].value;
	
	//Check if password and confirm password fields match
	if(confirmPassword == password){
		valid = true;
	} else {
		document.forms["registerForm"]["confirmPassword"].setCustomValidity('Please make sure the confirmation password matches the original');
		valid = false;
	}
	
	//Check if email and confirm email fields match
	if(confirmEmail == email){
		valid = true;
	} else {
		document.forms["registerForm"]["confirmEmail"].setCustomValidity('Please make sure the confirmation email matches the original');
		valid = false;
	}
	
	/* /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,8}$/: Password matching expression. Password must be at least 4 
	characters, no more than 8 characters, and must include at least 
	one upper case letter, one lower case letter, and one numeric digit.*/
	
	return valid;
}