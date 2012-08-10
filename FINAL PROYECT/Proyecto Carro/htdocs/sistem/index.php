<?php require_once('../Connections/coneccion.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

	 $archivos_disp_ar = array('jpg', 'jpeg', 'gif', 'png');
   //carpteta donde vamos a guardar la imagen
  $carpeta = 'imagenes/';
  //recibimos el campo de imagen
  $imagen = $_FILES['imagen']['tmp_name'];
  //guardamos el nombre original de la imagen en una variable
  $nombrebre_orig = $_FILES['imagen']['name'];
  //el proximo codigo es para ver que extension es la imagen
  $array_nombre = explode('.',$nombrebre_orig);
  $cuenta_arr_nombre = count($array_nombre);
  $extension = strtolower($array_nombre[--$cuenta_arr_nombre]);
    if(!in_array($extension, $archivos_disp_ar)) $error = "Este tipo de archivo no es permitido";
  
  if(empty($error)){
  
  //creamos nuevo nombre para que tenga nombre unico
  $nombre_nuevo = time().'_'.rand(0,100).'.'.$extension;
  //nombre nuevo con la carpeta
  $nombre_nuevo_con_carpeta = $carpeta.$nombre_nuevo;
  //por fin movemos el archivo a la carpeta de imagenes
  $mover_archivos = move_uploaded_file($imagen , $nombre_nuevo_con_carpeta);
  //de damos permisos 777
  chmod($nombre_nuevo_con_carpeta,0777);
  
  
  
	  $insertSQL = sprintf("INSERT INTO archivos (tipo_archivos, nombre_archivos, archivo_archivos, extension_archivos, fecha_archivos) VALUES (%s, %s, %s, %s, NOW())",
						   GetSQLValueString($_POST['tipo'], "text"),
						   GetSQLValueString($_POST['nombre'], "text"),
						   ////////////// Parte añadida ////////////// 
						   GetSQLValueString($nombre_nuevo, "text"),
						   GetSQLValueString($extension, "text"))
						   ///////////////////////////////////////////
						   ;

  mysql_select_db($database_coneccion, $coneccion);
  $Result1 = mysql_query($insertSQL, $coneccion) or die(mysql_error());
}
}

mysql_select_db($database_coneccion, $coneccion);
$query_conexion = "SELECT * FROM archivos WHERE tipo_archivos = 'general' ORDER BY fecha_archivos DESC";
$conexion = mysql_query($query_conexion, $coneccion) or die(mysql_error());
$row_conexion = mysql_fetch_assoc($conexion);
$totalRows_conexion = mysql_num_rows($conexion);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" name="form1"  method="POST" enctype="multipart/form-data" id="form1">
  <label for="imagen">nombre</label>
  <input id="nombre" name="nombre" type="text" />
  <label for="imagen">imagen</label>
  <input id="imagen" name="imagen" type="file" />
  <span class="enviar"><input id="enviar" name="enviar" type="submit" value="Enviar" /></span>
  <input id="tipo" name="tipo" type="hidden" value="general" />
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
<?php if ($totalRows_conexion > 0) { // Show if recordset not empty ?>
  <ul>
    <?php do { ?>
      <li><img src="<?php echo $row_conexion['archivo_archivos']; ?>" alt="" width="100" height="100" /><?php echo $row_conexion['nombre_archivos']; ?></li>
      <?php } while ($row_conexion = mysql_fetch_assoc($conexion)); ?>
  </ul>
  <?php } // Show if recordset not empty ?>
</body>
</html>
<?php
mysql_free_result($conexion);
?>
