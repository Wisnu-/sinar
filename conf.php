<?php 

$dbtype		= "mysql";
$dbhost 	= "localhost";
$dbname		= "huda";
$dbuser		= "root";
$dbpass		= "";

// database connection
$db = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass, array(PDO::ATTR_PERSISTENT => true));
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
// query
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



function hari() {
	return date("j/m/Y");
}
function ganti($str) {
	$ok = explode('/', $str);

	return $ok[2] . '-' . $ok[1] . '-' . $ok[0];
}
function duit($a) {

	return number_format($a, 0, ',', '.');
}