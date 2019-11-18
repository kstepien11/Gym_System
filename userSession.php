<?php
/* Manage access to the site through a secure PHP session.
*/
ini_set('session.use_strict_mode', 1);
session_start();
global $userLoggedIn;
global $userName;
global $userType;

// determine if the session has a userName set or not
// if it has, then assign the session variables to equivalent 
// globals for easier access
if (isset($_SESSION['userName'])) {
	$userLoggedIn = true; // used to determine which menu to display
	$userName = $_SESSION['userName'];
}

// set the type of the user - admin or personal trainer in order to display the proper menu
if (isset($_SESSION['userType'])) {
	$userType = $_SESSION['userType'];
}


// if the current page is not the index page the userName variable must 
// have a non-empty value set for access to be allowed. If it doesn't then
// redirect the browser back to the home page
function redirectToIndex(){
global $userName;	
if (basename($_SERVER['PHP_SELF']) != 'index.php' ){
		// if there is not userName set, redirect to the index.php
		if ($userName == '') {
			header('Location:index.php');
			exit();
		}
	
	}
}


// restriction for personal trainers so they cannot access particular pages of the site
function adminRestriction(){
global $userType;	
	if (basename($_SERVER['PHP_SELF']) != 'index.php' ){
		// if usertype is different than admins, redirect to the index.php
		if ($userType != 1) {
			header('Location:index.php');
			exit();
		}
	
	}
}

?>