<?php
include($_SERVER["DOCUMENT_ROOT"] . "/db/db.inc.php");

class CartController
{
    private $db;
    private $mysqli;
    
    public function __construct()
    {
        $this->db     = Database::getInstance();
        $this->mysqli = $this->db->getConnection();
        $this->mysqli->set_charset('utf-8');
    }
    
    public function GetProductFromSession(array $productIds, array $qty)
    {
        if(count($productIds)<=0){
            return array();
        }
        $returnArray = array();
        $query       = "SELECT * FROM product WHERE   ";
        foreach ($productIds as $productId) {
            $query = $query . "id=" . $productId . " OR";
        }
        $query   = substr($query, 0, -2);
        $result  = $this->mysqli->query($query);
        $counter = 0;
        if($result->num_rows > 0){
        $result->data_seek(0);
        while ($row = $result->fetch_assoc()) {
            $prod = new Product();
            $prod->setId($row["Id"]);
            $prod->setTitleDe($row["TitleDe"]);
            $prod->setTitleEn($row["TitleEn"]);
            $prod->setDescriptionDe($row["DescriptionDe"]);
            $prod->setDescriptionEn($row["DescriptionEn"]);
            $prod->setPrice($row["Price"]);
            $prod->setCategorieId($row["CategorieId"]);
            $prod->setPicturePath($row["PicturePath"]);
            $prod->setQuantity($qty[$counter]);
            $counter = $counter + 1;
            array_push($returnArray, $prod);
        }
        return $returnArray;
    }
}
}
?>