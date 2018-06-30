<?php
/**
 * clase Conexion
 */
class Conexion
{
  public $identificador;

  function __construct()
  {
    $servidor = "localhost";
    $bd = "bd_seguridad";
    $user_mysql = "root";
    $clave = "";
    $this->identificador = mysqli_connect($servidor,$user_mysql,$clave,$bd)
    or die('No se puede conectar a la base de datos');
    // code...
  }
  function InMoEl($sql)
  {
        mysqli_query($this->identificador,'SET NAMES utf8') or die(mysqli_error($this->identificador));
        mysqli_query($this->identificador,'SET CHARACTER SET utf8') or die(mysqli_error($this->identificador));
        mysqli_query($this->identificador,'SET COLLATION_CONNECTION="utf8_general_ci"') or die(mysqli_error($this->identificador));

        mysqli_query($this->identificador,$sql);
        if(mysqli_error($this->identificador))
        {
          $resp = mysqli_error($this->identificador);
        }else{
          $resp = true;
        }
        $this->Cerrar();
        return $resp;
  }

  function Consulta($sql)
  {
      mysqli_query($this->identificador,'SET NAMES utf8') or die(mysqli_error($this->identificador));
      mysqli_query($this->identificador,'SET CHARACTER SET utf8') or die(mysqli_error($this->identificador));
      mysqli_query($this->identificador,'SET COLLATION_CONNECTION="utf8_general_ci"') or die(mysqli_error($this->identificador));

      $respuesta=mysqli_query($this->identificador,$sql);

      if(!mysqli_error($this->identificador)){
          //arreglo donde se almacenan las filas
          $arreglo = array();

          while($row=mysqli_fetch_array($respuesta)){
            $arreglo[] = $row;
          }
          $resp = $arreglo;
      }else{
        $resp = false;
      }
      $this->Cerrar();
      return $resp;
  }

  function Cerrar()
  {
    mysqli_close($this->identificador);
  }
}

 ?>
