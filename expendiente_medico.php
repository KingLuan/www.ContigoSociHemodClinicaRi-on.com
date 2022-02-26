<?php
session_start();
ini_set('display_errors',0);
if ($_SESSION['icargo'] !=1) {
  // code...
  echo "<script> alert('Nefrólogo solo tiene el permiso'); history.go(-1); </script>";
  //header("location: ". $_SERVER['HTTP_REFERER']); history.go(-1); javascript:history.back()
}
require 'conxion.php';

$consult="SELECT * FROM expendiente_medico";
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
          <form class="" action="" method="POST">
            <div class="">

                <label class="colort"><h2>Bienvenido a la sesion Nefrología</h2> </label><br>

              
                </div>
            <div class="" style="padding:2px; padding-top:10px;">
              <label class="colort"><h2>Lista de Pacientes registrados</h2></label>
            </div>
            <div style="padding:50px; padding-top:10px;">
              <div class="row">
                <a href="expendiente_medico.php?id=1" class="btn " id="mostrar" style=" color:black; border-left:solid #ddd; border-right:solid #ddd; border-top:solid #ddd; display:block; width:50%;">Pacientes registrado Hoy</a>
                <a href="expendiente_medico.php?id=2" class="btn " id="ocultar" style=" color:black; border-left:solid #ddd; border-right:solid #ddd; border-top:solid #ddd; display:block; width:50%;"><span>Registro pacientes</span></a>
              </div>
            </div>

                <table  id="example" class="display">
                <thead>
              <tr>
              <th style="border:solid #ddd;text-align: center; "><b>Id</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>fecha</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>Nombres</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>Cédula</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>Edad</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>Peso</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>Estatura</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>Dianostico</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>Cuadro Clinico</b></th>
                
              </tr>
              </thead>
              <?php foreach ($query as $col){ ?>

              <tr>
                <td style="border:solid #ddd;text-align: center; "><a><?php echo $col['id_historias']; ?></a></td>
                <td style="border:solid #ddd;text-align: center; "><a><?php echo $col['fecha']; ?></a></td>
                <td style="border:solid #ddd;text-align: center; "><a><?php echo $col['nombres']; ?></a></td>
                <td style="border:solid #ddd;text-align: center; "><a><?php echo $col['cedula']; ?></a></td>
                <td style="border:solid #ddd;text-align: center; "><a><?php echo $col['edad']; ?></a></td>
                <td style="border:solid #ddd;text-align: center; "><a><?php echo $col['peso']; ?></a></td>
                <td style="border:solid #ddd;text-align: center; "><a><?php echo $col['estatura']; ?></a></td>
                <td style="border:solid #ddd;text-align: center; "><a><?php echo $col['dianostico']; ?></a></td>
                <td style="border:solid #ddd;text-align: center; "><a><?php echo $col['cuadro_clinico']; ?></a></td>
               
               
              </tr>

              
            <?php } ?>
          </form>

          </table>
        </div>
      </div>
    </div>
  </body>
</html>
