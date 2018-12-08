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
        echo '<from method="post">';
        echo '<div class="LoginContent">';
        
        echo '<h2 class="SubTitel">';
        echo getContent('loginTitel');
        echo '</h2>';
        echo '<label for="uname"><b>'.getContent('Username').'</b></label>';
        echo '<input type="text" placeholder="';
        echo getContent('PlaceholderUsername');
        echo '" name="uname" required>';

        echo '<label for="psw"><b>'.getContent('Password').'</b></label>';
        echo '<input type="password" placeholder="';
        echo getContent('PlaceholderPassword');
        echo '" name="psw" required>';

        echo '<button class="submitLoginbtn" type="submit" name="submit">Login</button>';
        echo '</div>';
        echo '</form>';
        echo '<div class="LoginContent" style="background-color:#f1f1f1">';
        echo '<button type="button" class="cancelLoginbtn">';
        echo getContent('Cancel');
        echo '</button>';
        echo '<button type="button" class="registerLoginbtn">';
        echo getContent('Register');
        echo '</button>';
        echo '</div>';
    }
}

$model = new UserLogin();
$controller = new UserLoginController($model);
$view = new UserLoginView($model);
if (isset($_POST['uname']))
    $controller->{$_POST['uname']}();
if (isset($_POST['psw']))
    $controller->{$_POST['psw']}();
if (isset($_POST['submit']))
    $controller->{$_POST['submit']}();
$view->render();
?>