<?php
require_once('../Connections/coneccion2.php'); 



$resultado = mysql_query("select cateforias.nombre_cat, subcategoria.nombre_sub from cateforias, subcategoria where  cateforias.id=subcategoria.id_cat order by nombre_cat;") or die(mysql_error());

 ?>
 <table border="1">
     <tr>
     	<td>Categoria</td><td>Subcategoria</td>     
     </tr>
 <?php
while($fila = mysql_fetch_array($resultado)){	
	?>	
    	<tr>
        	<td><?php echo $fila['nombre_cat']; ?></td><td><?php echo $fila['nombre_sub']; ?></td>
        </tr>	
	<?php
		}
 ?>
     </table>
 <?php

?>

