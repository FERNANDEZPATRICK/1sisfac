<?php
    require_once "config.php";

    class Conexion{
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $base = DB_NAME;
        private $con;
        
        
        public function getConectar(){

            try{

                $options = array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'",
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                );
                
                $dsn="mysql:host=" . $this->host . ";dbname=". $this->base;
                $this->con = new PDO($dsn, $this->user, $this->pass, $options);
                
                return $this->con;

            } catch (PDOException $error){
                echo $error->getMessage();
            }
        }

    }
  

?>