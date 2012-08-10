<?php
session_start();
 require_once('Connections/coneccion2.php');
$cons=mysql_query("select archivos.*, cateforias.nombre_cat, subcategoria.nombre_sub from archivos, cateforias, subcategoria where cateforias.id=archivos.categoria_archivos AND subcategoria.id_sb=archivos.portada_archivos  order by fecha_archivos desc limit 3")or die(mysql_error());
$cons_cat=mysql_query("select * from cateforias")or die(mysql_error());

$var_s=mysql_query("select clave from carrito order by clave desc limit 1")or die(mysql_error());
$res_vs=mysql_fetch_array($var_s);
if(isset ($_SESSION['varsession'])){


}else{
	$_SESSION['varsession']=$res_vs['clave']+1;

	}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
<style type="text/css">
body,td,th {
	font-family: "Lucida Console", Monaco, monospace;
	font-size: 14px;
}
a img,table{
border:0px;
}
body {
	margin-left: 0px;
	margin-top: 80px;
	margin-right: 0px;
	margin-bottom: 0px;
}
#izquierda{
	position:absolute;
	left:0;
	top:80px;
	width:20%;
	height:100%;
	}
a:link {
	color: #069;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #333;
}
a:hover {
	text-decoration: none;
	color: #333;
}
a:active {
	text-decoration: none;
}
</style>
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
					 document.getElementById("lista").innerHTML=xmlhttp.responseText;
					 }
				  }
			  	xmlhttp.open("GET","busca_sub.php?c="+str,true);
				xmlhttp.send();
			}
		function carro(str){
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
					 document.getElementById("carrito").innerHTML=xmlhttp.responseText;
					 }
				  }
			  	xmlhttp.open("GET","carro.php?c="+str,true);
				xmlhttp.send();
			}
		function cantidad(str,id){
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
					 document.getElementById("carrito").innerHTML=xmlhttp.responseText;
					 }
				  }
			  	xmlhttp.open("GET","deita.php?c="+str+"&id="+id,true);
				xmlhttp.send();
			}
			function borrar(str){
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
					 document.getElementById("carrito").innerHTML=xmlhttp.responseText;
					 }
				  }
			  	xmlhttp.open("GET","borrar.php?c="+str,true);
				xmlhttp.send();
			}
		function almacen(str){
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
					 document.getElementById("lista").innerHTML=xmlhttp.responseText;
					 }
				  }
			  	xmlhttp.open("GET","alamcen.php?c="+str,true);
				xmlhttp.send();
			}
			if ( typeof XMLHttpRequest == "undefined" )
XMLHttpRequest = function(){return new ActiveXObject(navigator.userAgent.indexOf("MSIE 5") >= 0 ?"Microsoft.XMLHTTP" : "Msxml2.XMLHTTP2");};
var ajax=new XMLHttpRequest();

function _Ajax()
{
var nombre=document.getElementById('NOMBRE').value;
var aps=document.getElementById('APS').value;
var telefono=document.getElementById('TELEFONO').value;
var direccion=document.getElementById('DIRECCION').value;
var rfc=document.getElementById('RFC').value;
var cp=document.getElementById('CP').value;
var email=document.getElementById('EMAIL').value;
ajax.open("POST","guarda_pedido.php",true);
ajax.onreadystatechange=function(){
    if(ajax.readyState==4)
     {
     var respuesta=ajax.responseText;
     document.getElementById('lista').innerHTML=respuesta;
     }
    }
ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
ajax.send("nombre="+nombre+"&aps="+aps+"&telefono="+telefono+"&direccion="+direccion+"&rfc="+rfc+"&cp="+cp+"&email="+email);
}

		</script>
<link href="estilos.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="contenedor" align="right" style="width:80%; margin-left:auto;">
  <div id="cabeza">
    </div>
<div id="izquierda">
    	<div id="categorias">
    	  <table width="95%" border="0" cellspacing="0" cellpadding="0">
    	    <tr>
    	      <td align="center" class="txt_blanco">CATEGORIAS<br />
   	          <br /></td>
  	      </tr>
    	    <?php  while($res_cat=mysql_fetch_array($cons_cat)){?>
            <tr>
    	      <td><?php echo $res_cat['nombre_cat']; ?></td>
  	      </tr>
          <?php $cons_sub=mysql_query("select * from subcategoria where id_cat=".$res_cat['id']."")or die(mysql_error()); 
		   while($res_sub=mysql_fetch_array($cons_sub)){?>
            <tr>            
    	      <td> - -<a href="javascript:showselect(<?php echo $res_sub['id_sb']; ?>)"><?php echo $res_sub['nombre_sub']; ?></a></td>
              
  	      </tr>
          <?php }}?>
  	    </table>
        </div>
    <div id="carrito">
    
      <table width="85%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td colspan="6" align="center"><br />
            <br />
          CARRITO</td>
        </tr>
        <tr>
          <td>Nombre</td>
          <td>Precio</td>
          <td>Cantidad</td>
          <td>Total</td>
          <td>M</td>
          <td>E</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" align="right">Subtotal:</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="6" align="center">Realizar Pedido</td>
        </tr>
      </table>
    </div>
    </div>
    <div id="lista">
      <table width="95%" border="0" align="center" cellpadding="7" cellspacing="0">
        <tr>
          <?php while ($res=mysql_fetch_array($cons)){ ?>
          <td><table width="85%" border="0" cellspacing="0" cellpadding="3">
            <tr>
              <td colspan="4" align="center"><img src="subir_imagenes/imagenes/<?php echo $res['archivo_archivos']; ?>" alt="" width="100" height="100" /></td>
            </tr>
            <tr>
              <td align="right">&nbsp;</td>
              <td align="left">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
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
              <td rowspan="4" valign="bottom"><a href="javascript:carro(<?php echo $res['id_archivos'];  ?>)"><img src="subir_imagenes/imagenes/icon_carrito.png" width="23" height="19" /></a></td>
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
              <td>$<?php echo number_format($res['precio'],2,".",",") ;?></td>
            </tr>
          </table></td>
          <?php  } ?>
        </tr>
      </table>
    </div>

    
</div>

</body>
</html>