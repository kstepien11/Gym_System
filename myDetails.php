<!DOCTYPE html>
<meta charset="utf-8">
<!-- 
	 this page displays the info about the personal trainer, available after one is logged in
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

	
	?>
	
	
	
        <div id="container">
            <div id="header"><h1><img src="img/logo.png" id ="img" alt="gym" >The Powerhouse Gym  </h1><?php displaySignOut();?></div>
			<?php displayMenu(HOME); ?>

            <div id="content" style="overflow:auto;">
			
			<h1>My Details</h1><br>

				
				
				<div>
				
				<?php displayMyDetails();	?>
				</div>	
									
				

           
        
        </div>			
	
    </body>   
 <?php displayFooter();?>	
</html>
