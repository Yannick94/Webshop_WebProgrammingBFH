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
}
?>