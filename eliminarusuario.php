<?php

$dbhost="localhost";
$dbuser="root";
$dbpass="clinicar";
$dbname="ppr";


$conectar=mysqli_connect($dbhost,$dbuser, $dbpass,$dbname);
if(!$conectar){
  die("Sin conexión:" .mysqli_connect_error());
}


/*$n=$_POST['nombre'];
$a=$_POST['apellido'];
$f=$_POST['fechanac'];*/


/*$query=mysqli_query($conectar,"SELECT * FROM fechaa WHERE nombre='$n' or apellido='$a' or fechanac='$f'");
$result=mysqli_fetch_array($query);*/
if (isset($_POST['nombre'])) {
  // code...
  $idd=$_GET['nombre'];
  $query=mysqli_query($conectar,"SELECT * FROM fechaa");
  $result=mysqli_num_rows($query);
  while ($data=mysqli_fetch_object($result)) {
    // code...
    $idd=$data['nombre'];
    $iduser=$data['apellido'];
    $idcontrasena=$data['fechanac'];
  }
}
//session_start();



//$query_insert=mysqli_query($conectar,"INSERT INTO fechaa(nombre,apellido,fechanac) VALUES('$n','$a','$f')");

//$idnom=$data['nombre'];
//$idape=$data['apellido'];
//$idfec=$data['fechanac'];
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="" method="POST">
      <input type="text" name="nombre" value="<?php echo $idd ?>">
      <input type="text" name="apellido" value="<?php echo $iduser ?>">
      <input type="date" name="fechanac" value="<?php echo $idcontrasena ?>">

      <input type="submit" name="agregar" value="agregar">

    </form>

  </body>
</html>
