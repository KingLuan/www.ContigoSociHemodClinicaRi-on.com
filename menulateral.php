<?php
session_start();
if(empty($_SESSION['active'])) {
  // code...
  header('location: /login');
}

?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" >
    <script src="https://kit.fontawesome.com/bb1110edd4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <title></title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/estilomenu.css">
  </head>
  <body>
    <div class="d-flex">

      <header id="bfond" class="bg-primary" >
        <div id="slidebar-container" class="col-xs-12" >

          <div class="logo" >
            <a href="intro.php"><h4 class="text-light font-weight-bold" href="intro.php" title="Inicio">Menu</h4></a>

          </div>
          <div class="menu">
            <?php if ($_SESSION['icargo']==2) { ?>
            <a href="listahistorias.php "class="d-block text-light p-3" id="slideb" title="Registro de Pacientes"><i class="fa fa-h-square mr-2 lead"style="font-size:20px;"></i>Registro de Pacientes</a>
            <a href="pacientes3.php"class="d-block text-light p-3" id="slideb"><i class="icon ion-md-people mr-2 lead"style="font-size:15px;"></i>Pacientes</a>
            <a href="listacitasagendadas.php"class="d-block text-light p-3" id="slideb" title="Agendar cita"><i class="fa fa-calendar mr-2 lead" style="font-size:20px;"></i>Agendar cita</a>

            <?php }else if ($_SESSION['icargo']==1) { ?>
            <a href="expendiente_medico.php "class="d-block text-light p-3" id="slideb" title="Expendiente Medico"><i class="fa fa-h-square mr-2 lead"style="font-size:20px;"></i>Expendiente Medico</a>
            <a href="listacitasagendadass.php"class="d-block text-light p-3" id="slideb" title="Verificar cita"><i class="fa fa-calendar mr-2 lead" style="font-size:20px;"></i>Verificar cita</a>
            <a href="verificar_examen.php"class="d-block text-light p-3" id="slideb" ><i class="fa fa-search mr-2 lead" style="font-size:20px;"></i>Verificar Examen</a>
            <?php }else if ($_SESSION['icargo']==3) { ?>
            <a href="ajuste_usuario.php"class="d-block text-light p-3" id="slideb" title="Ajuste de usuario"><i class="fa fa-setting mr-2 lead" style="font-size:20px;"></i>Ajuste de usuario</a>
            <?php }else if ($_SESSION['icargo']==4) { ?>
            <a href="laboratorio.php "class="d-block text-light p-3" id="slideb" title="Expendiente Medico"><i class="fa-solid fa-dna" style="font-size:20px;"></i>Laboratorio</a>
            <?php } ?>
            <?php if ($_SESSION['icargo']==2 || $_SESSION['icargo']==1 ) { ?>
            <a href="pacientes3.php"class="d-block text-light p-3" id="slideb" ><i class="fa fa-search mr-2 lead" style="font-size:20px;"></i>Búsqueda de<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pacientes</a>
            <?php } ?>
          </div>


        </div>
      </header>
    </div>

  </body>
</html>
