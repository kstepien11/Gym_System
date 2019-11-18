/*
	A JS function for validating the username in the signin form.	
	Author: Andreas Schoter
*/
function validateInputForm(formName)
{
	"use strict";

	// a username begins with an uppercase letter and consists of letters
	var nameRegex = /(-?([A-Z].\s)?([A-Z][a-z]+)\s?)+([A-Z]'([A-Z][a-z]+))?/;
	
	var emailRegex = /^[a-zA-Z0-9.!#$%&*+/=?^_{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
	
	var phoneRegex = /^\s*(?:\+?(\d{1,3}))?([-. (]*(\d{3})[-. )]*)?((\d{3})[-. ]*(\d{2,4})(?:[-.x ]*(\d+))?)\s*$/;
	var postcodeRegex = /\b(GIR ?0AA|SAN ?TA1|(?:[A-PR-UWYZ](?:\d{0,2}|[A-HK-Y]\d|[A-HK-Y]\d\d|\d[A-HJKSTUW]|[A-HK-Y]\d[ABEHMNPRV-Y])) ?\d[ABD-HJLNP-UW-Z]{2})\b/; 

	// get the form from the DOM
	var form = document.forms[formName];
	
	// get the form data and trim leading & trailing whitespace
	var name = form["firstname"].value.trim();
	var lastname = form["lastname"].value.trim();
	var email = form["email"].value.trim();
	var number = form["number"].value.trim();
	var postcode = form["zip"].value.trim();
	var city = form["city"].value.trim();

	
	// test if the first name is valid
	if (!nameRegex.test(name)) {
		alert("Name must begin with an uppercase letter and contain only letters");
		form["firstname"].focus();
		return false;
	}
// test if the last name is valid
	if (!nameRegex.test(lastname)) {
		alert("Last name must begin with an uppercase letter and contain only letters");
		form["lastname"].focus();
		return false;
	}

// test if the email is valid
	if (!emailRegex.test(email)) {
		alert("Please enter a valid email address");
		form["email"].focus();
		return false;
	}
	
// test if the phone number is valid
	if (!phoneRegex.test(number)) {
		alert("Please use numbers only");
		form["number"].focus();
		return false;
	}

	// test if the postcode is valid
	if (!postcodeRegex.test(postcode)) {
		alert("Please enter a valid UK postcode");
		form["zip"].focus();
		return false;
	}
// test if the postcode is valid
	if (!nameRegex.test(city)) {
		alert("Please enter a valid city name");
		form["city"].focus();
		return false;
	}
	
	// everything was ok
	return true;
}
