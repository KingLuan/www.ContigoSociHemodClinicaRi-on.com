<?php
session_start();
ini_set('display_errors',0);
if ($_SESSION['icargo'] !=3) {
  // code...
  echo "<script> alert('El Administrador solo tiene el permiso'); history.go(-1); </script>";
  //header("location: ". $_SERVER['HTTP_REFERER']); history.go(-1); javascript:history.back()
}
require 'cunsulp.php';
require 'conxion.php';
ini_set('display_errors',0);

session_start();
if(empty($_SESSION['active'])) {
  // code...
  header('location: /login');
}

$busqueda =($_REQUEST['busqueda']);
    $rol='';
    if ($busqueda==1) {
      // code...
      $rol="OR cargo like '%Gerente%'";
    }else if ($busqueda==2) {
      // code...
      $rol="OR cargo like '%Trabajador%'";
    }
    $repag=mysqli_query($conectar,"SELECT COUNT(*) as totalpacientes FROM login WHERE
    (id like '%$busqueda%' or usuario like '%$busqueda%' or contrasena like '%$busqueda%' )" );
    $result_repag=mysqli_fetch_array($repag);
    $totalpacientes=$result_repag['totalpacientes'];
    $Npagina= 2;
    if (empty($_GET['pagina'])) {
      // code...
      $pagina=1;
    }else {
      // code...
      $pagina=$_GET['pagina'];
    }
    $desde=($pagina-1)*$Npagina;
    $totalPag=ceil($totalpacientes/$Npagina);


    //$consul="SELECT COUNT(*) as totalpacientes FROM login order by usuario asc limit $desde,$Npagina ";
    $consul="SELECT l.id, l.usuario,l.contrasena, c.ncargo FROM login l INNER JOIN cargo c ON l.cargo=c.idcargo WHERE (l.id like '%$busqueda%' or
      l.usuario like '%$busqueda%' or
      l.contrasena like '%$busqueda%' or
      c.ncargo like '%$busqueda%')
       order by l.id asc limit $desde,$Npagina";
    $resp=mysqli_query($conectar,$consul);
    mysqli_close($conectar);
    $ver1=mysqli_num_rows($resp);

?>
<style>
  <?php include 'css/estilomenu.css'; ?>
</style>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title></title>


    <!-- CSS only -->

  </head>
  <body>

    <div class="container-fluid">
      <?php
      $busqueda =strtolower($_REQUEST['busqueda']);

      if (empty($busqueda)) {
        // code...
        //header("location:busqueda_paciente.php");
        //mysqli_close($conectar);
      }
      ?>
      <div class="row">
        <?php require('barra_sesion.php'); ?>
        <?php require('menulateral.php'); ?>
        <div class="col" style="margin-top:7%;">
          <form action="" method="get" class="formbuscar">
            <div class="container" style="text-align:right;">
              <input type="text" name="busqueda" id="busqueda" value="<?php echo $busqueda; ?>">
              <input type="submit" name="" value="Buscar" class="search">
            </div>
          </form>

          <table class="table responsive" style="margin:0 auto;">
            <tr class="" id="tab">
              <td class="" style="border:solid #ddd;text-align: center; "><b>id</b></td>
              <td class="" style="border:solid #ddd;text-align: center; "><b>Usuario</b></td>
              <td class="" style="border:solid #ddd;text-align: center;"><b>Contraseña</b></td>
              <td class="" style="border:solid #ddd;text-align: center;"><b>Configuración</b></td>
            </tr>
            <?php
            foreach ($resp as $row) { ?>
            <tr class="" id="tab">
              <td class="" style="border:solid #ddd;text-align: center;"><?php echo $row['id'] ?></td>
              <td class="" style="border:solid #ddd;text-align: center;"><?php echo $row['usuario'] ?></td>
              <td class="" style="border:solid #ddd;text-align: center;"><?php echo $row['contrasena'] ?></td>

              <td class="" style="border:solid #ddd;text-align: center; ">
                <!--<input type="submit" name="" value="editar" href="editar_usuario.php">
                <input type="submit" name="" value="eliminar">-->
                <a href="editar_usuario.php?id=<?php echo $row['id'] ?>"><button class="btn btn-primary" name="button" title="Editar">
                                                                          <i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                  <!--<input type="submit" name="" value="editar"></a>-->
                <a href="editar_usuario.php?id=<?php echo $row['id'] ?>"><button class="btn btn-danger" type="button" name="button" title="Eliminar">
                                                                          <i class="fa fa-trash" aria-hidden="true"></i></button></a>
                <!--<input type="submit" name="" value="eliminar"></a>-->
              </td>
            </tr>
            <?php } ?>
          </table>
          <?php
          if ($totalpacientes!=0) {
            // code...
          ?>
          <div class="paginador">
            <ul>
            <?php
              if ($pagina!=1) {
            ?>
              <li><a href="?pagina=<?php echo 1;?>&busqueda=<?php echo $busqueda;?>">|<</a></li>
              <li><a href="?pagina=<?php echo $pagina-1;?>&busqueda=<?php echo $busqueda;?>"><<</a></li>
            <?php
            }
              for ($i=1; $i <= $totalPag ; $i++) {
                // code...
                if ($i==$pagina) {
                  // code...
                  echo '<li class="Selected">'.$i.'</li>';
                }else {
                  // code...
                  echo '<li><a href="?pagina='.$i.'&busqueda='.$busqueda.'">'.$i.'</a></li>';
                }

              }
              if ($pagina!=$totalPag) {
                // code...
            ?>
              <li><a href="?pagina=<?php echo $pagina+1;?>&busqueda=<?php echo $busqueda;?>">>></a></li>
              <li><a href="?pagina=<?php echo $totalPag;?>&busqueda=<?php echo $busqueda;?>">>|</a></li>
            <?php
            }
            ?>
            </ul>
          </div>
          <?php
        }
          ?>
        </div>

      </div>
    </div>
  </body>
</html>
