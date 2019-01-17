<?php
include($_SERVER["DOCUMENT_ROOT"] . "/public_html/model/User.php");
include($_SERVER["DOCUMENT_ROOT"] . "/public_html/control/UserRegisterControl.php");
include($_SERVER["DOCUMENT_ROOT"] . "/public_html/header.php");
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

        echo '<label for="name"><b>'.getContent('Name').'</b></label>';
        echo '<input type="text" placeholder="';
        echo getContent('PlaceholderName');
        echo '" name="name" value="';
        if(isset($_POST['name']))
            echo $_POST['name'];
        echo '" required />';

        echo '<label for="street"><b>'.getContent('Street').'</b></label>';
        echo '<input type="text" placeholder="';
        echo getContent('PlaceholderStreet');
        echo '" name="street" value="';
        if(isset($_POST['street']))
            echo $_POST['street'];
        echo '" required />';

        echo '<label for="zip"><b>'.getContent('PLZ').'</b></label>';
        echo '<input type="text" placeholder="';
        echo getContent('PlaceholderZip');
        echo '" name="zip" value="';
        if(isset($_POST['zip']))
            echo $_POST['zip'];
        echo '" required />';

        echo '<label for="city"><b>'.getContent('Ort').'</b></label>';
        echo '<input type="text" placeholder="';
        echo getContent('PlaceholderCity');
        echo '" name="city" value="';
        if(isset($_POST['city']))
            echo $_POST['city'];
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
if (isset($_POST['uname']))
    if($controller->validateEmail($_POST['uname'])){
        $model->setEMail($_POST['uname']);
    }
    else{
        echo "Bitte korrekte Email angeben";
    }
if (isset($_POST['psw']))
    $model->setPassword($_POST['psw']);
if(isset($_POST['pswre']))
    $model->setPasswordRepeated($_POST['pswre']);
    
if(isset($_POST['name']))
$model->name($_POST['name']);

if(isset($_POST['street']))
    $model->street($_POST['street']);
    
if(isset($_POST['zip']))
$model->zip($_POST['zip']);

if(isset($_POST['city']))
    $model->city($_POST['city']);

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
include($_SERVER["DOCUMENT_ROOT"] . "/footer.php");
?>