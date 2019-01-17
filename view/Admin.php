<?php
include($_SERVER["DOCUMENT_ROOT"] . "/model/User.php");
include($_SERVER["DOCUMENT_ROOT"] . "/model/Order.php");
include($_SERVER["DOCUMENT_ROOT"] . "/control/AdminControl.php");
include($_SERVER["DOCUMENT_ROOT"] . "/header.php");

class AdminView{
    private $displayList;
    private $isUserMode;

    public function __construct(array $array, $mode){
        $this->isUserMode = $mode;
            $this->displayList = $array;
    }

    public function setArrayForDisplay(array $array){
        $this->displayList = $array;
    }

    public function setMode($mode){
        $this->isUserMode = $mode;
    }

    public function getMode(){
        return $this->isUserMode;
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
        echo '<div class="AdminList">';
        echo '<div class="th">';
            echo '<i class="td">';
            echo getContent('Name');
            echo '</i>';
            echo '<i class="td">';
            echo getContent('Street');
            echo '</i>';
            echo '<i class="td">';
            echo getContent('PLZ');
            echo '</i>';
            echo '<i class="td">';
            echo getContent('Ort');
            echo '</i>';
            echo '<i class="td">';
            echo getContent('Delete');
            echo '</i>';
            echo '</div>';
        foreach($this->displayList as $user){
        echo '<form method="post" action="" class="tr">';
        echo '<input type="hidden" name="mode" value="1"/>';
        echo '<input type="hidden" name="id" value=';
        echo $user->getId();
        echo '"/>';
        echo '<i class="td name">';
            echo $user->getname();
            echo '</i>';
            echo '<i class="td street">';
            echo $user->getstreet();
            echo '</i>';
            echo '<i class="td zip">';
            echo $user->getzip();
            echo '</i>';
            echo '<i class="td city">';
            echo $user->getcity();
            echo '</i>';
            echo '<span class="td delete">';
            echo '<button class="langButton" type="submit" name="delete">';
            echo '<i class="far fa-times-circle fa-3x"></i>';
            echo '</button>';
            echo '</span>';
        echo '</form>';
        }
        echo '</div>';
    }

    private function renderOrderMode(){
        echo '<form method="post" action="">';
        echo '<button class="nextStep adminSwitch" name="userMode" type="submit"><span>Switch to UserMode</span></button>';
        echo '</form>';
        echo '<div class="AdminList">';
        echo '<div class="th">';
            echo '<i class="td">';
            echo 'OrderId';
            echo '</i>';
            echo '<i class="td">';
            echo getContent('Name');
            echo '</i>';
            echo '<i class="td">';
            echo getContent('Street');
            echo '</i>';
            echo '<i class="td">';
            echo getContent('PLZ');
            echo '</i>';
            echo '<i class="td">';
            echo getContent('Ort');
            echo '</i>';
            echo '<i class="td">';
            echo getContent('AnzArtikel');
            echo '</i>';
            echo '<i class="td">';
            echo 'Total';
            echo '</i>';
            echo '<i class="td">';
            echo getContent('Delete');
            echo '</i>';
            echo '</div>';
        foreach($this->displayList as $order){
        echo '<form method="post" action="" class="tr">';
        echo '<input type="hidden" name="mode" value="0"/>';
        echo '<input type="hidden" name="id" value=';
        echo $order->getId();
        echo '"/>';
        echo '<i class="td name">';
        echo $order->getId();
        echo '</i>';
        echo '<i class="td name">';
            echo $order->getName();
            echo '</i>';
            echo '<i class="td street">';
            echo $order->getStreet();
            echo '</i>';
            echo '<i class="td zip">';
            echo $order->getZip();
            echo '</i>';
            echo '<i class="td city">';
            echo $order->getCity();
            echo '</i>';
            echo '<i class="td anz">';
            echo $order->getAnzArtikel();
            echo '</i>';
            echo '<i class="td total">';
            echo $order->getTotalBetrag();
            echo '</i>';
            echo '<span class="td delete">';
            echo '<button class="langButton" type="submit" name="delete">';
            echo '<i class="far fa-times-circle fa-3x"></i>';
            echo '</button>';
            echo '</span>';
        echo '</form>';
        }
        echo '</div>';
    }
}

if(isset($_POST['userMode'])){
    header("Location: /Admin?page=1");
}

if(isset($_POST['orderMode'])){
    header("Location: /Admin?page=2");
}


$view = new AdminView(array(),1);
$control = new AdminController();

if(isset($_POST["mode"])){
    $view->setMode($_POST["mode"]);
}

if(isset($_POST["delete"])){
    $control->delete($_POST["id"], $view->getMode());
}


if(isset($_SESSION["IsAdmin"])){
    if($_SESSION["IsAdmin"] == "1"){
        if(isset($_GET["page"])){
            if($_GET["page"]=="1"){  
                $userList = $control->getUserList();
                $view->setArrayForDisplay($userList);  
                $view->setMode(1);
                $view->render();
            }else{
                $orderList = $control->getOrderList();
                $view->setArrayForDisplay($orderList);
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