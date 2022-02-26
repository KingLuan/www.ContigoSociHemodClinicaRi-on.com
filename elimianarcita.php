<?php
session_start();
ini_set('display_errors',0);
error_reporting(E_ALL);

if ($_SESSION['icargo'] !=2) {
  // code...
  echo "<script> alert('El trabajador/a Social no tiene permitido acceder a la función del Nefrologo'); history.go(-1); </script>";
  //header("location: ". $_SERVER['HTTP_REFERER']); history.go(-1); javascript:history.back();
}

require 'conxion.php';
if (!empty($_POST)) {
  $alert='';
  if (empty($_POST["nombres"])||empty($_POST["fecha_cita"])) {
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


    $query=mysqli_query($conectar,"SELECT * FROM cita_medica");
    $resultq=mysqli_fetch_array($query);



       // code...
       //$alert='<p class="msg_save">ya existe</p>';
       //$recontar=mysqli_query($conectar,"ALTER TABLE cita_medica auto_increment = 0");
       $insert_citam=mysqli_query($conectar,"DELETE FROM cita_medica WHERE nombres='$paciente'");
       if ($insert_citam) {
          $alert='<p class="msg_save">cita medica eliminada con exito</p>';

       }else {
          $alert='<p class="msg_save">No se pudo eliminar cita</p>';
       }


  }
}

if (empty($_GET['id_cita'])) {
  // code...

}else{
  $cedul=$_GET['id_cita'];
  $resarray=mysqli_query($conectar,"SELECT * FROM cita_medica WHERE id_cita='$cedul'");
  $respuesta33=mysqli_num_rows($resarray);

  if ($respuesta33>0) {
    while ($numarray=mysqli_fetch_array($resarray)) {
      $cedulat=$numarray['cedula'];
      $nombrest=$numarray['nombres'];
      $fcitat=$numarray['fecha_cita'];
      $hcitat=$numarray['hora_cita'];
      $medicot=$numarray['medico'];
      $horariot=$numarray['horario'];
      $especialidadt=$numarray['especialidad'];


      $datot=mysqli_fetch_assoc($resarray);
    }
  }



}




?>

<style media="screen">
  #cancel:hover{

    color: #fff !important;


  }
  #elim{

    background-color: #FFBF00;
    color: #fff !important;
  }
  #elim:hover{

    background-color: #ebb000;
  }
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
        <div class="col" style="margin-top:7%;">
          <form class="" action="" method="POST">
            <table style="width:600px; margin:0 auto;">
              <tr style="">
                <td colspan="8" style=""><b><h2>¿Desea Eliminar este Agendamiento?</h2> </b><br>
                  &nbsp;&nbsp;&nbsp;&nbsp;Si lo Elimina, no se podrá recuperar<br><br></td>
                <td><input type="hidden" name="id_historias" value="<?php echo $idd; ?>"> </td>
              </tr>
              <tr>
                <td>
                  <td><input type="hidden" name="id_cita" value="<?php echo $cedul; ?>"></td>

                </td>


                <?php //require_once 'ajax.php'; ?>





              </tr>
              <tr>
                <td id="vert">Cédula:
                  <td colspan="2">
                    <input type="hidden" name="action" value="addhistoria" >
                    <input type="hidden" name="id_historias" id="id_historias" value="">
                    <input type="text" name="cedula" id="ruc" onchange="if (validarDocumento()){
                        alert('correcto');
                     }else{
                        alert('NO SE PUEDE VALIDAR EL NUMERO DE DOCUMENTO');}" maxlength="10"
                        style=" font-family: verdana,arial,helvetica; height:54%; width:54%;" value="<?php echo $cedulat; ?>"></td>



                </td>
              </tr>
              <tr>
                <td >nombres:

                  <td colspan="2">
                    <input type="text" name="nombres" id="nombres" style="margin-top:4px; font-family: verdana,arial,helvetica; width:54%;" value="<?php echo $nombrest; ?>" readonly>
                  </td>

                </td>
              </tr>
              <?php date_default_timezone_set('America/Mexico_City'); ?>
              <tr>
                <td>Fecha Cita:
                  <td ><input type="date" name="fecha_cita" id="fecha_cita" style="width:33%;" value="<?php echo $fcitat; ?>" min="<?php $hoy=date("Y-m-d"); echo $hoy;?>">
                  Hora cita: <select class="" name="hora_cita" id="hora_cita" style="font-family: verdana,arial,helvetica; margin-top:4px; text-align:center;" disabled>
                    <option value="Selecione" disabled>Selecione</option>
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
                <td>Médico:<br>
                  <td>
                    <select class="" name="medico" id="medico" style="font-family: verdana,arial,helvetica; width:54%; margin-top:4px;">
                      <option value="Selecione" >Selecione</option>
                      <!--<option value="Dra. Elizabeth González González">Dra. Elizabeth González González</option>-->
                      <option value="<?php echo $medicot; ?>"><?php echo $medicot; ?></option>
                    </select><br>
                    </td>

                </td>
              </tr>
              <tr>
                <td>Especialidad:
                  <td><input type="text" name="especialidad" id="especialidad"  style="margin-top:4px; width:54%;" value="<?php echo $especialidadt; ?>"></td>

                </td>
              </tr>
              <tr>
                <td colspan="3"><?php echo isset($alert) ? $alert:''; ?></td>
              </tr>
              <tr>
                <!--<td>
                  <input type="submit" class="btn btn-primary btn-success" name="btnacita" value="Agregar">
                </td>-->
                <td><a href="listacitasagendadas.php"><input type="submit" name="btnregistro" id="elim" value="Eliminar" title="Eliminar" class="btn"></a>
                    <a href="listacitasagendadas.php" role="button" class="btn btn-danger" id="cancel" title="Cancelar">Cancelar</a>
                  </td>
              </tr>
            </table>


          </form>


        </div>

      </div>
    </div>



    <!--bootstrap js CDN -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="validarfunciones.js"></script>
    <script type="text/javascript" src="validar_cedula.js"></script>
    <script type="text/javascript">
      $(document).ready(function (){
        $('#tabla').load('citas_de_dia.php');
      });
    </script>
  </body>

</html>
