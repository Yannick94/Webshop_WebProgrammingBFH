<?php

include($_SERVER["DOCUMENT_ROOT"] . "/public_html/db/db.inc.php");

class UserRegisterController {

    private $db;
    private $mysqli;

    private $user;

    public function __construct(User $user) {
        $this->user = $user;
        $this->db = Database::getInstance();
        $this->mysqli = $this->db->getConnection();
        $this->mysqli->set_charset('utf-8');
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

    public function name($name){
        $this->user->Name = $name;
    }
    
    public function street($Street){
        $this->user->Street = $Street;
    }
    
    public function zip($ZIP){
        $this->user->ZIP = $ZIP;
    }
    
    public function city($City){
        $this->user->City = $City;
    }

    
    function insertUser(){
        $hash = password_hash($this->user->Password,PASSWORD_BCRYPT);
        $stmt = $this->mysqli->prepare('INSERT INTO User (EMail,Password, Name, Street, ZIP, City) VALUES (?,?,?,?,?,?)');
        $stmt->bind_param("ssssss",$this->user->EMail, $hash, $this->user->Name, $this->user->Street,$this->user->ZIP,$this->user->City);
        $stmt->execute();
        $id = $stmt->insert_id;
        $stmt->close();
        return $id;
    }

    function submit(){
        if($this->user->Password === $this->user->PasswordRepeated){
            $id = $this->insertUser();
            $_SESSION['id'] = $id;
            $_SESSION['E-Mail'] = $this->user->EMail;
            header("Location: /");
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

    public function validateEmail($mail){
        //$mail = test_input($mail);
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        else{
            return false;
        }
    }
}
?>