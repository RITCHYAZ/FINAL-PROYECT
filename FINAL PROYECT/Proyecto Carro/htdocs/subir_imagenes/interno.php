<?php  require_once('../Connections/coneccion2.php');
$id= $_GET['c'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<select name="SUB_LISTA" id="SUB_LISTA" accesskey="SUB_LISTA" tabindex="SUB_LISTA">

  <?php
$quer=mysql_query("select * from subcategoria where id_cat='$id'")or die(mysql_error());
for($i=0; $i< mysql_num_rows($quer); $i++){
$a=mysql_fetch_array($quer);
$nombre=$a['nombre_sub'];
$id_s=$a['id_sb'];
	echo'<option value="'.$id_s.'">'.$nombre.'</option>';
	  
}

?>
</select>
</body>
</html>