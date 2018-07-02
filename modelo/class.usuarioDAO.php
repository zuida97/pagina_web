<?php
 require_once "class.conexion.php";
require_once "class.usuario.php";
class UsuarioDAO
{
  function __construct(){}

  public function agregarUsuario($obj_usuario){

      $conexion = new Conexion();
      $sql = "INSERT INTO tbl_usuarios(nombres, apellidos, username, clave, estado)
              VALUES('$obj_usuario->nombres', '$obj_usuario->apellidos' ,'$obj_usuario->username', '$obj_usuario->clave', '$obj_usuario->estado')";
      $conexion->InMoEl($sql);
    }

  public function Login($username, $clave){
        $conexion = new Conexion();
        $sql = "SELECT * FROM tbl_usuarios WHERE username='$username' AND clave='$clave' LIMIT 1";
        $resp = $conexion->Consulta($sql);
        if(gettype($resp) == 'array'){
            if(count($resp) == 1){
                $obj_usuario = new Usuario();
                $obj_usuario->id = $resp[0][0];
                $obj_usuario->nombres = $resp[0][1];
                $obj_usuario->apellidos = $resp[0][2];
                $obj_usuario->username = $resp[0][3];
                $obj_usuario->clave = $resp[0][4];
                $obj_usuario->estado =  $resp[0][5];
                return $obj_usuario;
        }
        else{
            return false;
        }
    }

  }







}




 ?>
