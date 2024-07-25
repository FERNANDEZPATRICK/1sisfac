<?php
require_once ROOT_PATH."models/modeloCliente.php";

class ClienteController{
    private $modelo;

    public function __construct(){
        $this->modelo = new ModeloCliente();
    }

    public function index(){
        $datos = $this->modelo->listaClientes();
        require_once ROOT_PATH."views/cliente/listado.php";
    }

    public function nuevo(){
        require_once ROOT_PATH."views/cliente/nuevo.php";
    }

    public function guardar(){
        $datos = array(
            'nomcliente' => $_POST["nomcli"],
            'ruccliente' => $_POST["ruccli"],
            'dircliente' => $_POST["dircli"],
            'telcliente' => $_POST["telcli"],
            'emailcliente' => $_POST["email"]
        );
        $this->modelo->guardarCliente($datos);
        $this->index();
    }

    public function editar($id){
        $datos = $this->modelo->buscaCliente($id);
        require_once ROOT_PATH."views/cliente/modificar.php";
    }

    public function actualizar(){
        $datos = array(
            'nomcliente' => $_POST["nomcli"],
            'ruccliente' => $_POST["ruccli"],
            'dircliente' => $_POST["dircli"],
            'telcliente' => $_POST["telcli"],
            'emailcliente' => $_POST["email"],
            'idcliente' => $_POST["id"]
        );
        $this->modelo->actualizarCliente($datos);
        $this->index();
    }

    public function borrar($id){
        $this->modelo->borraCliente($id);
        $this->index();
    }

    public function ventasPorCliente(){
        $datos = $this->modelo->obtenerVentasPorCliente();
        require_once ROOT_PATH."views/cliente/ventasCliente.php";
    }
}
?>
