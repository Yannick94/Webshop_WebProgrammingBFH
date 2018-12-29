<?php
include($_SERVER["DOCUMENT_ROOT"] . "/model/Product.php");
include($_SERVER["DOCUMENT_ROOT"] . "/control/OverviewControl.php");
include($_SERVER["DOCUMENT_ROOT"] . "/header.php");

class Overview{
    private $productList;

    public function __construct(array $productList) {
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
            echo '</tr>';
        }
        echo '</table>';
        echo '</div>';
    }
}

$cat = 0;

if(isset($_GET['cat'])){
    $cat = $_GET['cat'];
}

$model = new Product();
$productList = array();
$controller = new OverviewController($model);
$productList = $controller->GetProductByCat($cat);
$view = new Overview($productList);
$view->render();
include($_SERVER["DOCUMENT_ROOT"] . "/footer.php");
?>