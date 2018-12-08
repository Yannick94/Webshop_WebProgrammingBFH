<?php
    session_start();
    include("text/text.php");
    $_SESSION["lang"] = 'de';
    

?>

<!DOCTYPE html>
<html>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style\style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="style\login.css" media="screen" />

<head>
    <meta charset="UTF-8">
    <title><?php getContent('seiteTitel'); ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="res\pic\Logo.ico" />
</head>

<body>
    <div class="head">
        <div class="Navigation">
            <div class="Audio"><a id="NavAudio" class="NavLink"><i class="fa fa-headphones fa-2x"></i></a></div>
            <div class="Software"><a id="NavSoftware" class="NavLink"><i class="fa fa-cogs fa-2x"></i></a></div>
            <div class="Peripherie"><a id="NavPeripherie" class="NavLink"><i class="fa fa-print fa-2x"></i></a></div>
            <div class="Hardware"><a id="NavHardware" class="NavLink"><i class="fa fa-desktop fa-2x"></i></a></div>
            <div class="Home"><a id="NavHome" class="NavLink"><i class="fa fa-home fa-2x"></i></a></div>
            <div class="Menu"><i class="fa fa-bars fa-3x"></i></div>
        </div>
        <div class="Header">
            <div class="Title">
                <img class="Logo" src="\res\pic\Logo.png"/>
                <h1 class="TitleText"><?php getContent('titel'); ?></h1>
            </div>
            <div class="Account">
                <a id="User" class="NavLink"><i class="fas fa-user-alt fa-3x"></i></a>
            </div>
			<div class="ShoppingCart">
				<a id="Cart" class="NavLink"><i class="fas fa-shopping-cart fa-3x"></i></a>
			</div>
			<div class="Language">
				
			</div>
        </div>
    </div>
    <div class="body">
        <div class="MainContent">
        </div>
    </div>
    <div class="Footer">

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>
	if( !window.jQuery ) document.write('<script src="js/jquery-3.0.0.min.js"><\/script>');
</script>
    <script src="js/index.js"></script>
</body>

</html>