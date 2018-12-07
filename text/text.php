<?php
function t($key){
	$texts = array(
	'titel' => array(
	'de'=>'Hard und Software Shop',
	'en'=>'Hard and Software Shop'),
	'seiteTitel' => array(
	'de' => 'Webshop Blaser & Stebler',
	'en' => 'Webshop Blaser & Stebler')
	);
	return $texts[$key][$_SESSION["lang"]] ?? "[$key]";
}

function getContent($key = "") {
	echo t($key);
}
?>