<?php
/* 
	Process a sign in request, checking a user's password.
*/
ini_set('session.use_strict_mode', 1);
session_start();

require 'database.php';

// if there is an existing session user, remove the user with the type
if (isset($_SESSION['userName'])) {
	unset($_SESSION['userName']);
	unset($_SESSION['userType']);
	
}

// unset any previous error message
unset($_SESSION['errorMsg']);

// check the form contains all the post data
if (!(isset($_POST['userName']) &&
	  isset($_POST['pw']))) {
	header('location:index.php');
	exit();
}

// recover the form data
$userName = trim($_POST['userName']);
$password = trim($_POST['pw']);

/*
// validate the username
if (!preg_match('/^[A-Z][A-Za-z]{1,29}$/', $userName)) {
	$_SESSION['errorMsg'] = "Unexpectedly illegal username!";
	header('location:index.php');
	exit();
}
*/
// connect to the database
if (!connectToDb('phouse_db')) {
	$_SESSION['errorMsg'] = "Sorry, we could not connect to the database.";
	header('location:index.php');
	exit();
}

// after this point we have an open DB connection

// check 
$userName = sanitizeString($userName);
$sqlQuery = "SELECT password FROM employee WHERE email='$userName'";
$sqlQueryType = "SELECT type FROM employee WHERE email='$userName'";
$result = $dbConnection->query($sqlQuery);
if ($result->num_rows != 1) {
	closeConnection();
	if ($result->num_rows == 0) {
		$_SESSION['errorMsg'] = "User name not recognized";
	}
	else {
		$_SESSION['errorMsg'] = "Sorry - unexpected problem with the database";
	}
	header('location:index.php');
	exit();
}

// get the expected answer from the db
$row = $result->fetch_assoc();
$pwHash = $row['password'];

// getting the usertype from the database 
$result2 = $dbConnection->query($sqlQueryType);
$row2 = $result2->fetch_assoc();
$userType = $row2['type'];
closeConnection();

// check the supplied answer is correct
if (!password_verify($password, $pwHash)) {
	$_SESSION['errorMsg'] = "Incorrect password! Please try again...";
}
// else set the userName and usertype globals 
else {
	$_SESSION['userName'] = $userName;
	$_SESSION['userType'] = $userType;	
	unset($_SESSION['signInErr']);
}

// everything worked, update the session info

header('Location:index.php');
?>