<?php
    require_once '../modelo/class.nosotros.php';
    require_once '../modelo/class.conexion.php';
    require_once '../controlador/controlador.nosotros.php';
    $resp=mostrar();
?>
<article class="">
    <div id="panel">
      <section>
        <header>
          <h2><?php echo $resp[0][1] ?></h2>
        </header>
            <p><?php echo $resp[0][2] ?></p>
      </section>


        <section>
          <header>
            <h3><?php echo $resp[0][3] ?></h3>
          </header>
            <p><?php echo $resp[0][4] ?></p>
        </section>
        <section>
          <header>
            <h3><?php echo $resp[0][5] ?></h3>
          </header>
            <p><?php echo $resp[0][6] ?></p>
        </section>


    </div>
</article>
