<?php

require_once "libs/config.php";
require_once ROOT_PATH."libs/conexion.php";
require_once ROOT_PATH."models/modeloProducto.php";
require_once ROOT_PATH."models/modeloProveedor.php";
require_once ROOT_PATH."models/modeloCategoria.php";
require_once ROOT_PATH."models/modeloCliente.php";
require_once ROOT_PATH."models/modeloVenta.php";
require_once ROOT_PATH."models/modeloUsuario.php";

require_once 'routes/cargar_rutas.php';

if (isset( $_GET[ 'c' ] ) ) {

    $controlador = cargarControlador($_GET['c']);
		
    if(isset($_GET['a'])){
        if(isset($_GET['id'])){
            cargarMetodo($controlador, $_GET['a'], $_GET['id']);
            } else {
                cargarMetodo($controlador, $_GET['a']);
            }
        } else {
        cargarMetodo($controlador, ACCION_PRINCIPAL);
    }
    
    } else {
        
        header ("location: login.php");
       
}


?>