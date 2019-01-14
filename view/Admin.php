<?php
include($_SERVER["DOCUMENT_ROOT"] . "/model/Product.php");
include($_SERVER["DOCUMENT_ROOT"] . "/control/CartControl.php");
include($_SERVER["DOCUMENT_ROOT"] . "/header.php");

class AdminView{
    private $orderList;
    private $userList;
    private $isUserMode;

    public function __construct(array $array, $mode){
        $this->isUserMode = $mode;
        if($this->isUserMode){
            $this->userList = $array;
        }else{
            $this->orderList = $array;
        }
    }

    public function setMode($mode){
        $this->isUserMode = $mode;
    }

    public function render(){
        if($this->isUserMode){
            $this->renderUserMode();
        }else{
            $this->renderOrderMode();
        }
    }

    private function renderUserMode(){
        echo '<form method="post" action="">';
        echo '<button class="nextStep adminSwitch" name="orderMode" type="submit"><span>Switch to OrderMode</span></button>';
        echo '</form>';
    }

    private function renderOrderMode(){
        echo '<form method="post" action="">';
        echo '<button class="nextStep adminSwitch" name="userMode" type="submit"><span>Switch to UserMode</span></button>';
        echo '</form>';
    }
}

if(isset($_POST['userMode'])){
    header("Location: /Admin?page=1");
}

if(isset($_POST['orderMode'])){
    header("Location: /Admin?page=2");
}

$view = new AdminView(array(),1);

if(isset($_SESSION["IsAdmin"])){
    if($_SESSION["IsAdmin"] == "1"){
        if(isset($_GET["page"])){
            if($_GET["page"]=="1"){    
                $view->setMode(1);
                $view->render();
            }else{
                $view->setMode(0);
                $view->render();
            }
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