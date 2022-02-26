<?php
session_start();
ini_set('display_errors',0);

if ($_SESSION['icargo'] !=2) {
  // code...
  echo "<script> alert('El trabajador/a Social no tiene permitido acceder a la función del Nefrologo'); history.go(-1); </script>";
  //header("location: ". $_SERVER['HTTP_REFERER']); history.go(-1); javascript:history.back();
}

require 'conxion.php';
if (!empty($_POST)) {
  $alert='';
  if (empty($_POST["nombres"])||empty($_POST["fecha_cita"])||empty($_POST["hora_cita"])) {
    // code...
    $alert='<p class="msg_save">los campos a llenar son obligatorios</p>';
  }else {
    $id_citam=$_POST['id_cita'];
    $cedula=$_POST["cedula"];
    $paciente=$_POST["nombres"];
    $fechac=$_POST["fecha_cita"];
    $horac=$_POST["hora_cita"];
    //$fechar=$_POST["fecha_registro"];
    $medico=$_POST["medico"];
    $horario=$_POST["horario"];
    $espec=$_POST['especialidad'];

    //para historia clinica
    $histt=$_POST['id_historias'];
    //$nomm=$_POST['nombres'];


    $query=mysqli_query($conectar,"SELECT * FROM cita_medica WHERE nombres='$paciente' AND fecha_cita='$fechac'");
    $resultq=mysqli_fetch_array($query);



    if ($resultq>0) {
       

       $alert='<p class="msg_save">ya existe</p>';
    }else {
      $rquery=mysqli_query($conectar,"SELECT * FROM cita_medica WHERE fecha_cita='$fechac' AND hora_cita='$horac'");
      $rresultq=mysqli_num_rows($rquery);
      if ($rresultq>0) {
        $alert='<p class="msg_save">ya existe registro</p>';
      }else {
        $recontar=mysqli_query($conectar,"ALTER TABLE cita_medica auto_increment = 0");
        $insert_citam=mysqli_query($conectar,"INSERT INTO cita_medica(cedula,nombres,fecha_cita,hora_cita,medico,especialidad)
        VALUES('$cedula','$paciente','$fechac','$horac','$medico','$espec')");

        if ($insert_citam) {
           $alert='<p class="msg_save">cita medica agendada con exito</p>';

        }else {
           $alert='<p class="msg_save">No se pudo agendar cita</p>';
        }
      }


    }

  }
}




?>
<style media="screen">
  div#tabla{


    max-width: 400px;
    position: absolute;
    margin: 0;
    padding: 0;
    border: red solid;
    left: 500px;
  }

</style>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">


    <title></title>
    <!--libreria jquery-->


    <!-- js para personalizar -->

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <!--bootstrap css CDN -->




  </head>
  <body>

    <div class="container-fluid">
      <div class="row">
        <?php require('barra_sesion.php'); ?>
        <?php require('menulateral.php'); ?>
        <div class="col" style="margin-top:10%;">
          <form class="" action="" method="POST" enctype="multipart/form-data">
            <table style="margin:0 auto;">
              <tr >
                <td colspan="6"><h1>Agendamiento de citas médicas</h1>
                </td>
              </tr>
              <tr>
                <td>
                  <td><input type="hidden" name="id_cita" value=""></td>

                </td>
                <?php require_once 'ajax.php'; ?>

              </tr>
              <tr>
                <td id="vert">Cédula:
                  <td colspan="2">
                    <input type="hidden" name="action" value="addhistoria" >
                    <input type="hidden" name="id_historias" id="id_historias" value="">
                    <input type="text" name="cedula" id="ruc" class="cedula" onchange="if (validarDocumento()){
                        alert('correcto');
                     }else{
                        alert('NO SE PUEDE VALIDAR EL NUMERO DE DOCUMENTO');}" maxlength="10"
                        style=" font-family: verdana,arial,helvetica; height:54%; width:54%;" value=""></td>



                </td>
              </tr>
              <tr>
                <td >nombres:

                  <td colspan="2">
                    <input type="text" name="nombres" id="nombres" style="margin-top:4px; font-family: verdana,arial,helvetica; width:54%;" value="" disabled readonly>
                  </td>

                </td>
              </tr>
              <?php date_default_timezone_set('America/Mexico_City'); ?>
              <tr>
                <td>Fecha Cita:
                  <td ><input type="date" name="fecha_cita" id="fecha_cita" style="width:33%;" value="" min="<?php $hoy=date("Y-m-d"); echo $hoy;?>" disabled>
                  Hora cita: <select class="" name="hora_cita" id="hora_cita" style="font-family: verdana,arial,helvetica; margin-top:4px; text-align:center;" disabled>
                    <option value="Selecione" >Selecione</option>
                    <option value="08:00" >08:00</option>
                    <option value="08:30" >08:30</option>
                    <option value="09:00" >09:00</option>
                    <option value="09:30" >09:30</option>
                    <option value="10:00" >10:00</option>
                    <option value="10:30" >10:30</option>
                    <option value="11:00" >11:00</option>
                    <option value="14:00" >14:00</option>
                    <option value="14:30" >14:30</option>
                    <option value="15:00" >15:00</option>
                    <option value="15:30" >15:30</option>
                    <option value="16:00" >16:00</option>
                             </select> </td>
                </td>

              </tr>
              <tr>
                <td>Médico:
                  <td>
                    <select class="" name="medico" id="medico" style="font-family: verdana,arial,helvetica; width:54%; margin-top:4px;" disabled>
                      <option value="Selecione" >Selecione</option>
                      <option value="Dra. Elizabeth González González">Dra. Elizabeth González González</option>
                    </select><br>

                    </td>


                </td>
              </tr>
              <tr>
                <td>Especialidad:
                  <td><input type="text" name="especialidad" id="especialidad" value=""style="margin-top:4px; width:54%;" disabled></td>

                </td>
              </tr>
              <tr>
                <td colspan="3"><?php echo isset($alert) ? $alert:''; ?></td>
              </tr>
              <tr>
                <td>
                  <input type="submit" class="btn btn-primary btn-success" name="btnacita" value="Agregar">
                </td>
              </tr>
            </table>


          </form>


        </div>

      </div>
    </div>



    <!--bootstrap js CDN -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script  src="js/jquery-3.6.0.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="validarfunciones.js"></script>
    <script type="text/javascript" src="validar_cedula.js"></script>
    <script type="text/javascript">
      $(document).ready(function (){
        $('#tabla').load('citas_de_dia.php');

        $('.cedula').on('change', function(){
          $('.cedula').('validarcamposexistentes.php');
        });



      });
    </script>
  </body>

</html>
