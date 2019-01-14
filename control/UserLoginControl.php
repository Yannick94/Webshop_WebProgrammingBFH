<?php
include($_SERVER["DOCUMENT_ROOT"] . "/db/db.inc.php");

class UserLoginController {

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

    public function psw($pwd){
        $this->user->Password = $pwd;
    }

    public function submit(){
        $mail = strip_tags($this->user->EMail);
        $pw = strip_tags($this->user->Password);

        $mail = $this->mysqli->escape_string($mail);
        $pw = $this->mysqli->escape_string($pw);
        list($result,$id, $isAdmin) = $this->checkLogin($mail,$pw);

        print_r($id);
        if($result){
            $_SESSION['E-Mail'] = $mail;
            $_SESSION['id'] = $id;
            $_SESSION['IsAdmin'] = $isAdmin;
            header("Location: /");
            exit();
        }
        return false;
    }

    function checkLogin($mail, $password){
        
        $stmt = $this->mysqli->prepare("SELECT * FROM user WHERE EMail =?");
        $stmt->bind_param('s',$mail);
        $stmt->execute();
        $result = $stmt->get_result();
        if(mysqli_num_rows($result)==0)
            return false;
        $row = $result->fetch_assoc();
        return array(password_verify($password, $row["Password"]), $row["Id"], $row["IsAdmin"]);
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