<?php 
require_once ROOT_PATH . "libs/conexion.php";

class ModeloVenta {
    private $con;

    public function __construct() {
        try {
            $cnn = new Conexion();
            $this->con = $cnn->getConectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listaVentas() {
        try {
            $lista = $this->con->prepare("SELECT * FROM facturas");
            $lista->execute();
            $res = $lista->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        } catch (Exception $e) {
            die('Error: '.$e->getMessage());
        } finally {
            $lista = null;
            $res = null;
        }
    }

    public function buscaVenta($id) {
        try {
            $busca = $this->con->prepare("SELECT * FROM facturas WHERE id = :cod");
            $busca->bindParam(":cod", $id);
            $busca->execute();
            $res = $busca->fetch(PDO::FETCH_ASSOC);
            return $res;
        } catch (Exception $e) {
            die('Error: '.$e->getMessage());
        } finally {
            $busca = null;
            $res = null;
        }
    }

    public function guardarVenta($data) {
        try {
            // Iniciar la transacción
            $this->con->beginTransaction();
            
            // Insertar en la tabla facturas
            $query = $this->con->prepare("INSERT INTO facturas (fecha, idcliente, idusuario, fechareg, condi, valventa, igv, cant, preuni, idproducto) VALUES (:fech, :idcli, :idus, :fechr, :condi, :vventa, :igv, :cant, :preuni, :idpro)");
            $query->bindParam(":fech", $data['fecha']);
            $query->bindParam(":idcli", $data['idcliente']);
            $query->bindParam(":idus", $data['idusuario']);
            $query->bindParam(":fechr", $data['fechareg']);
            $query->bindParam(":condi", $data['condi']);
            $query->bindParam(":vventa", $data['valventa']);
            $query->bindParam(":igv", $data['igv']);
            $query->bindParam(":cant", $data['cant']);
            $query->bindParam(":preuni", $data['preuni']);
            $query->bindParam(":idpro", $data['idproducto']);

            $query->execute();

            // Obtener el último ID insertado
            $idFactura = $this->con->lastInsertId();
            
            // Insertar en la tabla listfacturas incluyendo idfactura
            $queryList = $this->con->prepare("INSERT INTO listfacturas (idfactura, fecha, idcliente, idusuario, condi, vventa, igv, cant, preuni, idproducto) VALUES (:idfactura, :fech, :idcli, :idus, :condi, :vventa, :igv, :cant, :preuni, :idpro)");
            $queryList->bindParam(":idfactura", $idFactura);
            $queryList->bindParam(":fech", $data['fecha']);
            $queryList->bindParam(":idcli", $data['idcliente']);
            $queryList->bindParam(":idus", $data['idusuario']);
            $queryList->bindParam(":condi", $data['condi']);
            $queryList->bindParam(":vventa", $data['valventa']);
            $queryList->bindParam(":igv", $data['igv']);
            $queryList->bindParam(":cant", $data['cant']);
            $queryList->bindParam(":preuni", $data['preuni']);
            $queryList->bindParam(":idpro", $data['idproducto']);

            $queryList->execute();
            
            // Confirmar la transacción
            $this->con->commit();
            return true;
        } catch (Exception $e) {
            // Revertir la transacción en caso de error
            $this->con->rollBack();
            die('Error: '.$e->getMessage());
        } finally {
            $query = null;
            $queryList = null;
        }
    }

    public function borraVenta($id) {
        try {
            $borra = $this->con->prepare("DELETE FROM facturas WHERE idfactura = :cod");
            $borra->bindParam(":cod", $id);
            $borra->execute();
            return true;
        } catch (Exception $e) {
            die('Error: '.$e->getMessage());
        } finally {
            $borra = null;
        }
    }
}
?>
