<?php
session_start();
require_once "../modelo/class.usuarioDAO.php";
require_once "../modelo/class.usuario.php";


function Acceder(){
    if(isset($_POST['acceder'])){
        $user = trim($_POST['user']);
        $clave = sha1(trim($_POST['pass']));
        if($user != "" && $clave != ""){
            $usuarioDAO = new UsuarioDAO();
            $r = $usuarioDAO->Login($user, $clave); // Login() retornará un valor boolean falso o un objeto de tipo Usuario inicializado
            if(!$r){
                $resp = false;
                echo  "clave incorrecta";
            }
            else{
                $_SESSION['usuario'] = $r;
                header("Location: usuario/index.php");
                $resp = true;
            }
            return $resp;
        }
    }
    else{
        $msj ="Error, Contactese con el administrador";
        return $msj;
    }
}








// }
//
//
//
// function RegistrarUsuario(){
//   if(isset($_POST['guardar'])){
//     $usuario = new Usuario();
//     $usuarioDAO = null;
//     $val = 0;
//     $nombres = $_POST['nombres'];
//     $apellidos = $_POST['apellidos'];
//     $username = $_POST['usuario'];
//     $clave = $_POST['clave'];
//     $estado = $_POST['estado'];
//     if( $nombres != "" && $apellidos != "" && $username != null && $clave != null && $estado != ""){
//       if(!is_numeric($nombres)){
//         $usuario->nombres = $nombres;
//       }
//       else{
//         $val = 1;
//
//       }
//       if(!is_numeric($apellidos)){
//         $usuario->apellidos = $apellidos;
//       }
//       else{
//         $val = 1;
//       }
//       $clave = sha1($clave);
//       $usuario->username = $username;
//       $usuario->clave = $clave;
//       $usuario->estado = $estado;
//       if($val == 0){
//         $usuarioDAO = new UsuarioDAO();
//         $usuarioDAO->agregarUsuario($usuario);
//         $mensaje = "El registro fue realizado correctamente";
//       }
//       else
//       {
//         $mensaje = "Rectifique la información ingresada";
//       }
//       return $mensaje;
//   }
//
//   }
// }
//





 ?>
