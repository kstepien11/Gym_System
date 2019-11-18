<!DOCTYPE html>
<!-- 
	Displays Customer details in the table
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
		
	
		
    </head>  
    
    <body>
	<?php
	global $dbConnection;
	if (isset($_GET['delete']))
	{
		connectToDb('phouse_db');
		$id = $_GET['delete'];
		$dbConnection->query("DELETE FROM customer WHERE id= $id") ;
		$dbConnection->query("DELETE FROM address WHERE id= $id") ;
		closeConnection();
		header('location:manageUser.php');
	}
	
	?>
        <div id="container">
            <div id="header"><h1><img src="img/logo.png" id ="img" alt="gym" >The Powerhouse Gym  </h1><?php displaySignOut();?></div>
			<?php displayMenu(HOME); ?>

            <div id="content" style="overflow:auto;">
			
			<h1>Manage User Details</h1><br>

				
				
				<div class="userDetailsContent"><?php displayCustomerDetails()?>
				</div>	
				

				


			
			
			</div>

            <?php displayFooter();?>
        
        </div>			
	
    </body>    
</html>
