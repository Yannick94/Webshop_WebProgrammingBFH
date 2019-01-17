<?php
include($_SERVER["DOCUMENT_ROOT"] . "/public_html/db/db.inc.php");

class AdminController
{
    private $db;
    private $mysqli;
    
    public function __construct()
    {
        $this->db     = Database::getInstance();
        $this->mysqli = $this->db->getConnection();
        $this->mysqli->set_charset('utf-8');
    }

    public function getUserList(){
        $returnArray = array();

        $stmt = $this->mysqli->prepare("SELECT * FROM User");
        $stmt->execute();
        $result = $stmt->get_result();
        while($row = $result->fetch_assoc()){
            $user = new User();
            $user->setEMail($row["EMail"]);
            $user->name($row["Name"]);
            $user->street($row["Street"]);
            $user->zip($row["ZIP"]);
            $user->city($row["City"]);
            $user->id($row["Id"]);
            array_push($returnArray,$user);
        }

        return $returnArray;
    }

    public function getOrderList(){
        $returnArray = array();

        $stmt = $this->mysqli->prepare("SELECT * FROM orderheader");
        $stmt->execute();
        $result = $stmt->get_result();
        while($row = $result->fetch_assoc()){
            $order = new Order();
            $order->AnzArtikel($row["AnzArtikel"]);
            $order->TotalBetrag($row["TotalBetrag"]);
            $order->Name($row["Name"]);
            $order->Street($row["Street"]);
            $order->Zip($row["ZIP"]);
            $order->City($row["City"]);
            $order->id($row["ID"]);
            array_push($returnArray,$order);
        }

        return $returnArray;
    }

    public function delete($id,$mode){
        if($mode == "1"){
            $stmt = $this->mysqli->prepare("DELETE FROM User WHERE ID =?");
            $stmt->bind_param("i",$id);
            $stmt->execute();
        }else{
            $stmt = $this->mysqli->prepare("DELETE FROM OrderHeader WHERE Id =?");
            $stmt->bind_param("i",$id);
            $stmt->execute();
            $stmt = $this->mysqli->prepare("DELETE FROM OrderLine WHERE HeaderId =?");
            $stmt->bind_param("s",$id);
            $stmt->execute();
        }
    }
}


?>