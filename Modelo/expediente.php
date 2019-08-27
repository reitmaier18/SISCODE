<?php
    /**
	 * Clase expediente
	 */    
    class expediente
    {
        /**
         * Función para consultar el numero de expediente
         */ 
        function consultar_expediente($expediente){
            $sql = ("select numero_expediente, id, tribunal_procesado_id from sisco.expediente where numero_expediente = '$expediente'");
            $query = pg_query($sql);
            $fila=pg_fetch_array($query, 0, PGSQL_NUM);
            return $fila;
        }

        function consultar_tribunal_procesado($procesado, $tribunal){
            $sql = ("select id from sisco.tribunal_procesado where procesado_id = '$procesado' and tribunal_id = '$tribunal'");
            $query = pg_query($sql);
            $fila=pg_fetch_array($query, 0, PGSQL_NUM);
            return $fila;
        }

        function consul_tribunal_procesado_update($id){
            $sql = ("select procesado_id, tribunal_id where id = '$id'");
            $query = pg_query($sql);
            $fila=pg_fetch_array($query, 0, PGSQL_NUM);
            return $fila;
        }

        function registrar_tribunal_procesado($procesado, $tribunal){
            $sql = ("insert into sisco.tribunal_procesado (procesado_id, tribunal_id) values ('$procesado','$tribunal')");
            $query = pg_query($sql);
            
        }
        
        function registrar_expediente($expediente, $procesado, $tribunal, $ubicacion){
            $exp=$this->consultar_expediente($expediente);
            if ($exp[0] == $expediente) {
                echo "Este expediente fue registrado anteriormente";
            }else{
                //echo "Aqui estoy";
                $tri_pro = $this->consultar_tribunal_procesado($procesado, $tribunal);
                if ($tri_pro == FALSE) {
                    $this->registrar_tribunal_procesado($procesado, $tribunal);
                    $tri_pro = $this->consultar_tribunal_procesado($procesado, $tribunal);
                    $sql = ("insert into sisco.expediente (numero_expediente, tribunal_procesado_id) values ('$expediente', '$tri_pro[0]')");
                    $query = pg_query($sql);
                    if ($query==FALSE) {
                        echo "Error al registrar expediente";
                    }else{
                        $exp=$this->consultar_expediente($expediente);
                        $sql = ("insert into sisco.pieza (expediente_id, ubicacion_id, numero_pieza) values ('$expediente', '$ubicacion', 1)");
                        $query = pg_query($sql);
                        echo "Se registro el expediente";
                    }        
                }else{
                    $sql = ("insert into sisco.expediente (numero_expediente, tribunal_procesado_id) values ('$expediente', '$tri_pro[0]')");
                    $query = pg_query($sql);
                    if ($query==FALSE) {
                        echo "Error al registrar expediente";
                    }else{
                        $exp=$this->consultar_expediente($expediente);
                        $sql = ("insert into sisco.pieza (expediente_id, ubicacion_id, numero_pieza) values ('$expediente', '$ubicacion', 1)");
                        $query = pg_query($sql);
                        echo "Se registro el expediente";
                    }
                }
            }

        }
        function consultar_datos_expediente($expediente){
            $exp=$this->consultar_expediente($expediente);
            if ($exp[0] == $expediente) {
                $tri_pro = $this->consul_tribunal_procesado_update($exp[2]);
                return $tri_pro;
            }else{
                return 'Este expediente no existe';
            }
        }
    }
    
?>