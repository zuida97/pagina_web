<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="assets/css/styles.css">
        <title></title>
    </head>
    <body>
        <!-- HEADER DE LA PAGINA -->
        <header>
          <h1>CABECERA DE LA PAGINA</h1>
        </header>
        <!-- CARGA EL MENU A lA PAGINA CUANDO SE INGRESA POR DEFAULT -->
        <div class="">
          <?php
            require_once 'menu.html';
           ?>
        </div>
        <!-- SE CARGARA EL ARCHIVO SEGUN LA OPCION QUE ELIGA EL USUARIO -->
        <section>
          <?php
            $modulo = (isset($_GET['mod'])) ? $_GET['mod'] : null;
            switch ($modulo) {
              case 1:
                require_once 'inicio.html';
                break;
              case 2:
                require_once 'nosotros.html';
                break;
              case 3:
                require_once 'catalogo.html';
                break;
              case 4:
                require_once 'contacto.html';
                break;
              default:
                require_once 'inicio.html';
                break;
            }
           ?>
        </section>

        <footer>
                <p>Servicio al Cliente
                600 400 9000 ó 600 400 8000</p>
          <div>
              <ul id="footer">
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
    </body>
</html>
