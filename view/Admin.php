<?php
include($_SERVER["DOCUMENT_ROOT"] . "/model/Product.php");
include($_SERVER["DOCUMENT_ROOT"] . "/control/CartControl.php");
include($_SERVER["DOCUMENT_ROOT"] . "/header.php");

class AdminView{
    private $productList;
    private $userList;
    private $isUserMode;

    public function __construct(array $array, $mode){
        $this->isUserMode = $mode;
        if($this->isUserMode){
            $this->userList = $array;
        }else{
            $this->productList = $array;
        }
    }

    public function render(){
        if($this->isUserMode){
            renderUserMode();
        }else{
            renderProductMode();
        }
    }

    private function renderUserMode(){
        echo '<form method="post" action="">';
        echo '<button name="productMode" type="submit"/>';
        echo '</form>';
    }

    private function renderProductMode(){
        echo '<form method="post" action="">';
        echo '<button name="userMode" type="submit"/>';
        echo '</form>';
    }
}

if(isset($_SESSION["IsAdmin"])){
    if($_SESSION["IsAdmin"] == "1"){
        if(isset($_GET["page"])){
            
        }else{
            header("Loaction: /");
        }
    }else{
        header("Location: /");
    }
}else{
    header("Location: /");
}

include($_SERVER["DOCUMENT_ROOT"] . "/footer.php");
?>