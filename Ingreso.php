<?php
 //Accesando a conexión
include 'Conexion/Conexion.php';
//Variables que recibe de login.html
$nombre= $_POST["usuario"];
$pass= $_POST["password"];
$tipo_u= $_POST["tipo_usuario"];

if($tipo_u == "Profesor"){
   $matricula="matricula_p";
}
if($tipo_u == "Alumno"){
   $matricula="matricula_a";
}

//Query con los datos introducidos en el login
$query = "SELECT $matricula, contrasenia FROM $tipo_u WHERE $matricula = '$nombre' and contrasenia= '$pass'";

$rs= pg_query($query);
$nr = pg_num_rows($rs);
//Si el query regresa u nregistro envía el usuario a profesor.php
if($nr == 1){
   header("Location:$tipo_u.php?nombre=".$nombre);
}
else if($nr == 0) {
   echo 'Sin ingreso. Verifica tus datos.';
}
 ?>