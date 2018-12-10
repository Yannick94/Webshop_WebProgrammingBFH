<?php
include($_SERVER["DOCUMENT_ROOT"] . "/db/db.inc.php");
$db = Database::getInstance();
$mysqli = $db->getConnection();

class UserRegisterController {

    private $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function uname(){
        $this->user->EMail = $_POST['uname'];
    }

    public function psw(){
        $this->user->Password = $_POST['psw'];
    }

    public function pswre(){
        $this->user->PasswordRepeated = $_POST['pswre'];
    }

    public function submit(){
        if($this->user->Password === $this->user->PasswordRepeated){

            $mail = strip_tags($this->user->EMail);
            $pw = strip_tags($this->user->Password);

            $mail = $db->escape_string($mail);
            $pw = $db->escape_string($pw);

            if(checkLogin($mail, $password)){
                $_SESSION['E-Mail'] = $mail;
            }
            return true;
        }else{
            return false;
        }
    }

    function checkLogin($mail, $password){
        
        $stmt = $mysqli->prepare("SELECT * FROM user WHERE EMail =?");
        $stmt->bind_param('s',$mail);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result || $result->num_rows !== 1)
            return false;
        $row = $result->fetch_assoc();
        return password_verify($password-$row["Salt"], $row["Password"]);
    }

    public static function FindUserByEMail($email){
        $email = strip_tags($email);

        $email = $db->escape_string($email);

        $stmt = $mysqli->prepare("SELECT * FROM user WHERE EMail =?");
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result || $result->num_rows !== 1)
            return false;
        return false;
    }
}
?>