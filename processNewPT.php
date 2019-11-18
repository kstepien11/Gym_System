<?php
// provides functionality used to create new personal trainer
require 'database.php';
require 'userSession.php';






// recover the form data
$firstname = trim($_POST['firstname']);
$lastname = trim($_POST['lastname']);
$email = trim($_POST['email']);
$number = trim($_POST['number']);
$address = trim($_POST['address']);
$city = trim($_POST['city']);
$zip = trim($_POST['zip']);
$pw = trim($_POST['pw']);
$class = $_POST['class'];

if (!connectToDb('phouse_db')) {
	$_SESSION['errorMsg'] = "Sorry, we could not connect to the database.";
	header('location:index.php');
	exit();
}

// sanitize the strings 
$firstname = sanitizeString($firstname);
$lastname = sanitizeString($lastname);
$email = sanitizeString($email);
$number = sanitizeString($number);
$address = sanitizeString($address);
$city = sanitizeString($city);
$zip = sanitizeString($zip);
$pw = sanitizeString($pw);
$pw = password_hash($pw, PASSWORD_BCRYPT);

// add the new user details to the database
$sqlQuery = "INSERT INTO employee (first_name, last_name, email,phone_number, password, emp_class_id) VALUES ('$firstname', '$lastname','$email','$number','$pw','$class')";
$sqlQueryAddress = "INSERT INTO addresspt (address, city, zip_code) VALUES ('$address', '$city','$zip')";
$result = $dbConnection->query($sqlQuery);
$result2 = $dbConnection->query($sqlQueryAddress);

if (!$result) {
	$_SESSION['errorMsg'] = "There was a problem with the database: " . $dbConnection->error;
	closeConnection();
	header('location:managePT.php');
	exit();
}
closeConnection();
	header('location:managePT.php');

?>