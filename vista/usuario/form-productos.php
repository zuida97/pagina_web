<?php
require_once "../../modelo/class.productoDAO.php";
require_once "../../modelo/class.producto.php";
require_once "../../controlador/controlador.producto.php";


if(isset($_GET['mod'])){
  echo  LLenarFormulario();
  ModificarFormulario();


}
else if(isset($_GET['bus'])){

    BuscarProdAdmin();

}
else{

 ?>
<div class="contenedor">
  <form class="form" action="?vst=2" method="post" enctype="multipart/form-data">
    <h2>Ingresar un producto</h2>
    <div class="ingreso">
        <label for="">Código producto</label>
        <input type="text" name="codigo" value="" required>
        <label for="">Nombre producto</label>
        <input type="text" name="nombre" value="" required>
        <label for="">Descripción</label>
        <textarea name="descripcion" rows="8" cols="80" required></textarea>
        <label for="">Tipo</label>
        <select class="" name="tipo">
            <option value="">[Seleccione una opción]</option>
            <option value="Alarma">Alarma</option>
            <option value="Cámara de seguridad" >Cámara de seguridad</option>
            <option value="Detector de humo">Detector de humo</option>
        </select>
        <label for="">Costo</label>
        <input type="text" name="costo" value="" required>
        <label for="">Cantidad</label></div>
        <input type="text" name="cantidad" value="" id="cantidad" required>
        <div class="">
            <label for="">Estado</label>
        </div>
        <div class="">
        <select class="" name="estado">
            <option value="">[Selecione un estado]</option>
            <option value="0">Activado</option>
            <option value="1">Desactivado</option>
        </select>
        </div>
        <div class="">
            <input type="file" name="imagen" required accept="image/jpeg image/png ">
        </div>
            <div><button type="submit" name="guardar" id="btnguardar">Guardar</button></div>
        </div>
    </form>
</div>

<?php
}
  AgregarProducto();

 ?>
