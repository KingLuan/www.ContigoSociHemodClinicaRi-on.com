<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinica";

$cedula = filter_input(INPUT_POST, 'cedula');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select nombres,apellidos from historia_clinica where id_historias =".$cedula; 

$esp=" ";

    if ($respuesta= mysqli_query($conn, $sql)) {
        while ($fila = mysqli_fetch_row($respuesta)) {
            echo $fila[0].$esp.$fila[1];
        }
        //mysqli_free_result($resultado);
    } else {
        echo "error";
    }






?>