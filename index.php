<?php
$alert='';
session_start();
if(!empty($_SESSION['active'])) {
  // code...
  header('location: intro.php');


}else{
if(!empty($_POST)) {
  // code...
  if (empty($_POST['usuario'])||empty($_POST['contrasena'])) {
    // code...
    $alert='Ingrese usuario y contraseña';
  }else {
    require_once "conxion.php";
    $nombre=$_POST["usuario"];
    $pass=$_POST["contrasena"];
    $respuesta=mysqli_query($conectar,"SELECT * FROM login WHERE usuario='$nombre' AND contrasena='$pass'");
    mysqli_close($conectar);
    $nr=mysqli_num_rows($respuesta);

    if ($nr>0) {
      // code...

      $data=mysqli_fetch_array($respuesta);
      //print_r($data);
      $_SESSION['active']=true;
      $_SESSION['idi']=$data['id'];
      $_SESSION['iuser']= $data['usuario'];
      $_SESSION['ipass']= $data['contrasena'];
      $_SESSION['icargo']=$data['cargo'];

      if($_SESSION['icargo']==1){
        header('location: intro.php');
      }else if ($_SESSION['icargo']==2) {
        // code...
        header('location: historia_clinica.php');
      }


    }else {
      $alert='usuario y contraseña incorrectos';
      session_destroy();
    }
  }
}
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/cabecera.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    <script>
    </script>
<body background="fondolegal.jpg" text="width">
  <section id="container">
  <div class="container">
    <div class="row">
      <section class="resg">
      <form action="" method="POST">
        <h1 class="animate__animated animate__backInLeft">CLÍNICA DEL RIÑÓN SOCIHEMOD EL CARMEN </h1>
        <p>Usuario <input type="text" placeholder="ingrese su nombre" name="usuario"></p>
        <p>Contraseña <input type="password" placeholder="ingrese su contraseña" name="contrasena"></p>
        <input type="submit" name="Ingresar">
        <h1 ><a href="index2.php"><u>Registrar</u></a></h1>
        <div class="alert"><?php echo isset($alert) ? $alert:'';?></div>
      </form>
      </section>
    </div>
  </div>
  </section>
</body>

</html>
