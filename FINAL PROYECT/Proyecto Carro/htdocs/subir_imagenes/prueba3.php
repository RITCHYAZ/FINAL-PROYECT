<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="javascript:_Ajaxe()">
  Nombre de Subcategoria  :
  <label for="NOM_SUB"></label>
  <input type="text" name="NOM_SUB" id="NOM_SUB" />
  <input type="submit" name="button" id="button" value="0K" onclick="_Ajaxe()" />
  <input type="hidden" name="cate" id="cate" value="<?php echo $_POST['nombre']; ?>" />
</form>
</body>
</html>