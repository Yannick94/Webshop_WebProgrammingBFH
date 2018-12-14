<?php
include($_SERVER["DOCUMENT_ROOT"] . "/model/User.php");
include($_SERVER["DOCUMENT_ROOT"] . "/control/UserRegisterControl.php");
include($_SERVER["DOCUMENT_ROOT"] . "/header.php");
class UserRegisterView{
    private $userRegister;

    public function __construct(User $user) {
        $this->userRegister = $user;
    }

    public function render(){
        echo '<form class = "form-signin" role = "form" action = "';
        //echo htmlspecialchars($_SERVER['PHP_SELF']); 
        echo '" method = "post">';
        echo '<div class="LoginContent">';
        
        echo '<h2 class="SubTitel">';
        echo getContent('Register');
        echo '</h2>';
        echo '<label for="uname"><b>'.getContent('EMail').'</b></label>';
        echo '<input type="text" placeholder="';
        echo getContent('PlaceholderEMail');
        echo '" name="uname" value="';
        if(isset($_POST['uname']))
            echo $_POST['uname'];
        echo '" required />';

        echo '<label for="psw"><b>'.getContent('Password').'</b></label>';
        echo '<input type="password" placeholder="';
        echo getContent('PlaceholderPassword');
        echo '" name="psw" value="';
        if(isset($_POST['psw']))
            echo $_POST['psw'];
        echo '" required />';

        echo '<label for="pswre"><b>'.getContent('RepeatPassword').'</b></label>';
        echo '<input type="password" placeholder="';
        echo getContent('PlaceholderRepeatPassword');
        echo '" name="pswre" value="';
        if(isset($_POST['pswre']))
            echo $_POST['pswre'];
        echo '" required />';

        echo '<input class="submitLoginbtn" type="submit" name="submit" value="';
        echo getContent('Register');
        echo '"></input>';
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
$view->render();
if (isset($_POST['uname']))
    $model->setEMail($_POST['uname']);
if (isset($_POST['psw']))
    $model->setPassword($_POST['psw']);
if(isset($_POST['pswre']))
    $model->setPasswordRepeated($_POST['pswre']);
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
include($_SERVER["DOCUMENT_ROOT"] . "/footer.php");
?>