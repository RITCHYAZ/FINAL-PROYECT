<?php 
require_once('../Connections/coneccion2.php');
$nom=$_POST['nombre'];
$id=$_POST['id'];
$consul=mysql_query("select * from subcategoria where nombre_sub= '$nom'")or die(mysql_error());
$tot=mysql_num_rows($consul);
if($tot > 0){
	
	}else{
if (mysql_query("insert into subcategoria (id_cat, nombre_sub) values($id, '$nom')")or die(mysql_error())){
	
	echo "se han guardado correctamente los datos";
	}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>