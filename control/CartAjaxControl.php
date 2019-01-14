<?php
session_start();
include("../text/text.php");

if(isset($_POST['id'])){
    $id = $_POST['id'];
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
echo $prodQty;
?>