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
        if($nom_servicio != "" && $desc_servicio != "" && $costo_servicio != ""){
            $obj_servicio = new Servicio($nom_servicio, $desc_servicio, $costo_servicio, $archivo);
            $servicioDAO = new ServiciosDAO();
            $servicioDAO->Agregar($obj_servicio);
            echo "registro guardado";
        }
    }
}


function ListarServicios(){
    $servicio = new servicioDAO();
    $resp = $servicio->Listar();
    if(gettype($resp)=="array"){
        $tabla = '<table>
              <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Costo</th>
                <th>Imagen de referencia</th>
              </tr>';
        foreach ($resp as $key => $value) {
            $imagen = "assets/archivos/".$value['archivo'];
            $tabla.='<tr>
                  <td>'.$value['nom_servicio'].'</td>
                  <td>'.$value['desc_servicio'].'</td>
                  <td>'.$value['costo_servicio'].'</td>
                  <td><img style="width:200px; height:200px" src='.$imagen.'></td>
               </tr>';
  }
        $tabla.='</table>';

  }else{
  $tabla = "Lista no disponible por el momento.";
  }

  return $tabla;
}




 ?>
