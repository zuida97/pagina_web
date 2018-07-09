<?php

    function modnosotros(){
        if(isset($_POST['save'])){
            $i=$_POST['id'];
            $tQ=$_POST['tquienes'];
            $dQ=$_POST['dquienes'];
            $tM=$_POST['tmision'];
            $dM=$_POST['dmision'];
            $tV=$_POST['tvision'];
            $dV=$_POST['dvision'];
            $nos=new infonosotros($i,$tQ, $dQ, $tM, $dM, $tV, $dV);
            modificar($nos);
        }
    }
    function mostrar(){
        $sql="SELECT * FROM tbl_nosotros WHERE id='1'";
        $conexion = new Conexion();
        $resp= $conexion->Consulta($sql);
        return $resp;
    }
    function modificar($nos){
        $sql="UPDATE tbl_nosotros SET tituloq='".$nos->tQuienes."',
                                        descripcionq='".$nos->dQuienes."',
                                        titulom='".$nos->tMision."',
                                        descripcionm='".$nos->dMision."',
                                        titulov='".$nos->tVision."',
                                        descripcionv='".$nos->dVision."'
                                        WHERE id='1'";
        $conexion = new Conexion();
        $resp= $conexion->InMoEl($sql);
        return $resp;
    }
?>
