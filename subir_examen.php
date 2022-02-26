<?php



require 'conxion.php';

    if (!empty($_POST)) {

    $paciente=$_POST["paciente"];
    //$pac = explode("_", $paciente);
    $cedula=$_POST["cedula"];
    $ced = explode("_", $cedula);
    $fechac=$_POST["fecha_cita"];



        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "clinica";

         // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

        $aleatorio = mt_rand(100,9999);
        $ruta="";
            if(isset($_FILES['myfile']['tmp_name'])){

                $srcfile=$_FILES['myfile']['tmp_name'];
                $dstfile= "examenes/".$aleatorio.'-'.$_FILES['myfile']['name'];

                copy($srcfile, $dstfile);
                $ruta =  "examenes/".$aleatorio.'-'.$_FILES['myfile']['name'];
            }

            $name=$aleatorio.'-'.$_FILES['myfile']['name'];
            $type=$_FILES['myfile']['type'];
            $size=$_FILES['myfile']['size'];
            $store=$_FILES['myfile']['tmp_name'];


        $sql = "INSERT INTO laboratorio (id_paciente,nombre_paciente,cedula_paciente,archivo,ruta,fecha)
        VALUES('$ced[1]','$paciente','$ced[0]','$name','$ruta','$fechac')";

        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();

    header("location:laboratorio.php");


    }




?>
    <style media="screen">
    </style>
    <!DOCTYPE html>
    <html lang="es" dir="ltr">
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <
    <script type="text/javascript" src="js/subir_examen.js"></script>
    <!-- Iniciamos el segmento de codigo javascript -->

        <meta charset="utf-8">
        <title></title>
    </head>
    <body>

        <div class="container-fluid">
        <div class="row">
            <?php require('barra_sesion.php'); ?>
            <?php require('menulateral.php'); ?>
            <div class="col" style="margin-top:5%;">
            <form class="" action="" method="POST" enctype="multipart/form-data">

            <label class="colort"><h2>Bienvenido a la sesion Laboratorio</h2> </label><br>
                <table style="margin:0 auto;" with="50">

                <tr >
                    <td colspan="2"><h1>Subir Examen</h1>
                    </td>

                </tr>
                <?php require_once 'ajax.php'; ?>
                <tr>
                    <td>Cedula:
                    <td>
                      <input type="text" name="cedula" id="ruc" class="cedula" onchange="if (validarDocumento()){
                          alert('correcto');
                       }else{
                          alert('NO SE PUEDE VALIDAR EL NUMERO DE DOCUMENTO');}" maxlength="10"
                          style=" font-family: verdana,arial,helvetica; height:54%; width:54%;" value="">
                    </td>
                    </td>
                </tr>

                <tr>
                    <td>Paciente:
                    <td><input type="text" name="nombres" id="nombres" style="margin-top:4px; font-family: verdana,arial,helvetica; width:54%;" value="" disabled readonly></td>
                    </td>
                </tr>



                <tr>
                    <td>Fecha registro:
                    <?php
                    date_default_timezone_set('America/Guayaquil');
                    $fcha = date("Y-m-d");?>
                    <td><input type="date" class="form-control" name="fecha_cita" value="<?php echo $fcha;?>" min="3000-01-01" onfocus="this.min=new Date().toISOString().split('T')[0]"  ><br></td>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" style="border:solid;">
                    <br>
                            <input name="myfile" type="file" accept="application/pdf" class="nuevoArticulo"/>
                            <p class="help-block">Peso máximo del documento 5MB, extensiones soportadas <b>.pdf</b> - formato pdf</p>
                    </td>
    <br>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><?php echo isset($alert) ? $alert:''; ?></td>
                </tr>
                <tr>
                    <br><br>
                    <td>
                        <br>
                    <input type="submit" class="btn btn-primary btn-lg btn-success" name="btnacita" value="Subir">
                    </td>
                </tr>

                </table>
            </form>


            </div>

        </div>
        </div>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script  src="js/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="validarfunciones.js"></script>
        <script type="text/javascript" src="validar_cedula.js"></script>
    </body>
    </html>
