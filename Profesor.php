<?php
 //Accesando a la conexión.
include 'Conexion/Conexion.php';
   //Query para obtener los datos del profesor usando la matricula que se trajo de Ingreso.php
   $matricula= $_GET["nombre"];
   $query=pg_query("SELECT id_profesor, nombre_completo, curp, correo_electronico, contrasenia, celular, fecha_alta, matricula_p FROM profesor WHERE matricula_p ='$matricula'");
   //Asigna a una variable cada registro de columna
   while ($row=pg_fetch_array($query))
   {
      $id_profesor = $row['id_profesor'];
      $nombre = $row['nombre_completo'];
      $curp = $row['curp'];
      $correo = $row['correo_electronico'];
      $pass = $row['contrasenia'];
      $celular = $row['celular'];
      $fecha = $row['fecha_alta'];
      $matricula = $row['matricula_p'];
   }
   //Query para obtener el grupo del profesor usando el id_profesor que se obtuvo del query de arriba
   $query=pg_query("SELECT grupo FROM grupo WHERE id_profesor ='$id_profesor'");
   while ($row=pg_fetch_array($query))
   {
      $grupo = $row['grupo'];
   }
?>

<!doctype html>
<html>
<head>
<LINK REL=StyleSheet HREF="formato1.css" TYPE="text/css" MEDIA=screen>
<meta charset="utf-8">
<title>Profesor</title>
</head>

<body>

<div align="center"><img src="imagenes/kaftka.png"> </div>

<table>
<fieldset id="form">
<legend>Datos del profesor</legend>
<form action="" method="post">
<ol>
   <li><label>Nombre: </label><input type="text" name="nombre" size="25" readonly value="<?php echo "$nombre";?>" /></li>
   <li><label>CURP: </label><input type="text" name="curp" size="25" readonly value="<?php echo "$curp";?>" /></li>
   <li><label>E mail*: </label><input type="email" name="password" size="25" value="<?php echo "$correo";?>" /></li>
   <li><label>Contraseña: </label><input type="password" name="password" disabled size="25" value="<?php echo "$pass";?>" /></li>
   <li><label>Celular*: </label><input type="tel" name="celular" size="25" value="<?php echo "$celular";?>" /></li>
   <li><label>Fecha alta: </label><input type="text" name="fecha_alta" disabled size="25" value="<?php echo "$fecha";?>" /></li>
   <li><label>Matricula: </label><input type="text" name="matricula" disabled size="25" value="<?php echo "$matricula";?>" /></li>
</ul>
    <p align="center"><input type="submit" name="submit" class="btn" value="Actualizar datos" /></p>
</fieldset>
</form>
</table>

<table>
<fieldset id="form">
<legend>Grupo</legend>
<form action="alumnos_grupo.php" method="POST">
<ol>
   <li><label>Grupo: </label><input type="text" name="grupo" size="25" readonly value="<?php echo "$grupo";?>" /></li>
</ul>
    <p align="center"><input type="submit" name="submit" class="btn" value="Ir a grupo" /></p>
</fieldset>
</form>
</table>

</body>
</html>