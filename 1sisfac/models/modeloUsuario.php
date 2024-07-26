<?php

require_once ROOT_PATH . "libs/conexion.php";

class ModeloUsuario {

    private $con;

    public function __construct() {
        try {
            $cnn = new Conexion();
            $this->con = $cnn->getConectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
     public function getUsuarioNombre($usuario){
        try {            
            $query = $this->con->prepare("select * from usuarios where nomusuario= :usuario");
            $query->bindParam(":usuario",$usuario);
            $query->execute();
            $res = $query->fetch(PDO::FETCH_ASSOC);
            return $res;

        }catch (Exception $e) {
			die('Error: '.$e->getMessage());
		} finally{
            $res=null;
        }
    }

    public function listaUsuarios() {
        try {
            $lista = $this->con->prepare("SELECT * FROM usuarios");
            $lista->execute();
            $res = $lista->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        } finally {
            $res = null;
        }
    }

    public function buscaUsuario($id) {
        try {
            $busca = $this->con->prepare("SELECT * FROM usuarios WHERE idusuario = :cod");
            $busca->bindParam(":cod", $id, PDO::PARAM_INT);
            $busca->execute();
            $res = $busca->fetch(PDO::FETCH_ASSOC);
            return $res;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        } finally {
            $res = null;
        }
    }

    public function guardarUsuario($data) {
        try {
            $query = $this->con->prepare("INSERT INTO usuarios (nomusuario, password, apellidos, nombres, email, estado) 
                VALUES (:nomusuario, :password, :apellidos, :nombres, :email, :estado)");

            $query->bindParam(":nomusuario", $data['nomusuario']);
            $query->bindParam(":password", $data['password']);
            $query->bindParam(":apellidos", $data['apellidos']);
            $query->bindParam(":nombres", $data['nombres']);
            $query->bindParam(":email", $data['email']);
            $query->bindParam(":estado", $data['estado']);

            $query->execute();

            return true;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        } finally {
            $res = false;
        }
    }

    public function actualizarUsuario($data) {
        try {
            $query = $this->con->prepare("UPDATE usuarios
                SET nomusuario = :nomusuario,
                    password = :password,
                    apellidos = :apellidos,
                    nombres = :nombres,
                    email = :email,
                    estado = :estado
                WHERE idusuario = :cod");

            $query->bindParam(":nomusuario", $data['nomusuario']);
            $query->bindParam(":password", $data['password']);
            $query->bindParam(":apellidos", $data['apellidos']);
            $query->bindParam(":nombres", $data['nombres']);
            $query->bindParam(":email", $data['email']);
            $query->bindParam(":estado", $data['estado']);
            $query->bindParam(":cod", $data['idusuario'], PDO::PARAM_INT);
            $query->execute();

            return true;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        } finally {
            $res = false;
        }
    }

    public function borraUsuario($id) {
        try {
            $borra = $this->con->prepare("DELETE FROM usuarios WHERE idusuario = :cod");
            $borra->bindParam(":cod", $id, PDO::PARAM_INT);
            $borra->execute();

            return true;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        } finally {
            $res = null;
        }
    }
}
