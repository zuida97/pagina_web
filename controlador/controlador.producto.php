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

      if($codigo != ""  && $nombre != ""  && $descripcion != "" &&  $tipo != "" &&  $costo != "" &&  $cantidad != ""){
          $obj_producto = new Producto($codigo, $nombre, $descripcion, $tipo, $costo, $cantidad, $archivo);
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
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Tipo</th>
                <th>Costo</th>
                <th>Cantidad</th>
                <th>Imagen de referencia</th>
              </tr>';
        foreach ($resp as $key => $value) {
            $imagen = "assets/archivos/".$value['archivo'];
            $tabla.='<tr>
                  <td>'.$value['cod_producto'].'</td>
                  <td>'.$value['nom_producto'].'</td>
                  <td>'.$value['desc_producto'].'</td>
                  <td>'.$value['tipo_producto'].'</td>
                  <td>'.$value['costo_prod'].'</td>
                  <td>'.$value['cant_prod'].'</td>
                  <td><img style="width:200px; height:200px" src='.$imagen.'></td>
               </tr>';
  }
        $tabla.='</table>';

  }else{
  $tabla = "Lista no disponible por el momento.";
}

return $tabla;


}












 ?>
