<?php require_once('Connections/coneccion2.php');
$id_sub=$_GET['c'];

$cons=mysql_query("select archivos.*, cateforias.nombre_cat, subcategoria.nombre_sub from archivos, cateforias, subcategoria where 
archivos.portada_archivos='$id_sub' AND
cateforias.id=archivos.categoria_archivos AND subcategoria.id_sb=archivos.portada_archivos ")or die(mysql_error());

$tot=mysql_num_rows($cons);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="95%" border="0" align="center" cellpadding="7" cellspacing="0">
  
    <?php
	if($tot > 0){
	 while ($res=mysql_fetch_array($cons)){
		 $cont ++;
		  if($cont==1){
		  ?>
          <tr>
          <?php }?>
    <td align="center"><table width="50%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="4" align="center"><img src="subir_imagenes/imagenes/<?php echo $res['archivo_archivos']; ?>" alt="" width="100" height="100" /></td>
      </tr>
      <tr>
        <td width="33%" align="right">&nbsp;</td>
        <td width="18%" align="left">Categoria:</td>
        <td width="22%"><?php echo $res['nombre_cat'] ;?></td>
        <td width="27%">&nbsp;</td>
      </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td align="center">-</td>
        <td><?php echo $res['nombre_sub'] ;?></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td align="left">Nombre:</td>
        <td><?php echo $res['nombre_archivos'] ;?></td>
        <td rowspan="4"><a href="javascript:carro(<?php echo $res['id_archivos']; ?>)"><img src="subir_imagenes/imagenes/icon_carrito.png" width="23" height="19" /></a></td>
      </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td align="left">Marca:</td>
        <td><?php echo $res['marca'];?></td>
      </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td align="left">Modelo:</td>
        <td><?php echo $res['modelo'];?></td>
      </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td align="left">Precio:</td>
        <td>$<?php echo number_format($res['precio'],2,".",",");?></td>
      </tr>
    </table></td>
    <?php if($cont==3){?>
    </tr>
    <?php }
	if($cont==3){
		$cont=0;
		}
	 } ?>
  
</table>
<?php }else{
	echo "NO HAY EN EXISTENCIA";
	}?>
</body>
</html>