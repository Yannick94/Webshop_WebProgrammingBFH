<?php

include($_SERVER["DOCUMENT_ROOT"] . "/db/db.inc.php");

class UserRegisterController {

    private $db;
    private $mysqli;

    private $user;

    public function __construct(User $user) {
        $this->user = $user;
        $this->db = Database::getInstance();
        $this->mysqli = $this->db->getConnection();
    }

    public function uname($email){
        $this->user->EMail = $email;
    }

    public function psw($psw){
        $this->user->Password = $psw;
    }

    public function pswre($pswre){
        $this->user->PasswordRepeated = $pswre;
    }

    
    function insertUser(){
        $hash = password_hash($this->user->Password,PASSWORD_BCRYPT);
        $stmt = $this->mysqli->prepare('INSERT INTO User (EMail,Password) VALUES (?,?)');
        $stmt->bind_param("ss",$this->user->EMail, $hash);
        $stmt->execute();

        $stmt->close();
    }

    function submit(){
        if($this->user->Password === $this->user->PasswordRepeated){

            $this->user->EMail = strip_tags($this->user->EMail);
            $this->user->Password = strip_tags($this->user->Password);

            $this->user->EMail = $this->mysqli->real_escape_string($this->user->EMail);
            $this->user->Password = $this->mysqli->real_escape_string($this->user->Password);

            $this->insertUser();
            $_SESSION['E-Mail'] = $this->user->EMail;
            header("Location: /");
            exit();
        }
    }

    public function FindUserByEMail(){
        $this->user->EMail = strip_tags($this->user->EMail);

        $this->user->EMail = $this->mysqli->real_escape_string($this->user->EMail);
        $stmt = $this->mysqli->prepare("SELECT * FROM user WHERE EMail =?");
        $stmt->bind_param('s',$this->user->EMail);
        $stmt->execute();
        $result = $stmt->get_result();
        if(mysqli_num_rows($result)>0)
            return true;
        return false;
    }
}
?>