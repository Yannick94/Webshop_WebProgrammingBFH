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
        echo '<div class="ProductTable">';
        echo '<div class="th">';
            echo '<i class="td">';
            echo getContent('Picture');
            echo '</i>';
            echo '<i class="td">';
            echo getContent('Product');
            echo '</i>';
            echo '<i class="td">';
            echo getContent('Add');
            echo '</i>';
            echo '<i class="td">';
            echo getContent('Qunatity');
            echo '</i>';
            echo '<i class="td">';
            echo getContent('Sub');
            echo '</i>';
            echo '<i class="td">';
            echo getContent('Preis');
            echo '</i>';
            echo '<i class="td">';
            echo getContent('Delete');
            echo '</i>';
            echo '</div>';
        foreach($this->productList as $product){
            echo '<form method="post" action="" class="tr">';
            echo '<input type="hidden" name="id" value="';
            echo $product->getId();
            echo '"/>';
            echo '<span class="td productPic">';
            echo '<img class="productCartPic" src="';
            echo $product->getPicturePath();
            echo '"/>';
            echo '</span>';
            echo '<i class="td title">';
            echo $product->getTitle($_SESSION["lang"]);
            echo '</i>';
            echo '<span class="td add">';
            echo '<button class="langButton" type="submit" name="Add">';
            echo '<i class="fas fa-plus-circle fa-3x"></i>';
            echo '</button>';
            echo '</span>';
            echo '<i class="td quantity">';
            echo $product->getQuantity();
            echo '</i>';
            echo '<span class="td sub">';
            echo '<button class="langButton" type="submit" name="Sub">';
            echo '<i class="fas fa-minus-circle fa-3x"></i>';
            echo '</button>';
            echo '</span>';
            echo '<i class="td price">';
            echo $product->getPrice();
            echo '</i>';
            echo '<span class="td delete">';
            echo '<button class="langButton" type="submit" name="delete">';
            echo '<i class="far fa-times-circle fa-3x"></i>';
            echo '</button>';
            echo '</span>';
            echo '</form>';
        }
        $qty = array_reduce($this->productList, function($i, $obj)
        {
            return $i += $obj->Quantity;
        });
        $sum = array_reduce($this->productList, function($i, $obj)
        {
            return $i += $obj->Price*$obj->Quantity;
        });
        echo '<div class="tr">';
        echo '<i class="td productPic">Total</i>';
        echo '<i class="td title">&nbsp;</i>';
        echo '<i class="td add">&nbsp;</i>';
        echo '<i class="td quantity">';
        echo $qty;
        echo '</i>';
        echo '<i class="td sub">&nbsp;</i>';
        echo '<i class="td price">';
        echo number_format($sum,2,'.','');;
        echo '</i>';
        echo '<i class="td delete">&nbsp;</i>';
        echo '</div>';
        echo '</div>';
        echo '<div class="checkout">';
        echo '<form method="post" action="">';
        echo '<button class="nextStep checkoutBtn" type="submit" name="checkout"><span>Checkout </span></button>';
        echo '</form>';
        echo '</div>';
    }
}

if(isset($_POST["checkout"])){
    header("Location: /Checkout");
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