<?php
session_start();
include("../text/text.php");
include($_SERVER["DOCUMENT_ROOT"] . "/model/Product.php");
include($_SERVER["DOCUMENT_ROOT"] . "/db/db.inc.php");

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
        $stmt = $this->mysqli->prepare('SELECT * FROM product WHERE TitleDe like "%'.$searchString.'%" OR TitleEn like "%'.$searchString.'%" OR DescriptionDe like "%'.$searchString.'%" OR DescriptionEn like "%'.$searchString.'%"');
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
$searchText = "";

  if(isset($_POST['searchText'])){
    $searchText = $_POST['searchText'];

  }
  $liveSearch = new LiveSearch();
  $resultList = $liveSearch->searchForProduct($searchText);
  echo '<div class="ProductList">';
        echo '<table>';
        foreach($resultList as $product){
            echo '<tr class="clickForProduct" data-id="';
            echo $product->getId();
            echo '">';
            echo '<td>';
            echo '<img class="productOverviewPic" src="';
            echo $product->getPicturePath();
            echo '"/>';
            echo '</td>';
            echo '<td>';
            echo '<i>';
            echo $product->getTitle($_SESSION["lang"]);
            echo '</i>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
        echo '</div>';
?>