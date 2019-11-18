<!DOCTYPE html>
<meta charset="utf-8">
<!-- 
	form that allow to enter new user to the base- customer
-->
<?php
require 'userSession.php';
require 'pageElements.php';
redirectToIndex();
require 'database.php';
?>

<html>
    <head>
        <title>The Powerhouse Gym</title>

		<?php writeCommonStyles(); ?>		
		
		<script src="js/validateInputForm.js" type="text/javascript"></script>
		
    </head>  
    
    <body>
	
	
	
	
        <div id="container">
            <div id="header"><h1><img src="img/logo.png" id ="img" alt="gym" >The Powerhouse Gym  </h1><?php displaySignOut();?></div>
			<?php displayMenu(HOME); ?>

            <div id="content"  style="overflow:auto;">
			
			<h1>New User Form</h1><?php displayTooltipInput();?><br>

				<div style = "width: 60%">
				<form action="processNewUser.php" onsubmit="return validateInputForm('updateForm');" name="updateForm" method = "post">
			
		
			<div class="row">
				<div class="col-25">
					<label>First Name</label>
				</div>
				<div class="col-75">
					<input type="text" id="firstname" name="firstname" placeholder="First name.." required>
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label>Last Name</label>
				</div>
				<div class="col-75">
					<input type="text" id="lastname" name="lastname" placeholder="Your last name.." required>
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label>Email</label>
				</div>
				<div class="col-75">
					<input type="text" id="email" name="email" placeholder="Your email.." required>
				</div>
			</div>
			
			<div class="row">
				<div class="col-25">
					<label>Phone Number</label>
				</div>
				<div class="col-75">
					<input type="text" id="number" name="number" placeholder="Number.." required>
				</div>
			</div>
				
			<div class="row">
				<div class="col-25">
					<label for="class">Class</label>
				</div>
				<div class="col-75">
					<select name="class" id="class">
						<option value="1">Strongman</option>
						<option value="2">Bodybuilding</option>
						<option value="3">Powerlifting</option>
					</select>
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label>Address</label>
				</div>
				<div class="col-75">
					<input type="text" id="address" name="address" placeholder="Street name and number.." required>
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label>Post Code</label>
				</div>
				<div class="col-75">
					<input type="text" id="zip" name="zip" placeholder="Zip Code" required>
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label>City</label>
				</div>
				<div class="col-75">
					<input type="text" id="city" name="city" placeholder="City.." required>
				</div>
			</div>
			<div class="row">
				<input type="submit" name= "submit" value="Submit">
			</div>
			</form>

				</div>	

        </div>			
	
    </body>   
 <?php displayFooter();?>	
</html>
