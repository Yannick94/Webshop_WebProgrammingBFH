<?php

class User {
    public $EMail = "";
    public $Password = "";
    public $PasswordRepeated = "";
    public $Salt = "";

    function getEMail(){
        return $this->EMail;
    }

    function getPassword(){
        return $this->Password;
    }

    function getPasswordRepeated(){
        return $this->PasswordRepeated;
    }
}
?>