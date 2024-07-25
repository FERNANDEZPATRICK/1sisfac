<?php

require_once ROOT_PATH."libs/conexion.php";

class ModeloCondicion {
    private $con;

    public function __construct() {
        try {
            $cnn = new Conexion();
            $this->con = $cnn->getConectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function listaCondicion() {
        try {            
            $lista = $this->con->prepare("SELECT * FROM condicionventa");
            $lista->execute();
            $res = $lista->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        } catch (Exception $e) {
            die('Error: '.$e->getMessage());
        }
    }

    public function buscaCondicion($id) {
        try {            
            $busca = $this->con->prepare("SELECT * FROM condicionventa WHERE idcondicion = :cod");
            $busca->bindParam(":cod", $id, PDO::PARAM_INT);
            $busca->execute();
            $res = $busca->fetch(PDO::FETCH_ASSOC);
            return $res;
        } catch (Exception $e) {
            die('Error: '.$e->getMessage());
        }
    }

    public function guardarCondicion($data) {
        try {            
            $query = $this->con->prepare("INSERT INTO condicionventa (nomcondicion) VALUES (:nomco)");
            $query->bindParam(":nomco", $data['nomcondicion'], PDO::PARAM_STR);
            $query->execute();
            return true;
        } catch (Exception $e) {
            die('Error: '.$e->getMessage());
        }
    }
    
    public function actualizarCondicion($data) {
        try {            
            $query = $this->con->prepare("UPDATE condicionventa SET nomcondicion = :nomco WHERE idcondicion = :cod");
            $query->bindParam(":nomco", $data['nomcondicion'], PDO::PARAM_STR);
            $query->bindParam(":cod", $data['idcondicion'], PDO::PARAM_INT);
            $query->execute();
            return true;
        } catch (Exception $e) {
            die('Error: '.$e->getMessage());
        }
    }
    
    public function borraCondicion($id) {
        try {            
            $borra = $this->con->prepare("DELETE FROM condicionventa WHERE idcondiciion = :cod");
            $borra->bindParam(":cod", $id, PDO::PARAM_INT);
            $borra->execute();
            return true;
        } catch (Exception $e) {
            die('Error: '.$e->getMessage());
        }
    }
}
