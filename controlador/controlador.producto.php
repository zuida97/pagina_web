<?php


function AgregarProducto(){
    if(isset($_POST['guardar'])){
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $tipo = $_POST['tipo'];
        $costo = $_POST['costo'];
        $cantidad = $_POST['cantidad'];
        $archivo = $_FILES['imagen']['name'];
        $ruta_tmp = $_FILES['imagen']['tmp_name'];
        $ruta = "../assets/archivos/".$archivo;
        move_uploaded_file($ruta_tmp,$ruta);
        $estado = $_POST['estado'];
        if($codigo != ""  && $nombre != ""  && $descripcion != "" &&  $tipo != "" &&  $costo != "" &&  $cantidad != ""){
                $obj_producto = new Producto($codigo, $nombre, $descripcion, $tipo, $costo, $cantidad, $archivo, $estado);
                $prodDAO = new ProductoDAO();
                $prodDAO->Agregar($obj_producto);
                echo '<div  class="contenedor4" style="width:1050px;" ><h4 style ="margin:30px ">Registro agregado exitosamente</h4> </div>';

      }

      
  }

}







function BuscarProdAdmin(){
    $busqueda =  ' <div class="contenedor4">
      <form class="form" action="?bus=1" method="post" enctype="multipart/form-data">
          <h2>Buscar un producto</h2>
          <div class="ingreso2">
          <input type="text" name="valor" value="" placeholder="ingrese nombre, tipo o código del producto">
          <button type="submit" name="buscar">Buscar</button>
          </div>
       </form>
       </div>';
    echo $busqueda;
    if(isset($_POST['buscar'])){
        if($_POST['valor'] != ""){
            $valor = $_POST['valor'];
            $resp = ListaProd($valor);
            if($resp != false){
                echo ListaProd($valor);
            }else{
                echo '<div  class="contenedor4" ><h4 style ="margin:30px ">Lo sentimos, no se encontraron resultados en la busqueda</h4> </div>';
            }
        }
        else{
            echo ListaProd();

        }

    }else{
        echo ListaProd();

    }

}





function ListaProd($nom = null){
    $producto = new ProductoDAO();
    if($nom == null){
        $resp = $producto->listar();
    }
    else{
        $resp = $producto->ListarPorNombre($nom);
    }

    if(count($resp) !=0){
        $tabla = '<div class="contenedor3"><table class="table table-light table-hover ">
            <tr>
                <th>Imagen de referencia</th>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Tipo</th>
                <th>Costo</th>
                <th>Cantidad</th>
            </tr>';
        foreach ($resp as $key => $value) {
            $imagen = "../assets/archivos/".$value['archivo'];
            $tabla.='<tr>
                    <td><img style="width:200px; height:150px; border-left:30px solid white;border-right:30px solid white" src="'.$imagen.'"></td>
                    <td>'.$value['cod_producto'].'</td>
                    <td style=" width:250px">'.$value['nom_producto'].'</td>
                    <td style=" width:300px">'.$value['desc_producto'].'</td>
                    <td>'.$value['tipo_producto'].'</td>
                    <td>'.$value['costo_prod'].'</td>
                    <td>'.$value['cant_prod'].'</td>
                </tr>';
        }

        $tabla.='</table></div>';

    }
    else{
        return false;
    }

return $tabla;


}

function ListarProductos($tipo = null, $nombre = null){
    $producto = new ProductoDAO();
    if($tipo == null && $nombre == null){
        $resp = $producto->listar();
    }
    else{
        $resp = $producto->listarporTipo($tipo, $nombre);
    }

    if(gettype($resp)=="array"){
        $tabla = '<tr">';
        $i = 0;
        foreach ($resp as $key => $value) {
            if($i ==3){
                $tabla .= "<tr>";

            }
            $imagen = "assets/archivos/".$value['archivo'];
            $tabla.='<td>
                    <img style="margin-bottom:10px;height:300px; width:300px" src='.$imagen.'></br>
                    <label for="">Nombre : '.$value['nom_producto'].'</label><br>
                    <label for="">Valor  : '.$value['costo_prod'].'</label><br>
                    <label for="">Tipo   : '.$value['tipo_producto'].'</label><br>


                    </td>';
            $i++;
            if($i ==3){
                $tabla .= "</tr>";
                $i =0;

            }


  }
        $tabla.='</tr>';

  }else{
  $tabla = "Lista no disponible por el momento.";
}

return $tabla;


}






function BusquedaPorCod(){
    if(isset($_POST['cod'])){
        $id = $_POST['cod'];
        if($id != null){
            $productoDAO = new ProductoDAO();
            $resp = $productoDAO->Buscar($id);
            if(gettype($resp)=="array"){
                if(count($resp) == 1){
                    $producto = new Producto();
                    $producto->codigo = $resp[0][0];
                    $producto->nombre = $resp[0][1];
                    $producto->descripcion = $resp[0][2];
                    $producto->tipo = $resp[0][3];
                    $producto->costo = $resp[0][4];
                    $producto->cantidad =  $resp[0][5];
                    $producto->archivo  =  $resp[0][6];
                    $producto->estado  =  $resp[0][7];
                    return $producto;
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



function ModificarFormulario(){
    if(isset($_POST['cambios'])){
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $tipo = $_POST['tipo'];
        $costo = $_POST['costo'];
        $cantidad = $_POST['cantidad'];
        $archivo = $_FILES['imagen']['name'];
        if($archivo != null){
            $ruta_tmp = $_FILES['imagen']['tmp_name'];
            $ruta = "../assets/archivos/".$archivo;
            move_uploaded_file($ruta_tmp,$ruta);
        }
        else{
            $archivo = $_POST['ima'];

      }

        $estado = $_POST['estado'];
        if($codigo != ""  && $nombre != ""  && $descripcion != "" &&  $tipo != "" &&  $costo != "" &&  $cantidad != ""){
            $obj_producto = new Producto($codigo, $nombre, $descripcion, $tipo, $costo, $cantidad, $archivo, $estado);
            $prodDAO = new ProductoDAO();
            $prodDAO->Modificar($obj_producto);
            echo '<div  class="contenedor4" style="width:1050px;" ><h4 style ="margin:30px ">Registro actualizado exitosamente</h4> </div>';


      }
    }

}


function LLenarFormulario(){
      $formulario = null;

      $busqueda =  ' <div class="contenedor2">
        <form class="form" action="?mod=1" method="post" enctype="multipart/form-data">
            <h2>Modificar un producto</h2>
            <div class="ingreso2">
            <input type="text" name="cod" value="" placeholder="ingrese código del producto">
            <button type="submit" name="buscar">Buscar</button>
            </div>
         </form>
         </div>';
      echo $busqueda;

      if(isset($_POST['buscar'])){
            $producto = new Producto();
            $producto = BusquedaPorCod();
            if(gettype($producto) == 'object'){
                $Cbtipo =$producto->tipo;
                $Cbestado = $producto->estado;
                $formulario ='
                <div class="contenedor">
                <form class="form" action="?mod=1" method="post" enctype="multipart/form-data">
                    <div class="ingreso">
                    <input type="hidden"  name="ima" value="'.$producto->archivo.'">
                    <input type="hidden" name="codigo" value="'.$producto->codigo.'">
                    <div><label for="">Código Producto : '.$producto->codigo.'</label></div>
                    <label for="">Nombre producto</label>
                    <input type="text" name="nombre" value="'.$producto->nombre.'">
                    <label for="">Descripción</label>
                    <textarea name="descripcion" rows="8" cols="80">'.$producto->descripcion.'</textarea>
                    <label for="">Tipo</label>
                    <select class="" name="tipo">
                    <option value="">[Seleccione una opción]</option>';


                    if($Cbtipo == 'Alarma'){
                        $formulario .= '<option value="Alarma" selected >Alarma</option>';
                    }
                    else{
                        $formulario .= '<option value="Alarma">Alarma</option>';
                    }
                    if($Cbtipo == 'Cámara de seguridad'){
                        $formulario .= '<option value="Cámara de seguridad" selected>Cámara de seguridad</option>';
                    }
                    else{
                        $formulario .= '<option value="Cámara de seguridad">Cámara de seguridad</option>';
                    }
                    if($Cbtipo == 'Detector de humo'){
                        $formulario .= '<option value="Detector de humo" selected>Detector de humo</option>';
                    }
                    else{
                        $formulario .= '<option value="Detector de humo">Detector de humo</option>';
                    }

              $formulario .='</select>
                    <label for="">Costo</label>
                    <input type="text" name="costo" value="'.$producto->costo.'">
                    <label for="">Cantidad</label></div>
                    <input type="text" name="cantidad" value="'.$producto->cantidad.'" id="cantidad">
                    <div class="">
                        <label for="" style="font-weight:bold">Estado</label>
                    </div>
                    <div>
                        <select class="" name="estado">
                        <option value="">[Selecione un estado]</option>';

               if($Cbestado == 0){
                   $formulario .= '<option value="0" selected>Activado</option>';
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



               $formulario .='</select>
                    </div>
                        <div>
                            <img src="../assets/archivos/'.$producto->archivo.'" style="margin: -50px 100px 200px 0px;float:right; height:200px; width:200px;>
                        </div>
                            <div style="margin-top:-30px;"><input type="file" name="imagen"></div>
                            <div class= ""><button type="submit" name="cambios" id="btnguardar" style="width:300px">Guardar cambios</button>
                        </div>
                    </div>
                    </form>
                </div>';
                return $formulario;
            }
            else{
                return '<div  class="contenedor4" style="width:1050px;" ><h4 style ="margin:30px ">Lo sentimos, no se encontraron resultados en la busqueda</h4> </div>';
;

            }
            }

}










 ?>
