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

</style>
<?php
//ini_set('display_errors',0);
include("conxion.php");
if (!empty($_POST)) {
  // code...
  $alert='';
  if (empty($_POST['usuario'])||empty($_POST['contrasena'])||empty($_POST['cargo'])){
    // code...
    $alert='<p class="msg_error">los campos a registrar son obligatorios</p>';
  }else{
    // code...
    //require ('index.php');
    $nombre=$_POST["usuario"];
    $pass=$_POST["contrasena"];
    //$pass=md5($_POST["contrasena"]);
    $cargo=$_POST["cargo"];


    $query=mysqli_query($conectar,"SELECT * FROM login WHERE usuario='$nombre' or contrasena='$pass'");
    $result=mysqli_fetch_array($query);
    if ($result>0) {
      // code...
      $alert='<p class="msg_error">usuario y contraseña ya existe</p>';
    }else {
      // code...
      $query_insert=mysqli_query($conectar,"INSERT INTO login(usuario,contrasena,cargo)
      VALUES('$nombre','$pass','$cargo')");
      if ($query_insert) {
        // code...
        $alert='<p class="msg_save">usuario ingresada con exito</p>';
        header('location: /login');
      }else {
        $alert='<p class="msg_error">No se puede crear el usuario</p>';
      }
    }
  }
}

?>



<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>registro</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/cabecera.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
  </head>
  <body>

    <div class="container">

      <div class="row">
        <form class="" action="" method="POST" id="Rforma">
          <p>Usuario<input type="text" value="" placeholder="Ingrese Usuario" name="usuario" ></p>
          <p class="textor">Contraseña<input type="password" value="" placeholder="Ingrese Contraseña" name="contrasena"></p>
          <p class="textor">Seleccione...
            <?php
              $query_cargo=mysqli_query($conectar,"SELECT * FROM cargo");
              $result_cargo=mysqli_num_rows($query_cargo);


            ?>
            <select class="carg" name="cargo">
              <?php
              if ($result_cargo>0) {
                // code...
                while ($cargo= mysqli_fetch_array($query_cargo) ) {
              ?>
                <option value="<?php echo $cargo["idcargo"];?>"><?php echo $cargo["ncargo"];?> </option>
              <?php
                }
              }
              ?>
            <!--<option value="Trabajador">Trabajador</option>-->

          </select></p>
          <?php echo isset($alert) ? $alert:''; ?>
          <input type="submit" value="Registrar" name="Registro" id="Rboton">
          <h1><a href="/Proyectoluis2/"><u>Regresar</u></a></h1>
        </form>

      </div>
    </div>

  </body>
</html>
