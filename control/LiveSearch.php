<?php

class LiveSearch
{
    private $db;
    private $mysqli;
    
    public function __construct()
    {
        $this->db     = Database::getInstance();
        $this->mysqli = $this->db->getConnection();
        $this->mysqli->set_charset('utf-8');
    }

    public function searchForProduct($searchString){
      $returnArray = array();

        $stmt = $this->mysqli->prepare('SELECT * FROM product WHERE TitleDe like "%?% OR TitleEn like "%?%" OR DescriptionDe like "%?%" OR DescriptionEn like "%?%"');
        $stmt->bind_param('ssss',$searchString,$searchString,$searchString,$searchString);
        $stmt->execute();
        $result = $stmt->get_result();
        while($row = $result->fetch_assoc()){
            $prod = new Product();
            $prod->setId($row["Id"]);
            $prod->setTitleDe($row["TitleDe"]);
            $prod->setTitleEn($row["TitleEn"]);
            $prod->setDescriptionDe($row["DescriptionDe"]);
            $prod->setDescriptionEn($row["DescriptionEn"]);
            $prod->setPrice($row["Price"]);
            $prod->setCategorieId($row["CategorieId"]);
            $prod->setPicturePath($row["PicturePath"]);
            array_push($returnArray,$prod);
        }

        return $returnArray;
    }
  }
?>