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



}





 ?>
