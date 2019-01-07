<?php
include($_SERVER["DOCUMENT_ROOT"] . "/model/Product.php");
include($_SERVER["DOCUMENT_ROOT"] . "/control/ProductControl.php");
include($_SERVER["DOCUMENT_ROOT"] . "/header.php");

class ProductView{
    private $product;

    public function __construct(Product $product) {
        $this->product = $product;
    }

    public function render(){
        echo '<table class="ProductDetail">';
        echo '<tr>';
        echo '<td>';
        echo '<img class="productOverviewPic" src="';
        echo $this->product->getPicturePath();
        echo '"/>';
        echo '</td>';
        echo '<td>';
        echo '<h2>';
        echo $this->product->getTitle($_SESSION["lang"]);
        echo '</h2>';
        echo '</tr>';
        echo '<tr>';
        echo '<td colspan="2">';
        echo '<h4>';
        echo getContent("BeschreibungTitel");
        echo '</h4>';
        echo '<i>';
        echo $this->product->getDescription($_SESSION["lang"]);
        echo '</i>';
        echo '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>';
        echo '<h4>';
        echo getContent("Preis");
        echo '</h4>';
        echo '</td>';
        echo '<td>';
        echo $this->product->getPrice();
        echo '</td>';
        echo '</tr>';
        echo '</table>';
        echo '<form method="post" action="">';
        echo '<input type="hidden" name="add" value="';
        echo $this->product->getId();
        echo '" />';
        echo '<input type="submit" class="AddToCart" value="';
        echo getContent("InDenEinkaufswagen");
        echo '" ></input>';
        echo '</form>';
    }
}

$prodId = -1;

if(isset($_GET['Id'])){
    $prodId = $_GET['Id'];
}

$model = new Product();
$controller = new ProductController($model);
$model = $controller->getProductById($prodId);
$view = new ProductView($model);
$view->render();

include($_SERVER["DOCUMENT_ROOT"] . "/footer.php");
?>