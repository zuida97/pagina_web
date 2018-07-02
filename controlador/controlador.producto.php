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







 ?>
