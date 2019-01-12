<?php
function t($key){
	$texts = array(
	'titel' => array(
		'de'=>'Hard und Software Shop',
		'en'=>'Hard and Software Shop'),
	'seiteTitel' => array(
		'de' => 'Webshop Blaser & Stebler',
		'en' => 'Webshop Blaser & Stebler'),
	'loginTitel' => array(
		'de' => "Benutzer Login",
		'en' => "User Login"),
	'EMail' => array(
		'de'=>'E-Mail',
		'en' => 'E-Mail'),
	'Password' => array(
		'de'=>'Passwort',
		'en'=>'Password'),
	'PlaceholderEMail' => array(
		'de'=>'E-Mail eingeben',
		'en'=>'Enter E-Mail'),
	'PlaceholderPassword' => array(
		'de'=>'Passwort eingeben',
		'en'=>'Enter Password'),
	'Cancel' => array(
		'de'=>'Abbrechen',
		'en'=>'Cancel'),
	'Register'=>array(
		'de'=>'Registrieren',
		'en'=>'Register'),
	'Login'=>array(
		'de'=>'Einloggen',
		'en'=>'Login'),
	'RepeatPassword' => array(
		'de'=>'Passwort wiederholen',
		'en'=>'Repeat Password'),
	'PlaceholderRepeatPassword'=> array(
		'de'=>'Passwort wiederholen',
		'en'=>'Repeat Password'),
	'EMailVorhanden'=>array(
		'de'=>'EMail bereits vorhanden!',
		'en'=>'Email already registered!'),
	'Logout'=>array(
		'de'=>'Ausloggen',
		'en'=>'Logout'),
	'BeschreibungTitel'=>array(
		'de'=>'Beschreibung',
		'en'=>'Description'),
	'InDenEinkaufswagen'=>array(
		'de'=>'In den Einkaufswagen',
		'en'=>'Add to Cart'),
	'Preis'=>array(
		'de'=>'Preis',
		'en'=>'Price'),
	'AnzArtikel'=>array(
		'de'=>'Anz Artikel',
		'en'=>'Article Count'),
	'Picture'=>array(
		'de'=>'Bild',
		'en'=>'Picture'),
	'Product'=>array(
		'de'=>'Produkt',
		'en'=>'Product'),
	'Add'=>array(
		'de'=>'Plus',
		'en'=>'Add'),
	'Qunatity'=>array(
		'de'=>'Stück',
		'en'=>'Qunatity'),
	'Sub'=>array(
		'de'=>'Minus',
		'en'=>'Substract'),
	'Delete'=>array(
		'de'=>'Entfernen',
		'en'=>'Delete')
	);
	return $texts[$key][$_SESSION["lang"]] ?? "[$key]";
}

function getContent($key = "") {
	echo t($key);
}
?>