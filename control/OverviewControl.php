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
}
?>