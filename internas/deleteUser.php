<?php

include("../dll/config.php");
include("../dll/class_mysqli.php");
$miconexion = new class_mysqli();
$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);

$idUser = $_GET['id'];

$sql = "delete from personal where id=$idUser";

$resSQL = $miconexion->consulta($sql);
if ($resSQL == "") {
	echo '<script>alert("Problemas de ejecución, itente de nuevo ...");</script>';
	// echo "Problemas de ejecución del SQL";
	echo "<script>location.href='personal.php'</script>";
} else {
	echo '<script>alert("Usuario eliminado exitosamente ...");</script>';
	echo "<script>location.href='personal.php'</script>";
}
