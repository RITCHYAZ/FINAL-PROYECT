<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<style type="text/css">
<!--
#cotenido {
	position:absolute;
	left:371px;
	top:205px;
	width:328px;
	height:33px;
	z-index:1;
}
-->
</style>
<link href="../estilos.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div align="center" class="txt_rosa" id="cotenido">
  <?php
			$dia=date("m.d.Y");
			$hora=date("H:i:s");
			$destinatario="reacing@artesweb.com.mx";
			$subject= "Contacto";
			$desde = 'From: ' .$_POST['email'];
			$contingut = "Nombre:  " .$_POST['nombre'] .      "           Teléfono:  " .$_POST['tel'].      "           Mensaje:  " .$_POST['mensaje'];
			mail($destinatario, $subject, $contingut, $desde);
			echo "GRACIAS POR CONTACTARNOS EN BREVE LE ATENDEREMOS.";
		  ?>
</div>
</body>
</html>
