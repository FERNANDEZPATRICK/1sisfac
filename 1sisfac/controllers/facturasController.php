<?php

require_once ROOT_PATH."models/modeloFactura.php";

class FacturasController{

    private $modelo;

    public function __construct(){

        $this->modelo = new ModeloFactura();

    }

    public function index(){

        $datos = $this->modelo->listafacturas();
        //var_dump($datos);
        require_once ROOT_PATH."views/facturas/listado.php";

    }
}