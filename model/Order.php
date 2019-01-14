<?php
class Order{
public $id = 0;
 public $AnzArtikel = 0;
 public $TotalBetrag = 0.0;
 public $Name = "";
 public $Street = "";
 public $Zip = "";
 public $City = "";

    public function getAnzArtikel(){
        echo $this->AnzArtikel;
    }
    public function getTotalBetrag(){
        echo number_format($this->TotalBetrag,2,'.','');
    }
    
    public function getName(){
        echo $this->Name;
    }
    
    public function getStreet(){
        echo $this->Street;
    }
    
    public function getZip(){
        echo $this->Zip;
    }
    
    public function getCity(){
        echo $this->City;
    }


    public function getId(){
        echo $this->id;
    }

    public function AnzArtikel($AnzArtikel){
        $this->AnzArtikel = $AnzArtikel;
    }

    public function TotalBetrag($TotalBetrag){
        $this->TotalBetrag = $TotalBetrag;
    }

    public function id($id){
        $this->id = $id;
    }

    public function Name($Name){
        $this->Name = $Name;
    }

    public function Street($Street){
        $this->Street = $Street;
    }

    public function Zip($Zip){
        $this->Zip = $Zip;
    }

    public function City($City){
        $this->City = $City;
    }
}