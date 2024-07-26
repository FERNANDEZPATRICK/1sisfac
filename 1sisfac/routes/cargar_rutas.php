<?php

function cargarControlador($controlador){
    $nombreControlador = ucwords($controlador)."Controller";
    $archivoControlador = ROOT_PATH.'controllers/'.ucwords($controlador).'Controller.php';

    if(!is_file($archivoControlador)){
        $archivoControlador = ROOT_PATH.'controllers/'.CONTROLADOR_PRINCIPAL.'Controller.php';
    }
    require_once $archivoControlador;

    $control = new $nombreControlador();

    return $control;
}

function cargarMetodo($controlador, $metodo, $id = null){
    if(isset($metodo) && method_exists($controlador, $metodo)){
        if($id == null){
            $controlador->$metodo();
        } else {
            $controlador->$metodo($id);
        }
    } else {
        $controlador->{ACCION_PRINCIPAL}(); // Uso correcto de la constante
    }
}
?>
