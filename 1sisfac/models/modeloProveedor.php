<?php

require_once ROOT_PATH."libs/conexion.php";

class ModeloProveedor {

    private $con;

    public function __construct() {
        try {
            $cnn = new Conexion();
            $this->con = $cnn->getConectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function listaProveedores() {
        try {            
            $lista = $this->con->prepare("SELECT * FROM proveedores");
            $lista->execute();
            $res = $lista->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        } catch (Exception $e) {
            die('Error: '.$e->getMessage());
        } finally {
            $res = null;
        }
    }

    public function buscaProveedor($id) {
        try {            
            $busca = $this->con->prepare("SELECT * FROM proveedores WHERE idproveedor = :cod");
            $busca->bindParam(":cod", $id);
            $busca->execute();
            $res = $busca->fetch(PDO::FETCH_ASSOC);
            return $res;
        } catch (Exception $e) {
            die('Error: '.$e->getMessage());
        } finally {
            $res = null;
        }
    }

    public function guardarProveedor($data) {
        try {            
            $query = $this->con->prepare("INSERT INTO proveedores (nomproveedor, rucproveedor, dirproveedor, telproveedor, emailproveedor) 
                VALUES (:nombre, :ruc, :dirpro, :telpro, :email)");

            $query->bindParam(":nombre", $data['nomproveedor']);
            $query->bindParam(":ruc", $data['rucproveedor']);
            $query->bindParam(":dirpro", $data['dirproveedor']);
            $query->bindParam(":telpro", $data['telproveedor']);
            $query->bindParam(":email", $data['emailproveedor']);

            $query->execute();

            return true;
        } catch (Exception $e) {
            die('Error: '.$e->getMessage());
        } finally {
            $res = false;
        }
    }
    
    public function actualizarProveedor($data) {
        try {            
            $query = $this->con->prepare("UPDATE proveedores
                SET nomproveedor = :nombre,
                    rucproveedor = :ruc,
                    dirproveedor = :dirpro,
                    telproveedor = :telpro,
                    emailproveedor = :email
                WHERE idproveedor = :cod");

            $query->bindParam(":nombre", $data['nomproveedor']);
            $query->bindParam(":ruc", $data['rucproveedor']);
            $query->bindParam(":dirpro", $data['dirproveedor']);
            $query->bindParam(":telpro", $data['telproveedor']);
            $query->bindParam(":email", $data['emailproveedor']);
            $query->bindParam(":cod", $data['idproveedor']);
            $query->execute();

            return true;
        } catch (Exception $e) {
            die('Error: '.$e->getMessage());
        } finally {
            $res = false;
        }
    }
    
    public function borraProveedor($id) {
        try {            
            $borra = $this->con->prepare("DELETE FROM proveedores WHERE idproveedor = :cod");
            $borra->bindParam(":cod", $id);
            $borra->execute();
            
            return true;
        } catch (Exception $e) {
            die('Error: '.$e->getMessage());
        } finally {
            $res = null;
        }
    }

}
