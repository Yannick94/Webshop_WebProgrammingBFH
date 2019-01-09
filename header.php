<?php
    session_start();
    include("text/text.php");
    if(isset($_POST["en"])){
        $_SESSION["lang"] = $_POST["en"];
    }
    if(isset($_POST["de"])){
        $_SESSION["lang"] = 'de';
    }
    if(!isset($_SESSION["lang"])){
        $_SESSION["lang"] = 'de';
    }

    if(isset($_POST["add"])){
        $id = $_POST["add"];
        if(!isset($_SESSION["prod"])){
            $_SESSION["prod"][0] = $id; 
            $_SESSION["qty"][0] = 1;
        }else{
            $pos = array_search($id, $_SESSION["prod"]);
            if($pos!== false){
                $_SESSION["qty"][$pos] = $_SESSION["qty"][$pos] + 1;
            }else{
                $elements = count($_SESSION["prod"]);
                $_SESSION["prod"][$elements] = $id; 
                $_SESSION["qty"][$elements] = 1;  
            }
        }
    }
    $prodQty = 0;

    if(isset($_SESSION["prod"])){
        $prodQty = array_sum($_SESSION["qty"]);
    }
?>

<!DOCTYPE html>
<html>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="\style\style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="\style\login.css" media="screen" />
<link rel="stylesheet" type="text/css" href="\style\overview.css" media="screen" />
<link rel="stylesheet" type="text/css" href="\style\product.css" media="screen" />
<link rel="stylesheet" type="text/css" href="\style\cart.css" media="screen" />

<head>
    <title><?php getContent('seiteTitel'); ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="\res\pic\Logo.ico" />
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
                <i><?php 
                echo $prodQty;
                echo ' ';
                echo getContent('AnzArtikel');?></i>
            </div>
        <div class="LanguageChooser">
        <form method="post" action="">
            <button type="submit" class="langButton" name="de" value="de"><img src="\res\pic\ger.png" height="25px" width="25px"/></button>
			<button type="submit" class="langButton" name="en" value="en"><img src="\res\pic\uk.png" height="25px" width="25px"/></button>
        </form>
		</div>
        </div>
    </div>
    <div class="body">
        <div class="MainContent">