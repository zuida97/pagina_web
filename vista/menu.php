<ul id="menu-main">
  <a href="?mod=1"><li>INICIO</li></a>
  <a href="?mod=2"><li>NOSOTROS</li></a>
  <a href="?mod=3"><li style="padding-left:30px; padding-right:30px">SERVICIOS Y CATALOGO</li></a>
  <a href="?mod=4" ><li>CONTACTO</li></a>
<?php
  $resp = Acceder();

  if(!isset($_SESSION['usuario']))
  {
 ?>

  <a id="acceso" href="#" ondblclick="ocultar()"><li style="margin-left: 120px; text-align:right"> ACCESO <img style="margin-left:20px; padding-right:20px" src="assets/img/iniciar_sesion.png" alt="">
  <ul>
    <li>
      <div id="login-form">
        <form method="post">
          <div class="">
            <input id="user" type="text" name="user" value="" placeholder="Usuario">
          </div>
          <div class="">
            <input id="pass" type="password" name="pass" value="" placeholder="Contraseña">
          </div>
          <div class="">
            <button  id="submit" type="submit" name="acceder">Acceder</button>
          </div>
        </form>
      </div>
    </li>
  </ul>
  </li></a>
<?php
}
else{
 ?>
 <a href="usuario/index.php" style="margin-left: 120px"><li>MI PERFIL</li></a>

<?php } ?>

</ul>
