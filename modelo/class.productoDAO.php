<?php
require_once "class.conexion.php";
require_once "class.producto.php";

class ProductoDAO
{

    function __construct(){}

    public function Agregar($obj_producto){
        $conexion = new Conexion();
        $sql = "INSERT INTO tbl_productos(cod_producto, nom_producto, desc_producto, tipo_producto,
        costo_prod, cant_prod) VALUES('$obj_producto->codigo', '$obj_producto->nombre',
        '$obj_producto->descripcion', '$obj_producto->tipo', '$obj_producto->costo','$obj_producto->cantidad')";
        $conexion->InMoEl($sql);
    }

    public function listar(){
        $conexion = new Conexion();
        $sql = "SELECT cod_producto, nom_producto, desc_producto, tipo_producto,
         costo_prod, cant_prod FROM tbl_productos ORDER BY cod_producto";
        $resp = $conexion->Consulta($sql);
        return $resp;
    }


    public function listarporTipo($tipo = null){
        $conexion = new Conexion();
        $sql = "SELECT cod_producto, nom_producto, desc_producto, tipo_producto,
         costo_prod, cant_prod FROM tbl_productos WHERE tipo_producto ='$tipo' ORDER BY cod_producto";
        $resp = $conexion->Consulta($sql);
        return $resp;
    }


    

}





 ?>
