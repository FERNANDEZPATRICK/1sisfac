<?php

require_once ROOT_PATH . "models/modeloUsuario.php";
require_once ROOT_PATH."controllers/inicioController.php";

class UsuarioController {

    private $modelo;

    public function __construct() {
        $this->modelo = new ModeloUsuario();
    }

    public function index() {
        $datos = $this->modelo->listaUsuarios();
        require_once ROOT_PATH . "views/usuario/listado.php";
    }

     public function valida(){
        $usuario=$_POST["usuario"];
        $password_c = sha1($_POST["password"]);

        $datos = $this->modelo->getUsuarioNombre($usuario);

        if ($datos){
            $user = $datos["nomusuario"];
            $pass = $datos["password"];

            if ($user==$usuario and $pass==$password_c ){
            
                session_start();
                $_SESSION["id"]= $datos["idusuario"];
                $_SESSION["nombre"]= $datos["nomusuario"];
                
                $inicio = new InicioController();
                $inicio->index();
            } else{

                echo "Contraseña incorrectos";
            }    
                
     }else {
         echo "Usuario NO existe";
     }
     }

    public function nuevo() {
        require_once ROOT_PATH . "views/usuario/nuevo.php";
    }

    public function guardar() {
        $datos = array(
            'nomusuario' => $_POST["nomusuario"],
            'password' => sha1($_POST["password"]),
            'apellidos' => $_POST["apellidos"],
            'nombres' => $_POST["nombres"],
            'email' => $_POST["email"],
            'estado' => $_POST["estado"]
        );
        
        $this->modelo->guardarUsuario($datos);
        
        $this->index();
    }

    public function editar($id) {
        $datos = $this->modelo->buscaUsuario($id);
        require_once ROOT_PATH . "views/usuario/modificar.php";
    }

    public function actualizar() {
        $datos = array(
            'nomusuario' => $_POST["nomusuario"],
            'password' => sha1($_POST["password"]),
            'apellidos' => $_POST["apellidos"],
            'nombres' => $_POST["nombres"],
            'email' => $_POST["email"],
            'estado' => $_POST["estado"],
            'idusuario' => $_POST["idusuario"]
        );
        
        $this->modelo->actualizarUsuario($datos);
            
        
        $this->index();
    }

    public function borrar($id) {
        $this->modelo->borraUsuario($id);
        $this->index();
    }
}
