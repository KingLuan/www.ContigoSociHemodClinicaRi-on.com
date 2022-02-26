<?php
session_start();
ini_set('display_errors',0);
if ($_SESSION['icargo'] !=1) {
  // code...
  echo "<script> alert('Nefrólogo solo tiene el permiso'); history.go(-1); </script>";
  //header("location: ". $_SERVER['HTTP_REFERER']); history.go(-1); javascript:history.back()
}
if(!empty($_POST)){


require_once "conxion.php";


  $nombres=$_POST["nombre"];
  $apellidos=$_POST["apellido"];
  $cedula=$_POST["cedula"];
  $edad=$_POST["edad"];
  $peso=$_POST["peso"];
  $estatura=$_POST["estatura"];
  $presionarterial=$_POST["presionarterial"];
  $diagnostico=$_POST["diagnostico"];
  $cuadroclinico=$_POST["cuadroclinico"];


    


  if (empty($_POST['nombre'])||empty($_POST['apellido'])||empty($_POST['cedula'])||empty($_POST['edad'])||empty($_POST['peso'])||empty($_POST['estatura'])||empty($_POST['presionarterial'])
  ||empty($_POST['dianostico'])||empty($_POST['cuadroclinico'])){
  
  
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

      $sql = "INSERT INTO expendiente_medico(nombres,apellidos,cedula,edad,peso,estatura,presionarterial,dianostico,cuadro_clinico)
      VALUES('$nombres','$apellidos','$cedula','$edad','$peso','$estatura','$presionarterial','$diagnostico','$cuadroclinico')";

      if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

      $conn->close();

      header("location:expendiente_medico.php"); 

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
    <link rel="stylesheet" href="css/expendiente_medico.css">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
    <script  type="text/javascript" src="js/expediente.js"></script>

  </head>
  <body>

    <div class="container-fluid" id="contenedor">

      <div class="row" >
        <?php require('barra_sesion.php'); ?>
        <?php require('menulateral.php'); ?>
        <div class="col" style=" margin-top: 2%;">
        
          <form class="" id="formE" action="" method="POST">

                <?php
                if(!empty($_GET)){
                    $p=$_GET["paciente"];

                    $mysqli = new mysqli('localhost', 'root', '', 'clinica');
                    $query = $mysqli -> query ("SELECT * FROM historia_clinica WHERE cedula ='$p'");
                    //if(empty($query)){
                    while ($valores = mysqli_fetch_array($query)) {
                  ?>
                  <table class="table responsive "style="width:600px; margin:-20 auto;" >
                  
                  <label class="colort"><h2>Bienvenido a la sesion Nefrología</h2> </label><br>

                    <tr style="border:solid transparent;">
                      <td colspan="3"><H2>Expendiente Medico</H2></td>
                      <td><input type="hidden" class="form-control" name="id_historias" id="id_historias" value=""> </td>
                    </tr>
                    <tr style="border:solid transparent;">
                    
                    <td>Nombres:
                    <input type="text" readonly class="form-control" name="nombre" id="nombre" value="<?php echo $valores["nombres"]; ?>"></td>

                    <td>Apellidos:
                    <input type="text" readonly class="form-control" name="apellido" id="apellido" value="<?php echo $valores["apellidos"]; ?>"></td>
                    
                   
                      <td valing="top">Cedula:
                    <input type="text" class="form-control" readonly name="cedula" id="cedula" value="<?php echo $valores["cedula"]; ?>"></td>
                    
                    </tr>
                    <tr style="border:solid transparent;">
                    <td>Edad:
                    <input type="text" class="form-control" readonly name="edad" id="edad" value="<?php echo $valores["edad"]; ?>"></td>
                    <td>Estatura:
                    <input type="text" class="form-control" name="estatura" id="estatura" value=""></td>
                  
                    <td>Peso:
                    <input type="text" class="form-control" name="peso" id="peso" value=""></td>
                    
                    
                    </tr>

                    <tr>
                    <td colspan="3">Presion Arterial:
                    <input type="text" class="form-control" name="presionarterial" id="presionarterial" value=""></td>
                    </tr>


                    <tr>
                      <td colspan="3">Diagnostico del paciente<br>
                      <textarea name="diagnostico" id="diagnostico" class="form-control" rows="8" cols="80" placeholder="Escriba el diagnostico del paciente..."><?php echo $valores["descripcion"]; ?></textarea></td>
                    </tr>
                    <tr>
                      <td colspan="3">Cuadro Clinico<br>
                      <textarea name="cuadroclinico" id="cuadroclinico" class="form-control" rows="8" cols="80" placeholder="Escriba la descripción del cuadro clinico del paciente..."></textarea></td>
                    </tr>
                    <tr>
                      <td colspan="3"><?php echo isset($alert) ? $alert:''; ?></td>
                    </tr>
                    <tr style="border:solid transparent;">

                      <td><input type="submit" name="btnregistro" value="Registrar"class="btn btn-success">
                        </td>
                        
                    </tr>
                  </table>



            <?php }
            
            
            
            } else{?>
              
              <table class="table responsive "style="width:600px; margin:-20 auto;" >
            
            <label class="colort"><h2>Bienvenido a la sesion Nefrología</h2> </label><br>

              <tr style="border:solid transparent;">
                <td colspan="3"><H2>Expendiente Medico</H2></td>
                <td><input type="hidden" class="form-control" name="id_historias" id="id_historias" value=""> </td>
              </tr>
              <tr style="border:solid transparent;">
              
              <td>Nombres:
              <input type="text" class="form-control" name="nombre" id="nombre" value=""></td>

              <td>Apellidos:
              <input type="text" class="form-control" name="apellido" id="apellido" value=""></td>
              
              <td valing="top">Cedula:
              <input type="text" class="form-control" name="cedula" id="cedula" value=""></td>
                
              </tr>
              <tr style="border:solid transparent;">
              <td>Edad:
              <input type="text" class="form-control" name="edad" id="edad" value=""></td>
              <td>Estatura:
              <input type="text" class="form-control" name="estatura" id="estatura" value=""></td>
            
              <td>Peso:
              <input type="text" class="form-control" name="peso" id="peso" value=""></td>
              
              
              </tr>

              <tr>
              <td colspan="3">Presion Arterial:
              <input type="text" class="form-control" name="presionarterial" id="presionarterial" value=""></td>
              </tr>


              <tr>
                <td colspan="3">Diagnostico del paciente<br>
                <textarea name="diagnostico" id="diagnostico" class="form-control" rows="8" cols="80" placeholder="Escriba el diagnostico del paciente..."></textarea></td>
              </tr>
              <tr>
                <td colspan="3">Cuadro Clinico<br>
                <textarea name="cuadroclinico" id="cuadroclinico" class="form-control" rows="8" cols="80" placeholder="Escriba la descripción del cuadro clinico del paciente..."></textarea></td>
              </tr>
              <tr>
                <td colspan="3"><?php echo isset($alert) ? $alert:''; ?></td>
              </tr>
              <tr style="border:solid transparent;">

                <td><input type="submit" name="btnregistro" value="Registrar"class="btn btn-success">
                  </td>
                  
              </tr>
            </table>
            <?php 
            } ?>
          </form>

        </div>
      </div>
    </div>

  </body>
</html>