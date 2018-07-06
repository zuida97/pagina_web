<?php
require_once "../../modelo/class.usuario.php";
require_once "../../modelo/class.servicio.php";
require_once "../../modelo/class.servicioDAO.php";
require_once "../../controlador/controlador.servicio.php";


session_start();
if(isset($_SESSION['usuario']))
{
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../assets/css/form.productos.css">
    <link rel="stylesheet" href="../assets/css/index2.css">
    <title></title>
  </head>
  <body>
      <header class="hd">
            <img src="../assets/img/Logo.png" style="margin: 40px 30px 40px 30px; width: 250px; height:80px;">
            <p><?php echo "Bienvenido ".$_SESSION['usuario']->nombres;  ?></p>
            <?php require_once "menu-usuario.php";?>

      </header>
     <section>
       <?php
         $modulo = (isset($_GET['vst'])) ? $_GET['vst'] : null;
         switch ($modulo) {
           case 1:
                header("Location: ../index.php");
             break;
           case 2:
              require_once 'form-productos.php';
             break;
           case 3:
             require_once 'form-servicios.php';
             break;
             case 4:
                require_once 'form-nosotros.php';
                break;
           default:
             require_once 'index.php';
             break;
         }

        ?>
     </section>



  </body>
</html>
 <?php

}
else{
  header("Location: ../index.php");
}
?>
