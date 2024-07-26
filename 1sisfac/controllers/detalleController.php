<?php

require_once ROOT_PATH."models/modeloDetalle.php";

class DetalleController {

    private $modelo;

    public function __construct() {
        $this->modelo = new ModeloDetalle();
    }

    public function index() {
        $datos = $this->modelo->listaDetalle();
        require_once ROOT_PATH."views/venta/listado.php";
    }

    public function nuevo() {
        require_once ROOT_PATH."views/venta/nuevo.php";
    }

    public function guardar() {
        // Verificar que todos los campos requeridos están presentes
        $requiredFields = ['idproducto', 'cant', 'cosuni', 'preuni'];
        foreach ($requiredFields as $field) {
            if (!isset($_POST[$field]) || empty($_POST[$field])) {
                die("Error: El campo $field es requerido y no puede estar vacío.");
            }
        }

        $datos = array(

            'idproducto' => $_POST["idpro"],
            'cant' => $_POST["cant"],
            'cosuni' => $_POST["cosu"],
            'preuni' => $_POST["preu"]
        );

        $this->modelo->guardarDetalle($datos);

        $this->index();
    }


    public function borrar($id) {
        $this->modelo->borraDetalle($id);
        $this->index();
    }
}
