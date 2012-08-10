<?php
//Conexión con la base de datos
$host="localhost";
$user="root";
$password="root";
$db="reacing";

$enlace= mysql_connect($host, $user, $password) or die("No se pudo conectar a la Base de datos") or die(mysql_error());
mysql_select_db($db,$enlace) or die(mysql_error());
?>