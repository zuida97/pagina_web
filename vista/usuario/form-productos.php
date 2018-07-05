<?php
require_once "../../modelo/class.productoDAO.php";
require_once "../../modelo/class.producto.php";

 ?>
<div class="contenedor">
  <form class="form" action="?vst=2" method="post" enctype="multipart/form-data">
    <h2>Ingresar un producto</h2>
    <div class="ingreso">
      <label for="">Código producto</label>
      <input type="text" name="codigo" value="">
      <label for="">Nombre producto</label>
      <input type="text" name="nombre" value="">
      <label for="">Descripción</label>
      <textarea name="descripcion" rows="8" cols="80"></textarea>
      <label for="">Tipo</label>
        <select class="" name="tipo">
          <option value="">[Seleccione una opción]</option>
          <option value="Alarma">Alarma</option>
          <option value="Cámara de seguridad">Cámara de seguridad</option>
          <option value="Detector de humo">Detector de humo</option>
        </select>
      <label for="">Costo</label>
      <input type="text" name="costo" value="">
      <label for="">Cantidad</label></div>
      <input type="text" name="cantidad" value="" id="cantidad">
      <div class="">
        <input type="file" name="imagen">
      </div>
      <div><button type="submit" name="guardar" id="btnguardar">Guardar</button></div>
    </div>
  </form>
</div>

<?php
  require_once "../../controlador/controlador.producto.php";
  AgregarProducto();

 ?>
