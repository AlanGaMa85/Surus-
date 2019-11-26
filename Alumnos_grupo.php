<?php
 //Accesando a la conexión.
include 'Conexion/Conexion.php';
   //Query para obtener los datos de alumnos inscritos por grupo de profesor.
   $grupo= $_POST["grupo"];
   $id_grupo=pg_query("SELECT id_grupo FROM grupo where grupo = '$grupo'");
   $id=pg_result($id_grupo, 0);
   $query=pg_query("SELECT id_alumno, nombre_completo, matricula_a FROM alumno where id_grupo = $id");
?>

<!DOCTYPE html>
<html>
<head>
<LINK REL=StyleSheet HREF="formato.css" TYPE="text/css" MEDIA=screen>
<meta charset="utf-8">
<title>Alumnos registrados en el grupo</title>
</head>
<body>
<div align="center"><img src="imagenes/kaftka.png"> </div>
<table width="70%" border="1px" bordercolor="#990000" align="center">
<form action="" method="post">
<ol>
        <tr align="center">
                <td>Nombre</td>
                <td>Matricula</td>
            </tr>
            <?php 
                while($datos=pg_fetch_array($query)){
                ?>
                    <tr>
                        <td><?php echo $datos["nombre_completo"]?></td>
                        <td><?php echo $datos["matricula_a"]?></td>
                    </tr>
                    <?php   
                }
        
             ?>
</form>
</table>
</body>
</html>