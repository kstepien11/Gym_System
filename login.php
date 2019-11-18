<!DOCTYPE html>
<!-- 
	The log in page of the site. Provides a form tdisplayed by displaySignIn function
-->
<?php
require 'database.php';
require 'pageElements.php';

ini_set('session.use_strict_mode', 1);
session_start();
?>

<html>
    <head>
        <title>The Powerhouse Gym</title>

<?php writeCommonStyles(); ?>		
		
	
    </head>  
    
    <body>
        <div id="container">
		
             <div id="header"><h1><img src="img/logo.png" id ="img" alt="gym" >The Powerhouse Gym  </h1><?php displaySignOut();?></div>
			<?php displayMenu(HOME); ?>

            <div id="content" style="overflow:auto;">
			
			<h1>Log In</h1>
			<?php displaySignIn(); ?>
			


			
			
			</div>

            <?php displayFooter();?>
        
        </div>
    
    </body>    
</html>
