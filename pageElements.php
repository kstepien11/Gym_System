<?php
/* The functions defined in this file are used to create various 
   structural elements in the pages.
   
*/

/* Constants defining the top level menu that will be highlighted
*/
const HOME = 0;

/*function printing the stylesheets to the pages*/
function writeCommonStyles()
{
?>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/menu.css" rel="stylesheet" type="text/css"/>
<link href="css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php	
}

/* Display the menu in a page.
*/
function displayMenu($section)
{
	
	global $userLoggedIn;
	global $userType;
	
	// menu for the admin
	if ($userLoggedIn && $userType == 1){
	// the top level menu items are stored as an array
	$menuItems = array('<a href="index.php" id="Home">Home</a>',	
					   '<a href="about.php" id="MenuItem2">About</a>',
					   '<li><a id="Dropdown">Management Centre</a>  
						<ul class="dropdown-content">
						<li><a href="managePT.php">Manage Personal Trainers</a></li>
						<li><a href="manageUser.php">Manage User Details</a></li>
						</ul></li>'
					   
					   );
	}
	
	// menu for the personal trainers
	if ($userLoggedIn && $userType == 2){
	// the top level menu items are stored as an array
	$menuItems = array('<a href="index.php" id="Home">Home</a>',	
					   '<a href="about.php" id="MenuItem2">About</a>',
					   '<li><a id="Dropdown">Management Centre</a>  
						<ul class="dropdown-content">
						<li><a href="myDetails.php">My Details</a></li>
						<li><a href="manageUser.php">Manage User Details</a></li>
						</ul></li>'
					   
					   );
	}
	// menu when user is logged out
	 if (!$userLoggedIn)
	{
		$menuItems = array('<a href="index.php" id="Home">Home</a>',
					   '<a href="about.php" id="MenuItem2">About</a>',
					   '<a href="login.php" id="MenuItem3">Log In</a>',
					   
					   
					   );
	}
	
	// write the opening structure of the menu
	echo '<div id="menu">
			<div class="menuBackground">
				<ul class="dropDownMenu">';
				
	// write the individual menu items
	$menuCount = count($menuItems);
	for ($i = 0; $i < $menuCount; $i++) {
		echo "\n<li";
		if ($section == $i) { // if an item is selected, add the correct class spec
			echo " class='selected'";
		}
		echo ">" . $menuItems[$i];
	}
	
	// write the closing structure of the menu
	echo "\n</ul>
			</div>
		</div>";
}

/* Display the footer information.
*/
function displayFooter()
{
	echo "<div id='footer'> <span id='cctext'>&copy; Krzysztof Stepien 2019</span></div>";
}

/* Display the user form. If the user has not signed in, then this will be a sign-in
   form asking for their name. If they are signed in, it will be a sign-out form.
*/

function displaySignOut()
{
	// global variables 
	global $userLoggedIn;
	global $userName;
	
	if ($userLoggedIn){
		echo '<span id="signout"><form action="processSignOut.php" method="post">Welcome ' . $userName . ' <input type="submit"  value="Sign Out"></form></span>';
	}
}

function displaySignIn()
{
	// need to specify we want to access the global variable
	global $userName;
	
	// if there is no username set then we need to offer the sign in form or registration link
	if ($userName == '') {
		echo '<span id="signin">
		<form action="processSignIn.php" name="signInForm" onsubmit="return validateUserName(\'signInForm\');" method="post">
		<table>
		<tr>
		<td align="left">Please enter your email address:</td>
		<td><input type="text" name="userName" required></td>
		</tr>
		
		<tr>
		<td align="left">Password:</td>
		<td><input type="password" name="pw" required></td>
		</tr>
		
		<tr>
		<td colspan="2" align="left"><input type="submit" value="Sign In!"></td>
		</tr>
		
		</table>
		</form>
		</span>';
	}
}


/*function that displays the data from the database to screen
Displays Personal trainer details*/
function displayPTDetails()
{
	// connecting to the database and validation
	if (!connectToDb('phouse_db')) {
	$_SESSION['errorMsg'] = "Sorry, we could not connect to the database.";
	header('location:index.php');
	exit();
}
	
	global $userName;
	global $dbConnection;
	
	// queries used to pull data from the database
	$sqlQuery = "SELECT * FROM employee";
	$sqlQueryAdd = "SELECT address, city, zip_code
					FROM addresspt, employee
					WHERE addresspt.id = employee.id";
	
	$sqlQueryClass = "SELECT class.type
					FROM class, employee
					WHERE class.id = employee.emp_class_id";
	
	// execution of the queries
	$result = $dbConnection->query($sqlQuery);
	$result2 = $dbConnection->query($sqlQueryAdd);
	$result3 = $dbConnection->query($sqlQueryClass);

	
		

	// fetching the data for the admin outside of the table so it is not displayed on the website

	$row1= $result->fetch_assoc();
	$row2= $result2->fetch_assoc();
	$row3= $result3->fetch_assoc();
	
	// displaying the table with the data fethced from the database, looping through the fetch_assoc
?>


<a href = newPT.php class="button" style = "margin-bottom: 10px;">Add New Personal Trainer</a>
<table id="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Second Name</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Email</th>	  
      <th scope="col">Class</th>
      <th scope="col">Address</th>
      <th scope="col">Zip-code</th>
      <th scope="col">City</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <?php while ($row1= $result->fetch_assoc()):
  $row2= $result2->fetch_assoc();
  $row3= $result3->fetch_assoc();
  ?>

    <tr>
      <td><?php echo $row1['first_name'];?></td>
      <td><?php echo $row1['last_name'];?></td>
      <td><?php echo $row1['phone_number'];?></td>	  
      <td><?php echo $row1['email'];?></td>
      <td><?php echo $row3['type'];?></td>
	  <td><?php echo $row2['address'];?></td>
      <td><?php echo $row2['zip_code'];?></td>
      <td><?php echo $row2['city'];?></td>
      <td><a href = editPT.php?edit=<?php echo $row1['id'];?> class="button">Edit</a>
      <td><a href = managePT.php?delete=<?php echo $row1['id'];?> class="button" onclick="return confirm('Would you like to delete this record?')">Delete</a>
	  
	  
	  </td>
	  
    </tr>
    
  <?php endwhile;?>
</table>
		
		<?php closeConnection();?>
<?php
	
	
	
}
// displays the tooltips
function displayTooltipInput()
{
?> <div class="tooltip"><i class="material-icons">info</i>
			<span class="tooltiptext" style= "font-size:75%;">
			First and Last Name: Please use uppercase first letter<br>
			Email: example@gmail.com<br>
			Address: street number and street name<br>
			Post code: please use capital letters<br>
			City: Uppercase first letter
			
			</span>
			</div>
<?php
}

// this function displays details of the personal trainer logged in the system
function displayMyDetails(){
	if (!connectToDb('phouse_db')) {
		$_SESSION['errorMsg'] = "Sorry, we could not connect to the database.";
		header('location:index.php');
		exit();
	}
	global $userName;
	global $dbConnection;

	$sqlQuery = "SELECT * FROM employee WHERE employee.email = '$userName'";
	$sqlQueryAdd = "SELECT address, city, zip_code
					FROM addresspt, employee
					WHERE addresspt.id = (SELECT employee.id FROM employee WHERE employee.email = '$userName')";

	$result = $dbConnection->query($sqlQuery);
	$result2 = $dbConnection->query($sqlQueryAdd);

	$row1= $result->fetch_assoc();
	$row2= $result2->fetch_assoc();
?>
	<table id="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Second Name</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Zip-code</th>
      <th scope="col">City</th>
      <th scope="col"></th>
    </tr>
  </thead>
	<tr>
      <td><?php echo $row1['first_name'];?></td>
      <td><?php echo $row1['last_name'];?></td>
      <td><?php echo $row1['phone_number'];?></td>	  
      <td><?php echo $row1['email'];?></td>
	  <td><?php echo $row2['address'];?></td>
      <td><?php echo $row2['zip_code'];?></td>
      <td><?php echo $row2['city'];?></td>
      <td><a href = editPT.php?edit=<?php echo $row1['id'];?> class="button">Edit</a></td>
	  </tr>
    </table>

  <?php 
}

 // displaying the customer retails
function displayCustomerDetails()
{
	
	if (!connectToDb('phouse_db')) {
	$_SESSION['errorMsg'] = "Sorry, we could not connect to the database.";
	header('location:index.php');
	exit();
}
	
	global $userName;
	global $dbConnection;
	
	$sqlQuery = "SELECT * FROM customer";
	$sqlQueryAdd = "SELECT address, city, zip_code
					FROM address, customer
					WHERE address.id = customer.id";
	$sqlQueryClass = "SELECT class.type
					FROM class, customer
					WHERE class.id = customer.class_id";
	
	$result = $dbConnection->query($sqlQuery);
	$result2 = $dbConnection->query($sqlQueryAdd);
	$result3 = $dbConnection->query($sqlQueryClass);

	
		if ($result->num_rows == 0) {
			 $_SESSION['errorMsg'] = "Could not recieve fields from database";
		
			header('location:index.php');
			exit();
		}

	


?>

<a href = newUser.php class="button" style = "margin-bottom: 10px;">Add New User</a>
<table id="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Second Name</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Email</th>
      <th scope="col">Class</th>
	  <th scope="col">Address</th>
      <th scope="col">Zip-code</th>
      <th scope="col">City</th>
      <th scope="col"></th>
      <th scope="col"></th>
	  <th scope="col"></th>
    </tr>
  </thead>
  <?php while ($row1= $result->fetch_assoc()):
  $row2= $result2->fetch_assoc();
  $row3= $result3->fetch_assoc();
  ?>

    <tr>
      <td><?php echo $row1['first_name'];?></td>
      <td><?php echo $row1['second_name'];?></td>
      <td><?php echo $row1['phone_number'];?></td>
      <td><?php echo $row1['email'];?></td>
      <td><?php echo $row3['type'];?></td>
      <td><?php echo $row2['address'];?></td>
      <td><?php echo $row2['zip_code'];?></td>
      <td><?php echo $row2['city'];?></td>
      <td><a href = editUser.php?edit=<?php echo $row1['id'];?> class="button">Edit</a></td>
      <td><a href = manageUser.php?delete=<?php echo $row1['id'];?> class="button" onclick="return confirm('Would you like to delete this record?')">Delete</a></td>
	  <td><a href = additionalDetails.php?more=<?php echo $row1['id'];?> class="button">More...</a> </td>
	  
    </tr>
    
  <?php endwhile;?>
</table>
		
		<?php closeConnection();?>
<?php
	
	
	
}
//displays additional details for the user
function displayAdditionalDetails($id){
	
		
	if (!connectToDb('phouse_db')) {
	$_SESSION['errorMsg'] = "Sorry, we could not connect to the database.";
	header('location:index.php');
	exit();
}
	
	global $dbConnection;
	
	$sqlQuery = "SELECT * FROM customer WHERE customer.id = $id";
	
	$sqlQueryClass = "SELECT type FROM class
					WHERE class.id = (SELECT class_id FROM customer WHERE customer.id = $id)";
					
	$sqlQueryExercise = "SELECT name FROM exercise
						WHERE exercise.class_id = (SELECT class_id FROM customer WHERE customer.id = $id)";
						
	$sqlQueryDate = "SELECT start_date FROM class_timetable
						WHERE class_timetable.class_id = (SELECT class_id FROM customer WHERE customer.id = $id)";
	
	$result = $dbConnection->query($sqlQuery);
	$resultClass = $dbConnection->query($sqlQueryClass);
	$resultExercise = $dbConnection->query($sqlQueryExercise);
	$resultDate = $dbConnection->query($sqlQueryDate);
		
	$row= $result->fetch_assoc();

	?>
	

	<p>	Details for :  <?php echo $row['first_name']," ", $row['second_name']; ?>
	<p>	Date Started:  <?php echo $resultDate->fetch_assoc()['start_date']; ?>
  
	<table id="table" style = "width:50%;">
  <thead>
    <tr>
      <th scope="col">Class</th>
      <th scope="col">Exercises</th>
    
    </tr>
  </thead>
  <tr>
      <td> <?php echo $resultClass->fetch_assoc()['type']; ?></td>
      <td> <?php while ($exercise= $resultExercise->fetch_assoc()): echo "-", $exercise['name'], "<br>";   endwhile?></td>
     
  </tr>
  </table>
	
	 
	<?php
}




?>