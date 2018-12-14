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
        
    }
}

$cat = 0;

if(isset($_GET['cat'])){
    $cat = $_GET['cat'];
}
echo $cat;

$model = new Product();
$productList = array();
$controller = new OverviewController($model);
$view = new Overview($productList);
$view->render();
include($_SERVER["DOCUMENT_ROOT"] . "/footer.php");
?>