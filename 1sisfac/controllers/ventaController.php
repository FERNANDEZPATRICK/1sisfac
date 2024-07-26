<?php 
require_once ROOT_PATH . "models/modeloVenta.php";

class VentaController {
    private $modelo;

    public function __construct() {
        $this->modelo = new ModeloVenta();
    }

    public function index() {
        $datos = $this->modelo->listaVentas();
        require_once ROOT_PATH . "views/venta/listado.php";
    }

    public function nuevo() {
        require_once ROOT_PATH . "views/venta/nuevo.php";
    }

    public function guardar() {
        // Verificar que todos los campos requeridos están presentes
        $requiredFields = ['fech', 'idcli', 'idus', 'fechr', 'condi', 'igv', 'cant', 'preuni', 'idpro'];
        foreach ($requiredFields as $field) {
            if (!isset($_POST[$field]) || empty($_POST[$field])) {
                die("Error: El campo $field es requerido y no puede estar vacío.");
            }
        }
    
        $datos = array(
            'fecha' => $_POST["fech"],
            'idcliente' => $_POST["idcli"],
            'idusuario' => $_POST["idus"],
            'fechareg' => $_POST["fechr"],
            'condi' => $_POST["condi"],
            'igv' => $_POST["igv"],
            'cant' => $_POST["cant"],
            'preuni' => $_POST["preuni"],
            'idproducto' => $_POST["idpro"]
        );
    
        $this->modelo->guardarVenta($datos);
        $this->index();
    }

    public function borrar($id) {
        $this->modelo->borraVenta($id);
        $this->index();
    }
}
?>
