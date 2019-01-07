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
            echo '<tr class="clickForProduct" data-id="';
            echo $product->getId();
            echo '">';
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
            echo '<i>';
            echo $product->getQuantity();
            echo '</i>';
            echo '</td>';
            echo '<td>';
            echo '<i>';
            echo $product->getPrice();
            echo '</i>';
            echo '</td>';
            echo '</tr>';

        }
        echo '</table>';
        echo '</div>';
    }
}

$model = new Product();
$productList = array();
$controller = new CartController($model);
if(isset($_SESSION["prod"])){
$productList = $controller->GetProductFromSession($_SESSION["prod"], $_SESSION["qty"]);
}
$view = new Cart($productList);
$view->render();
include($_SERVER["DOCUMENT_ROOT"] . "/footer.php");
?>