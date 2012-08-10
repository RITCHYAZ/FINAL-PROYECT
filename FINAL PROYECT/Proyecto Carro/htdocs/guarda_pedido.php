<?php
session_start();
require_once('Connections/coneccion2.php');
$clav=$_SESSION['varsession'];
$nom=$_POST['nombre'];
$ap=$_POST['aps'];
$tel=$_POST['telefono'];
$dir=$_POST['direccion'];
$rfc=$_POST['rfc'];
$cp=$_POST['cp'];
$email=$_POST['email'];

$val=mysql_query("select * from pedido where clave='$clav'")or die(mysql_error());
$filass=mysql_num_rows($val);
if($filass==0){

$ins=mysql_query("insert into pedido (nombre_cl, aps, tel, dir, rfc, cp, email, clave )values('$nom', '$ap', '$tel', '$dir', '$rfc', '$cp', '$email','$clav')")or die (mysql_error() );

$sob=mysql_query("update carrito set vandera=1 where clave='$clav'")or die(mysql_error());

unset($_SESSION['varsession']);

}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<p>SU PEDIDO FUE ENVIADO, PRONTO NOS PONDREMOS EN CONTACTO CON USTED</p>
<p>GRACIAS POPR COMPRAR CON NOSTROS </p>
</body>
</html>