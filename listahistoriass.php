<?php
session_start();
ini_set('display_errors',0);
if ($_SESSION['icargo'] !=2) {
  // code...
  echo "<script> alert('Trabajo Social solo tiene el permiso'); history.go(-1); </script>";
  //header("location: ". $_SERVER['HTTP_REFERER']); history.go(-1); javascript:history.back()
}

require 'conxion.php';

$consult="SELECT * FROM Historia_Clinica ";
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
          <form class="" action="historia_clinica.php" method="POST" enctype="multipart/form-data">
            <div class="">

                <label class="colort"><h2>Bienvenido a la sesion trabajador</h2> </label><br>

              <a href="historia_clinica.php">
              <button type="submit" name="button" class="colfondo" value="" >
                <i class="fa fa-plus-circle" aria-hidden="true" style="font-size:22px; line-height:40px!important;"></i>  <label style="line-height:-10px;">Agregar </label> </button><br></a>

            </div>

          </form>

          </table>
        </div>
      </div>
    </div>
  </body>
</html>
