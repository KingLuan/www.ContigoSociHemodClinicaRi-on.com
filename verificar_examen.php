<?php


session_start();
ob_start();

ini_set('display_errors',0);

if ($_SESSION['icargo'] !=1) {
  // code...
  echo "<script> alert('Nefrólogo solo tiene el permiso'); history.go(-1); </script>";
  //header("location: ". $_SERVER['HTTP_REFERER']); history.go(-1); javascript:history.back();
}

require 'conxion.php';

$consult="SELECT * FROM laboratorio ";
$query=mysqli_query($conectar,$consult);
$ver=mysqli_fetch_array($query);



?>
<style media="screen">
  .colfondo{

    color: black;
    background: #20c997;

    line-height: 30px;
    border-radius: 3px;
    border: 10px;
  }
  .colfondo:hover{

    background-color: #1cb386;
    color: #d4d7da;
  }
  .fa-plus-circle{

    color: white;

  }
</style>

<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
  <link rel="stylesheet" type="text/css" href="css/estilomenu.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
        <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script>
        $(document).ready(function(){
            $('#example').DataTable();
        });
        </script>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <?php require('barra_sesion.php'); ?>
        <?php require('menulateral.php'); ?>

       
        <div class="col" style="margin-top:2%;">
        <div class="">
          <label class="colort"><h2>Bienvenido a la sesion Laboratorio</h2> </label><br>
          </div>
          
<br>
          <div class="" style="padding:2px; padding-top:10px;">
              <label class="colort"><h2>Lista de Examenes de Laboratorio</h2></label>
            </div>
        
          <form class="" action="historia_clinica.php" method="POST" enctype="multipart/form-data">
           
            

            <table  id="example" class="display">
              <thead>
              <tr>
                <th style="border:solid #ddd;text-align: center; "><b>Id</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>Paciente</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>Cedula</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>Documento</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>Fecha</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>Accion</b></th>
              </tr>
              </thead>
              <?php 
                
              foreach ($query as $col){  ?>

              <tr>
                <td style="border:solid #ddd;text-align: center; "><a><?php echo $col['id_laboratorio']; ?></a></td>
                <td style="border:solid #ddd;text-align: center; "><a><?php echo $col['nombre_paciente']; ?></a></td>
                <td style="border:solid #ddd;text-align: center; "><a><?php echo $col['cedula_paciente']; ?></a></td>
                <td style="border:solid #ddd;text-align: center; "><a><?php echo $col['archivo']; ?></a></td>
                <td style="border:solid #ddd;text-align: center; "><a><?php echo $col['fecha']; ?></a></td>
                <td>
                <a href="<?php echo $col['ruta']; ?>"  download="<?php echo $col['archivo']; ?>"  class="btn btn-primary btnDescargarArchivo" ><i class="fa fa-cloud-download"></i> Descargar</a>
                <a href="<?php echo $col['ruta']; ?>" target="_blank"  class="btn btn-warning" style=" color: rgb(51, 10, 235);"><i class="fa-solid fa-eye"></i>Visualisar</a>
                </td>
                </td>
              </tr>

            <?php } ?>
          </form>

          </table>
        </div>
      </div>
    </div>
  </body>
</html>
