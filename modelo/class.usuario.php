<?php
/**
 *
 */

class Usuario{

    public $id;
    public $nombres;
    public $apellidos;
    public $username;
    public $clave;
    public $estado;


function __construct($id = null,$nombres =null, $apellidos = null,$username= null, $clave= null, $estado = null){
        $this->id = $id;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->username = $username;
        $this->clave= $clave;
        $this->estado = $estado;
     }







}

 ?>
