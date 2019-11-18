<!DOCTYPE html>
<meta charset="utf-8">
<!-- 
	 page used to display the additional info about the customer
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
// setting the id of the person in question
	if (isset($_GET['more']))
	{
		$id = $_GET['more'];
	}
	
	?>
	
	
	
        <div id="container">
           <div id="header"><h1><img src="img/logo.png" id ="img" alt="gym" >The Powerhouse Gym  </h1><?php displaySignOut();?></div>
			<?php displayMenu(HOME); ?>

            <div id="content" style="overflow:auto;">
			
			<h1>Additional User Details</h1><br>

				
				
				<div>
				
				<?php displayAdditionalDetails($id);	?>
				</div>	
									
				

           
        
        </div>			
	
    </body>   
 <?php displayFooter();?>	
</html>
