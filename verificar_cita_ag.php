<?php
session_start();
ini_set('display_errors',0);

if ($_SESSION['icargo'] !=1) {
  // code...
  echo "<script> alert('Nefrólogo solo tiene el permiso'); history.go(-1); </script>";
  //header("location: ". $_SERVER['HTTP_REFERER']); history.go(-1); javascript:history.back();
}
require 'conxion.php';

$consult="SELECT * FROM cita_medica";
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

        .btngreen{
          border: none;
            color: white;
            padding: 5px 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 20px;
            background-color: #199319;
        }
        .btnred{
          border: none;
            color: white;
            padding: 5px 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 20px;
            background-color: red;
        }

        .btnblue{
          border: none;
            color: white;
            padding: 5px 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 20px;
            background-color: blue;
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
            <div class="" style="padding:2px; padding-top:10px;">
              <label class="colort"><h2>Lista de Citas registrados</h2></label>
            </div>

                <table id="example" class="display">
                <thead>
              <tr>
                <th style="border:solid #ddd;text-align: center; "><b>Id</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>Paciente</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>Cedula</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>Fecha Cita</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>Hora Cita</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>Medico</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>Estado</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>Acciones</b></th>
              </tr>
              </thead>
              <?php foreach ($query as $col){ ?>

              <tr>
                <td style="border:solid #ddd;text-align: center; "><a><?php echo $col['id_cita']; ?></a></td>
                <td style="border:solid #ddd;text-align: center; "><a><?php echo $col['paciente']; ?></a></td>
                <td style="border:solid #ddd;text-align: center; "><a><?php echo $col['cedula']; ?></a></td>
                <td style="border:solid #ddd;text-align: center; "><a><?php echo $col['fecha_cita']; ?></a></td>
                <td style="border:solid #ddd;text-align: center; "><a><?php echo $col['hora_cita']; ?></a></td>
                <td style="border:solid #ddd;text-align: center; "><a><?php echo $col['medico']; ?></a></td>
                <td>
                <?php 
                    if( $col['estado']==1){
                      echo "Asistio";
                    }else{
                      echo "No Asistio";
                    }
                ?>
                </td>
                <td>
                <?php 
                      echo "<a href=desactivar.php?id=".$col['id_cita']." class='btnred'>No asistio</a>";
                      echo "<a href=activar.php?id=".$col['id_cita']."&cedula=".$col['cedula']." class='btngreen'>Asistio</a>";
                ?>
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

