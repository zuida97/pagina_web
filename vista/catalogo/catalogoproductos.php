<div style="background-image: url(assets/img/fondo_productos.jpg);margin-top:-16px;">



<header>
    <form class="" action="?mod=5" method="post">
        <div class="">
            <input id="Cbuscar" class="posicionado" type="text" name="valor" placeholder="Ingrese nombre del producto">
            <button class="posicionado" type="search" name="buscar" >BUSCAR</button>
        </div>


</header>
<section class="lado">

    <aside class="">


            <div class="">
                <h5>Ordenar por Tipo</h5>
                <div class="">
                    <input type="radio" name="t" value="Alarma"><label for="">Alarma</label>
                </div>
                <div class="">
                    <input type="radio" name="t" value="Cámara de seguridad"><label for="">Cámara de seguridad</label>
                </div>
                <div class="">
                    <input type="radio" name="t" value="Detector de humo"><label for="">Detector de humo</label>
                </div>

            </div>
        </form>
    </aside>

    <table>

            <?php
            $listar = null;
            if(isset($_POST['buscar'])){
                if(isset($_POST['t']) && isset($_POST['valor'])){
                    $val = $_POST['valor'];
                    if($_POST['t'] != null){
                        if($_POST['t'] == "Alarma" ){
                            $ordenar = "Alarma";
                            if($val == ""){
                                $listar = ListarProductos($ordenar, null);
                            }
                            else{
                                $listar = ListarProductos($ordenar, $val);
                            }

                        }
                        else if($_POST['t'] == "Cámara de seguridad"){
                            $ordenar = "Cámara de seguridad";
                            if($val == ""){
                                $listar = ListarProductos($ordenar, null);
                            }
                            else{
                                $listar = ListarProductos($ordenar, $val);

                            }
                        }
                        else if($_POST['t'] == "Detector de humo"){
                            $ordenar = "Detector de humo";
                            if($val == ""){
                                $listar = ListarProductos($ordenar, null);
                            }
                            else{
                                $listar = ListarProductos($ordenar, $val);
                            }
                        }
                        else{
                            $listar = ListarProductos();
                        }
                    }
                    else{
                        $listar = ListarProductos(null, $val);

                    }
                }

                else if(isset($_POST['valor']) && !isset($_POST['t'])){
                    $val = $_POST['valor'];
                    $listar = ListarProductos(null,$val);

                }
                else{
                    $listar = ListarProductos();

                }
            }
            else{
                $listar = ListarProductos();


            }

              echo $listar;
             ?>
    </table>
</section>
</div>
