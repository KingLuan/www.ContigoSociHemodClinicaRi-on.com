<?php

require 'conxion.php';


            

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
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/estilomenu.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
        <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" charset="utf8" src="JS/paciente3.js"></script>
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

        <div class="" style="padding:2px; padding-top:10px;">
              <label class="colort"><h2>Lista de Pacientes registrados</h2></label>
        </div>

        <form class="form-inline" method="POST" action="">
          
      <label>Fecha Desde:</label>
      <input type="date" class="form-control" placeholder="Start"  name="date1" id="date1"/>
      <label>Hasta</label>
      <input type="date" class="form-control" placeholder="End"  name="date2" id="date2"/>

      <button class="btn btn-primary" name="search" onclick="validar();"><span class="fa-solid fa-magnifying-glass"></span></button>
    </form>
          <form class="" action="" method="POST">

            <table  id="example" class="display">
              <thead>
              <tr>
                <th style="border:solid #ddd;text-align: center; "><b>Id</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>fecha</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>Nombres</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>Apellidos</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>Edad</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>Foto</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>Teléfono</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>Cédula</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>Fecha de Nacimiento</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>Género</b></th>
                <th style="border:solid #ddd;text-align: center; "><b>Acciones</b></th>
              </tr>
              </thead>

              <?php 

              $consult="";
                            
              if(ISSET($_POST['search'])){

                $date1 = date("Y-m-d", strtotime($_POST['date1']));
                $date2 = date("Y-m-d", strtotime($_POST['date2']));

                $consult="SELECT * FROM Historia_Clinica WHERE historia_clinica.fecha_nacimiento BETWEEN '$date1' AND '$date2'";

              }  else {

                $consult="SELECT * FROM Historia_Clinica";
              }


              $query=mysqli_query($conectar,$consult);
              $ver=mysqli_fetch_array($query);

              
              foreach ($query as $col){ ?>
<tr>
                <td style="border:solid #ddd;text-align: center; "><a><?php echo $col['id_historias']; ?></a></td>

                <td style="border:solid #ddd;text-align: center; "><a><?php echo $col['fecha']; ?></a></td>
                <td style="border:solid #ddd;text-align: center; "><a><?php echo $col['nombres']; ?></a></td>
                <td style="border:solid #ddd;text-align: center; "><a><?php echo $col['apellidos']; ?></a></td>
                <td style="border:solid #ddd;text-align: center; "><a><?php echo $col['edad']; ?></a></td>
                <td style="border:solid #ddd;text-align: center; "><a><img src="foto/<?php echo $col['foto']; ?>" alt="" style="width:40px; height:60px;"></a></td>
                <td style="border:solid #ddd;text-align: center; "><a><?php echo $col['telefono']; ?></a></td>
                <td style="border:solid #ddd;text-align: center; "><a><?php echo $col['cedula']; ?></a></td>
                <td style="border:solid #ddd;text-align: center; "><a><?php echo $col['fecha_nacimiento'];//substr($col['fecha_nacimiento'],8,2)."".substr($col['fecha_nacimiento'],7,1)."".substr($col['fecha_nacimiento'],5,2)."".substr($col['fecha_nacimiento'],7,1)."".substr($col['fecha_nacimiento'],0,4); ?></a></td>
                <td style="border:solid #ddd;text-align: center; "><a><?php echo $col['genero']; ?></a></td>
                <td class="" style="border:solid #ddd;text-align: center; ">

                  <a href="editar_pacientes.php?id_historias=<?php echo $col['id_historias']; ?>">
                    <button class="btn btn-primary" type="button" name="button" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                  </a>


                  <a href="eliminar_pacientes.php?id_historias=<?php echo $col['id_historias'] ?>"><button class="btn btn-danger" type="button" name="button" title="Eliminar">
                                                                            <i class="fa fa-trash" aria-hidden="true"></i></button></a>

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
