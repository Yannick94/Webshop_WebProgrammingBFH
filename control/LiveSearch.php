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

$xmlDoc=new DOMDocument();
$xmlDoc->load("links.xml"); // need to setup this xml file with all products with <title> tags

$x=$xmlDoc->getElementsByTagName('link');

//get the q parameter from URL
$q=$_GET["q"];

//lookup all links from the xml file if length of q>0
if (strlen($q)>0) {
  $hint="";
  for($i=0; $i<($x->length); $i++) {
    $y=$x->item($i)->getElementsByTagName('title');
    $z=$x->item($i)->getElementsByTagName('url');
    if ($y->item(0)->nodeType==1) {
      //find a link matching the search text
      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) {
        if ($hint=="") {
          $hint="<a href='" . 
          $z->item(0)->childNodes->item(0)->nodeValue . 
          "' target='_blank'>" . 
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
        } else {
          $hint=$hint . "<br /><a href='" . 
          $z->item(0)->childNodes->item(0)->nodeValue . 
          "' target='_blank'>" . 
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
        }
      }
    }
  }
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
  $response="no suggestion";
} else {
  $response=$hint;
}

//output the response
echo $response;
?>