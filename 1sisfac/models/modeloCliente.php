<?php
require_once ROOT_PATH . "libs/conexion.php";

class ModeloCliente {
    private $con;

    public function __construct() {
        try {
            $cnn = new Conexion();
            $this->con = $cnn->getConectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listaClientes() {
        try {            
            $lista = $this->con->prepare("SELECT * FROM clientes");
            $lista->execute();
            $res = $lista->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        } finally {
            $res = null;
        }
    }

    public function buscaCliente($id) {
        try {            
            $busca = $this->con->prepare("SELECT * FROM clientes WHERE idcliente = :cod");
            $busca->bindParam(":cod", $id);
            $busca->execute();
            $res = $busca->fetch(PDO::FETCH_ASSOC);
            return $res;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        } finally {
            $res = null;
        }
    }

    public function guardarCliente($data) {
        try {            
            $query = $this->con->prepare("INSERT INTO clientes (nomcliente, ruccliente, dircliente, telcliente, emailcliente) 
                VALUES (:nomcli, :ruccli, :dircli, :telcli, :email)");
            $query->bindParam(":nomcli", $data['nomcliente']);
            $query->bindParam(":ruccli", $data['ruccliente']);
            $query->bindParam(":dircli", $data['dircliente']);
            $query->bindParam(":telcli", $data['telcliente']);
            $query->bindParam(":email", $data['emailcliente']);
            $query->execute();
            return true;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        } finally {
            $res = false;
        }
    }

    public function actualizarCliente($data) {
        try {            
            $query = $this->con->prepare("UPDATE clientes
                SET nomcliente = :nomcli,
                    ruccliente = :ruccli,
                    dircliente = :dircli,
                    telcliente = :telcli,
                    emailcliente = :email
                WHERE idcliente = :cod");
            $query->bindParam(":nomcli", $data['nomcliente']);
            $query->bindParam(":ruccli", $data['ruccliente']);
            $query->bindParam(":dircli", $data['dircliente']);
            $query->bindParam(":telcli", $data['telcliente']);
            $query->bindParam(":email", $data['emailcliente']);
            $query->bindParam(":cod", $data['idcliente']);
            $query->execute();
            return true;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        } finally {
            $res = false;
        }
    }

    public function borraCliente($id) {
        try {            
            $borra = $this->con->prepare("DELETE FROM clientes WHERE idcliente = :cod");
            $borra->bindParam(":cod", $id);
            $borra->execute();
            return true;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        } finally {
            $res = null;
        }
    }

    public function obtenerVentasPorCliente() {
        try {
            $consulta = $this->con->prepare("
                SELECT c.idcliente, c.nomcliente AS nombre_cliente, SUM(f.valventa) AS venta_total
                FROM facturas f
                JOIN clientes c ON f.idcliente = c.idcliente
                GROUP BY c.idcliente, c.nomcliente
                ORDER BY venta_total DESC
            ");
            $consulta->execute();
            $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $resultados;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        } finally {
            $consulta = null;
            $resultados = null;
        }
    }
}
?>
