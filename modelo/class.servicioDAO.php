<?php
require_once "class.conexion.php";
require_once "class.servicio.php";


class ServicioDAO
{

  function __construct(){}

  public function Agregar($obj_servicio){
      $conexion = new Conexion();
      $sql = "INSERT INTO tbl_servicios (nom_servicio , desc_servicio,	costo_servicio,	archivo, estado)  VALUES
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



}








 ?>
