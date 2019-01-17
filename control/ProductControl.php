<?php
include($_SERVER["DOCUMENT_ROOT"] . "/public_html/db/db.inc.php");

class ProductController{
    private $db;
    private $mysqli;

    private $product;

    public function __construct(Product $product) {
        $this->product = $product;
        $this->db = Database::getInstance();
        $this->mysqli = $this->db->getConnection();
        $this->mysqli->set_charset('utf-8');
    }

    public function getProductById(int $id){
        $returnProduct = new Product();

        $stmt = $this->mysqli->prepare("SELECT * FROM product WHERE Id=?");
        $stmt->bind_param('s',$id);
        $stmt->execute();
        $result = $stmt->get_result();
        if(mysqli_num_rows($result)==0)
            return false;
        $row = $result->fetch_assoc();
            $returnProduct->setId($row["Id"]);
            $returnProduct->setTitleDe($row["TitleDe"]);
            $returnProduct->setTitleEn($row["TitleEn"]);
            $returnProduct->setDescriptionDe($row["DescriptionDe"]);
            $returnProduct->setDescriptionEn($row["DescriptionEn"]);
            $returnProduct->setPrice($row["Price"]);
            $returnProduct->setCategorieId($row["CategorieId"]);
            $returnProduct->setPicturePath($row["PicturePath"]);

        return $returnProduct;
    }
}
?>