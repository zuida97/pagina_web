<div class="contenedor">
  <form class="form" action="?vst=3" method="post" enctype="multipart/form-data">
    <h2>Ingresar un servicio</h2>
    <div class="ingreso">
      <label for="">Nombre servicio</label>
      <input type="text" name="nombre_servicio" value="">
      <label for="">Descripción servicio</label>
      <textarea name="descripcion_servicio" rows="8" cols="80"></textarea>
      <label for="">Costo</label>
      <input type="text" name="costo_servicio" value="">
      <div class="">
        <input type="file" name="imagen_servicio">
      </div>
      <div><button type="submit" name="guardar_servicio">Guardar</button></div>
    </div>
  </form>
</div>
