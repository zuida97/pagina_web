<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="assets/css/styles.css">
        <title>inicio</title>
    </head>
    <body>
        <header>
          <nav>
          <?php
            require_once 'menu.html';
            $modulo = 1;
          ?>
          </nav>
        </header>
        <article class="">
          <?php
          $modulo = (isset($_GET['vst'])) ?  $_GET['vst']:null; // Operador ternario
          switch ($modulo) {
            case 1:
                   require_once 'inicio.html';
                   break;
            case 2:
                    require_once 'nosotros.html';
                    break;
            case 3:
                    require_once 'serviciosycatalogo.php';
                    break;
            case 4:
                    require_once 'contacto.php';
                    break;
            default:
                    require_once 'inicio.html';
                    break;
          }

           ?>

        </article>
        <footer>
            <div class="">
              <header>
                <h4></h4>
              </header>
                <caption>Servicio al cliente</caption>
                <h2>600 900 4000</h2>
                <h2>600 900 4500</h2>
              </div>
          <div>
            <header>
              <ul id="footer">
                <li>Siguenos en: </li>
                <li><a href="#"><img src="assets/img/facebook.png" width="40px"></a></li>
                <li><a href="#"><img src="assets/img/twitter.png" width="40px"></a></li>
                <li><a href="#"><img src="assets/img/instagram.png" width="40px"></a></li>
              </ul>
            </header>
          </div>
            <div>
              <p class="centro">&copy; 2018 <a href="" id="pie"></a>Todos los derechos reservados</p>

            </div>
        </footer>
        </article>
        <script src="assets/js/slider.js"></script>
    </body>
</html>
