<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinica";

$paciente = filter_input(INPUT_POST, 'paciente');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select cedula from historia_clinica where id_historias = ".$paciente;  

    if ($respuesta= mysqli_query($conn, $sql)) {
        while ($fila = mysqli_fetch_row($respuesta)) {
            echo $fila[0];
        }
        //mysqli_free_result($resultado);
    } else {
        echo "error";
    }






?>