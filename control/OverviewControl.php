<?php
include($_SERVER["DOCUMENT_ROOT"] . "/db/db.inc.php");

class OverviewController{
    private $db;
    private $mysqli;

    private $product;

    public function __construct(Product $product) {
        $this->product = $product;
        $this->db = Database::getInstance();
        $this->mysqli = $this->db->getConnection();
    }

    public function GetProductByCat(int $cat){
        $returnArray = array();

        $stmt = $this->mysqli->prepare("SELECT * FROM product WHERE CategorieId=?");
        $stmt->bind_param('s',$cat);
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