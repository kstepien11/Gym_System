<!DOCTYPE html>
<?php
require 'userSession.php';
require 'pageElements.php';

// this page displays the address and contact details for the gym
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
			
			<h1>About Us</h1>
			<h2>Our Address: <h2>
			<p>1 Callendar Square Shopping Centre,<br> High St,<br> Falkirk FK1 1UJ</p>
			<img src="img/map.jpg" alt="gym" style="width:30%; margin:0px 20px 0px 20px;">


			<h2>Social Media: <h2>
			<a href= "https://www.facebook.com/"><i class="fa fa-facebook-square" style="font-size:48px;color:white"></i></a>
			<a href= "https://twitter.com"><i class="fa fa-twitter-square" style="font-size:48px;color:white"></i></a>
			</div>

            <?php displayFooter();?>
        
        </div>
    
    </body>    
</html>







