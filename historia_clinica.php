<?php



session_start();
ini_set('display_errors',0);
if ($_SESSION['icargo'] !=2) {
  // code...
  echo "<script> alert('El Nefrologo/a no tiene permitido acceder a la función de Trabajador/a Social'); history.go(-1); </script>";
  //header("location: ". $_SERVER['HTTP_REFERER']); history.go(-1); javascript:history.back()
}


require_once "conxion.php";
if (!empty($_POST)) {
  // code...

  $alert='';


  if (empty($_POST['nombres'])||empty($_POST['apellidos'])||empty($_POST['edad'])
  ||empty($_POST['telefono'])||empty($_POST['cedula'])||empty($_POST['fecha_nacimiento'])){
    // code...
    $alert='<p class="msg_error">los campos a registrar son obligatorios</p>';
  }else{
    $id=$_POST["id_historias"];
    $nombres=$_POST["nombres"];
    $apellidos=$_POST["apellidos"];
    $edad=$_POST["edad"];
    $fhistoria=$_POST['foto'];
    $telefono=$_POST["telefono"];
    $cedula=$_POST["cedula"];
    //$codh=$_POST["codigo_historial"];
    $fechanac=$_POST["fecha_nacimiento"];
    $genero=$_POST["genero"];

    $hfoto=$_FILES['foto'];
    $nombref=$hfoto['name'];
    $tipo=$hfoto['type'];
    $archivotemp=$hfoto['tmp_name'];


    //$query=mysqli_query($conectar,"SELECT * FROM historia_clinica WHERE nombres='$nombres'");
    //$result=mysqli_fetch_array($query);
    if ($result>0) {
      // code...
      $alert='<p class="msg_save">Ya existe</p>';
    }else {
      $fhistoria='img_foto.png';
      if ($nombref!='') {
        // code...
        $ruta='foto/';
        $nombreimg='img_'.md5(date('d-m-Y H:m:s'));
        $fhistoria=$nombreimg.'.jpg';
        $src= $ruta.$fhistoria;
      }

      $recontar=mysqli_query($conectar,"ALTER TABLE historia_clinica auto_increment = 0");
      $histinsert=mysqli_query($conectar, "INSERT INTO historia_clinica(nombres,apellidos,edad,foto,telefono,cedula,fecha_nacimiento,genero)
      VALUES('$nombres','$apellidos','$edad','$fhistoria','$telefono','$cedula','$fechanac','$genero')");

      if ($histinsert) {
        // code...
        if ($nombref!='') {
          // code...
          move_uploaded_file($archivotemp,$src);
        }
        $alert='<p class="msg_save">Paciente registrado con exito</p>';
        //header('location: listahistorias.php';

      }else {
        $alert='<p class="msg_error">No se puede registrar paciente</p>';
      }

  }




  }
}
if (empty($_REQUEST['id_historias'])) {
  //header('location: listahistorias.php');
}else {
  $idd=$_REQUEST['id_historias'];
  $query=mysqli_query($conectar,"SELECT * FROM historia_clinica WHERE id_historias=$idd");
  //mysqli_close($conectar);
  $result=mysqli_num_rows($query);
  $fotob='';
  $removef='notitemone';

  if ($result>0) {
    // code...
    //header('location: listahistorias.php');
    //mysqli_close($conectar);




    $datopaciente= mysqli_fetch_assoc($query);
    if ($datopaciente['foto'] !='img_foto.png') {
      // code...
      $removef='';
      $fotob='<img src="foto/'.$datopaciente['foto'].'" alt="" id="imageinput" style="position:absolute; width:100px; height:100px; top:25px;    "/>';
    }
    //print_r($datopaciente);
  }else {
    // code...

  }
}






?>
<style media="screen">
  input#foto{
    position: sticky;

    top: 0px;
    left: 0px;
    right: 0px;
    bottom: 0px;
    width: 100px;
    height:147px;
    background: white;
    opacity: 0;

  }
  div#divr{


    position: relative;
    margin:0;
    padding: 0;
    width: 100%;
    height: 0;


  }
  div.div4{

    position: sticky;
    text-align: center;
  }
</style>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="css/historia_clinica.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.1/jquery-ui.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.1/jquery-ui.min.js"></script>
    <script  src="js/jquery-3.6.0.min.js" type="text/javascript"></script>
  </head>
  <body>

    <div class="container-fluid" id="contenedor">

      <div class="row" >
        <?php require('barra_sesion.php'); ?>
        <?php require('menulateral.php'); ?>
        <div class="col" style=" margin-top: 7%;">
          <form class="" action="" method="POST" enctype="multipart/form-data">
            <table class="table responsive "style="width:600px; margin:-20 auto;" >


              <tr style="border:solid transparent;">
                <td colspan="2"><h4>Registro de Pacientes</h4> </td>
                <td><input type="hidden" name="id_historias" value=""> </td>
              </tr>

              
              <tr style="border:solid transparent;">
                <td>Cédula:
                <input type="text" name="cedula" class="solo_n" id="ruc" onchange="if (validarDocumento()){
                      alert('correcto');
                   }else{
                      alert('NO SE PUEDE VALIDAR EL NUMERO DE DOCUMENTO');}" maxlength="10" value="<?php echo $datopaciente['cedula']; ?>"></td>
                <td>Nombres:
                <input type="text" name="nombres" class="solo_t" value="" id="RCt"></td>
                <div id="divr" >
                  <td colspan="2" rowspan="2" style="border:solid; padding:0; margin:0;" id="VNN">
                  <a href="#" name="nn">

                  <label for="" name="rf" class="ot ocu" style="margin:0; padding:0; position:absolute; top:90px; right:169px;">Agregar</label>

                  <div class="div4">
                    <?php echo $fotob;?>
                    <input class="div4" type="file" name="foto" id="foto" accept="image/png,.jpg,.jpeg,.bmp,.tiff" value="<?php echo $datopaciente['foto'];?>">
                  </div>
                   </a>
                  </td>
                </div>
              </tr>
              <tr style="border:solid transparent;">
                <td>Apellidos:
                <input type="text" name="apellidos" class="solo_t" value=""></td>
                <td>Fecha de Nacimiento:<br>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="" style="width:86%; height:100%;"></td>
                
              </tr>
              


              <tr style="border:solid transparent;">
                <td >Edad:
                <input type="text" name="edad" id="edad" class="solo_n" value="<?php echo $datopaciente['edad'] ?>"></td>
                <td>Teléfono:
                <input type="text"  name="telefono" class="solo_n" value="<?php echo $datopaciente['telefono']; ?>"></td>
                <td >Género:<br>
                <select class="" name="genero" style="width:100%; height:100%; padding:0; margin:0 auto;">
                  <option value="Masculino">Masculino</option>
                  <option value="Femenino">Femenino</option>
                  <option value="Otro">Otro</option>
                </select> </td>

               
              </tr>
              <tr>
                <td colspan="3"><?php echo isset($alert) ? $alert:''; ?></td>
              </tr>
              <tr style="border:solid transparent;">

                <td><a href="listahistorias.php"><input type="submit" name="btnregistro" value="Registrar"class="btn btn-success"></a>
                  </td>
              </tr>
            </table>
          </form>
          <script type="text/javascript">
          $(document).ready(function(){
            var $imageinput, $image,$imff, $ced;
            $imageinput= $('#foto');
            $image= $('#imageinput');
            $ced=$('#ced');
            var nav = window.URL || window.webkitURL;
            //$('.fa-camera').remove();
            $('.vv').remove();
            $('.ot').remove();
            $imageinput.on('change',function(){
              if ($image!='') {
                $('#imageinput').remove();
                $('.vv').remove();

                var objeto_url = nav.createObjectURL(this.files[0]);
                $('#VNN').append("<div class='div4'><img src="+objeto_url+" id='imageinput' style='position:absolute; width:100px; height:100px; top:-120px; right:5px;'></div>");
                //$('.ocu').removeClass('img');
              }else {
              }
            });

            $(".solo_t").on('input', function () {
              this.value=this.value.replace(/^[a-zA-ZÀ-ÿ\s]{4,15}$/^[a-zA-ZáéíóúÁÉÍÓÚÜüñÑ]/g,'');
            });
            $(".solo_n").on('input', function () {
              this.value=this.value.replace(/[^0-9]/g,'');
            });
          });
          </script>
        </div>
      </div>
    </div>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="validar_cedula.js"></script>
    <script type="text/javascript" src="validarfunciones.js"></script>

  </body>
</html>
