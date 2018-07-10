<?php
    require_once '../modelo/class.nosotros.php';
    require_once '../modelo/class.conexion.php';
    require_once '../controlador/controlador.nosotros.php';
    $resp=mostrar();
?>

<article class="">
    <div id="container">
      <div class="parrafo">
          <h2><?php echo $resp[0][1] ?></h2>
          <p><?php echo $resp[0][2] ?></p>
      </div>


        <div class="parrafo">
            <h3><?php echo $resp[0][3] ?></h3>
            <p><?php echo $resp[0][4] ?></p>
        </div>

        <div class="parrafo">
            <h3><?php echo $resp[0][5] ?></h3>
            <p><?php echo $resp[0][6] ?></p>
        </div>


    </div>
</article>
