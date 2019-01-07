<?php
class Product{
    public $Id = 0;
    public $TitleDe = "";
    public $TitleEn = "";
    public $DescriptionDe = "";
    public $DescriptionEn = "";
    public $Price = 0.0;
    public $CategorieId = 0;
    public $PicturePath = "";
    public $Quantity = 1;

    function getId(){
        echo $this->Id;
    }

    function getTitle(string $lang){
        if($lang=='de'){
        echo $this->TitleDe;
        }else{
            echo $this->TitleEn;
        }
    }

    function getDescription(string $lang){
        if($lang == 'de'){
            echo $this->DescriptionDe;
        }else{
            echo $this->DescriptionEn;
        }
    }

    function getPrice(){
        $priceTotal = $this->Price * $this->Quantity;
        echo number_format($priceTotal,2,'.','');
    }

    function getPicturePath(){
        echo $this->PicturePath;
    }

    function getQuantity(){
        echo $this->Quantity;
    }

    function setQuantity(int $qty){
        $this->Quantity = $qty;
    }

    function setId(int $id){
        $this->Id = $id;
    }

    function setTitleDe(string $titleDe){
        $this->TitleDe = $titleDe;
    }

    function setTitleEn(string $titleEn){
        $this->TitleEn = $titleEn;
    }

    function setDescriptionDe(string $description){
        $this->DescriptionDe = $description;
    }

    function setDescriptionEn(string $description){
        $this->DescriptionEn = $description;
    }

    function setPrice(float $price){
        $this->Price = $price;
    }

    function setCategorieId(int $cat){
        $this->CategorieId = $cat;
    }

    function setPicturePath(string $path){
        $this->PicturePath = $path;
    }
}
?>