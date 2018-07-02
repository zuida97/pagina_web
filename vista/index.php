<?php
require_once '../controlador/controlador.usuario.php';
require_once "../modelo/class.usuario.php";

?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="assets/css/styles.css">
        <title>Home</title>
    </head>
    <body >
        <!-- HEADER DE LA PAGINA -->
        <header>
          <h1>CABECERA DE LA PAGINA</h1>
        </header>
        <!-- CARGA EL MENU A lA PAGINA CUANDO SE INGRESA POR DEFAULT -->
        <div class="">
          <?php
            require_once 'menu.php';

           ?>
        </div>
        <!-- SE CARGARA EL ARCHIVO SEGUN LA OPCION QUE ELIGA EL USUARIO -->
        <section class="pagcargada" onclick="ocultar()">
          <?php
            $modulo = (isset($_GET['mod'])) ? $_GET['mod'] : null;
            switch ($modulo) {
              case 1:
                require_once 'inicio.html';
                break;
              case 2:
                require_once 'nosotros.php';
                break;
              case 3:
                require_once 'catalogo/serviciosycatalogo.html';
                break;
              case 4:
                require_once 'contacto.php';
                break;
                case 5:
                    require_once 'catalogo/CatalogoAlarma.html';
                break;
                case 6:
                    require_once 'catalogo/Catalogocamaras.html';
                break;
                case 7:
                    require_once 'catalogo/CatalogoHumo.html';
                break;
              default:
                require_once 'inicio.html';
                break;
            }

            Acceder();


           ?>
        </section>
        <article>
        <footer class="pie_pagina">
            <div class="info">
              <p>Servicio al Cliente
              600 400 9000 ó 600 400 8000</p>
            </div>
          <div>
              <ul class="rrss">
                <li>Siguenos en: </li>
                <li><a href="#"><img src="assets/img/facebook.png" width="40px"></a></li>
                <li><a href="#"><img src="assets/img/twitter.png" width="40px"></a></li>
                <li><a href="#"><img src="assets/img/instagram.png" width="40px"></a></li>
              </ul>
          </div>
          <div>
              <p class="centro">&copy; 2018 <a href="" id="pie"></a>Todos los derechos reservados</p>
          </div>
        </footer>
        </article>
    </body>
      <script src="assets/js/motor.ajax.js"></script>
      <script src="assets/js/jquery-1.11.0.min.js"></script>
      <script src="assets/js/menu_desplegable.js"></script>
      <script src="assets/js/slider.js"></script>
</html>
