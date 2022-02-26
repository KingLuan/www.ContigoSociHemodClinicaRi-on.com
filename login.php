<?php


//ini_set('display_errors',0);



try {
  $alert='';
  session_start();
  if(!empty($_SESSION['active'])) {
    // code...
    //header('location: intro.php');
  }else{
  if(!empty($_POST)) {
    // code...
    if (empty($_POST['usuario'])||empty($_POST['contrasena'])) {
      // code...
      $alert='Ingrese usuario y contraseña';
    }else {
      require_once "conxion.php";
      $nombre=$_POST["usuario"];
      $pass=$_POST["contrasena"];
      $respuesta=mysqli_query($conectar,"SELECT *  FROM login WHERE usuario='$nombre' AND contrasena='$pass'");
      //$nr=mysqli_fetch_array($respuesta);
      if ($nr>0) {
        // code...
        //$data=mysqli_fetch_array($respuesta);
        //print_r($data);
        $_SESSION['active']=true;
        $_SESSION['iuser']= $data['usuario'];
        $_SESSION['ipass']= $data['contrasena'];
        $_SESSION['icargo']=$data['cargo'];
        //header('location: login/historia_clinica.php/');
        if($_SESSION['icargo']=='Gerente') {
          // code...
          //$data=mysqli_fetch_array($respuesta);
          header('location: intro.php');
        }else if($_SESSION['icargo']=='Trabajador'){
          //$data=mysqli_fetch_array($respuesta);
          header('location: historia_clinica.php');
        }

      }else {
        $alert='usuario y contraseña incorrectos';
        session_destroy();

      }
    }
  }
  }
    /*if (isset($_POST["Ingresar"])) {
      session_start();
    // code...
    $respuesta=mysqli_query($conectar,"SELECT *  FROM login WHERE usuario='$nombre' AND contrasena='$pass'");
    $nr=mysqli_num_rows($respuesta);
    //$res2=mysqli_query($conectar,"SELECT * FROM login WHERE cargo=?");
    //$nr2=mysqli_fetch_row($res2);$nr==1
    if(isset($_REQUEST['usuario']) && isset($_REQUEST['contrasena']) && isset($_REQUEST['cargo']) ){


      $cargo="SELECT * FROM login";
      include("./historia_clinica.php");
      /*if ($cargo=='Gerente') {
        // code...


      }else if ($cargo=='Trabajador') {
        // code...
        include("./busqueda_paciente.php");
      }*/


      /*if (mysqli_num_row($res2)>0) {
        // code...

      }else if (mysqli_num_row($res2)>0) {
        // code...
        session_start();
        include ("historia_clinica.php");
      }


    }else {
      echo "<script> alert('NO EXISTEc'); window.location='/login' </script>";
    }

  }*/
} catch (\Exception $e) {

}






?>
