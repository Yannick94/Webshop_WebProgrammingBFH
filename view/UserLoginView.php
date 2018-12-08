<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"] . "/model/UserLoginModel.php");
include($_SERVER["DOCUMENT_ROOT"] . "/control/UserLoginControl.php");
include($_SERVER["DOCUMENT_ROOT"] . "/text/text.php");
class UserLoginView{
    private $userLogin;

    public function __construct(UserLogin $userLogin) {
        $this->userLogin = $userLogin;
    }

    public function render(){
        echo '<div class="LoginContent">';
        
        echo '<h2 class="SubTitel">';
        echo getContent('loginTitel');
        echo '</h2>';
        echo '<label for="uname"><b>Username</b></label>';
        echo '<input type="text" placeholder="Enter Username" name="uname" required>';

        echo '<label for="psw"><b>Password</b></label>';
        echo '<input type="password" placeholder="Enter Password" name="psw" required>';

        echo '<button class="submitLoginbtn" type="submit">Login</button>';
        echo '</div>';
        echo '<div class="LoginContent" style="background-color:#f1f1f1">';
        echo '<button type="button" class="cancelLoginbtn">Cancel</button>';
        echo '</div>';
    }
}

$model = new UserLogin();
$controller = new UserLoginController($model);
$view = new UserLoginView($model);
$view->render();
?>