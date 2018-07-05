<?php


function AgregarProducto(){
  if(isset($_POST['guardar'])){
      $codigo = $_POST['codigo'];
      $nombre = $_POST['nombre'];
      $descripcion = $_POST['descripcion'];
      $tipo = $_POST['tipo'];
      $costo = $_POST['costo'];
      $cantidad = $_POST['cantidad'];
      if($codigo != ""  && $nombre != ""  && $descripcion != "" &&  $tipo != "" &&  $costo != "" &&  $cantidad != ""){
          $obj_producto = new Producto($codigo, $nombre, $descripcion, $tipo, $costo, $cantidad);
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
              </tr>';
        foreach ($resp as $key => $value) {
            $tabla.='<tr>
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












 ?>
