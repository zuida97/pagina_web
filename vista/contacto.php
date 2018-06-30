<link rel="stylesheet" href="assets/css/formulario.css">


<section class="formulario">
    <section class="info_contacto">
        <section class="info_title">
          <img src="assets/img/user.png" >
          <h3>INFORMACION<BR>DE CONTACTO</h3>
        </section>
        <section class="info_info">
          <p><img src="assets/img/email.png" width="20px"> contacto@gmail.com</p>
          <p><img src="assets/img/phone-call.png" width="20px"> 600 400 9000<br> 600 400 8000</p>
        </section>
    </section>

    <form class="form_contacto" action="index.php" method="post">
      <h3>Contáctese con nosotros</h3>
      <div class="user_info">
        <label>*Nombre completo:</label>
        <input type="text" name="nombre" id="name" required>
        <label>*Correo Electronico:</label>
        <input type="email" name="email" id="correo" required>
        <label>*Comentario:</label>
        <textarea name="comment" rows="8" cols="50" id="comentario" required></textarea>
        <input type="submit" name="enviar" value="Enviar" id="btnenviar">
      </div>
    </form>

</section>
