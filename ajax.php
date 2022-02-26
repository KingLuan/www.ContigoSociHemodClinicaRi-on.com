<?php
session_start();
ini_set('display_errors',0);

if ($_SESSION['icargo'] !=2) {
  // code...
  echo "<script> alert('El trabajador/a Social no tiene permitido acceder a la función del Nefrologo'); history.go(-1); </script>";
  //header("location: ". $_SERVER['HTTP_REFERER']); history.go(-1); javascript:history.back();
}
require_once('conxion.php');


//buscar por numero de cedula
if ($_POST['action'] == 'recup') {
  // code...
  //print_r($_POST);
  if (!empty($_POST['historia_clinica'])) {
    // code...
    $cedd=$_POST['historia_clinica'];
    //$nomb=$_POST['nombres'];
    $query2=mysqli_query($conectar,"SELECT * FROM Historia_Clinica WHERE cedula like '%$cedd%'");

    $data1=mysqli_num_rows($query2);
    $datt=array();
    if ($data1 > 0 ) {
        $datt=mysqli_fetch_assoc($query2);
        $json1= json_encode($datt,JSON_UNESCAPED_UNICODE);
        print_r($json1);

    }else {
      $datt=0;
    }
    exit;
  }



  }   ?>
