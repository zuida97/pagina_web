<?php
    require_once '../../modelo/class.nosotros.php';
    require_once '../../modelo/class.conexion.php';
    require_once '../../modelo/class.nosotros.php';
    require_once '../../controlador/controlador.nosotros.php';
    $resp=mostrar();
?>
<div class="contenedor">
    <form class="form" action="?vst=4" method="post">
        <h1>Modificar Nosotros</h1>
        <div class="ingreso">
            <input type="hidden" name="id" value="<?php echo $resp[0][0] ?>">
            <label for="">titulo:</label>
            <input type="text" name="tquienes" value="<?php echo $resp[0][1] ?>">
            <label for="">detalle</label>
            <textarea id="nosotroz" name="dquienes" rows="3" cols="80"><?php echo $resp[0][2] ?></textarea>

            <label for="">titulo:</label>
            <input type="text" name="tmision" value="<?php echo $resp[0][3] ?>">
            <label for="">detalle</label>
            <textarea id="nosotroz" name="dmision" rows="3" cols="80"><?php echo $resp[0][4] ?></textarea>

            <label for="">titulo:</label>
            <input type="text" name="tvision" value="<?php echo $resp[0][5] ?>">
            <label for="">detalle</label>
            <textarea id="nosotroz" name="dvision" rows="3" cols="80"><?php echo $resp[0][6] ?></textarea>

            <div><button type="submit" name="save">Guardar</button></div>
        </div>
    </form>
</div>
<?php
    modnosotros();
?>
