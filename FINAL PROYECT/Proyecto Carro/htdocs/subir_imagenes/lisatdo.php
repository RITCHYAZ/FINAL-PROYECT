<script language="JavaScript" type="text/javascript">
/*<![CDATA[*/
if ( typeof XMLHttpRequest == "undefined" )
XMLHttpRequest = function(){return new ActiveXObject(navigator.userAgent.indexOf("MSIE 5") >= 0 ?"Microsoft.XMLHTTP" : "Msxml2.XMLHTTP2");};
var ajax=new XMLHttpRequest();

function _Ajax2()
{
var LISTA=document.getElementById('LISTA').value;
ajax.open("POST","prueba2.php",true);
ajax.onreadystatechange=function(){
    if(ajax.readyState==4)
     {
     var respuesta=ajax.responseText;
     document.getElementById('prueba').innerHTML=respuesta;
     }
    }
ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
ajax.send("cat="+LISTA);
}
/*]]>*/
</script>

<?php
 require_once('../Connections/coneccion2.php'); 
$nom=$_POST['nombre'];
$quer=mysql_query("select * from cateforias ")or die(mysql_error());
for($i=0; $i< mysql_num_rows($quer); $i++){
$a=mysql_fetch_array($quer);
	if($a['nombre_cat']==$nom){
		$van=1;
		}  
}
if($van==1){
	echo  "***** Esa categoria ya existe ********";
	}else{
if($cons=mysql_query("insert into cateforias (nombre_cat) values ('$nom')")or die(mysql_error())){
	}else {
		echo " NO se hga almacenado correctamenbte<br>"; 
		}
$quer=mysql_query("select * from cateforias ")or die(mysql_error());
?>

    <label for="LISTA"></label>
<select name="LISTA" id="LISTA" accesskey="LISTA" tabindex="LISTA">
      <?php
for($i=0; $i< mysql_num_rows($quer); $i++){
$a=mysql_fetch_array($quer);
$nombre=$a['nombre_cat'];
$id=$a['id'];
	echo'<option value="'.$id.'">'.$nombre.'</option>';
}

?>
    </select>




<?php
}
 ?>
<br>
<div id="prueba">
</div>

