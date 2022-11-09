<link rel="stylesheet" type="text/css" href="../css/style.css">

<?php
    /* declaracion de variavle */
    /* $var1=10; */
    /* imprimir, interactua con html */
    /* echo "<strong>Hola mundo <br> :(</strong> ".$var1; *//* concatenacion de cadenas */ /* . (PUNTO ES PARA COCNCATENAR CADENAS) */
    
    /* $var2="2";
    @$res=$var1+$var2 */
    /* solo existen warning pero no errores, y se lo puede eliminar */
    /*  */

    // extract($_POST); /* extrae todos los datos, no es bueno, porque genera vuñnerabilidades */ /* mas cuando es un dominio publico, donde se debe cuidar las vulnerabilidades */
    $nombres=$_POST['nombres']; /* es mejor extaer en variables los datos que se desean utilizar */
    $apellidos=$_POST['apellidos']; 
    $cedula=$_POST['cedula']; 
    $direccion=$_POST['direccion']; 
    $telefono=$_POST['telefono']; 
    $fechaNacimiento=$_POST['fechaNacimiento']; 
    $correo=$_POST['correo']; 
    echo "Bienvenido <strong class='colorRojo'>".$nombres."</strong> ".$apellidos."<br>";
    
    for ($i=0; $i < 10; $i++) { 
        echo "Bienvenido <strong class='colorRojo'>".$nombres."</strong> ".$apellidos."<br>";
    }

?>
