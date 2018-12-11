<?php
include($_SERVER["DOCUMENT_ROOT"] . "/db/db.inc.php");
$db = Database::getInstance();
$mysqli = $db->getConnection();

class UserLoginController {

    private $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function uname($email){
        $this->user->EMail = $email;
    }

    public function psw($pwd){
        $this->user->Password = $pwd;
    }

    public function submit(){
        $mail = strip_tags($this->user->EMail);
        $pw = strip_tags($this->user->Password);

        $mail = $db->escape_string($mail);
        $pw = $db->escape_string($pw);

        if(checkLogin($mail, $password)){
            $_SESSION['E-Mail'] = $mail;
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
}
?>