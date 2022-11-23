<link rel="stylesheet" type="text/css" href="../css/style.css">

<?php

    include("../dll/conexion.php");
    include("../dll/class_mysqli.php");
    $miconexion=new class_mysqli();
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);

    $nombres=$_POST['nombres'];
    $apellidos=$_POST['apellidos']; 
    $cedula=$_POST['cedula']; 
    $direccion=$_POST['direccion']; 
    $telefono=$_POST['telefono']; 
    $fechaNacimiento=$_POST['fechaNacimiento']; 
    $correo=$_POST['correo'];

    $sql="insert into personal values ('', '$nombres', '$apellidos', '$correo', '$telefono', '$direccion', '$fechaNacimiento');"; 
    // $sql="delete from personal where id=1";
    //$sql="update personal set nombre='J' where id=3";
    //$resSQL=mysqli_query($conexion, $sql);
    $resSQL=$miconexion->consulta($sql);
    if ($resSQL) {
        echo "Se ha ejecutado correctamente";
    } else {
        echo "No se ha podido ejecutar";
    }

?>
