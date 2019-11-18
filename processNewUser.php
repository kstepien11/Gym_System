<?php
// functionality needed to create new user
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
$class = $_POST['class'];

$firstname = sanitizeString($firstname);
$lastname = sanitizeString($lastname);
$email = sanitizeString($email);
$number = sanitizeString($number);
$address = sanitizeString($address);
$city = sanitizeString($city);
$zip = sanitizeString($zip);


// establish connection to with the database, if impossible return an error
if (!connectToDb('phouse_db')) {
	$_SESSION['errorMsg'] = "Sorry, we could not connect to the database.";
	header('location:index.php');
	exit();
}


//queries
$sqlQuery = "INSERT INTO customer (first_name, second_name, email,phone_number, class_id) VALUES ('$firstname', '$lastname','$email','$number', '$class')";
$sqlQueryAddress = "INSERT INTO address (address, city, zip_code) VALUES ('$address', '$city','$zip')";
$result = $dbConnection->query($sqlQuery);
$result2 = $dbConnection->query($sqlQueryAddress);


closeConnection();
	header('location:manageUser.php');

?>