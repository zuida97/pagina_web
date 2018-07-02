<?php
require_once "../../modelo/class.usuario.php";
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

    <div class="">
      <header>
        <nav>
          <?php
            require_once "menu-usuario.html";
           ?>
        </nav>

      </header>
    </div>

    <?php
      echo "Bienvenido ".$_SESSION['usuario']->nombres;
     ?>
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
