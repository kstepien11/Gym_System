<!DOCTYPE html>
<meta charset="utf-8">

<?php
require 'userSession.php';
require 'pageElements.php';
redirectToIndex(); 
require 'database.php';

// editing the personal trainers form, input boxes redirecting to the processPTUpdate after successful input
?>

<html>
    <head>
		<script src="js/validateInputForm.js" type="text/javascript"></script>
        <title>The Powerhouse Gym</title>
		<?php writeCommonStyles(); ?>			
    </head>  
    
    <body>
		
		<div id="container">
       <div id="header"><h1><img src="img/logo.png" id ="img" alt="gym" >The Powerhouse Gym  </h1><?php displaySignOut();?></div>

			<?php displayMenu(HOME); ?>

            <div id="content"  style="overflow:auto;">
			
			<h1>Update Personal Trainer Form</h1><?php displayTooltipInput();?><br>

			<div style = "width: 60%">
			<form action="processPTUpdate.php" onsubmit="return validateInputForm('updateForm');" name="updateForm" method = "post">
			<input type = "hidden" name = "id" value = "<?php echo $_GET['edit'];?>">
		
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
				<input type="submit" name= "submit" value="Update">
			</div>
			</form>

			</div>	

        </div>			
	
    </body>   
	<?php displayFooter();?>	
</html>
