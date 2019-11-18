<?php
// Collecting the data from the Personal Trainer input form and updating the database

require 'database.php';
require 'userSession.php';

 // if the submit button was pressed trim the data, validate and update the records in the database
if (isset($_POST['submit']))
{
	// recover the form data and trim the strings
$firstname = trim($_POST['firstname']);
$lastname = trim($_POST['lastname']);
$email = trim($_POST['email']);
$number = trim($_POST['number']);
$address = trim($_POST['address']);
$city = trim($_POST['city']);
$zip = trim($_POST['zip']);
$id = $_POST['id'];
	
}	

// update queries
$sqlQuery = "UPDATE employee SET first_name = '$firstname',last_name='$lastname',phone_number='$number',email= '$email'
				WHERE id = '$id'";	 
$sqlQueryAdd = "UPDATE addresspt SET address ='$address', city= '$city', zip_code = '$zip' WHERE addresspt.id= '$id'";		

// display the error in case the connection couldn't be achieved 
	if (!connectToDb('phouse_db')) {
	$_SESSION['errorMsg'] = "Sorry, we could not connect to the database.";
	header('location:index.php');
	exit();
}
//at this point the connection to databse is live
	global $dbConnection;
	$dbConnection->query($sqlQuery);
	$dbConnection->query($sqlQueryAdd);
	
// closing connection
	closeConnection();
	header('location:managePT.php');
		    
?>