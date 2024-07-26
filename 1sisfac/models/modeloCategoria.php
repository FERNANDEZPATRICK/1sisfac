<?php


class ModeloCategoria{

    private $con;

    public function __construct(){
        try{
            $cnn = new Conexion();
            $this->con = $cnn->getConectar();
        } catch (Exception $e){
             die($e.getMessage());
       }

    }
    
    public function listaCategorias(){
        try {            
            $lista = $this->con->prepare("select * from categorias");
            $lista->execute();
            $res = $lista->fetchAll(PDO::FETCH_ASSOC);
            return $res;

        }catch (Exception $e) {
			die('Error: '.$e->getMessage());
		} finally{
            $res=null;
        }
    }
    public function buscaCategoria($id) {
        try {            
            $busca = $this->con->prepare("SELECT * FROM categorias WHERE idcategoria = :cod");
            $busca->bindParam(":cod", $id, PDO::PARAM_INT);
            $busca->execute();
            $res = $busca->fetch(PDO::FETCH_ASSOC);
            return $res;
        } catch (Exception $e) {
            die('Error: '.$e->getMessage());
        }
    }

    public function guardarCategoria($data) {
        try {            
            $query = $this->con->prepare("INSERT INTO categorias (nomcategoria) VALUES (:nomca)");
            $query->bindParam(":nomca", $data['nomcategoria'], PDO::PARAM_STR);
            $query->execute();
            return true;
        } catch (Exception $e) {
            die('Error: '.$e->getMessage());
        }
    }
    
    public function actualizarCategoria($data) {
        try {            
            $query = $this->con->prepare("UPDATE categorias SET nomcategoria = :nomca WHERE idcategoria = :cod");
            $query->bindParam(":nomca", $data['nomcategoria'], PDO::PARAM_STR);
            $query->bindParam(":cod", $data['idcategoria'], PDO::PARAM_INT);
            $query->execute();
            return true;
        } catch (Exception $e) {
            die('Error: '.$e->getMessage());
        }
    }
    
    public function borraCategoria($id) {
        try {            
            $borra = $this->con->prepare("DELETE FROM categorias WHERE idcategoria = :cod");
            $borra->bindParam(":cod", $id, PDO::PARAM_INT);
            $borra->execute();
            return true;
        } catch (Exception $e) {
            die('Error: '.$e->getMessage());
        }
    }
    

    

}