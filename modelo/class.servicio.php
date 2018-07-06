<?php

class Servicio
{
  public $id_servicio;
  public $nom_servicio;
  public $desc_servicio;
  public $costo_servicio;
  public $archivo_servicio;
  public $estado_servicio;


  function __construct($nom_servicio = null, $desc_servicio = null,
  $costo_servicio = null, $archivo_servicio = null, $estado_servicio = null){

      $this->nom_servicio = $nom_servicio;
      $this->desc_servicio = $desc_servicio;
      $this->costo_servicio = $costo_servicio;
      $this->archivo_servicio = $archivo_servicio;
      $this->estado_servicio = $estado_servicio;
  }
}



 ?>
