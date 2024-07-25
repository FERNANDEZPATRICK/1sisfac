<?php

class ModeloMain{

    protected static function limpiar_cadena($cadena){
         
        $cadena = str_ireplace("<script>","",$cadena);
        $cadena = str_ireplace("</script>","",$cadena);
        $cadena = str_ireplace("<script src","",$cadena);
        $cadena = str_ireplace("<script type=","",$cadena);
        $cadena = str_ireplace("select * from","",$cadena);
        $cadena = str_ireplace("delete from","",$cadena);
        $cadena = str_ireplace("insert into","",$cadena);
        $cadena = str_ireplace("drop table","",$cadena);
        $cadena = str_ireplace("truncate table","",$cadena);
        $cadena = str_ireplace("show tables","",$cadena);
        $cadena = str_ireplace("show databases","",$cadena);
        $cadena = str_ireplace("<?php","",$cadena);
        $cadena = str_ireplace("?>","",$cadena);
        $cadena = str_ireplace(">","",$cadena);
        $cadena = str_ireplace("<","",$cadena);
        $cadena = str_ireplace("^","",$cadena);
        $cadena = str_ireplace("==","",$cadena);
        $cadena = str_ireplace(";","",$cadena);
        $cadena = str_ireplace("::","",$cadena);
        $cadena = stripslashes($cadena);
        $cadena = trim($cadena);
        
        return $cadena;

    }

    protected static function generar_codigo_aleatorio($letra, $longitud, $numero){
        for ($i=1; $i<=$longitud; $i++){
            $aleatorio = rand(0,9);
            $letra = $aleatorio;
        }
        return $letra. "-" . $numero;

    }

    
}

?>