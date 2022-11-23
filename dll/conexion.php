<?php
include("config.php");
$conexion = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

if (!$conexion) {
    echo "Hay un error en la conexion";
} /* else {
    echo"conexion";
} */

?>