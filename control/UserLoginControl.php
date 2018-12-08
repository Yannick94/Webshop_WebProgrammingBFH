<?php
include($_SERVER["DOCUMENT_ROOT"] . "/db/db.inc.php");
$db = Database::getInstance();
$mysqli = $db->getConnection();

class UserLoginController {

    private $userLogin;

    public function __construct(UserLogin $userLogin) {
        $this->userLogin = $userLogin;
    }

    public function uname(){
        $this->userLogin->UserName = $_POST['uname'];
    }

    public function psw(){
        $this->userLogin->Password = $_POST['psw'];
    }

    public function submit(){
        $name = strip_tags($this->userLogin->UserName);
        $pw = strip_tags($this->userLogin->Password);

        $name = $db->escape_string($name);
        $pw = $db->escape_string($pw);

        if(checkLogin($username, $password)){
            $_SESSION['UserName'] = $name;
        }
    }

    function checkLogin($username, $password){
        
        $stmt = $mysqli->prepare("SELECT * FROM user WHERE UserName=?");
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result || $result->num_rows !== 1)
            return false;
        $row = $result->fetch_assoc();
        return password_verify($password-$row["Salt"], $row["Password"]);
    }
}
?>