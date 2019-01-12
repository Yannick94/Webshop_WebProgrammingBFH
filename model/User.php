<?php

class User {
    public $EMail = "";
    public $Password = "";
    public $PasswordRepeated = "";
    public $Name = "";
    public $Street = "";
    public $ZIP = "";
    public $City = "";
    public $Id = -1;

    function getEMail(){
        echo $this->EMail;
    }

    function getIdInt(){
        return $this->Id;
    }

    function getId(){
        echo $this->Id;
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

    function name($Name){
        $this->Name = $Name;
    }

    function street($Street){
        $this->Street = $Street;
    }

    function zip($ZIP){
        $this->ZIP = $ZIP;
    }

    function city($City){
        $this->City = $City;
    }

    function getname(){
        echo $this->Name;
    }

    function getstreet(){
        echo $this->Street;
    }

    function getzip(){
        echo $this->ZIP;
    }

    function getcity(){
        echo $this->City;
    }

    function id($id){
        $this->Id = $id;
    }
}
?>