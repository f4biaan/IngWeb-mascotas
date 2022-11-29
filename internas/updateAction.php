<link rel="stylesheet" type="text/css" href="../css/style.css">

<?php

    include("../dll/config.php");
    include("../dll/class_mysqli.php");
    $miconexion=new class_mysqli();
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);

    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos']; 
    $cedula=$_POST['cedula']; 
    $direccion=$_POST['direccion']; 
    $telefono=$_POST['telefono']; 
    $fechaNacimiento=$_POST['fechaNacimiento']; 
    $correo=$_POST['correo'];

    // $sql="insert into personal values ('', '$nombre', '$apellidos', '$correo', '$cedula', '$telefono', '$direccion', '$fechaNacimiento');"; 
    $sql="update personal set nombre='$nombre', apellidos='$apellidos', correo='$correo', cedula='$cedula', telefono='$telefono', direccion='$direccion', fechaNacimiento='$fechaNacimiento' where id='$id'";
    // $sql="delete from personal where id=1";
    //$sql="update personal set nombre='J' where id=3";
    //$resSQL=mysqli_query($conexion, $sql);
    $resSQL=$miconexion->consulta($sql);
    if ($resSQL) {
        // echo "Se ha ejecutado correctamente";
		echo '<script>alert("Sentencia ejecutada exitosamente ...");</script>';
		echo "<script>location.href='personal.php'</script>";
    } else {
        // echo "No se ha podido ejecutar";
		echo '<script>alert("No se ha podido actualizar la información, intente de nuevo ...");</script>';
		echo "<script>location.href='personal.php'</script>";
    }

?>
