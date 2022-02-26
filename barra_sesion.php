<?php


ini_set('display_errors',0);
session_start();
if(empty($_SESSION['active'])) {
  // code...
  header('location: /login');
}

?>
<style type="text/css" >

#off{
background:#F9E79F;
color: #EC7063;
border-radius: 50%;
font-size: 30px;
padding: 5px;
width: 40px;
height: 40px;
text-align: center;
}
#off:hover{
  cursor: pointer;
  transform:  scale(1.1);
  color: #FF0000;
}
.fas{
  background:#D6EAF8;
  color: #27AE60;
  border-radius: 30%;
  line-height: inherit ;
  font-size: 30px;
  padding: 5px;
  width: 40px;
  height: 40px;
  text-align: center;
}
.nombreuser{





  margin:0 2px 0 0;

}
.barra{
  display: flex;
  /*float:right;*/
}
.selector-for-some-widget {
  box-sizing: content-box;
}
.barra>a>i{
  justify-content: center;
}
#fondo{
  flex-wrap: wrap;
  flex-direction: row-reverse;
  text-align: right;
}
.seleccion{

  color: #000;
  cursor: pointer;
  width: 250px;

  -webkit-user-select: none;
  -moz-user-select: none;
  -khtml-user-select: none;
  -ms-user-select: none;
  position: relative;

}
.seleccion:hover{

  background-color: #fff;

}
.textalign{

  margin-left: -25%;
  margin-top: 10px;
  position: absolute;
  top: -5%;
  width: 50px;
  height: -50px;
}
</style>
<!doctype html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" href="/login/flexboxgrid/flexboxgrid.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title></title>
  </head>
  <body>
    <div class="container-fluid" style="padding:auto;">
      <header class="row" style="background: #20c997 ;" id="fondo">
        <div class="col-xs-12">
          <div class="header" style=" padding:7px 1.25rem; ">

            <div class="barra">
              <?php
              require 'conxion.php';require 'cunsulp.php';

              ?>
              <a class="seleccion " href="listausuarios.php">
                 <span class="textalign">
              <?php echo $_SESSION['iuser']; ?></span>
              <i class="fas fa-user-nurse"></i></a>
              <a href="sesionbarra.php"><i class="fa fa-power-off" style="margin-left:10px; text-align:right" aria-hidden="true" title="Salir" id="off"></i></a>

            </div>


          </div>
        </div>
      </header>
    </div>
  </body>
</html>
