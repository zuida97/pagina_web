<?php
require_once "../modelo/class.usuario.php";
session_start();
if(isset($_SESSION['usuario']))
{
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      echo "Bienvenido ".$_SESSION['usuario']->nombres;

     ?>


  </body>
</html>
 <?php

}
else{
  // header("Location: index.php");
}
?>
