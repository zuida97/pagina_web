<?php

    class infonosotros{
        public $id;
        public $tQuienes;
        public $dQuienes;
        public $tMision;
        public $dMision;
        public $tVision;
        public $dVision;

        function __construct($i=null,$titulo1=null,$detalle1=null,$titulo2=null,
        $detalle2=null,$titulo3=null,$detalle3=null){
            $this->id=$i;
            $this->tQuienes=$titulo1;
            $this->dQuienes=$detalle1;
            $this->tMision=$titulo2;
            $this->dMision=$detalle2;
            $this->tVision=$titulo3;
            $this->dVision=$detalle3;
        }

    }

?>
