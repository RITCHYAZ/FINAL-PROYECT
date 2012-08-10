<?php
session_start();
require_once('Connections/coneccion2.php');
//$_SESSION['VAR']=;
$id=$_GET['c'];
$var_s=mysql_query("select clave from carrito order by clave desc limit 1")or die(mysql_error());
$res_vs=mysql_fetch_array($var_s);
if(isset ($_SESSION['varsession'])){


}else{
	$_SESSION['varsession']=$res_vs['clave']+1;

	}
$clav=$_SESSION['varsession'];
$val=mysql_query("select * from carrito where id_archivos='$id' AND clave='$clav' ")or die(mysql_error());
$val_cuan=mysql_num_rows($val);
if($val_cuan==0){


$ins_carro=mysql_query("insert into carrito(id_archivos, cantidad, clave, vandera)values('$id',1,'$clav',0) ")or die(mysql_error());
}
$cons=mysql_query("select carrito.*, archivos.* from carrito, archivos where archivos.id_archivos=carrito.id_archivos AND carrito.clave='$clav'")or die(mysql_error());


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
  <table width="85%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="5" align="center">CARRITO</td>
    </tr>
    <tr>
      <td>Nombre </td>
      <td>Precio</td>
      <td>Cantidad</td>
      <td>Total</td>
      <td>E</td>
    </tr>
    <?php while ($res=mysql_fetch_array($cons)){ ?>
    <tr>
      <td><?php echo $res['nombre_archivos'];?></td>
      <td><?php echo number_format($res['precio'],2,".",",") ;?></td>
      <td><label for="CANTIDAD"></label>
      <input name="CANTIDAD" type="text" id="CANTIDAD" accesskey="CANTIDAD" tabindex="CANTIDAD" size="5" maxlength="5" value="<?php echo $res['cantidad'] ?>" onKeyUp="cantidad(this.value,<?php echo $res['id_carro'];?>)" /></td>
      <td>$
      <?php $TOTS=$res['precio']*$res['cantidad']; echo number_format($TOTS,2,".",",")?></td>
      <td><a href="javascript:borrar(<?php echo $res['id_carro']; ?>)">x</a></td>
    </tr>
    <?php  $total=($res['precio']*$res['cantidad'])+$total; }?>
    <tr>
      <td colspan="3" align="right">Subtotal:</td>
      <td colspan="2">$<?php echo number_format($total,2,".",",");   ?></td>
    </tr>
    <tr>
      <td colspan="5" align="center"><a href="javascript:almacen(<?php echo $clav;?>)">Realizar Pedido</a></td>
    </tr>
  </table>

</body>
</html>
