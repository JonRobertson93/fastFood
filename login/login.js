// CHANGE LOGIN INFO TO REGISTER INFO
const registerButton = document.getElementById('registerButton');
// Show hidden registration content
let username = document.getElementById('username');
let confirmPass = document.getElementById('confirmPassword');
let register = document.getElementById('register');
let password = document.getElementById("password");

// This un-named function is getting too big. Split into several functions soon
registerButton.addEventListener('click', showRegistration);
password.addEventListener("input", validatePassword);
confirmPass.addEventListener("input", validateConfirmPass);

function showRegistration() {
	// Change text
	let signInText = document.querySelector('.loginWelcome');
	signInText.innerText = "Please create your account below";

	// Hide original login content
	const login = document.getElementById('loginButton');
	const notMember = document.getElementById('notMemberHeading');
	registerButton.classList.add('hidden');
	login.classList.add('hidden');
	notMember.classList.add('hidden');

	// Show new inputs to register
	username.classList.remove('hidden');
	confirmPass.classList.remove('hidden');
	register.classList.remove('hidden');

	editInputs(); //function
}


function editInputs() {
	document.getElementById('password').placeholder = "Password (8 characters and 1 number minimum)";
	password.required=true;
	confirmPass.required=true;
	confirmPass.pattern = password.pattern;
	username.required=true;
}


	// Error messages based on inputs
function validatePassword() {
	let passVal = password.value;
	if (!hasNumber(password.value)) {
		password.setCustomValidity("You did not enter a number");
	}
	else if (!hasUpper(password.value)) {
		password.setCustomValidity("You did not enter an uppercase letter");
	}
	else if (passVal.length < 8) {
		password.setCustomValidity("Uh-oh! Password must be 8 characters or longer");
	}
	else if (!hasLower(password.value)) {
		password.setCustomValidity("You did not enter an lowercase letter");
	}
	else {
		password.setCustomValidity("");
	}
}

function validateConfirmPass() {
	if (password.value != confirmPass.value) {
    	confirmPass.setCustomValidity("Passwords Don't Match");
  	} else {
    	confirmPass.setCustomValidity('');
  	}
}


function hasNumber(myString) {
  	return /\d/.test(myString);
}

function hasUpper(myString) {
    let count = 0;
    for (let i = 0; i < myString.length; i++) {
    	// if character strictly equals uppercase character AND is a character from A-Z
    	if (myString[i] == myString[i].toUpperCase() && myString[i].match(/[A-Z]/i)) {
    		count++;
    	}
    }	// end FOR
    if (count > 0) { 
    	return true; 
    } else { 
    	return false; 
    }
}

function hasLower(myString) {
    let count = 0;
    for (let i = 0; i < myString.length; i++) {
    	// if character strictly equals lowercase character AND is a character from a-z
    	if (myString[i] == myString[i].toLowerCase() && myString[i].match(/[a-z]/i)) {
    		count++;
    	}
    }	// end FOR
    if (count > 0) { 
    	return true; 
    } else { 
    	return false; 
    }
}