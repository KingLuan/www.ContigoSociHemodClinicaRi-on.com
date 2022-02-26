<?php

include("conxion.php");

$nombre=$_POST["usuario"];
$pass=$_POST["contrasena"];
$cargo=$_POST["cargo"];

if (isset($_POST["Registro"])) {
  // code...
  session_start();
  if (empty($nombre)) {
    // code...
    echo "<script> alert('campo nombre vacio'); </script>";
  }else if(empty($pass)){
    echo "<script> alert('campo contraseña vacio'); </script>";
  }else if($cargo==""){
    echo "<script> alert('No ha elegido cargo'); </script>";
  }elseif (empty($nombre) && empty($pass)) {
    // code...
    echo "<script> alert('campos vacios'); </script>";
  }else{
    $SCreada = "INSERT INTO login(usuario,contrasena,cargo) values ('$nombre','$pass','$cargo')";
    $query=mysqli_query($conectar,$SCreada);
    //mysqli_close($conectar);
    //$result=mysqli_fetch_array($query);
    if ($query>0) {
      // code...
      echo "<script> alert('bien') </script>";
      header("location: /login");
    }else {
      // code...
      echo "<script> alert('ERROR'); window.location='/login'</script>";
    }
  }



}

//mostrar datos
if (empty($_GET['usuario'])) {
  // code...
  header('location: busqueda_paciente.php');
}
$iduser=$_GET['usuario'];
$query=mysqli_query($conectar,"SELECT usuario, contrasena, cargo FROM `login` WHERE usuario=$iduser;");
$result=mysqli_num_rows($query);
if ($result==0) {
  // code...
  header('location: busqueda_paciente.php');
}else {
  // code...
  while ($data=mysqli_fetch_array($query)) {
    // code...
    $iduser=$data['usuario'];
    $idcontrasena=$data['contrasena'];
    $iduser=$data['cargo'];
  }
}

?>
