<!doctype html>
<html>
<head>
<LINK REL=StyleSheet HREF="formato.css" TYPE="text/css" MEDIA=screen>
<meta charset="utf-8">
<title>Dar de alta un empleado</title>
<style>
html {
    min-height: 100%;
}
 
body {
    background: -webkit-linear-gradient(left, rgb(141, 141, 141), rgb(234, 235, 233)); 
    background: -o-linear-gradient(right, rgb(141, 141, 141), rgb(234, 235, 233));
    background: -moz-linear-gradient(right, rgb(141, 141, 141), rgb(211, 211, 211)); 
    background: linear-gradient(to right, rgb(141, 141, 141), rgb(234, 235, 233)); 
    background-color: rgb(141, 141, 141); 
}
</style>
</head>

<body>

<div align="center"><img src="imagenes/kaftka.png"> </div>

<table>
<fieldset id="form">
<legend>Datos de empleado</legend>
<form action="" method="post">
<ol>
    <li><label>Nombre: </label><input type="text" name="name" size="25" /></li>
</ul>
    <p align="center"><input type="submit" name="submit" class="btn" value="Enviar" /></p>
</fieldset>
</form>
</table>

<?php
if(isset($_POST["submit"]))
{
 
 //Including Conexión file.
include 'Conexion.php';
 
$name=$_POST["name"];

pg_query("INSERT INTO Empleado (Nombre_completo) VALUES ('$name')"); 

}

 ?>

</body>
</html>