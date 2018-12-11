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

    
    function checkLogin(){
        $stmt = $this->mysqli->prepare("SELECT * FROM user WHERE EMail =?");
        $stmt->bind_param('s',$this->user->EMail);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result || $result->num_rows !== 1)
            return false;
        $row = $result->fetch_assoc();
        return password_verify($this->user->Password . $row["Salt"], $row["Password"]);
    }

    function submit(){
        if($this->user->Password === $this->user->PasswordRepeated){

            $this->user->EMail = strip_tags($this->user->EMail);
            $this->user->Password = strip_tags($this->user->Password);

            $this->user->EMail = $this->mysqli->real_escape_string($this->user->EMail);
            $this->user->Password = $this->mysqli->real_escape_string($this->user->Password);

            if($this->checkLogin()){
                $_SESSION['E-Mail'] = $mail;
            }
            return true;
        }else{
            return false;
        }
    }

    public function FindUserByEMail($email){
        $email = strip_tags($email);

        $email = $this->mysqli->real_escape_string($email);
        $stmt = $this->mysqli->prepare("SELECT * FROM user WHERE EMail =?");
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result || $result->num_rows !== 1)
            return false;
        return false;
    }
}
?>