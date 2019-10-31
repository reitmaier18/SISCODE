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
            $sql = ("select procesado_id, sisco.tribunal_procesado.id, tribunal_id from sisco.tribunal_procesado inner join sisco.expediente on sisco.tribunal_procesado.id = sisco.expediente.tribunal_procesado_id where sisco.expediente.id='$id'");
            $query = pg_query($sql);
            $fila=pg_fetch_array($query, 0, PGSQL_NUM);
            return $fila;
        }
        function registrar_tribunal_procesado($procesado, $tribunal){
            $sql = ("insert into sisco.tribunal_procesado (procesado_id, tribunal_id) values ('$procesado','$tribunal')");
            $query = pg_query($sql);
            
        }
        function update_tribunal_procesado($id, $tribunal){
            $sql = "update sisco.tribunal_procesado set tribunal_id = '$tribunal' where id = '$id'";
            $query=pg_query($sql);
            if ($query == 'FALSE') {
                return 'False';
            }else{
                return 'True';
            }
        }
        
        function registrar_expediente($expediente, $procesado, $tribunal, $ubicacion){
            $exp=$this->consultar_expediente($expediente);
            $fecha = getdate();
            $fecha_registro = $fecha['mday']."/".$fecha['month']."/".$fecha['year'];
            if ($exp[0] == $expediente) {
                echo "Este expediente fue registrado anteriormente";
            }else{
                //echo "Aqui estoy";
                $tri_pro = $this->consultar_tribunal_procesado($procesado, $tribunal);
                if ($tri_pro == FALSE) {
                    $this->registrar_tribunal_procesado($procesado, $tribunal);
                    $tri_pro = $this->consultar_tribunal_procesado($procesado, $tribunal);
                    $sql = ("insert into sisco.expediente (numero_expediente, tribunal_procesado_id, fecha_expediente, expediente_id) values ('$expediente', '$tri_pro[0]', '$fecha_registro', 0)");
                    $query = pg_query($sql);
                    if ($query==FALSE) {
                        echo "Error al registrar expediente";
                    }else{
                        $exp=$this->consultar_expediente($expediente);
                        $sql = ("insert into sisco.pieza (expediente_id, ubicacion_id, numero_pieza) values ('$exp[1]', '$ubicacion', 1)");
                        $query = pg_query($sql);
                        echo "Se registro el expediente";
                    }        
                }else{
                    $sql = ("insert into sisco.expediente (numero_expediente, tribunal_procesado_id, fecha_expediente, expediente_id) values ('$expediente', '$tri_pro[0]', '$fecha_registro', 0)");
                    $query = pg_query($sql);
                    if ($query==FALSE) {
                        echo "Error al registrar expediente";
                    }else{
                        $exp=$this->consultar_expediente($expediente);
                        $sql = ("insert into sisco.pieza (expediente_id, ubicacion_id, numero_pieza) values ('$exp[1]', '$ubicacion', 1)");
                        $query = pg_query($sql);
                        return "Se registro el expediente";
                        
                    }
                }
            }
        }

        function registrar_expediente_asociado($expediente, $procesado, $tribunal, $ubicacion, $asociado){
            $exp=$this->consultar_expediente($expediente);
            $e=$this->consultar_expediente($asociado);
            $fecha = getdate();
            $fecha_registro = $fecha['mday']."/".$fecha['month']."/".$fecha['year'];
            if ($exp[0] == $expediente) {
                echo "Este expediente fue registrado anteriormente";
            }else{
                //echo "Aqui estoy";
                $tri_pro = $this->consultar_tribunal_procesado($procesado, $tribunal);
                if ($tri_pro == FALSE) {
                    $this->registrar_tribunal_procesado($procesado, $tribunal);
                    $tri_pro = $this->consultar_tribunal_procesado($procesado, $tribunal);
                    $sql = ("insert into sisco.expediente (numero_expediente, tribunal_procesado_id, fecha_expediente, expediente_id) values ('$expediente', '$tri_pro[0]', '$fecha_registro', '$e[1]')");
                    $query = pg_query($sql);
                    if ($query==FALSE) {
                        echo "Error al registrar expediente";
                    }else{
                        $exp=$this->consultar_expediente($expediente);
                        $sql = ("insert into sisco.pieza (expediente_id, ubicacion_id, numero_pieza) values ('$exp[1]', '$ubicacion', 1)");
                        $query = pg_query($sql);
                        echo "Se registro el expediente";
                    }        
                }else{
                    $sql = ("insert into sisco.expediente (numero_expediente, tribunal_procesado_id, fecha_expediente, expediente_id) values ('$expediente', '$tri_pro[0]', '$fecha_registro', '$e[1]')");
                    $query = pg_query($sql);
                    if ($query==FALSE) {
                        echo "Error al registrar expediente";
                    }else{
                        $exp=$this->consultar_expediente($expediente);
                        $sql = ("insert into sisco.pieza (expediente_id, ubicacion_id, numero_pieza) values ('$exp[1]', '$ubicacion', 1)");
                        $query = pg_query($sql);
                        return "Se registro el expediente";
                        
                    }
                }
            }
        }
        function consultar_datos_expediente($expediente){
            $exp=$this->consultar_expediente($expediente);
            if ($exp[0] == $expediente) {
                $tri_pro = $this->consul_tribunal_procesado_update($exp[1]);
                return $tri_pro;
            }else{
                return 'Este expediente no existe';
            }
            //var_dump($expediente);
        }

        function list_expediente(){
            $sql= ("select numero_expediente, nacionalidad, cedula_acusado, nombre_acusado, apellido_acusado, estado, tribunal from sisco.tribunal_procesado inner join sisco.expediente on sisco.tribunal_procesado.id = sisco.expediente.tribunal_procesado_id inner join sisco.tribunal on sisco.tribunal_procesado.tribunal_id = sisco.tribunal.id inner join sisco.procesado on sisco.tribunal_procesado.procesado_id = sisco.procesado.id inner join sisco.estado on sisco.tribunal.estado_id = sisco.estado.id order by numero_expediente");
            $query=pg_query($sql);
            $fila=pg_fetch_all($query);
            return $fila;
        }

        function update_expe($id, $expe){
            $sql = "update sisco.expediente set numero_expediente = '$expe' where id = '$id'";
            $query=pg_query($sql);
            if ($query == 'FALSE') {
                return 'False';
            }else{
                return 'True';
            }
        }

        function consultar_estado($estado){
            $sql=("select estado from sisco.estado where id='$estado'");
            $query=pg_query($sql);
            $fila=pg_fetch_array($query, 0, PGSQL_NUM);
            return $fila;
        }

        function consultar_pieza($expediente){
            $exp=$this->consultar_expediente($expediente);
            $sql = ("select numero_pieza, ubicacion, sisco.ubicacion.id from sisco.pieza inner join sisco.ubicacion on ubicacion_id=sisco.ubicacion.id where expediente_id = '$exp[1]' order by numero_pieza asc");
            $query = pg_query($sql);
            $fila=pg_fetch_all($query);
            return $fila;
        }

        function añadir_pieza($expediente, $ubicacion){
            $exp=$this->consultar_expediente($expediente);
            $data=$this->consultar_pieza($expediente);
            $pieza=count($data)+1;
            $sql = ("insert into sisco.pieza (expediente_id, ubicacion_id, numero_pieza) values ('$exp[1]', '$ubicacion', '$pieza')");
            $query = pg_query($sql);
            $fila=pg_fetch_all($query);
            return true;

        }

        function update_pieza($expediente, $pieza, $ubicacion){
            $exp=$this->consultar_expediente($expediente);
            //var_dump($exp);
            $sql = ("update sisco.pieza set ubicacion_id = '$ubicacion' where expediente_id = '$exp[1]' and numero_pieza='$pieza'");
            $query=pg_query($sql);
            if ($query == 'FALSE') {
                return 'False';
            }else{
                return 'True';
            }   
        }

        function consultar_ubicacion($ubicacion){
            $sql=("select sisco.ubicacion.id as ubicacion from sisco.ubicacion where ubicacion='$ubicacion'");
            $query = pg_query($sql);
            $fila=pg_fetch_all($query);
            return $fila;
        }

        function update_pieza_ubicacion($expediente, $pieza, $ubicacion){
            $exp=$this->consultar_expediente($expediente);
            $ubi= $this->consultar_ubicacion($ubicacion);
            $a = $ubi[0]['ubicacion'];
            $sql = ("update sisco.pieza set ubicacion_id = '$a' where expediente_id = '$exp[1]' and numero_pieza='$pieza'");
            $query=pg_query($sql);
            if ($query == 'FALSE') {
                return 'False';
            }else{
                return 'True';
            }   
        }

        function consultar_pieza_expediente($pieza, $expediente){
            $sql=("select sisco.expediente.id as expediente, sisco.pieza.id as pieza from sisco.pieza inner join sisco.expediente on sisco.pieza.expediente_id = sisco.expediente.id where numero_pieza='$pieza' and numero_expediente = '$expediente'");
            $query = pg_query($sql);
            $fila=pg_fetch_all($query);
            return $fila;
        }

        function listado_expediente_reporte_por_fecha($desde, $hasta){
            $sql=("select fecha_expediente, numero_expediente, nacionalidad, cedula_acusado, nombre_acusado, apellido_acusado, estado, tribunal from sisco.tribunal_procesado inner join sisco.expediente on sisco.tribunal_procesado.id = sisco.expediente.tribunal_procesado_id inner join sisco.tribunal on sisco.tribunal_procesado.tribunal_id = sisco.tribunal.id inner join sisco.procesado on sisco.tribunal_procesado.procesado_id = sisco.procesado.id inner join sisco.estado on sisco.tribunal.estado_id = sisco.estado.id where fecha_expediente between '$desde' and '$hasta' order by fecha_expediente");
            $query = pg_query($sql);
            $fila=pg_fetch_all($query);
            return $fila;   
        }

        function estadistica_expediente_reporte_por_fecha($desde, $hasta){
            $sql=("select count(numero_expediente) from sisco.tribunal_procesado inner join sisco.expediente on sisco.tribunal_procesado.id = sisco.expediente.tribunal_procesado_id inner join sisco.tribunal on sisco.tribunal_procesado.tribunal_id = sisco.tribunal.id inner join sisco.procesado on sisco.tribunal_procesado.procesado_id = sisco.procesado.id inner join sisco.estado on sisco.tribunal.estado_id = sisco.estado.id where fecha_expediente between '$desde' and '$hasta'");
            $query = pg_query($sql);
            $fila=pg_fetch_all($query);
            return $fila;   
        }

        function inventario(){
            $sql=("select numero_expediente, numero_pieza, ubicacion from sisco.pieza inner join sisco.expediente on sisco.pieza.expediente_id = sisco.expediente.id inner join sisco.ubicacion on sisco.pieza.ubicacion_id = sisco.ubicacion.id order by numero_expediente ASC");
            $query = pg_query($sql);
            $fila=pg_fetch_all($query);
            return $fila;   
        }

        function expediente_por_estado(){
            $sql=("select estado, count(numero_expediente) as cantidad from sisco.tribunal_procesado inner join sisco.tribunal on sisco.tribunal_procesado.tribunal_id = sisco.tribunal.id inner join sisco.estado on sisco.tribunal.estado_id = sisco.estado.id inner join sisco.expediente on sisco.tribunal_procesado.id = sisco.expediente.tribunal_procesado_id group by estado");
            $query = pg_query($sql);
            $fila=pg_fetch_all($query);
            return $fila;   
        }
    }
    
?>