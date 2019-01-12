<?php
include($_SERVER["DOCUMENT_ROOT"] . "/model/Product.php");
include($_SERVER["DOCUMENT_ROOT"] . "/model/User.php");
include($_SERVER["DOCUMENT_ROOT"] . "/control/CheckoutControl.php");
include($_SERVER["DOCUMENT_ROOT"] . "/header.php");

class Checkout{
    private $productList;
    private $userInformation;

    public function __construct(array $productList){
        $this->productList = $productList;
    }

    public function setUserInformationObject(User $user){
        $this->userInformation = $user;
    }

    public function render(){
        echo '<form method="post" action="">';
        echo '<div class="AddressForm">';
        echo '<table>';
        echo '<tr>';
        echo '<td>';
        echo '<i>';
        echo getContent('Name');
        echo ' :</i>';
        echo '</td>';
        echo '<td>';
        echo '<input type="text" name="name" value="';
        echo $this->userInformation->getname();
        echo '" required/>';
        echo '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>';
        echo '<i>';
        echo getContent('Street');
        echo ' :</i>';
        echo '</td>';
        echo '<td>';
        echo '<input type="text" name="street" value="';
        echo $this->userInformation->getstreet();
        echo '" required />';   
        echo '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>';
        echo '<i>';
        echo getContent('PLZ');
        echo ' :</i>';
        echo '</td>';
        echo '<td>';
        echo '<input type="text" name="plz" value="';
        echo $this->userInformation->getzip();
        echo '" required />';       
        echo '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>';
        echo '<i>';
        echo getContent('Ort');
        echo ' :</i>';
        echo '</td>';
        echo '<td>';
        echo '<input type="text" name="city" value="';
        echo $this->userInformation->getcity();
        echo '" required />';   
        echo '</td>';
        echo '</tr>';
        echo '</table>';
        echo '</div>';

        echo '<div class="ProductTable">';
        echo '<div class="th">';
            echo '<i class="td">';
            echo getContent('Picture');
            echo '</i>';
            echo '<i class="td">';
            echo getContent('Product');
            echo '</i>';
            echo '<i class="td">';
            echo getContent('Qunatity');
            echo '</i>';
            echo '<i class="td">';
            echo getContent('Preis');
            echo '</i>';
            echo '<i class="td">';
            echo getContent('Delete');
            echo '</i>';
            echo '</div>';
        foreach($this->productList as $product){
            echo '<div class="tr">';
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
            echo '<i class="td quantity">';
            echo $product->getQuantity();
            echo '</i>';
            echo '<i class="td price">';
            echo $product->getPrice();
            echo '</i>';
            echo '<span class="td delete">';
            echo '<button class="langButton" type="submit" name="delete">';
            echo '<i class="far fa-times-circle fa-3x"></i>';
            echo '</button>';
            echo '</span>';
            echo '</div>';
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
        echo '<i class="td quantity">';
        echo $qty;
        echo '</i>';
        echo '<i class="td price">';
        echo number_format($sum,2,'.','');;
        echo '</i>';
        echo '<i class="td delete">&nbsp;</i>';
        echo '</div>';
        echo '</div>';
        echo '<div class="ProcessCheckout">';
        echo '<button type="submit" name="finishOrder" class="nextStep checkoutBtn"><span>';
        echo getContent('BestellungAbschliessen');
        echo '</span></button>';
        echo '</div>';
        echo '</form>';
    }
}

$model = new Product();
$productList = array();
$user = new User();
$controller = new CheckoutController($user);
if(isset($_SESSION["prod"])&&isset($_SESSION["qty"])){
$productList = $controller->GetProductFromSession($_SESSION["prod"], $_SESSION["qty"]);
}
if(isset($_SESSION["id"])){
    $user = $controller->GetUserInformation($_SESSION["id"]);
}
$view = new Checkout($productList);
$view->setUserInformationObject($user);
if(isset($_POST["finishOrder"])){
    $id = -1;
    if(isset($_SESSION["id"])){
        $id = $_SESSION["id"];
    }
$controller->saveCheckout($productList,$id, $_POST["name"], $_POST["street"], $_POST["plz"], $_POST["city"]);

unset($_SESSION["prod"]);
unset($_SESSION["qty"]);
echo '<h2 class="finished">Bestellung aufgegeben!</h2>';
header('Refresh: 2; Url=/');
}else{
$view->render();
}
include($_SERVER["DOCUMENT_ROOT"] . "/footer.php");
?>