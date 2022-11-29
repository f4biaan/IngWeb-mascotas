<?php

/**
 * class mysql i
 */
class class_mysqli
{
    // var de conexion de la db
    var $BaseDatos;
    var $Servidor;
    var $Usuario;
    var $Clave;

    //var de error
    var $Error = "";
    var $Errno = 0;

    //var de conexion
    var $Conexion_ID = 0;
    var $Consulta_ID = 0;

    function __construct($host = "", $user = "", $pass = "", $db = "")
    {
        $this->BaseDatos = $db;
        $this->Usuario = $user;
        $this->Clave = $pass;
        $this->Servidor = $host;
    }

    function conectar($host, $user, $pass, $db)
    {
        if ($db != "") $this->BaseDatos = $db;
        if ($user != "") $this->Usuario = $user;
        if ($pass != "") $this->Clave = $pass;
        if ($host != "") $this->Servidor = $host;

        // params de conexion a la db
        $this->Conexion_ID = new mysqli($this->Servidor, $this->Usuario, $this->Clave, $this->BaseDatos);
        if (!$this->Conexion_ID) {
            $this->Error = "Ha fallado la conexion.";
            return 0;
        }
        return $this->Conexion_ID;
    }

    function consulta($sql = "")
    {
        if ($sql == "") {
            $this->Error = "No hay SQL";
            return 0;
        }
        //ejecuta sql
        $this->Consulta_ID = mysqli_query($this->Conexion_ID, $sql);
        if (!$this->Consulta_ID) {
            print($this->Conexion_ID->error);
            // echo "Error en la consulta";
            return 0;
        }
        return $this->Conexion_ID;
    }

    /* retorna numero de campos (columnas) */
    function numcampos()
    {
        return mysqli_num_fields($this->Consulta_ID);
    }
    /* retorna numero de registros (filas) */
    function numregistros()
    {
        return mysqli_num_rows($this->Consulta_ID);
    }

    function verconsulta()
    {
        echo "<table border=1>";
        echo "<tr>";
        /* for para recorrer la columnas */
        for ($i = 0; $i < $this->numcampos(); $i++) {
            echo "<td>" . mysqli_fetch_field_direct($this->Consulta_ID, $i)->name . "</td>";
            /* ID   Nombre  Apellidos   ... */
        }
        echo "</tr>";
        /* while para recorrer las filas */
        while ($row = mysqli_fetch_array($this->Consulta_ID)) {
            echo "<tr>";
            for ($i = 0; $i < $this->numcampos(); $i++) {
                echo "<td>" . $row[$i] . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    function verconsultaCRUD()
    {
        echo "<table border=1>";
        echo "<tr>";
        for ($i = 0; $i < $this->numcampos(); $i++) {
            echo "<td>" . mysqli_fetch_field_direct($this->Consulta_ID, $i)->name . "</td>";
        }
        echo "<td>Actualizar</td>";
        echo "<td>Borrar</td>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($this->Consulta_ID)) {
            echo "<tr>";
            for ($i = 0; $i < $this->numcampos(); $i++) {
                echo "<td>" . $row[$i] . "</td>";
            }
            echo "<td><a href='updateUser.php?id=" . $row[0] . "'>Actualizar</a></td>";
            echo "<td><a href='deleteUser.php?id=" . $row[0] . "'>Borrar</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    function updateUser($id_u = "")
    {
        if ($id_u == "") {
            $this->Error = "No hay ID";
            return 0;
        }
        $sql = "select * from personal where id=$id_u";
        $this->Consulta_ID = mysqli_query($this->Conexion_ID, $sql);
        if (!$this->Consulta_ID) {
            $this->Error = "No se pudo ejecutar la consulta";
            echo '<script>alert("No se ha podido actualizar la información, intente de nuevo ...");</script>';
            echo "<script>location.href='personal.php'</script>";
            return 0;
        }
        $row = mysqli_fetch_array($this->Consulta_ID);
        echo "<form action='updateAction.php' method='post'>";
        echo "<table border=1>";
        echo "<tr>";
        for ($i = 1; $i < $this->numcampos(); $i++) {
            echo "<td>" . mysqli_fetch_field_direct($this->Consulta_ID, $i)->name . "</td>";
        }
        echo "</tr>";
        echo "<tr>";
        for ($i = 1; $i < $this->numcampos(); $i++) {
            echo "<td><input type='text' name='" . mysqli_fetch_field_direct($this->Consulta_ID, $i)->name . "' value='" . $row[$i] . "'></td>";
        }
        echo "</tr>";
        echo "</table>";
        echo "<input type='hidden' name='id' value='" . $row[0] . "'>";
        echo "<input type='submit' class='button'>";
        echo "<button type='button' class='button' href='personal.php' onclick='location.href=`personal.php`'>Cancelar</button>";
        echo "</form>";
    }
}
