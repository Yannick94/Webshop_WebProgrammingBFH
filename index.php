<?php
if(isset($_POST["admin"])){
    header("Location: /Admin?page=1");
}

include('header.php');
    echo '<form method="post" action="">';
    if(isset($_SESSION["IsAdmin"])){
        if($_SESSION["IsAdmin"] == 1){
            echo '<div class="AdminMain"><button class="MainPageNav" name="admin" type="submit"><i class="fab fa-angular fa-2x"></i><i>Admin</i></button></div>';
        }
    }
    echo '</form>';
    echo '<input type="text" size="30" onkeyup="showResult(this.value)">';
    echo '<div id="livesearch"></div>';
include('footer.php');
?>