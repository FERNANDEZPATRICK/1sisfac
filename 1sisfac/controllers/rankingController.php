<?php
require_once ROOT_PATH."models/modeloRanking.php";

class RankingController {
    private $modelo;

    public function __construct() {
        $this->modelo = new ModeloRanking();
    }

    public function index() {
        $datos = $this->modelo->obtenerRankingVentas();
        require_once ROOT_PATH."views/ranking/ranking.php";
    }
}
?>
