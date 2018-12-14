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
        echo '<form class = "form-signin" role = "form" action = "';
        //echo htmlspecialchars($_SERVER['PHP_SELF']); 
        echo '" method = "post">';
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
if(isset($_POST['logout'])){
    unset($_SESSION['E-Mail']);
}

if(isset($_SESSION['E-Mail'])){
    echo '<h3>Bereits als ' . $_SESSION['E-Mail'] . ' eingeloggt!</h3>';
    echo '<form class = "form-signin" role = "form" action = "';
        //echo htmlspecialchars($_SERVER['PHP_SELF']); 
        echo '" method = "post">';
    echo '<button type="submit" id="logout" name="logout" class="logoutbtn">';
    echo getContent('Logout');
    echo '</button>';
    echo '</form>';
}else{

$model = new User();
$controller = new UserLoginController($model);
$view = new UserLoginView($model);
if (isset($_POST['uname']))
    $controller->uname($_POST['uname']);
if (isset($_POST['psw']))
    $controller->psw($_POST['psw']);
if (isset($_POST['submit']))
    if($controller->submit()){
        echo "Login erfolgreich";
        echo $_SESSION['E-Mail'];
    }else{
        echo "Error";
    }
$view->render();
}
include($_SERVER["DOCUMENT_ROOT"] . "/footer.php");
?>