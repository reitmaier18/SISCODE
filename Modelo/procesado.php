<?php
    /**
	 * Clase procesado
	 */
    class procesado
    {
        /**
         * Funcion para consultar al procesado
         */
        function consultar_procesado($nac,$ci){
            $sql = ("select id, nacionalidad, cedula_acusado from sisco.procesado where nacionalidad = '$nac' and cedula_acusado = '$ci'");
            $query = pg_query($sql);
            $fila=pg_fetch_array($query, 0, PGSQL_NUM);
            return $fila; 
        }


        function registrar_procesado($nombre, $apellido, $nac, $ci){
            $verifico = $this->consultar_procesado($nac,$ci);
            if ($verifico[1]==$nac and $verifico[2]==$ci) {
                return $verifico[0];
            }else{
                $sql = ("insert into sisco.procesado (nombre_acusado, apellido_acusado, nacionalidad, cedula_acusado) values ('$nombre', '$apellido', '$nac', '$ci')");
                $query = pg_query($sql);
                $verifico = $this->consultar_procesado($nac,$ci);
                return $verifico[0];
            }
        }
        
    }
    
?>