<?php
require_once 'conxion.php';
require 'cunsulp.php';
ini_set('display_errors',0);




  $query=mysqli_query($conectar, "SELECT * FROM cita_medica WHERE fecha_cita BETWEEN CURDATE() + INTERVAL 1 DAY AND CURDATE() + INTERVAL 1 DAY order by hora_cita asc");
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
        <div class="col" style="margin-top:10px;">
          <form class="" action="" method="post">
            <table class="table responsive" style="margin:0 auto;" id="tablat" >
              <!--<tr>
                <td colspan="3" style="border:transparent;text-align: center;">citas médicas para hoy</td>
              </tr>-->
              <tr style="margin:0; ">
                <td style="border:1px solid #ddd;text-align: center; margin:0; "><b>Paciente</b></td>
                <td style="border:1px solid #ddd;text-align: center; margin:0; "><b>Fecha cita</b></td>
                <td style="border:1px solid #ddd;text-align: center; margin:0; "><b>Hora cita</b></td>
              </tr>
              <?php foreach ($query as $row){ ?>
              <tr style="margin:0; ">
                <td style="border:1px solid #ddd;text-align: center;  margin:0; "><?php echo $row['nombres']; ?></td>
                <td style="border:1px solid #ddd;text-align: center;  margin:0; "><?php echo substr($row['fecha_cita'],8,2).'/'.substr($row['fecha_cita'],5,2).'/'.substr($row['fecha_cita'],0,4); ?></td>
                <td style="border:1px solid #ddd;text-align: center;  margin:0; "><?php echo substr($row['hora_cita'],0,2).':'.substr($row['hora_cita'],3,2); ?></td>
              </tr>
              <?php } ?>
            </table>
          </form>

        </div>
      </div>
    </div>





  </body>
</html>
