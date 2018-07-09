<?php
require_once "../../modelo/class.usuario.php";
require_once "../../modelo/class.servicio.php";
require_once "../../modelo/class.servicioDAO.php";
require_once "../../controlador/controlador.servicio.php";


session_start();
if(!isset($_SESSION['usuario']))
{
  header("Location: ../index.php");
}
else{

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
            <p><?php echo "Bienvenido ".$_SESSION['usuario']->nombres;?></p>

            <form class="" method="post">
              <button type="submit" name="salir" id="cerrar">CERRAR SESIÓN</button></a>
              </form>
              <?php
              if(isset($_POST['salir'])){
                  if(isset($_SESSION['usuario'])){
                      session_destroy();
                      echo "<meta content='0;URL=index.php?' http-equiv='REFRESH'> </meta>";
                }
            }

            ?>



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
         $modulo2 = (isset($_GET['mod'])) ? $_GET['mod'] : null;
         switch ($modulo2) {
            case 1:
              require_once 'form-productos.php';
             break;
            case 2:
                require_once 'form-servicios.php';
                break;
           default:
             break;
         }

         $modulo3 = (isset($_GET['bus'])) ? $_GET['bus'] : null;
         switch ($modulo3) {
            case 1:
              require_once 'form-productos.php';
             break;
            case 2:
                require_once 'form-servicios.php';
                break;
           default:
             break;
         }


        ?>
     </section>



  </body>
</html>
 <?php
}
?>
