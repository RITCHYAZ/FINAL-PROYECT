<?php
session_start();
require_once('Connections/coneccion2.php');
$clav=$_SESSION['varsession'];
$quer=mysql_query("SELECT carrito. * , archivos. * , cateforias. * , subcategoria. *  FROM carrito, archivos, cateforias, subcategoria WHERE carrito.clave ='$clav' AND vandera =0 AND archivos.id_archivos = carrito.id_archivos AND subcategoria.id_sb = archivos.portada_archivos AND cateforias.id = archivos.categoria_archivos ")or die(mysql_error());

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="estilos.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="90%" border="0" align="center" cellpadding="2" cellspacing="0">

  <tr class="txt_blanco">
    <td>&nbsp;</td>
    <td>Nombre</td>
    <td>Categoria</td>
    <td>-</td>
    <td>Marca</td>
    <td>Modelo</td>
    <td>Precio</td>
    <td>Cantidad</td>
    <td>Subtotal</td>
  </tr>
   <?php while ($alma=mysql_fetch_array($quer)){?>
  <tr>
    <td><img src="subir_imagenes/imagenes/<?php echo $alma['archivo_archivos']; ?>" alt="" width="100" height="100" /></td>
    <td><?php echo $alma['nombre_archivos'];?></td>
    <td><?php echo $alma['nombre_cat'] ;?></td>
    <td><?php echo $alma['nombre_sub'] ;?></td>
    <td><?php echo $alma['marca'];?></td>
    <td><?php echo $alma['modelo'];?></td>
    <td><?php echo $alma['precio'];?></td>
    <td><?php echo $alma['cantidad']; ?></td>
    <td>$<?php $suma=($alma['cantidad']*$alma['precio']);  echo number_format($suma,2,".",",")?></td>
  </tr>
   <?php $total=($alma['cantidad']*$alma['precio']) + $total; }?>
  <tr>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td colspan="2" align="right">IVA</td>
     <td>$<?php $IVA=($total*16)/100; echo number_format($IVA,2,".",",") ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" align="right">Sub Total:</td>
    <td>$<?php echo number_format($total,2,".",",") ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" align="right">Total:</td>
    <td>$<?php  $TOT_F=$total+$IVA; echo number_format($TOT_F,2,".",",")?></td>
  </tr>
 
</table>
<form id="form1" name="form1" method="post" action="javascript:_Ajax()">
  <table width="90%" border="0" align="center" cellpadding="1" cellspacing="0">
    <tr>
      <td colspan="4" align="center" >DATOS DEL CLIENTE</td>
    </tr>
    <tr>
      <td width="23%" >&nbsp;</td>
      <td width="20%" >Nombre:</td>
      <td width="33%" ><label for="NOMBRE"></label>
      <input type="text" name="NOMBRE" id="NOMBRE" /></td>
      <td width="24%" >&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Apellidos:</td>
      <td><label for="APS"></label>
      <input type="text" name="APS" id="APS" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Telefono:</td>
      <td><label for="TELEFONO"></label>
      <input type="text" name="TELEFONO" id="TELEFONO" />        <label for="DIRECCION"></label></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Direccion:</td>
      <td><label for="DIRECCION"></label>
      <input type="text" name="DIRECCION" id="DIRECCION" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>RFC:</td>
      <td><label for="RFC"></label>
      <input type="text" name="RFC" id="RFC" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>C.P.</td>
      <td><label for="CP"></label>
      <input type="text" name="CP" id="CP" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Correo Electronico</td>
      <td><label for="EMAIL"></label>
      <input type="text" name="EMAIL" id="EMAIL" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="ok" id="ok" value="Enviar Pedido" onclick="_Ajax()" /></td>
    </tr>
  </table>
</form>
<br />
</body>
</html>