<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="?" method="post">
      <div class=""><label for="">Nombres</label></div>
      <div class=""><input type="text" name="nombres" value="">
        <?php
        if(isset($_POST['guardar']))
        {
          $nombre = $_POST['nombres'];
          if(is_numeric($nombre))
          {
            echo "<span>Este campo no admite valores numericos</span>";
          }

        }

        ?>
      </div>

      <div class=""><label for="">Apellidos</label></div>
      <div class=""><input type="text" name="apellidos" value="">
        <?php
        if(isset($_POST['guardar']))
        {
          $nombre = $_POST['apellidos'];
          if(is_numeric($nombre))
          {
            echo "<span>Este campo no admite valores numericos</span>";
          }
        }

        ?>

      <div>
      <div class=""><label for="">Usuario</label></div>
      <div class=""><input type="text" name="usuario" value=""></div>
      <div class=""><label for="">Contraseña</label></div>
      <div class=""><input type="password" name="clave" value=""><div>
      <div class="">
        <select class="" name="estado">
          <option value="0">Activado</option>
          <option value="1">Desactivado</option>
        </select>
      </div>
      <div class="">
        <button type="submit" name="guardar">Guardar</button>
      </div>
    </form>

    <?php
      require_once "../controlador/controlador.usuario.php";
      echo RegistrarUsuario();
     ?>
  </body>
</html>
