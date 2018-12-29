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

    }
}

$prodId = -1;

if(isset($_GET['Id'])){
    $prodId = $_GET['Id'];
}

$model = new Product();
$controller = new ProductController($model);
$view = new ProductView($model);
$view->render();

include($_SERVER["DOCUMENT_ROOT"] . "/footer.php");
?>