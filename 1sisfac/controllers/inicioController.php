<?php
require_once "libs/config.php";

class InicioController{

    public function index(){
               require_once ROOT_PATH."views/inicio/portada.php";
        }


       public function cerrar(){
        session_start();

        session_destroy();

        require_once ROOT_PATH."login.php";

        }
    
    }
        