<?php require_once('../Connections/coneccion.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

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
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
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
  
  ////////////// Parte añadida 1 ////////////// 
  //array de archivos disponibles
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
  
  //validamos la extension
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
	  
	  ///////////////////////////////////////////
	 $mar=$_POST['marca'];
	 $mod=$_POST['modelo'];
	 $pre=$_POST['precio'];
	 $lis=$_POST['LISTA']; 
	 $sub=$_POST['SUB_LISTA'];
	   // se agrega "archivo_archivos, extension_archivos y la fecha" a la consulta y dos extra %s separados por comas
	  $insertSQL = sprintf("INSERT INTO archivos (categoria_archivos , tipo_archivos, nombre_archivos,marca,modelo,precio, archivo_archivos, extension_archivos,  portada_archivos, fecha_archivos ) VALUES ('$lis',%s, %s, '$mar','$mod','$pre', %s, %s, '$sub', NOW())",
						   
						   GetSQLValueString($_POST['tipo'], "text"),
						   GetSQLValueString($_POST['nombre'], "text"),
						   ////////////// Parte añadida ////////////// 
						   GetSQLValueString($nombre_nuevo, "text"),
						   GetSQLValueString($extension, "text"))
						   
						   ///////////////////////////////////////////
						   ;
	
	  mysql_select_db('reacing', $coneccion);
	  $conexion = mysql_query($insertSQL, $coneccion) or die(mysql_error());
	}
}


mysql_select_db('reacing', $coneccion);
$query_conexion = "SELECT * FROM archivos WHERE tipo_archivos = 'general' ORDER BY fecha_archivos DESC";
$conexion = mysql_query($query_conexion, $coneccion) or die(mysql_error());
$row_conexion = mysql_fetch_assoc($conexion);
$totalRows_conexion = mysql_num_rows($conexion);
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Subir imágenes al servidor con Dreamweaver</title>
<link rel="stylesheet" type="text/css" href="css/general.css">
<script type="text/javascript">
			function showselect(str){
				var xmlhttp; 
				if (str=="")
				  {
				  document.getElementById("txtHint").innerHTML="";
				  return;
				  }
				if (window.XMLHttpRequest)
				  {// code for IE7+, Firefox, Chrome, Opera, Safari
				  xmlhttp=new XMLHttpRequest();
				  }
				else
				  {// code for IE6, IE5
				  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				  }
				xmlhttp.onreadystatechange=function()
				  {
				  if (xmlhttp.readyState==4 && xmlhttp.status==200)
					 {
					 document.getElementById("recarga").innerHTML=xmlhttp.responseText;
					 }
				  }
			  	xmlhttp.open("GET","interno.php?c="+str,true);
				xmlhttp.send();
			}
		</script>
</head>

<body>
<h1>Subir Productos al servidor  </h1>
<?php if(!empty($error)) echo $error; ?>
<form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="form1" id="form1">
  
  <label for="imagen">Categoria</label>
  <select name="LISTA" id="LISTA" accesskey="LISTA" tabindex="LISTA" onChange="showselect(this.value)">
  <option>Selecciona </option>
    <?php
$quer=mysql_query("select * from cateforias ")or die(mysql_error());
for($i=0; $i< mysql_num_rows($quer); $i++){
$a=mysql_fetch_array($quer);
$nombre=$a['nombre_cat'];
$id=$a['id'];
	echo'<option value="'.$id.'">'.$nombre.'</option>';
	  
}

?>
  </select>
<label for="imagen">Sub Categoria</label>
    <div id="recarga">
    	<label for="select"></label>
   	  <select name="SUB_LISTA" id="select">
  	  </select>
    </div>
  <label for="imagen">Nombre</label>
  <input type="text" name="nombre" id="nombre">
  <label for="imagen">Marca</label>
  <input type="text" name="marca" id="marca">
  <label for="imagen">Modelo</label>
  <input type="text" name="modelo" id="modelo">
  <label for="imagen">Precio</label>
  <input type="text" name="precio" id="precio">
  <label for="imagen">Imagen</label>
  <input type="file" name="imagen" id="imagen">
  <span class="enviar"><input type="submit" name="enviar" id="enviar" value="Enviar"></span>
  <input name="tipo" type="hidden" id="tipo" value="general">
  <input type="hidden" name="MM_insert" value="form1">
</form>



<p>&nbsp;</p>

<?php if ($totalRows_conexion > 0) { // Show if recordset not empty ?>
<ul>
    <?php do { ?>
      <li><img src="imagenes/<?php echo $row_conexion['archivo_archivos']; ?>" alt="<?php echo $row_conexion['nombre_archivos']; ?>" width="100" height="100"> <?php echo $row_conexion['nombre_archivos']; ?></li>
      <?php } while ($row_conexion = mysql_fetch_assoc($conexion)); ?>
</ul>
<?php } // Show if recordset not empty ?>
<p>&nbsp;</p>


</body>
</html>
<?php
mysql_free_result($conexion);
?>
