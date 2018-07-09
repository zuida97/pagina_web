<?php
require_once "class.conexion.php";
require_once "class.producto.php";

class ProductoDAO
{

    function __construct(){}

    public function Agregar($obj_producto){
        $conexion = new Conexion();
        $sql = "INSERT INTO tbl_productos(cod_producto, nom_producto, desc_producto, tipo_producto,
        costo_prod, cant_prod, archivo, estado) VALUES('$obj_producto->codigo', '$obj_producto->nombre',
        '$obj_producto->descripcion', '$obj_producto->tipo', '$obj_producto->costo','$obj_producto->cantidad',
        '$obj_producto->archivo', '$obj_producto->estado')";
        $conexion->InMoEl($sql);
    }

public function listar(){
        $conexion = new Conexion();
        $sql = "SELECT cod_producto, nom_producto, desc_producto, tipo_producto,
         costo_prod, cant_prod, archivo FROM tbl_productos ORDER BY cod_producto";
        $resp = $conexion->Consulta($sql);
        return $resp;
    }

public function ListarPorNombre($nom){
          $conexion = new Conexion();
          $sql = "SELECT cod_producto, nom_producto, desc_producto, tipo_producto,
           costo_prod, cant_prod, archivo, estado FROM tbl_productos WHERE nom_producto LIKE '%$nom%'
           OR tipo_producto LIKE '%$nom%' OR cod_producto LIKE '%$nom%'";
          $resp = $conexion->Consulta($sql);
          return $resp;
}




public function listarporTipo($tipo = null, $nombre = null){
        $conexion = new Conexion();
        if($tipo != null && $nombre == null){
            $sql = "SELECT cod_producto, nom_producto, desc_producto, tipo_producto,
             costo_prod, cant_prod, archivo FROM tbl_productos WHERE tipo_producto ='$tipo' ORDER BY cod_producto";
        }
        else if($tipo == null && $nombre != null){
            $sql = "SELECT cod_producto, nom_producto, desc_producto, tipo_producto,
             costo_prod, cant_prod, archivo, estado FROM tbl_productos WHERE nom_producto LIKE '%$nombre%'";

        }
        else if( $tipo != null && $nombre != null){
            $sql = "SELECT cod_producto, nom_producto, desc_producto, tipo_producto,
             costo_prod, cant_prod, archivo, estado FROM tbl_productos WHERE tipo_producto = '$tipo' AND nom_producto LIKE '%$nombre%'";
        }


        $resp = $conexion->Consulta($sql);
        return $resp;
    }


public function Modificar($obj_producto){
    $conexion = new Conexion();
    $sql = "UPDATE tbl_productos SET nom_producto='$obj_producto->nombre' , desc_producto = '$obj_producto->descripcion',
     tipo_producto = '$obj_producto->tipo', costo_prod = '$obj_producto->costo', cant_prod = '$obj_producto->cantidad',
    archivo= '$obj_producto->archivo', estado = '$obj_producto->estado' WHERE cod_producto = '$obj_producto->codigo'";
    $conexion->InMoEl($sql);
}

public function Buscar($id){
      $conexion = new Conexion();
      $sql = "SELECT cod_producto, nom_producto, desc_producto, tipo_producto,
       costo_prod, cant_prod, archivo, estado FROM tbl_productos WHERE cod_producto ='$id' LIMIT 1";
      $resp = $conexion->Consulta($sql);
      return $resp;

}








}

?>
