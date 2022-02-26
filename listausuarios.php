<?php
//require 'cunsulp.php';
require 'conxion.php';
ini_set('display_errors',0);



$busqueda =($_REQUEST['busqueda']);
    $rol='';
    if ($busqueda==1) {
      // code...
      $rol="OR cargo like '%Gerente%'";
    }else if ($busqueda==2) {
      // code...
      $rol="OR cargo like '%Trabajador%'";
    }
    $repag=mysqli_query($conectar,"SELECT COUNT(*) as totalusuarios FROM login WHERE
    (id like '%$busqueda%' or usuario like '%$busqueda%' or contrasena like '%$busqueda%' or cargo like '%$busqueda%' )" );
    $result_repag=mysqli_fetch_array($repag);
    $totalusuarios=$result_repag['totalusuarios'];
    $Npagina= 12;
    if (empty($_GET['pagina'])) {
      // code...
      $pagina=1;
    }else {
      // code...
      $pagina=$_GET['pagina'];
    }
    $desde=($pagina-1)*$Npagina;
    $totalPag=ceil($totalusuarios/$Npagina);


    //$consul="SELECT COUNT(*) as totalpacientes FROM login order by usuario asc limit $desde,$Npagina ";
    $consul="SELECT l.id, l.usuario, l.contrasena, c.ncargo FROM login l INNER JOIN cargo c ON l.cargo = c.idcargo";
    $respe=mysqli_query($conectar,$consul);
    mysqli_close($conectar);
    $ver1=mysqli_num_rows($respe);

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
              <td class="" style="border:solid #ddd;text-align: center; "><b>Id</b></td>
              <td class="" style="border:solid #ddd;text-align: center; "><b>Usuario</b></td>
              <td class="" style="border:solid #ddd;text-align: center;"><b>Contraseña</b></td>
              <td class="" style="border:solid #ddd;text-align: center;"><b>Cargo</b></td>
              <td class="" style="border:solid #ddd;text-align: center;"><b>Option b</b></td>
            </tr>
            <?php
            while ($row=mysqli_fetch_array($respe)) { ?>
            <tr class="" id="tab">
              <td class="" style="border:solid #ddd;text-align: center;"><?php echo $row['id'] ?></td>
              <td class="" style="border:solid #ddd;text-align: center;"><?php echo $row['usuario'] ?></td>
              <td class="" style="border:solid #ddd;text-align: center;"><?php echo $row['contrasena'] ?></td>
              <td class="" style="border:solid #ddd;text-align: center;"><?php echo $row['ncargo'] ?></td>

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
        </div>

      </div>
    </div>
  </body>
</html>
