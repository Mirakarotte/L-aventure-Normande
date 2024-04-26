<?php

$sname= "localhost";
$unmae= "root";
$password = "";
$db_name = "logs";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "La connexion a échoué!";
}