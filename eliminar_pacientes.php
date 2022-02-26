
<?php






require_once "conxion.php";
ini_set('display_errors',0);
if (!empty($_POST)) {
  // code...

  $alert='';


  $id=$_POST["id_historias"];
  $nombres=$_POST["nombres"];
  $apellidos=$_POST["apellidos"];
  $edad=$_POST["edad"];
  $telefono=$_POST["telefono"];
  $cedula=$_POST["cedula"];
  $codh=$_POST["codigo_historial"];
  $fechanac=$_POST["fecha_nacimiento"];
  $genero=$_POST["genero"];

  $hfoto=$_FILES['foto'];
  $nombref=$hfoto['name'];
  $tipo=$hfoto['type'];
  $archivotemp=$hfoto['tmp_name'];


  $query=mysqli_query($conectar,"SELECT * FROM historia_clinica");
  $result=mysqli_fetch_array($query);

  $fhistoria='img_foto.png';
  if ($nombref!='') {
    // code...
    $ruta='foto/';
    $nombreimg='img_'.md5(date('d-m-Y H:m:s'));
    $fhistoria=$nombreimg.'.jpg';
    $src= $ruta.$fhistoria;
  }

  //$recontar=mysqli_query($conectar,"ALTER TABLE historia_clinica auto_increment = 0");
  $histedit=mysqli_query($conectar, "DELETE FROM historia_clinica WHERE nombres='$nombres'");
  if ($histedit) {
    // code...
    if ($nombref!='') {
      // code...
      move_uploaded_file($archivotemp,$src);
    }
    $alert='<p class="msg_save">Paciente Eliminado con exito</p>';
    header('location: listahistorias.php');

  }else {
    $alert='<p class="msg_error">No se puede Eliminar paciente</p>';
  }
}

if (empty($_GET['id_historias'])) {
  header('location: listahistorias.php');
}
$idd=$_GET['id_historias'];
$query=mysqli_query($conectar,"SELECT * FROM historia_clinica WHERE id_historias=$idd");
mysqli_close($conectar);
$result=mysqli_num_rows($query);

if ($result==0) {
  // code...
  header('location: listahistorias.php');
  mysqli_close($conectar);
}else {
  // code...
  $option='';

  while ($data=mysqli_fetch_array($query)) {
    // code...
    $idd=$data['id_historias'];
    $idnom=$data['nombres'];
    $idape=$data['apellidos'];
    $idedad=$data['edad'];
    $idfoto=$data['foto'];
    $idtelf=$data['telefono'];
    $idced=$data['cedula'];
    $idcodhist=$data['codigo_historial'];
    $idfechnaci=$data['fecha_nacimiento'];
    $idgen=$data['genero'];
    //$idcargo=$data['cargo'];
    //$icargo=$data['idcargo'];
    //$ecargo=$data['ncargo'];
    $foto='';
    $removef='';

    $datopaciente=mysqli_fetch_assoc($query);
    if ($datopaciente['foto']!='img_foto.png') {
      // code...
      $removef='';
      $foto='<img src="foto/'.$datopaciente['foto'].'" alt="" />';
    }

  }


}





?>
<style media="screen">

</style>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/historia_clinica.css">

  </head>
  <body>

    <div class="container-fluid" id="contenedor">

      <div class="row" >
        <?php require('barra_sesion.php'); ?>
        <?php require('menulateral.php'); ?>
        <div class="col" style=" margin-top: 4%;">
          <form class="" action="" method="POST" enctype="multipart/form-data">
            <table class="table responsive "style="width:600px; margin:-20 auto;" >


              <tr style="border:solid transparent;">
                <td colspan="6"><b>¿Desea Eliminar este Regitro?</b><br><br>
                Si lo Elimina, no podrá recuperar el registro a eliminar</td>
                <td><input type="hidden" name="id_historias" value="<?php echo $idd; ?>"> </td>
              </tr>
              <tr style="border:solid transparent;">
                <td>Nombres:
                <input type="text" name="nombres" value="<?php echo $idnom; ?>" id="RCt"></td>
                <td>Apellidos:
                <input type="text" name="apellidos" value="<?php echo $idape; ?>" disabled></td>
                <td >Edad:
                <input type="text" name="edad" value="<?php echo $idedad; ?>" disabled></td>
                <td colspan="2" rowspan="2" style="border:solid;">
                <input type="file" name="foto" id="foto" value="<?php echo $datopaciente['foto']; ?>" disabled></td>
              </tr>
              <tr style="border:solid transparent;">
                <td>Teléfono:
                <input type="text" name="telefono" value="<?php echo $idtelf; ?>" disabled></td>
                <td>Cédula:
                <input type="text" name="cedula" value="<?php echo $idced; ?>" disabled></td>
                <td>Código Historial:
                <input type="text" name="codigo_historial" value="<?php echo $idcodhist; ?>" disabled></td>
              </tr>
              <tr style="border:solid transparent;">
                <td>Fecha de Nacimiento:<br>
                <input type="date" name="fecha_nacimiento" value="<?php echo $idfechnaci; ?>" style="text-align:center; width:100%; height:100%;" disabled></td>
                <td >Género:<br>
                <select class="" name="genero" style="width:100%; height:100%; padding:0; margin:0 auto;" disabled>
                  <option value="Masculino" disabled>Masculino</option>
                  <option value="Femenino" disabled>Femenino</option>
                  <option value="Otro" disabled>Otro</option>
                </select> </td>
              </tr>


              <tr>
                <td colspan="3"><?php echo isset($alert) ? $alert:''; ?></td>
              </tr>
              <tr style="border:solid transparent;">

                <td><a href="listahistorias.php"><input type="submit" name="btnregistro" value="Eliminar"class="btn btn-success"></a>
                    <a href="listahistorias.php"><input type="submit" name="btnregistro" value="Cancelar"class="btn btn-danger"></a>
                  </td>
                <td>
                  </td>
              </tr>
            </table>
          </form>

        </div>
      </div>
    </div>

  </body>
</html>
