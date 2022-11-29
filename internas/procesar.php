<link rel="stylesheet" type="text/css" href="../css/style.css">

<?php

    include("../dll/config.php");
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

    $sql="insert into personal values ('', '$nombres', '$apellidos', '$correo', '$cedula', '$telefono', '$direccion', '$fechaNacimiento');"; 
    // $sql="delete from personal where id=1";
    //$sql="update personal set nombre='J' where id=3";
    //$resSQL=mysqli_query($conexion, $sql);
    $resSQL=$miconexion->consulta($sql);
    if ($resSQL) {
        // echo "Se ha ejecutado correctamente";
		echo '<script>alert("Sentencia ejecutada exitosamente ...");</script>';
		echo "<script>location.href='adopcion.php'</script>";
    } else {
        // echo "No se ha podido ejecutar";
		echo '<script>alert("Sentencia no ejecutada, intente de nuevo ...");</script>';
		echo "<script>location.href='adopcion.php'</script>";
    }

?>
