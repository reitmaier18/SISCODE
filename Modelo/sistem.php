<?php 
	/**
     * Clase expediente
     */    
    class sistem
    {
    	function registrar_log($usuario, $ip, $descripcion){
    		$fecha = getdate();
    		$fecha_registro = $fecha['mday']."/".$fecha['month']."/".$fecha['year']." ".$fecha['hours'].":".$fecha['minutes'].":".$fecha['seconds'];
    		$sql=("insert into sisco.log_sistema (usuario_id, ip, descripcion, fecha) values ('$usuario', '$ip', '$descripcion', '$fecha_registro')");
    		$query=pg_query($sql);
            return $query;
    	}

    	function listar_log($usuario){
    		$sql = ("select date(fecha) as fecha, extract(hour from fecha) as hora, extract(minute from fecha) as minuto, extract(second from fecha) as segundo, ip, nombre, apellido, nacionalidad,cedula, descripcion from sisco.log_sistema inner join sisco.usuario on sisco.log_sistema.usuario_id = sisco.usuario.id where sisco.usuario.usuario='$usuario'");
    		$query=pg_query($sql);
            $fila=pg_fetch_all($query);
            return $fila;
    	}

        function imprimir_log(){
            $sql = ("select date(fecha) as fecha, ip, nombre, apellido, nacionalidad,cedula, descripcion from sisco.log_sistema inner join sisco.usuario on sisco.log_sistema.usuario_id = sisco.usuario.id");
            $query=pg_query($sql);
            $fila=pg_fetch_all($query);
            return $fila;
        }
    }
?>