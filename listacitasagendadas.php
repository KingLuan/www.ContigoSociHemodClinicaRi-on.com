<?php
session_start();


if ($_SESSION['icargo'] !=2) {
  // code...
  echo "<script> alert('El trabajador/a Social no tiene permitido acceder a la función del Nefrologo'); history.go(-1); </script>";
  //header("location: ". $_SERVER['HTTP_REFERER']); history.go(-1); javascript:history.back();
}
require 'conxion.php';
$consult="SELECT * FROM cita_medica ";
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
  /*div#tabla{


    margin-top: 60px;
    margin-right: 500px;
    margin-left: -500px;


  }

  .div5{

    position: sticky;
    margin:0;
    padding:0;
  }*/
  .div4{

    /*position: relative;*/


  }


  /*#mostrar{

    display: inline-table;
    color: black;
  }
  #ocultar{

    display: inline-table;
    color: black;
  }
  #mostrar:hover{


    color: #d4d7da;
  }
  #ocultar:hover{


    color: #d4d7da;
  }*/
</style>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/login/flexboxgrid/flexboxgrid.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

                <label class="colort"><h2>Agendamiento de Citas</h2> </label><br>


              <a href="agendamiento_citas.php">
              <button type="button" name="button" class="colfondo" style="text-align:center;">
                <i class="fa fa-plus-circle" aria-hidden="true" style="font-size:22px; line-height:42px!important;"></i>
                <span style="color:black;">Agendar cita</span> </button><br></a>

            </div>

            <div class="" style="padding:2px; padding-top:10px;">
              <label class="colort"><h2 style="">Lista de Citas Agendadas</h2></label>
            </div>


            <div class="div4  " id="mm" style="padding:2px; padding-top:10px; display:flex; justify-content: center; ">
              <div class="row" style="text-align:center; ">

                  <a href="#" class="btn " id="mostrar" style=" color:black; border-left:solid #ddd; border-right:solid #ddd; border-top:solid #ddd; display:block; width:30%;">Citas Agendadas para Hoy</a>
                  <a href="#" class="btn " id="mostrar2" style=" color:black; border-left:solid #ddd; border-right:solid #ddd; border-top:solid #ddd; display:block; width:30%;">Citas Agendadas para mañana</a>
                  <a href="#" class="btn " id="ocultar" style=" color:black; border-left:solid #ddd; border-right:solid #ddd; border-top:solid #ddd; display:block; width:30%;"><span>Citas Agendadas</span></a>

                </div>

            </div>
            <table style="text-align:center; margin-left: 30%;">
              <div class="row" style="align-items:center;">
                <tr  style=" margin:0; ">
                  <td id="tabla" style="margin: 0;text-align:center;"></td>
                </tr>
                <tr  style=" margin:0; ">
                  <td id="tabla15" style="margin: 0;text-align:center; display:none;"></td>
                </tr>
              </div>

            </table>
              <table class="table responsive" id="tabla2" style=" display: none; margin-top:10px;" >

                <tr >
                  <td style="border:solid #ddd; text-align:center; font-size:15px;"><b>Cedula</b></td>
                  <td style="border:solid #ddd; text-align:center; font-size:15px;"><b>Pacientes</b></td>
                  <td style="border:solid #ddd; text-align:center; font-size:15px;"><b>Fecha</b></td>
                  <td style="border:solid #ddd; margin:0; text-align:center; font-size:15px;"><b>Hora</b></td>
                  <td style="border:solid #ddd; margin:0; text-align:center; font-size:15px;"><b>Médico</b></td>

                  
                  <td style="border:solid #ddd; text-align:center; margin:0; font-size:15px;" colspan="2"><b>Acciones</b></td>
                </tr>
                <?php foreach ($query as $col){ ?>
                <tr style="">
                  <td style="border:solid #ddd; text-align:center; margin:0; font-size:15px;"><?php echo $col['cedula']; ?></td>
                  <td style="border:solid #ddd; text-align:center; margin:0; font-size:15px;"><?php echo $col['nombres']; ?></td>
                  <td style="border:solid #ddd; text-align:center; margin:0; font-size:15px;"><?php echo $col['fecha_cita']; ?></td>
                  <td style="border:solid #ddd; text-align:center; margin:0; font-size:15px;"><?php echo $col['hora_cita']; ?></td>
                  <td style="border:solid #ddd; text-align:center; margin:0; font-size:15px;"><?php echo $col['medico']; ?></td>
                  <td style="border:solid #ddd; text-align:center; font-size:15px;"><a href="reagendar_cita.php?id_cita=<?php echo $col['id_cita'] ?>" ><button type="button" name="button" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></button> </a>
                  <a href="elimianarcita.php?id_cita=<?php echo $col['id_cita'] ?>" ><button type="button" name="button" class="btn btn-danger" ><i class="fa fa-trash" aria-hidden="true"></i></button> </a> </td>
                </tr>
                <?php } ?>

              </table>


          </form>

        </div>

      </div>

    </div>
    <div ></div>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="validarfunciones.js"></script>
    <script type="text/javascript" src="validar_cedula.js"></script>
    <script type="text/javascript">
      $(document).ready(function (){

        //document.getElementById('mostrar').style.display=;
        //$('#tabla').hide();
        $('#tabla').load('citas_de_dia.php');
        $('#tabla15').load('citas_de_dia2.php');
        $('#mostrar').on('click', function(){
          //$('#tabla2').hide();
          $('#tabla').show();
          document.getElementById('tabla15').style.display= 'none';
          document.getElementById('tabla2').style.display= 'none';
          //document.getElementById('tabla3').style.display= 'none';

          //document.getElementById('tabla').style.display= 'inline-block';



        });
        $('#mostrar2').on('click', function(){
          //$('#tabla2').hide();
          $('#tabla15').show();
          document.getElementById('tabla2').style.display= 'none';
          document.getElementById('tabla').style.display= 'none';
          //document.getElementById('tabla3').style.display= 'none';

          //document.getElementById('tabla').style.display= 'inline-block';



        });
        $('#ocultar').on('click', function(){
          $('#tabla2').show();
          document.getElementById('tabla').style.display= 'none';
          document.getElementById('tabla15').style.display= 'none';
          //$('#mostrar').show();
          document.getElementById('tabla2').style.display= 'fixed';
          //document.getElementById('tabla3').style.display= 'block';

        });



      });
    </script>
  </body>
</html>
