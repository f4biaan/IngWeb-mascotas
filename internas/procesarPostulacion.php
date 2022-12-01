<?php

include("../dll/config.php");
include("../dll/class_mysqli.php");
$miconexion = new class_mysqli();
$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$direccion = $_POST['direccion'];
$correo = $_POST['correo'];
$cedula = $_POST['cedula'];
$mascota = $_POST['mascota'];

$miconexion = new class_mysqli();
$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
// $sql = "select * from postulantes";
// $resSQL = $miconexion->consulta($sql);


if (!$miconexion->checkCedula($cedula)){
    $sql = "insert into postulante values ('$nombres', '$apellidos', '$direccion', '$correo', '$cedula');";
    $sqlSQL = $miconexion->consulta($sql);
}

$sql = "insert into postulacion values ('$cedula', '$mascota');";
$sqlSQL = $miconexion->consulta($sql);

$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
$sql = "update mascota set postulaciones = postulaciones + 1 where id = '$mascota';";
$sqlSQL = $miconexion->consulta($sql);
if (!$resSQL) {
    // echo "Se ha ejecutado correctamente";
    echo '<script>alert("Sentencia ejecutada exitosamente ...");</script>';
    echo "<script>location.href='lista-postulaciones.php'</script>";
} else {
    // echo "No se ha podido ejecutar";
    echo '<script>alert("Sentencia no ejecutada, intente de nuevo ...");</script>';
    echo "<script>location.href='lista-postulaciones.php'</script>";
}
