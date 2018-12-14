<?php

class User {
    public $EMail = "";
    public $Password = "";
    public $PasswordRepeated = "";

    function getEMail(){
        echo $this->EMail;
    }

    function getPassword(){
        echo $this->Password;
    }

    function getPasswordRepeated(){
        echo $this->PasswordRepeated;
    }

    function setEMail($EMail){
        $this->EMail = $EMail;
    }

    function setPassword($Password){
        $this->Password = $Password;
    }

    function setPasswordRepeated($PasswordRepeated){
        $this->PasswordRepeated = $PasswordRepeated;
    }
}
?>