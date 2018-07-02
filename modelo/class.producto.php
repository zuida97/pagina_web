<?php

class Producto 
{
  public $codigo;
  public $nombre;
  public $descripcion;
  public $tipo;
  public $costo;
  public $cantidad;

  function __construct($codigo= null, $nombre= null, $descripcion= null, $tipo= null, $costo= null, $cantidad= null)
  {
  $this->codigo = $codigo;
  $this->nombre = $nombre;
  $this->descripcion = $descripcion;
  $this->tipo = $tipo;
  $this->costo = $costo;
  $this->cantidad = $cantidad;
  }
}



 ?>
