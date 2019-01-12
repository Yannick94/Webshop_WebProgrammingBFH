<?php
include($_SERVER["DOCUMENT_ROOT"] . "/db/db.inc.php");

class CheckoutController{
    private $db;
    private $mysqli;

    public function __construct() {
        $this->db = Database::getInstance();
        $this->mysqli = $this->db->getConnection();
        $this->mysqli->set_charset('utf-8');
    }

    public function GetProductFromSession(array $productIds, array $qty)
    {
        if(count($productIds)<=0){
            return array();
        }
        $returnArray = array();
        $query       = "SELECT * FROM product WHERE    ";
        foreach ($productIds as $productId) {
            $query = $query . "id=" . $productId . " OR ";
        }
        $query   = substr($query, 0, -3);
        $query = $this->mysqli->escape_string($query);
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

public function GetUserInformation($id){
    $returnUser = new User();
    $stmt = $this->mysqli->prepare("Select * FROM User WHERE ID=?");
    $stmt->bind_param('s',$id);
        $stmt->execute();
        $result = $stmt->get_result();
        if(mysqli_num_rows($result)==0)
            return $returnUser;
        $row = $result->fetch_assoc();
    $returnUser->EMail = $row["EMail"];
    $returnUser->Name = $row["Name"];
    $returnUser->Street = $row["Street"];
    $returnUser->ZIP = $row["ZIP"];
    $returnUser->City = $row["City"];

    return $returnUser;
}
}
?>