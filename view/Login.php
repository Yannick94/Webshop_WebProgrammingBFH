<?php
include($_SERVER["DOCUMENT_ROOT"] . "/model/User.php");
include($_SERVER["DOCUMENT_ROOT"] . "/control/UserLoginControl.php");
include($_SERVER["DOCUMENT_ROOT"] . "/header.php");
class UserLoginView{
    private $userLogin;

    public function __construct(User $user) {
        $this->userLogin = $user;
    }

    public function render(){
        echo '<from method="post">';
        echo '<div class="LoginContent">';
        
        echo '<h2 class="SubTitel">';
        echo getContent('loginTitel');
        echo '</h2>';
        echo '<label for="uname"><b>'.getContent('EMail').'</b></label>';
        echo '<input type="text" placeholder="';
        echo getContent('PlaceholderEMail');
        echo '" name="uname" required>';

        echo '<label for="psw"><b>'.getContent('Password').'</b></label>';
        echo '<input type="password" placeholder="';
        echo getContent('PlaceholderPassword');
        echo '" name="psw" required>';

        echo '<input class="submitLoginbtn" type="submit" name="submit" value="';
        echo getContent('Login');
        echo '"></input>';
        echo '</div>';
        echo '</form>';
        echo '<div class="LoginContent" style="background-color:#f1f1f1">';
        echo '<button type="button" class="cancelLoginbtn">';
        echo getContent('Cancel');
        echo '</button>';
        echo '<button type="button" id="registerLoginbtn" class="registerLoginbtn">';
        echo getContent('Register');
        echo '</button>';
        echo '</div>';
    }
}

$model = new User();
$controller = new UserLoginController($model);
$view = new UserLoginView($model);
if (isset($_POST['uname']))
    $controller->uname($_POST['uname']);
if (isset($_POST['psw']))
    $controller->psw($_POST['psw']);
if (isset($_POST['submit']))
    $controller->submit();
$view->render();
include($_SERVER["DOCUMENT_ROOT"] . "/footer.php");
?>