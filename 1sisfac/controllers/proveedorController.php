<?php

require_once ROOT_PATH."models/modeloProveedor.php";

class ProveedorController {

    private $modelo;

    public function __construct() {
        $this->modelo = new ModeloProveedor();
    }

    public function index() {
        $datos = $this->modelo->listaProveedores();
        // var_dump($datos);
        require_once ROOT_PATH."views/proveedor/listado.php";
    }
    
    public function nuevo() {
        require_once ROOT_PATH."views/proveedor/nuevo.php";
    }

    public function guardar() {
        $datos = array(
            'nomproveedor' => $_POST["nombre"],
            'rucproveedor' => $_POST["ruc"],
            'dirproveedor' => $_POST["dirpro"],
            'telproveedor' => $_POST["telpro"],
            'emailproveedor' => $_POST["email"]
        );
        
        $this->modelo->guardarProveedor($datos);
        $this->index();
    }

    public function editar($id) {
        $datos = $this->modelo->buscaProveedor($id);
        require_once ROOT_PATH."views/proveedor/modificar.php";
    }

    public function actualizar() {
        $datos = array(
            'nomproveedor' => $_POST["nombre"],
            'rucproveedor' => $_POST["ruc"],
            'dirprovseedor' => $_POST["dirpro"],
            'telproveedor' => $_POST["telpro"],
            'emailproveedor' => $_POST["email"],
            'idproveedor' => $_POST["id"],
        );
        
        $this->modelo->actualizarProveedor($datos);
        $this->index();
    }

    public function borrar($id) {
        $this->modelo->borraProveedor($id);
        $this->index();
    }

}
