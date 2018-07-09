<?php
require_once "class.conexion.php";
require_once "class.servicio.php";


class ServicioDAO
{

function __construct(){}

public function Agregar($obj_servicio){
    $conexion = new Conexion();
    $sql = "INSERT INTO tbl_servicios (nom_servicio , desc_servicio, costo_servicio,	archivo, estado)  VALUES
            ('$obj_servicio->nom_servicio', '$obj_servicio->desc_servicio', '$obj_servicio->costo_servicio',
            '$obj_servicio->archivo_servicio', '$obj_servicio->estado_servicio')";
    $conexion->InMoEl($sql);
  }
 public function Listar(){
        $conexion = new Conexion();
        $sql = "SELECT nom_servicio, desc_servicio,	costo_servicio,	archivo FROM tbl_servicios";
        $resp = $conexion->Consulta($sql);
        return $resp;
  }
public function BuscarPorNombre($nom){
    $conexion = new Conexion();
    $sql = "SELECT nom_servicio, desc_servicio,	costo_servicio,	archivo FROM tbl_servicios
            WHERE nom_servicio LIKE '%$nom%'";
    $resp = $conexion->Consulta($sql);
    return $resp;
}
public function BuscarPorId($id){
    $conexion = new Conexion();
    $sql = "SELECT * FROM tbl_servicios
            WHERE id_servicio = '$id'";
    $resp = $conexion->Consulta($sql);
    return $resp;
}




public function ModificarServicio($obj_servicio){
    $conexion = new Conexion();
    $sql = "UPDATE tbl_servicios SET nom_servicio = '$obj_servicio->nom_servicio', desc_servicio = '$obj_servicio->desc_servicio',
    	   costo_servicio = '$obj_servicio->costo_servicio', archivo = '$obj_servicio->archivo_servicio',
           estado = '$obj_servicio->estado_servicio' WHERE id_servicio = '$obj_servicio->id_servicio'";
    $conexion->InMoEl($sql);
}





}







 ?>
