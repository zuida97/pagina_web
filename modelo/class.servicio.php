<?php

class Servicio
{
  public $id_servicio;
  public $nom_servicio;
  public $desc_servicio;
  public $costo_servicio;
  public $archivo;


  function __construct($id_servicio = null, $nom_servicio = null, $desc_servicio = null,
  $costo_servicio = null, $archivo = null){

      $this->id_servicio = $id_servicio;
      $this->nom_servicio = $nom_servicio;
      $this->desc_servicio = $desc_servicio;
      $this->costo_servicio = $costo_servicio;
      $this->archivo = $archivo;
  }
}



 ?>
