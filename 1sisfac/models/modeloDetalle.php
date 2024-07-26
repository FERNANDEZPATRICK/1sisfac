<?php

require_once ROOT_PATH."libs/conexion.php";

class ModeloDetalle{

    private $con;

    public function __construct(){
        try{
            $cnn = new Conexion();
            $this->con = $cnn->getConectar();
        } catch (Exception $e){
             die($e.getMessage());
       }

    }
    
    public function listaDetalleventa(){
        try {            
            $lista = $this->con->prepare("select * from detallefactura");
            $lista->execute();
            $res = $lista->fetchAll(PDO::FETCH_ASSOC);
            return $res;

        }catch (Exception $e) {
			die('Error: '.$e->getMessage());
		} finally{
            $res=null;
        }
    }


    public function guardarDetalle($data) {
        try {
            // Iniciar la transacción
            $this->con->beginTransaction();
    
            // Insertar en la tabla DetalleFactura
            $query = $this->con->prepare("INSERT INTO detallefactura (idproducto, cant, cosuni, preuni) 
                VALUES (:idpro, :cant, :cosu, :preu)");
            $query->bindParam(":idpro", $data['idproducto']);
            $query->bindParam(":cant", $data['cant']);
            $query->bindParam(":cosu", $data['cosuni']);
            $query->bindParam(":preu", $data['preuni']);
            $query->execute();
    
            // Insertar en la tabla listfacturas
            $query2 = $this->con->prepare("INSERT INTO listfacturas (idproducto, cant, preuni) 
                VALUES (:idpro, :cant, :preu)");
            $query2->bindParam(":idpro", $data['idproducto']);
            $query2->bindParam(":cant", $data['cant']);
            $query2->bindParam(":preu", $data['preuni']);
            $query2->execute();
    
            // Confirmar la transacción
            $this->con->commit();
    
            return true;
        } catch (Exception $e) {
            // Revertir la transacción en caso de error
            $this->con->rollBack();
            die('Error: ' . $e->getMessage());
        } finally {
            $res = false;
        }
    }
    

    
    public function borraDetalle($id){
        try {            
            $borra = $this->con->prepare("delete from detalleFactura where id = :cod");
            $borra->bindParam(":cod", $id);
            $borra->execute();
            
            return true;

        }catch (Exception $e) {
			die('Error: '.$e->getMessage());
		} finally{
            $res=null;
        }
    }

}