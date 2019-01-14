<?php
if(isset($_POST["1"])){
    header("Location: /Overview?cat=1");
}
if(isset($_POST["2"])){
    header("Location: /Overview?cat=2");
}
if(isset($_POST["3"])){
    header("Location: /Overview?cat=3");
}
if(isset($_POST["4"])){
    header("Location: /Overview?cat=4");
}

include('header.php');
    echo '<form method="post" action="">';
    echo '<div class="Column">';
    echo '<div class="HardwareMain"><button class="MainPageNav" name="1" id="1" type="submit"><i class="fa fa-desktop fa-2x"></i><i>Hardware</i></button></div>';
    echo '<div class="PeripherieMain"><button class="MainPageNav" name="2" id="2" type="submit"><i class="fa fa-print fa-2x"></i><i>Peripherie</i></button></div>';
    echo '</div>';
    echo '<div class="Column">';
    echo '<div class="SoftwareMain"><button class="MainPageNav" name="3" id="3" type="submit"><i class="fa fa-cogs fa-2x"></i><i>Software</i></button></div>';
    echo '<div class="AudioMain"><button class="MainPageNav" name="4" id="4" type="submit"><i class="fa fa-headphones fa-2x"></i><i>Audio</i></button></div>';
    echo '</div>';
    echo '</form>';
include('footer.php');
?>