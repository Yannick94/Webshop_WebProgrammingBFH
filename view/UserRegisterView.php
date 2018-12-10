<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"] . "/model/User.php");
include($_SERVER["DOCUMENT_ROOT"] . "/control/UserRegisterControl.php");
include($_SERVER["DOCUMENT_ROOT"] . "/text/text.php");
class UserRegisterView{
    private $userRegister;

    public function __construct(User $user) {
        $this->userRegister = $user;
    }

    public function render(){
        echo '<from method="post">';
        echo '<div class="LoginContent">';
        
        echo '<h2 class="SubTitel">';
        echo getContent('registerTitel');
        echo '</h2>';
        echo '<label for="uname"><b>'.getContent('EMail').'</b></label>';
        echo '<input type="text" placeholder="';
        echo getContent('PlaceholderEMail');
        echo '" name="uname" required>';

        echo '<label for="psw"><b>'.getContent('Password').'</b></label>';
        echo '<input type="password" placeholder="';
        echo getContent('PlaceholderPassword');
        echo '" name="psw" required>';

        echo '<label for="pswre"><b>'.getContent('RepeatPassword').'</b></label>';
        echo '<input type="password" placeholder="';
        echo getContent('PlaceholderRepeatPassword');
        echo '" name="pswre" required>';

        echo '<button class="submitLoginbtn" type="submit" name="submit">Login</button>';
        echo '</div>';
        echo '</form>';
        echo '<div class="LoginContent" style="background-color:#f1f1f1">';
        echo '<button type="button" class="cancelLoginbtn">';
        echo getContent('Cancel');
        echo '</button>';
        echo '</div>';
    }
}

$model = new User();
$controller = new UserRegisterController($model);
$view = new UserRegisterView($model);
if (isset($_POST['uname']))
    $controller->{$_POST['uname']}();
if (isset($_POST['psw']))
    $controller->{$_POST['psw']}();
if(isset($_POST['pswre']))
    $controller->{$_POST['pswre']}();
if (isset($_POST['submit']))
    if($controller->FindUserByEMail($_POST['uname'])){
        echo '<div class="RegisterError';
        echo '<h3 class="ErrorText">';
        echo getContent('EMailVorhanden');
        echo '</h3>';
        echo '</div>';
    }else{
        $controller->submit();
    }
$view->render();
?>