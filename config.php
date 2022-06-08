<?php

$db = new mysqli("localhost", "root", "", "sklep");
require_once("./vendor/autoload.php");
$smarty = new Smarty();


$smarty->setConfigDir('./configs');

?>