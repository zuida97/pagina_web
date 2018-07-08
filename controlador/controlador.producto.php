<?php


function AgregarProducto(){
  if(isset($_POST['guardar'])){
      $codigo = $_POST['codigo'];
      $nombre = $_POST['nombre'];
      $descripcion = $_POST['descripcion'];
      $tipo = $_POST['tipo'];
      $costo = $_POST['costo'];
      $cantidad = $_POST['cantidad'];
      $archivo = $_FILES['imagen']['name'];
      $ruta_tmp = $_FILES['imagen']['tmp_name'];
      $ruta = "../assets/archivos/".$archivo;
      move_uploaded_file($ruta_tmp,$ruta);
      $estado = $_POST['estado'];
      if($codigo != ""  && $nombre != ""  && $descripcion != "" &&  $tipo != "" &&  $costo != "" &&  $cantidad != ""){
          $obj_producto = new Producto($codigo, $nombre, $descripcion, $tipo, $costo, $cantidad, $archivo, $estado);
          $prodDAO = new ProductoDAO();
          $prodDAO->Agregar($obj_producto);
          echo "registro guardado";
      }
  }

}

function ListarProductos($tipo = null){
    $producto = new ProductoDAO();
    if($tipo == null){
        $resp = $producto->listar();
    }
    else{
      $resp = $producto->listarporTipo($tipo);
    }

    if(gettype($resp)=="array"){
        $tabla = '<table>
              <tr>
                <th>Imagen de referencia</th>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Tipo</th>
                <th>Costo</th>
                <th>Cantidad</th>
              </tr>';
        foreach ($resp as $key => $value) {
            $imagen = "assets/archivos/".$value['archivo'];
            $tabla.='<tr>
                  <td><img style="width:200px; height:200px; border-left:30px solid white;border-right:30px solid white" src='.$imagen.'></td>
                  <td>'.$value['cod_producto'].'</td>
                  <td>'.$value['nom_producto'].'</td>
                  <td>'.$value['desc_producto'].'</td>
                  <td>'.$value['tipo_producto'].'</td>
                  <td>'.$value['costo_prod'].'</td>
                  <td>'.$value['cant_prod'].'</td>
               </tr>';
  }
        $tabla.='</table>';

  }else{
  $tabla = "Lista no disponible por el momento.";
}

return $tabla;


}

function Busqueda(){

if(isset($_POST['cod'])){
    $id = $_POST['cod'];
    if($id != null){
        $productoDAO = new ProductoDAO();
        $resp = $productoDAO->Buscar($id);
        if(gettype($resp)=="array"){
            if(count($resp) == 1){
                $producto = new Producto();
                $producto->codigo = $resp[0][0];
                $producto->nombre = $resp[0][1];
                $producto->descripcion = $resp[0][2];
                $producto->tipo = $resp[0][3];
                $producto->costo = $resp[0][4];
                $producto->cantidad =  $resp[0][5];
                $producto->archivo  =  $resp[0][6];
                $producto->estado  =  $resp[0][7];
                return $producto;
            }
            else{
                $resp = false;
            }

        }else {
          $resp = false;
        }


      }else{
        $resp = false;
      }
    }else{
      $resp = false;

    }

    return $resp;
}


function ModificarFormulario(){
    if(isset($_POST['cambios'])){
      $codigo = $_POST['codigo'];
      $nombre = $_POST['nombre'];
      $descripcion = $_POST['descripcion'];
      $tipo = $_POST['tipo'];
      $costo = $_POST['costo'];
      $cantidad = $_POST['cantidad'];
      $archivo = $_FILES['imagen']['name'];
      if($archivo != null){
        $ruta_tmp = $_FILES['imagen']['tmp_name'];
        $ruta = "../assets/archivos/".$archivo;
        move_uploaded_file($ruta_tmp,$ruta);
      }
      else{
          $archivo = $_POST['ima'];

      }

      $estado = $_POST['estado'];
      if($codigo != ""  && $nombre != ""  && $descripcion != "" &&  $tipo != "" &&  $costo != "" &&  $cantidad != ""){
          $obj_producto = new Producto($codigo, $nombre, $descripcion, $tipo, $costo, $cantidad, $archivo, $estado);
          $prodDAO = new ProductoDAO();
          $prodDAO->Modificar($obj_producto);
          echo "registro actualizado";

    }


    }


}


function LLenarFormulario(){
      $formulario = null;

      $busqueda =  ' <div class="contenedor2">
          <form class="form" action="?mod=1" method="post" enctype="multipart/form-data">
          <h2>Modificar un producto</h2>

          <div class="ingreso2">
          <input type="text" name="cod" value="" placeholder="ingrese código del producto">
         <button type="submit" name="buscar">Buscar</button>
         </div>
         </form>
         </div>';
      echo $busqueda;

      if(isset($_POST['buscar'])){
          $producto = new Producto();
          $producto = Busqueda();
          $Cbtipo =$producto->tipo;
          $Cbestado = $producto->estado;
          if(gettype($producto) == 'object'){
              $formulario ='
              <div class="contenedor">
              <form class="form" action="?mod=1" method="post" enctype="multipart/form-data">
                    <div class="ingreso">
                    <input type="hidden"  name="ima" value="'.$producto->archivo.'">
                    <label for="">Código producto</label>
                    <input type="text" name="codigo" value="'.$producto->codigo.'">
                    <label for="">Nombre producto</label>
                    <input type="text" name="nombre" value="'.$producto->nombre.'">
                    <label for="">Descripción</label>
                    <textarea name="descripcion" rows="8" cols="80">'.$producto->descripcion.'</textarea>
                    <label for="">Tipo</label>
                    <select class="" name="tipo">
                    <option value="">[Seleccione una opción]</option>';


                    if($Cbtipo == 'Alarma'){
                      $formulario .= '<option value="Alarma" selected >Alarma</option>';
                    }
                    else{
                        $formulario .= '<option value="Alarma">Alarma</option>';
                    }
                    if($Cbtipo == 'Cámara de seguridad'){
                        $formulario .= '<option value="Cámara de seguridad" selected>Cámara de seguridad</option>';
                    }
                    else{
                        $formulario .= '<option value="Cámara de seguridad">Cámara de seguridad</option>';
                    }
                    if($Cbtipo == 'Detector de humo'){
                        $formulario .= '<option value="Detector de humo" selected>Detector de humo</option>';
                    }
                    else{
                        $formulario .= '<option value="Detector de humo">Detector de humo</option>';
                    }

              $formulario .='</select>
                    <label for="">Costo</label>
                    <input type="text" name="costo" value="'.$producto->costo.'">
                    <label for="">Cantidad</label></div>
                    <input type="text" name="cantidad" value="'.$producto->cantidad.'" id="cantidad">
                    <div class="">
                      <label for="" style="font-weight:bold">Estado</label>
                    </div>
                    <div>
                      <select class="" name="estado">
                        <option value="">[Selecione un estado]</option>';

               if($Cbestado == 0){
                  $formulario .= '<option value="0" selected>Activado</option>';
               }
               else{
                  $formulario .=  '<option value="0">Activado</option>';
               }
               if($Cbestado == 1){
                  $formulario .= '<option value="1" selected >Desactivado</option>';
               }
               else{
                  $formulario .= '<option value="1">Desactivado</option>';

               }



               $formulario .='</select>
                    </div>
                    <div>
                    <img src="../assets/archivos/'.$producto->archivo.'" style="margin: -50px 100px 200px 0px;float:right; height:200px; width:200px;>

                    </div>
                      <div style="margin-top:-30px;"><input type="file" name="imagen"></div>

                    <div class= ""><button type="submit" name="cambios" id="btnguardar" style="width:300px">Guardar cambios</button>
                    </div>
                  </div>
                </form>
              </div>';
                return $formulario;
            }
            else{
              return $mensaje = "Producto no encontrado";

            }
            }

}










 ?>
