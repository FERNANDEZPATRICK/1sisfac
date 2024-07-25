<?php
require_once ROOT_PATH . "libs/conexion.php";

class ModeloRanking {
    private $con;

    public function __construct() {
        try {
            $cnn = new Conexion();
            $this->con = $cnn->getConectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtenerRankingVentas() {
        try {
            $consulta = $this->con->prepare("
                SELECT p.idproducto, p.nomproducto AS nombre_producto, SUM(f.cant) AS cantidad_total, SUM(f.valventa) AS venta_total
                FROM facturas f
                JOIN productos p ON f.idproducto = p.idproducto
                GROUP BY p.idproducto, p.nomproducto
                ORDER BY venta_total DESC
                LIMIT 10
            ");
            $consulta->execute();
            $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $resultados;
        } catch (Exception $e) {
            die('Error: '.$e->getMessage());
        } finally {
            $consulta = null;
            $resultados = null;
        }
    }
}
?>
