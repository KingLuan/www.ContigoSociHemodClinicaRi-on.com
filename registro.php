<?php

/*include("conxion.php");

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
    $result=mysqli_fetch_array($query);
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



}*/



?>
