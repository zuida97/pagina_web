<link rel="stylesheet" href="../assets/css/menu.usuario.css">
<h3>Menu Administrador</h3>
<nav class="navegacion">
  <ul class="menu">
    <li><a href="?vst=1">VOLVER AL INICIO</a></li>
    <li><a href="?vst=2">INGRESAR PRODUCTOS</a></li>
    <li><a href="?vst=3">INGRESAR SERVICIOS</a></li>
    <li>
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
    </li>
  </ul>
</nav>
