<style media="screen">
  /*.carg{
    width: calc(100% - 20px);
    padding:9px;
    margin-top:12px;
  }*/
  select{
    width: calc(100% - 40px);
    padding: 9px;
    -moz-box-sizing: content-box;
    -webkit-box-sizing:content-box;
    box-sizing:content-box;
    font-size: 19px;
    margin-top:12px;
  }
  .textor{

    margin-top: 5px;
  }
  .notitemone option:first-child{
    display: none;
  }
  input[type=submit]:hover{

    background: #0f6fd1;
    color: #fff;

  }

</style>
<?php

include("conxion.php");
//ini_set('display_errors',0);
/*$nombre=$_POST["usuario"];
$pass=$_POST["contrasena"];
$cargo=$_POST["cargo"];*/

/*if (isset($_POST["Registro"])) {
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
    $result=mysqli_num_rows($query);
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
session_start();
if(empty($_SESSION['active'])) {
  // code...
  header('location: /login');
}

if (!empty($_POST))
{
  $alert='';
  if (empty($_POST['usuario'])||empty($_POST['contrasena'])||empty($_POST['cargo'])){
    $alert='<p class="msg_error">los campos a registrar son obligatorios</p>';
  }else{
    $idlogin=$_POST["id"];
    $nombre=$_POST["usuario"];
    $pass=$_POST["contrasena"];
    $cargo=$_POST["cargo"];
    $query=mysqli_query($conectar,"SELECT * FROM login
                                            WHERE (usuario ='$nombre' AND id != $idlogin)
                                            OR (contrasena ='$pass' AND id != $idlogin)");

    $result=mysqli_fetch_array($query);
    if ($result>0) {
      $alert='<p class="msg_error">usuario y contraseña ya existe</p>';
    }else {
      if (empty($_POST['contrasena'])) {
        $query_update=mysqli_query($conectar,"UPDATE login SET usuario='$nombre', contrasena='$pass', cargo='$cargo' WHERE id=$idlogin");
      }else {
        $query_update=mysqli_query($conectar,"UPDATE login SET usuario='$nombre', contrasena='$pass', cargo='$cargo' WHERE id=$idlogin");
      }
      if ($query_update) {
        $alert='<p class="msg_save">usuario actualizado con exito</p>';
        header('location: busqueda_paciente.php');
      }else {
        $alert='<p class="msg_error">No se puede actualizar el usuario</p>';
      }
    }
  }
  mysqli_close($conectar);
}




//mostrar datos
if (empty($_GET['id'])) {
  // code...
  header('location: busqueda_paciente.php');
}
$idd=$_GET['id'];
$query=mysqli_query($conectar,"SELECT l.id, l.usuario, l.contrasena, (l.cargo) as idcargo,(c.ncargo) as ncargo FROM login l
                                                                                          INNER JOIN cargo c ON l.cargo=c.idcargo WHERE id=$idd");
mysqli_close($conectar);
$result=mysqli_num_rows($query);
if ($result==0) {
  // code...
  header('location: busqueda_paciente.php');
  mysqli_close($conectar);
}else {
  // code...
  $option='';
  while ($data=mysqli_fetch_array($query)) {
    // code...
    $idd=$data['id'];
    $iduser=$data['usuario'];
    $idcontrasena=$data['contrasena'];
    //$idcargo=$data['cargo'];
    $icargo=$data['idcargo'];
    $ecargo=$data['ncargo'];

    if ($icargo==1) {
      // code...
      $option='<option value="'.$icargo.'" select>'.$ecargo.'</option>';
    }elseif ($icargo==2) {
      // code...
      $option='<option value="'.$icargo.'" select>'.$ecargo.'</option>';
    }
  }
}

?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>registro</title>

    <link rel="stylesheet" href="css/cabecera.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/login.css">
    <!--<script type="text/javascript">
      setTimeout(function(){
        $("html").load("time.php");
      },3000);
    </script>-->

  </head>
  <body>

    <div class="container">

      <div class="row">
        <form class="" action="" method="POST" id="Rforma">
          <p>EDITAR USUARIO</p>
          <p><input type="hidden" name="id" value="<?php echo $idd; ?>">  </p>
          <p class="textor">Usuario<input type="text" value="<?php echo $iduser; ?>" placeholder="Ingrese Usuario" name="usuario" ></p>
          <p class="textor">Contraseña<input type="password" value="<?php echo $idcontrasena; ?>" placeholder="Ingrese Contraseña" name="contrasena"></p>
          <p class="textor">Seleccione Tipo de Usuario
            <?php
            include("conxion.php");
            $query_cargo=mysqli_query($conectar,"SELECT * FROM cargo");
            mysqli_close($conectar);
            $result_cargo=mysqli_num_rows($query_cargo);
            ?>
            <select class="notitemone" id="cargo" name="cargo">
              <?php
              echo $option;
              if ($result_cargo>0) {
                // code...
                while ($ecargo=mysqli_fetch_array($query_cargo)) {
                  // code...
                  ?>
                  <option value="<?php echo $ecargo["idcargo"]; ?>"><?php echo $ecargo["ncargo"] ?></option>
                  <?php
                }
              }
              ?>
            <!--<option value="Trabajador">Trabajador</option>-->
          </select></p>
          <?php echo isset($alert) ? $alert:''; ?>
          <input type="submit" value="Actualizar datos" name="Registro" id="Rboton">
          <h1><a href="/login"><u>Regresar</u></a></h1>
        </form>

      </div>
    </div>

  </body>
</html>
