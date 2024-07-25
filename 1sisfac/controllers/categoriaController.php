<?php

require_once ROOT_PATH."models/modeloCategoria.php";

class CategoriaController {

    private $modelo;

    public function __construct() {
        $this->modelo = new ModeloCategoria();
    }

    public function index() {
        $datos = $this->modelo->listaCategorias();
        require_once ROOT_PATH."views/categoria/listado.php";
    }
    
    public function nuevo() {
        require_once ROOT_PATH."views/categoria/nuevo.php";
    }

    public function guardar() {
        $datos = array(
            'nomcategoria' => $_POST["nomca"],
        );
        $this->modelo->guardarCategoria($datos);
        $this->index();
    }

    public function editar($id) {
        $datos = $this->modelo->buscaCategoria($id);
        require_once ROOT_PATH."views/categoria/modificar.php";
    }

    public function actualizar() {
        $datos = array(
            'nomcategoria' => $_POST["nomca"], // Corrige el nombre de la clave
            'idcategoria' => $_POST["id"],
        );
        $this->modelo->actualizarCategoria($datos);
        $this->index();
    }

    public function borrar($id) {
        $this->modelo->borraCategoria($id);
        $this->index();
    }
}
