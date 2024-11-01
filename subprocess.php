<?php
include "connection.php";

$submail = $_POST["submail"];

//echo($submail)

Database::iud("INSERT INTO `sub`(`email`) VALUES ('".$submail."')");

echo("success");



?>