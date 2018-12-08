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
	'Username' => array(
		'de'=>'Benutzername',
		'en' => 'Username'),
	'Password' => array(
		'de'=>'Passwort',
		'en'=>'Password'),
	'PlaceholderUsername' => array(
		'de'=>'Benutzername eingeben',
		'en'=>'Enter Username'),
	'PlaceholderPassword' => array(
		'de'=>'Passwort eingeben',
		'en'=>'Enter Password'),
	'Cancel' => array(
		'de'=>'Abbrechen',
		'en'=>'Cancel'),
	'Register'=>array(
		'de'=>'Registrieren',
		'en'=>'Register')
	);
	return $texts[$key][$_SESSION["lang"]] ?? "[$key]";
}

function getContent($key = "") {
	echo t($key);
}
?>