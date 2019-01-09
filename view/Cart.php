<?php
include($_SERVER["DOCUMENT_ROOT"] . "/model/Product.php");
include($_SERVER["DOCUMENT_ROOT"] . "/control/CartControl.php");
include($_SERVER["DOCUMENT_ROOT"] . "/header.php");

class Cart{
    private $productList;

    public function __construct(array $productList){
        $this->productList = $productList;
    }

    public function render(){
        echo '<div class="ProductList">';
        echo '<table>';
        foreach($this->productList as $product){
            echo '<form method="post" action="">';
            echo '<input type="hidden" name="id" value="';
            echo $product->getId();
            echo '"/>';
            echo '<tr>';
            echo '<td>';
            echo '<img class="productOverviewPic" src="';
            echo $product->getPicturePath();
            echo '"/>';
            echo '</td>';
            echo '<td>';
            echo '<i>';
            echo $product->getTitle($_SESSION["lang"]);
            echo '</i>';
            echo '</td>';
            echo '<td>';
            echo '<button class="langButton" type="submit" name="Add">';
            echo '<i class="fas fa-plus-circle fa-3x"></i>';
            echo '</button>';
            echo '</td>';
            echo '<td>';
            echo '<i>';
            echo $product->getQuantity();
            echo '</i>';
            echo '</td>';
            echo '<td>';
            echo '<button class="langButton" type="submit" name="Sub">';
            echo '<i class="fas fa-minus-circle fa-3x"></i>';
            echo '</button>';
            echo '</td>';
            echo '<td>';
            echo '<i>';
            echo $product->getPrice();
            echo '</i>';
            echo '</td>';
            echo '<td>';
            echo '<button class="langButton" type="submit" name="delete">';
            echo '<i class="far fa-times-circle fa-3x"></i>';
            echo '</button>';
            echo '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<Button type="submit" name="Checkout"/>';
            echo '</tr>'
            echo '</form>';

        }
        echo '</table>';
        echo '</div>';
    }
}

if(isset($_POST["Add"])){
    $pos = array_search($_POST["id"], $_SESSION["prod"]);
    $_SESSION["qty"][$pos] += 1; 
    header("Refresh: 0");
}

if(isset($_POST["Sub"])){
    $pos = array_search($_POST["id"], $_SESSION["prod"]);
    if($_SESSION["qty"][$pos]>1){
        $_SESSION["qty"][$pos] -= 1; 
    }else{
        $prodarray = array();
    $qtyarray = array();
    $counter = 0;
    foreach($_SESSION["prod"] as $prod){
        if($counter !== $pos){
            array_push($prodarray,$prod);
        }
        $counter = $counter + 1;
    }
    $counter = 0;
    foreach($_SESSION["qty"] as $qty){
        if($counter !== $pos){
            array_push($qtyarray, $qty);
        }
        $counter = $counter + 1;
    }
    unset($_SESSION["prod"]);
    unset($_SESSION["qty"]);
    $_SESSION["prod"] = $prodarray;
    $_SESSION["qty"] = $qtyarray;
    }
    header("Refresh: 0");
}

if(isset($_POST["delete"])){
    $pos = array_search($_POST["id"], $_SESSION["prod"]);
    $prodarray = array();
    $qtyarray = array();
    $counter = 0;
    foreach($_SESSION["prod"] as $prod){
        if($counter !== $pos){
            array_push($prodarray,$prod);
        }
        $counter = $counter + 1;
    }
    $counter = 0;
    foreach($_SESSION["qty"] as $qty){
        if($counter !== $pos){
            array_push($qtyarray, $qty);
        }
        $counter = $counter + 1;
    }
    unset($_SESSION["prod"]);
    unset($_SESSION["qty"]);
    $_SESSION["prod"] = $prodarray;
    $_SESSION["qty"] = $qtyarray;
    header("Refresh: 0");
}

$model = new Product();
$productList = array();
$controller = new CartController($model);
if(isset($_SESSION["prod"])&&isset($_SESSION["qty"])){
$productList = $controller->GetProductFromSession($_SESSION["prod"], $_SESSION["qty"]);
}
$view = new Cart($productList);
$view->render();
include($_SERVER["DOCUMENT_ROOT"] . "/footer.php");
?>