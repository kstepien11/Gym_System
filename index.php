<!DOCTYPE html>
<meta charset="utf-8">
<!-- 
	The front page of the site.
-->
<?php
require 'userSession.php';
require 'pageElements.php';
?>

<html>
    <head>
        <title>The Powerhouse Gym</title>

<?php writeCommonStyles(); ?>		
		
    </head>  
    
    <body 
<?php
	// check for a sign in error and post an alert if necessary
	$errMsg = null;
	if (isset($_SESSION['errorMsg'])) {
		$errMsg = $_SESSION['errorMsg'];
		echo "onload='displayError(\"$errMsg\");'";
		unset($_SESSION['errorMsg']);
	}
	
	
?>
	>
        <div id="container">
            <div id="header"><h1><img src="img/logo.png" id ="img" alt="gym" >The Powerhouse Gym  </h1><?php displaySignOut();?></div>
			<?php displayMenu(HOME); ?>

            <div id="content" style="overflow:auto;">
			
			<h1>Welcome!</h1>
				<div style="width:90%;overflow:auto;">
					
				<p>
				<img src="img/gym.jpg" alt="gym" style="float:left; margin:0px 20px 0px 20px;">
				Welcome to the Powerhouse Gym!<br><br>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
				Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
				
				</div>
			
			
			</div>

            <?php displayFooter();?>
        
        </div>
    
    </body>    
</html>
