<?php

function AgregarServicio(){
    if(isset($_POST['guardar_servicio'])){
        $nom_servicio  = $_POST['nombre_servicio'];
        $desc_servicio = $_POST['descripcion_servicio'];
        $costo_servicio= $_POST['costo_servicio'];
        $archivo = $_FILES['imagen_servicio']['name'];
        $ruta_tmp = $_FILES['imagen_servicio']['tmp_name'];
        $ruta = "../assets/archivos/".$archivo;
        move_uploaded_file($ruta_tmp,$ruta);
        $estado = $_POST['estado_servicio'];
        if($nom_servicio != "" && $desc_servicio != "" && $costo_servicio != "" && $estado != ""){
            $obj_servicio = new Servicio($nom_servicio, $desc_servicio, $costo_servicio, $archivo, $estado);
            $servicioDAO = new ServicioDAO();
            $servicioDAO->Agregar($obj_servicio);
            echo "registro guardado";
        }
    }
}



function BuscarSerAdmin(){
    $busqueda =  '<div class="contenedor3" style="margin-bottom: -10px">
      <form class="form" action="?bus=2" method="post" enctype="multipart/form-data">
          <h2>Buscar un Servicio</h2>
          <div class="ingreso2">
          <input  type="text" name="valor" value="" placeholder="ingrese código del servicio ">
          <button type="submit" name="buscar_serv">Buscar</button>
          </div>
       </form>
       </div>';
    echo $busqueda;
    if(isset($_POST['buscar_serv'])){
        if($_POST['valor'] != ""){
            $valor = $_POST['valor'];
            $resp = ListarServiciosAdmin($valor);
            if($resp != false){
                echo ListarServiciosAdmin($valor);
            }else{
                echo '<div  class="contenedor4" ><h4 style ="margin:30px ">Lo sentimos, no se encontraron resultados en la busqueda</h4> </div>';
            }
        }
        else{
            echo ListarServicios();

        }

    }else{
        echo ListarServicios();

    }



}



function ListarServiciosAdmin($valor = null){
    $servicio = new servicioDAO();
    if($valor == null){
        $resp = $servicio->Listar();
    }
    else{
        $resp = $servicio->BuscarPorNombre($valor);
    }
    if(count($resp) !=0){
        $tabla = '<div class="contenedor3"><table style ="text-align:center">
              <tr style ="margin-bottom: 30px;">
                <th>Imagen de referencia</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Costo</th>
              </tr>';
        foreach ($resp as $key => $value) {
            $imagen = "../assets/archivos/".$value['archivo'];
            $tabla.='<tr>
                  <td><img style="width:450px; height:300px" src='.$imagen.'></td>
                  <td>'.$value['nom_servicio'].'</td>
                  <td>'.$value['desc_servicio'].'</td>
                  <td>$'.$value['costo_servicio'].'</td>

               </tr>';
  }
        $tabla.='</table></div>';

  }else{
      return false;
  }

  return $tabla;
}



function ListarServicios(){
    $servicio = new servicioDAO();
    $resp = $servicio->Listar();

    if(count($resp) !=0){
        $tabla = '<table style ="text-align:center">
              <tr style ="margin-bottom: 30px;">
                <th>Imagen de referencia</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Costo</th>
              </tr>';
        foreach ($resp as $key => $value) {
            $imagen = "assets/archivos/".$value['archivo'];
            $tabla.='<tr>
                  <td><img style="width:450px; height:300px" src='.$imagen.'></td>
                  <td>'.$value['nom_servicio'].'</td>
                  <td>'.$value['desc_servicio'].'</td>
                  <td>$'.$value['costo_servicio'].'</td>

               </tr>';
  }
        $tabla.='</table>';

  }else{
      return false;
  }

  return $tabla;
}

function BusquedaServicio(){
    if(isset($_POST['id_serv'])){
        $id = $_POST['id_serv'];
        if($id != ""){
            $servicioDAO = new ServicioDAO();
            $resp = $servicioDAO->BuscarPorId($id);
            if(gettype($resp)=="array"){
                if(count($resp) == 1){
                    $servicio = new Servicio();
                    $servicio->id_servicio      = $resp[0][0];
                    $servicio->nom_servicio     = $resp[0][1];
                    $servicio->desc_servicio    = $resp[0][2];
                    $servicio->costo_servicio   = $resp[0][3];
                    $servicio->archivo_servicio = $resp[0][4];
                    $servicio->estado_servicio  = $resp[0][5];
                    return $servicio;
                }
                else{
                    $resp = false;
                }

            }
            else{
                $resp = false;
            }


        }
        else{
            $resp = false;
        }
    }
    else{
        $resp = false;

    }

    return $resp;
}








function LlenarFormServicio(){
    $formulario = null;

    $busqueda =  '<div class="contenedor2">
      <form class="form" action="?mod=2" method="post" enctype="multipart/form-data">
          <h2>Modificar un Servicio</h2>
          <div class="ingreso2">
          <input  type="text" name="id_serv" value="" placeholder="ingrese código del servicio ">
          <button type="submit" name="buscar_serv">Buscar</button>
          </div>
       </form>
       </div>';
    echo $busqueda;
    if(isset($_POST['buscar_serv'])){
        $formulario = null;
        $servicio = new Servicio();
        $servicio = BusquedaServicio();
        if(gettype($servicio) == 'object'){

            $Cbestado = $servicio->estado_servicio;
            $formulario .= '<div class="contenedor">
                <form class="form" action="?mod=2" method="post" enctype="multipart/form-data">
                <input type="hidden" name="ima" value="'.$servicio->archivo_servicio.'">
                <input type="hidden" name="codigo" value="'.$servicio->id_servicio.'">
                <div class="ingreso">
                <div><label for="" >Código Servicio : '.$servicio->id_servicio.'</label></div>
                <label for="" style="margin-top:10px">Nombre servicio</label>
                <input type="text" name="nombre_servicio" value="'.$servicio->nom_servicio.'">
                <label for="">Descripción servicio</label>
                <textarea name="descripcion_servicio" rows="8" cols="80">'.$servicio->desc_servicio.'</textarea>
                <label for="">Costo</label>
                <input type="text" name="costo_servicio" value="'.$servicio->costo_servicio.'" style ="width:300px">
                <label for="">Estado</label>
                <div class="">
                    <select class="" name="estado_servicio" style ="width:300px">
                      <option value="">[Selecione un estado]</option>';

                      if($Cbestado == 0){
                          $formulario .= '<option value="0" selected >Activado</option>';
                      }
                      else{
                          $formulario .=  '<option value="0">Activado</option>';
                      }
                      if($Cbestado == 1){
                          $formulario .= '<option value="1" selected >Desactivado</option>';
                      }
                      else{
                          $formulario .= '<option value="1">Desactivado</option>';
                      }

            $formulario .='
                    </select>
                    <div><img src="../assets/archivos/'.$servicio->archivo_servicio.'" style="margin: -50px 100px 200px 0px;float:right; height:200px; width:200px;></div>

                </div>
                <div class="">
                    <input type="file" name="imagen_servicio" style ="width:400px" >

                </div>
                    <div><button type="submit" name="guardar_servicio" style="width:300px">Guardar Cambios</button></div>

                </div>
              </form>
            </div>';
            return $formulario;
        }else{

            echo '<div  class="contenedor4" style="width:1050px;" ><h4 style ="margin:30px ">Lo sentimos, no se encontraron resultados en la busqueda</h4> </div>';


        }

    }


}

function ModificarFormularioServicio(){
    if(isset($_POST['guardar_servicio'])){
        $id_servicio  = $_POST['codigo'];
        $nom_servicio  = $_POST['nombre_servicio'];
        $desc_servicio = $_POST['descripcion_servicio'];
        $costo_servicio= $_POST['costo_servicio'];
        $archivo = $_FILES['imagen_servicio']['name'];
        if($archivo != null){
            $ruta_tmp = $_FILES['imagen_servicio']['tmp_name'];
            $ruta = "../assets/archivos/".$archivo;
            move_uploaded_file($ruta_tmp,$ruta);
        }
        else{
            $archivo = $_POST['ima'];

        }
        $estado = $_POST['estado_servicio'];
        if($nom_servicio != "" && $desc_servicio != "" && $costo_servicio != "" && $estado != ""){
            $obj_servicio = new Servicio($nom_servicio, $desc_servicio, $costo_servicio, $archivo, $estado);
            $obj_servicio->id_servicio = $id_servicio;
            $servicioDAO = new ServicioDAO();
            $servicioDAO->ModificarServicio($obj_servicio);
            echo '<div  class="contenedor4" style="width:1050px;" ><h4 style ="margin:30px ">Registro actualizado correctamente</h4> </div>';



      }
    }

}







 ?>
