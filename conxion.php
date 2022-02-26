<?php
    $dbhost="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="clinica";

    $conectar=mysqli_connect($dbhost,$dbuser, $dbpass,$dbname);
    if(!$conectar){
      die("Sin conexión:" .mysqli_connect_error());
    }
    





    /*mysqli_select_db($conectar,"clinica");

    $extraer=mysqli_fetch_array($result);
    echo $extraer['user'];
    echo $extraer['pass'];
    include("index.html");*/
 ?>
