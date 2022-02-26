<?php
require 'cunsulp.php';
require 'conxion.php';
ini_set('display_errors',0);

session_start();
if(empty($_SESSION['active'])) {
  // code...
  header('location: /login');
}

$busqueda =($_REQUEST['busqueda']);
    $rol='';
    if ($busqueda==1) {
      // code...
      $rol="OR cargo like '%Gerente%'";
    }else if ($busqueda==2) {
      // code...
      $rol="OR cargo like '%Trabajador%'";
    }
    $repag=mysqli_query($conectar,"SELECT COUNT(*) as totalpacientes FROM login WHERE
    (id like '%$busqueda%' or usuario like '%$busqueda%' or contrasena like '%$busqueda%' )" );
    $result_repag=mysqli_fetch_array($repag);
    $totalpacientes=$result_repag['totalpacientes'];
    $Npagina= 2;
    if (empty($_GET['pagina'])) {
      // code...
      $pagina=1;
    }else {
      // code...
      $pagina=$_GET['pagina'];
    }
    $desde=($pagina-1)*$Npagina;
    $totalPag=ceil($totalpacientes/$Npagina);


    //$consul="SELECT COUNT(*) as totalpacientes FROM login order by usuario asc limit $desde,$Npagina ";
    $consul="SELECT l.id, l.usuario,l.contrasena, c.ncargo FROM login l INNER JOIN cargo c ON 
      l.cargo=c.idcargo WHERE (
      l.id like '%$busqueda%' or
      l.usuario like '%$busqueda%' or
      c.ncargo like '%$busqueda%')
       order by l.id asc limit $desde,$Npagina";
    $resp=mysqli_query($conectar,$consul);
    mysqli_close($conectar);
    $ver1=mysqli_num_rows($resp);

?>
<style>
  <?php include 'css/estilomenu.css'; ?>
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


    <!-- CSS only -->

  </head>
  <body>

    <div class="container-fluid">
      <?php
      $busqueda =strtolower($_REQUEST['busqueda']);

      if (empty($busqueda)) {
        // code...
        //header("location:busqueda_paciente.php");
        //mysqli_close($conectar);
      }
      ?>
      <div class="row">
        <?php require('barra_sesion.php'); ?>
        <?php require('menulateral.php'); ?>
        <div class="col" style="margin-top:7%;">
          

          <table id="example" class="display" cellspacing="0" width="100%" >
        <thead>
            <tr>
                <th>id</th><th>usuario</th><th>contraseña</th><th>Acción</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $mysqli = new mysqli("localhost", "root", "", "clinica");
            if ($mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            exit();
                }
            
                $consulta = "SELECT id, usuario, contrasena FROM login NATURAL JOIN cargo;";

            if ($resultado = $mysqli->query($consulta)) {
                while ($fila = $resultado->fetch_row()) {
                echo "<tr>";
                echo "<td>$fila[0]</td>
                        <td>$fila[1]</td>
                        <td>$fila[2]</td>
                        <td>
                        <a href='editar_usuario.php?id=$fila[0]'><button class='btn btn-primary' name='button' title='Editar'>
                        <i class='fa fa-pencil' aria-hidden='true'></i></button></a>
                        <a href='editar_usuario.php?id=$fila[0]'><button class='btn btn-danger' name='button' title='Eliminar'>
                        <i class='fa fa-trash' aria-hidden='true'></i></button></a>
                        </td>";
                echo"</tr>";
                }
            }
        ?>        
        </tbody>
    </table>
         
        </div>

      </div>
    </div>
  </body>
</html>
