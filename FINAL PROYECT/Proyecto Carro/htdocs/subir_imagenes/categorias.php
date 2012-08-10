<?php require_once('../Connections/coneccion2.php'); 
$quer=mysql_query("select * from cateforias ")or die(mysql_error());
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Metodo post con ajax</title>
<script language="JavaScript" type="text/javascript">
/*<![CDATA[*/
if ( typeof XMLHttpRequest == "undefined" )
XMLHttpRequest = function(){return new ActiveXObject(navigator.userAgent.indexOf("MSIE 5") >= 0 ?"Microsoft.XMLHTTP" : "Msxml2.XMLHTTP2");};
var ajax=new XMLHttpRequest();

function _Ajax()
{
var nombre=document.getElementById('nombre').value;
ajax.open("POST","lisatdo.php",true);
ajax.onreadystatechange=function(){
    if(ajax.readyState==4)
     {
     var respuesta=ajax.responseText;
     document.getElementById('resultado').innerHTML=respuesta;
     }
    }
ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
ajax.send("nombre="+nombre+"&otravariable=1");
}

function _Ajaxa()
{
var nombre=document.getElementById('LISTA').value;
ajax.open("POST","prueba3.php",true);
ajax.onreadystatechange=function(){
    if(ajax.readyState==4)
     {
     var respuesta=ajax.responseText;
     document.getElementById('cliente').innerHTML=respuesta;
     }
    }
ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
ajax.send("nombre="+nombre);
}
function _Ajaxe()
{
var nombre=document.getElementById('NOM_SUB').value;
var id=document.getElementById('cate').value;
ajax.open("POST","prueba4.php",true);
ajax.onreadystatechange=function(){
    if(ajax.readyState==4)
     {
     var respuesta=ajax.responseText;
     document.getElementById('cliente').innerHTML=respuesta;
     }
    }
ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
ajax.send("nombre="+nombre+"&id="+id);
}

/*]]>*/
</script>
<script stype="text/javascript">
			function refresca(){
				var xmlHttp;
				if (window.XMLHttpRequest)
					  {
					  xmlHttp=new XMLHttpRequest();
					  }
					else
					  {
					  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
					  }
					var fetch_unix_timestamp ="";
					fetch_unix_timestamp = function()
						{
						return parseInt(new Date().getTime().toString().substring(0, 10))
						}
					var timestamp = fetch_unix_timestamp();

					xmlHttp.onreadystatechange=function(){
						if(xmlHttp.readyState==4){
							document.getElementById("list_sub").innerHTML=xmlHttp.responseText;
							setTimeout('refresca()',1000);
						}
						}
				  xmlHttp.open("GET","prueba2.php"+"?t="+timestamp,true);
					xmlHttp.send(null);
			}

			window.onload = function startrefresh(){
					setTimeout('refresca()',1000);
				}
		</script>
        </head>
<body>
<form action="javascript:_Ajaxa();" method="get">
Agregar Categoria: 
<input name="nombre" id="nombre" type="text"/>
<input type="button" name="aceptar" value="Aceptar" onclick="_Ajax();"/>
</form>

<form name="form1" method="get" action="javascript:_Ajaxa();">
  <label for="LISTA"></label>
  Lista de categorias Agregadas<br />
  <div id="resultado">
<select name="LISTA" id="LISTA" accesskey="LISTA" tabindex="LISTA" onChange="muestracliente(this.value)">
  <?php

for($i=0; $i< mysql_num_rows($quer); $i++){
$a=mysql_fetch_array($quer);
$nombre=$a['nombre_cat'];
$id=$a['id'];
	echo'<option value="'.$id.'">'.$nombre.'</option>';
	  
}

?>
</select>
</div>

  <input type="submit" name="button" id="button" value="Agregar Sub Categoria" onclick="_Ajaxa();" />
</form>
<div id="cliente">
</div>
 <div id="list_sub">
 			<script type="text/javascript">
				refresca();
			</script>
 </div>
</body>
</html>