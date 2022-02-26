<?php
require_once 'conxion.php';
require 'cunsulp.php';
ini_set('display_errors',0);




  $query=mysqli_query($conectar, "SELECT * FROM cita_medica WHERE fecha_cita BETWEEN CURDATE() AND CURDATE() order by hora_cita asc");
  $resquery=mysqli_fetch_array($query);



?>

<style media="screen">
  #tablat{

    border-collapse: collapse;



  }

</style>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>lista de citas medicas de hoy</title>
  </head>
  <body>

    <div class="container-fluid">
      <div class="row">
        <?php //require('barra_sesion.php'); ?>
        <?php //require('menulateral.php'); ?>
        <div class="col" style="margin-top:3px;">
          <form class="" action="" method="post">
            <table class="table responsive" style="margin:0 auto;" id="tablat" >
              <!--<tr>
                <td colspan="3" style="border:transparent;text-align: center;">citas médicas para hoy</td>
              </tr>-->
              <tr>
                <th style="border:solid #ddd;text-align: center; "><b>Id</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>Paciente</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>Cedula</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>Fecha Cita</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>Hora Cita</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>Medico</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>Estado</b></th>
                <td style="border:solid #ddd; text-align:center; margin:0; font-size:15px;" colspan="2"><b>Acciones</b></td>
                </tr>
                <?php foreach ($query as $col){ ?>

              <tr style="">
                <td style="border:solid #ddd;text-align: center; "><a><?php echo $col['id_cita']; ?></a></td>
                <td style="border:solid #ddd;text-align: center; "><a><?php echo $col['paciente']; ?></a></td>
                <td style="border:solid #ddd;text-align: center; "><a><?php echo $col['cedula']; ?></a></td>
                <td style="border:1px solid #ddd;text-align: center;  margin:0; "><?php echo substr($row['fecha_cita'],8,2).'/'.substr($row['fecha_cita'],5,2).'/'.substr($row['fecha_cita'],0,4); ?></td>
                <td style="border:1px solid #ddd;text-align: center;  margin:0; "><?php echo substr($row['hora_cita'],0,2).':'.substr($row['hora_cita'],3,2); ?></td>
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
            </table>
          </form>

        </div>
      </div>
    </div>





  </body>
</html>
