<?php
require_once "../../modelo/class.productoDAO.php";
require_once "../../modelo/class.producto.php";

 ?>

<div class="">
  <form class="" action="?vst=2" method="post">
    <div><label for="">Código producto</label></div>
    <div><input type="text" name="codigo" value=""></div>
    <div><label for="">Nombre producto</label></div>
    <div><input type="text" name="nombre" value=""></div>
    <div><label for="">Descripción</label></div>
    <div><textarea name="descripcion" rows="8" cols="80"></textarea></div>
    <div><label for="">Tipo</label></div>
    <div>
      <select class="" name="tipo">
        <option value="">[Seleccione una opción]</option>
        <option value="Alarma">Alarma</option>
        <option value="Cámara de seguridad">Cámara de seguridad</option>
        <option value="Detector de humo">Detector de humo</option>
      </select>
    </div>
    <div><label for="">Costo</label></div>
    <div><input type="text" name="costo" value=""></div>
    <div><label for="">Cantidad</label></div>
    <div><input type="text" name="cantidad" value=""></div>
    <div class="">
      <button type="submit" name="guardar">Guardar</button>
    </div>
  </form>
</div>

<?php
  require_once "../../controlador/controlador.producto.php";
  AgregarProducto();

 ?>
