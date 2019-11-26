<?php
 //Accesando a la conexión.
include 'Conexion/Conexion.php';
   //Query para obtener los datos del alumno usando la matricula que se trajo de Ingreso.php
   $matricula= $_GET["nombre"];
   $query=pg_query("SELECT id_alumno, nombre_completo, curp, correo_electronico, contrasenia, telefono, celular, matricula_a, id_grupo FROM alumno WHERE matricula_a ='$matricula'");
   //Asigna a una variable cada registro de columna
   while ($row=pg_fetch_array($query))
   {
      $id_alumno = $row['id_alumno'];
      $nombre = $row['nombre_completo'];
      $curp = $row['curp'];
      $correo = $row['correo_electronico'];
      $pass = $row['contrasenia'];
      $telefono = $row['telefono'];
      $celular = $row['celular'];
      $matricula = $row['matricula_a'];
      $id_grupo = $row['id_grupo'];
   }
   //Query para obtener el grupo del alumno usando el id_grupo que se obtuvo del query de arriba
   $query=pg_query("SELECT grupo FROM grupo WHERE id_grupo ='$id_grupo'");
   $grupo=pg_result($query, 0);
   //while ($row=pg_fetch_array($query))
   //{
      //$grupo = $row['grupo'];
   //}
?>

<!doctype html>
<html>
<head>
<LINK REL=StyleSheet HREF="formato1.css" TYPE="text/css" MEDIA=screen>
<meta charset="utf-8">
<title>Alumno</title>
</head>

<body>
<div align="center"><img src="imagenes/kaftka.png"> </div>
<table>
<fieldset id="form">
<legend>Datos del alumno</legend>
<form action="" method="post">
<ol>
   <li><label>Nombre: </label><input type="text" name="nombre" size="25" readonly value="<?php echo "$nombre";?>" /></li>
   <li><label>CURP: </label><input type="text" name="curp" size="25" readonly value="<?php echo "$curp";?>" /></li>
   <li><label>E mail*: </label><input type="email" name="password" size="25" value="<?php echo "$correo";?>" /></li>
   <li><label>Contraseña: </label><input type="password" name="password" disabled size="25" value="<?php echo "$pass";?>" /></li>
   <li><label>Teléfono*: </label><input type="tel" name="telefono" size="25" value="<?php echo "$telefono";?>" /></li>
   <li><label>Celular*: </label><input type="tel" name="celular" size="25" value="<?php echo "$celular";?>" /></li>
   <li><label>Matricula: </label><input type="text" name="matricula" disabled size="25" value="<?php echo "$matricula";?>" /></li>
</ul>
    <p align="center"><input type="submit" name="submit" class="btn" value="Actualizar datos" /></p>
</fieldset>
</form>
</table>

<table>
<fieldset id="form">
<legend>Grupo</legend>
<form action="" method="POST">
<ol>
   <li><label>Grupo: </label><input type="text" name="grupo" size="25" readonly value="<?php echo "$grupo";?>" /></li>
</ul>
    <p align="center"><input type="submit" name="submit" class="btn" value="Ir a evaluaciones" /></p>
</fieldset>
</form>
</table>
</body>
</html>