<?php

require_once ROOT_PATH."models/modeloCondicion.php";

class CondicionController {

    private $modelo;

    public function __construct() {
        $this->modelo = new ModeloCondicion();
    }

    public function index() {
        $datos = $this->modelo->listaCondicion();
        require_once ROOT_PATH."views/condicion/listado.php";
    }
    
    public function nuevo() {
        require_once ROOT_PATH."views/condicion/nuevo.php";
    }

    public function guardar() {
        $datos = array(
            'nomcondicion' => $_POST["nomco"],
        );
        $this->modelo->guardarCondicion($datos);
        $this->index();
    }

    public function editar($id) {
        $datos = $this->modelo->buscaCondicion($id);
        require_once ROOT_PATH."views/condicion/modificar.php";
    }

    public function actualizar() {
        $datos = array(
            'nomcondicion' => $_POST["nomco"], // Corrige el nombre de la clave
            'idcondicion' => $_POST["id"],
        );
        $this->modelo->actualizarCondicion($datos);
        $this->index();
    }

    public function borrar($id) {
        $this->modelo->borraCondicion($id);
        $this->index();
    }
}
