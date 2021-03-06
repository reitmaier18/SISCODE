<?php 
	/**
     * Clase solicitud
     */    
    class solicitud
    {
    	/*
        * Función para listar solicitudes del usuario por roll
        */
    	function listar_solicitud_admin_int(){
    		$sql = ("select date(fecha) as fecha, extract(hour from fecha) as hora, extract(minute from fecha) as minuto, extract(second from fecha) as segundo,nombre, apellido, tipo, numero_expediente, numero_pieza, E1.ubicacion as area_solicitante, E2.ubicacion as ubicacion_actual, sisco.solicitud.estatus as estatus, sisco.solicitud.id from sisco.solicitud inner join sisco.usuario on sisco.solicitud.usuario_id = sisco.usuario.id inner join sisco.tipo_solicitud on sisco.solicitud.tipo_solicitud_id = sisco.tipo_solicitud.id inner join sisco.pieza on sisco.solicitud.pieza_id = sisco.pieza.id inner join sisco.expediente on sisco.pieza.expediente_id = sisco.expediente.id inner join sisco.ubicacion E1 on sisco.solicitud.ubicacion_id = E1.id inner join sisco.ubicacion E2 on sisco.pieza.ubicacion_id = E2.id  where sisco.solicitud.estatus<>4 and sisco.solicitud.estatus<>3 and tipo='Interna' order by fecha DESC");
    		$query=pg_query($sql);
            $fila=pg_fetch_all($query);
            return $fila;
    	}

    	function listar_solicitud_admin_ext(){
    		$sql = ("select date(fecha) as fecha, extract(hour from fecha) as hora, extract(minute from fecha) as minuto, extract(second from fecha) as segundo,nombre, apellido, tipo, numero_expediente, numero_pieza, E1.ubicacion as area_solicitante, E2.ubicacion as ubicacion_actual, sisco.solicitud.estatus as estatus, sisco.solicitud.id from sisco.solicitud inner join sisco.solicitante_externo on sisco.solicitud.usuario_id = sisco.solicitante_externo.id inner join sisco.tipo_solicitud on sisco.solicitud.tipo_solicitud_id = sisco.tipo_solicitud.id inner join sisco.pieza on sisco.solicitud.pieza_id = sisco.pieza.id inner join sisco.expediente on sisco.pieza.expediente_id = sisco.expediente.id inner join sisco.ubicacion E1 on sisco.solicitud.ubicacion_id = E1.id inner join sisco.ubicacion E2 on sisco.pieza.ubicacion_id = E2.id where sisco.solicitud.estatus<>4 and sisco.solicitud.estatus<>3 and tipo='Externa' order by fecha DESC");
    		$query=pg_query($sql);
            $fila=pg_fetch_all($query);
            return $fila;
    	}

    	/*
        * Función para listar solicitudes del usuario por roll
        */
    	function listar_solicitud_archivista_int($usuario){
    		$sql = ("select date(fecha) as fecha, extract(hour from fecha) as hora, extract(minute from fecha) as minuto, extract(second from fecha) as segundo,nombre, apellido, tipo, numero_expediente, numero_pieza, E1.ubicacion as area_solicitante, E2.ubicacion as ubicacion_actual, sisco.solicitud.estatus as estatus, sisco.solicitud.id from sisco.solicitud inner join sisco.usuario on sisco.solicitud.usuario_id = sisco.usuario.id inner join sisco.tipo_solicitud on sisco.solicitud.tipo_solicitud_id = sisco.tipo_solicitud.id inner join sisco.pieza on sisco.solicitud.pieza_id = sisco.pieza.id inner join sisco.expediente on sisco.pieza.expediente_id = sisco.expediente.id inner join sisco.ubicacion E1 on sisco.solicitud.ubicacion_id = E1.id inner join sisco.ubicacion E2 on sisco.pieza.ubicacion_id = E2.id  where sisco.solicitud.estatus=0 and tipo='Interna' or sisco.usuario.id = '$usuario' and sisco.solicitud.estatus<>4 and sisco.solicitud.estatus<>3 order by fecha DESC");
    		$query=pg_query($sql);
            $fila=pg_fetch_all($query);
            return $fila;
    	}

    	/*
        * Función para listar solicitudes del usuario por roll
        */
    	function listar_solicitud_alguacil_int(){
    		$sql = ("select date(fecha) as fecha, extract(hour from fecha) as hora, extract(minute from fecha) as minuto, extract(second from fecha) as segundo,nombre, apellido, tipo, numero_expediente, numero_pieza, E1.ubicacion as area_solicitante, E2.ubicacion as ubicacion_actual, sisco.solicitud.estatus as estatus, sisco.solicitud.id from sisco.solicitud inner join sisco.usuario on sisco.solicitud.usuario_id = sisco.usuario.id inner join sisco.tipo_solicitud on sisco.solicitud.tipo_solicitud_id = sisco.tipo_solicitud.id inner join sisco.pieza on sisco.solicitud.pieza_id = sisco.pieza.id inner join sisco.expediente on sisco.pieza.expediente_id = sisco.expediente.id inner join sisco.ubicacion E1 on sisco.solicitud.ubicacion_id = E1.id inner join sisco.ubicacion E2 on sisco.pieza.ubicacion_id = E2.id where sisco.solicitud.estatus=1 or sisco.solicitud.estatus=2");
    		$query=pg_query($sql);
            $fila=pg_fetch_all($query);
            return $fila;
    	}

        function listar_solicitud_alguacil_ext(){
            $sql = ("select date(fecha) as fecha, extract(hour from fecha) as hora, extract(minute from fecha) as minuto, extract(second from fecha) as segundo,nombre, apellido, tipo, numero_expediente, numero_pieza, E1.ubicacion as area_solicitante, E2.ubicacion as ubicacion_actual, sisco.solicitud.estatus as estatus, sisco.solicitud.id from sisco.solicitud inner join sisco.solicitante_externo on sisco.solicitud.usuario_id = sisco.solicitante_externo.id inner join sisco.tipo_solicitud on sisco.solicitud.tipo_solicitud_id = sisco.tipo_solicitud.id inner join sisco.pieza on sisco.solicitud.pieza_id = sisco.pieza.id inner join sisco.expediente on sisco.pieza.expediente_id = sisco.expediente.id inner join sisco.ubicacion E1 on sisco.solicitud.ubicacion_id = E1.id inner join sisco.ubicacion E2 on sisco.pieza.ubicacion_id = E2.id where sisco.solicitud.estatus=1 or sisco.solicitud.estatus=2");
            $query=pg_query($sql);
            $fila=pg_fetch_all($query);
            return $fila;
        }
        /*
        * Función para listar solicitudes del usuario por roll
        */
    	function listar_solicitud_juez($usuario){
    		$sql = ("select date(fecha) as fecha, extract(hour from fecha) as hora, extract(minute from fecha) as minuto, extract(second from fecha) as segundo,nombre, apellido, tipo, numero_expediente, numero_pieza, ubicacion, sisco.solicitud.estatus as estatus, sisco.solicitud.id from sisco.solicitud inner join sisco.usuario on sisco.solicitud.usuario_id = sisco.usuario.id inner join sisco.tipo_solicitud on sisco.solicitud.tipo_solicitud_id = sisco.tipo_solicitud.id inner join sisco.pieza on sisco.solicitud.pieza_id = sisco.pieza.id inner join sisco.expediente on sisco.pieza.expediente_id = sisco.expediente.id inner join sisco.ubicacion on sisco.solicitud.ubicacion_id = sisco.ubicacion.id where sisco.solicitud.estatus<>4 and sisco.solicitud.estatus<>3 and sisco.usuario.id = '$usuario'");
    		$query=pg_query($sql);
            $fila=pg_fetch_all($query);
            return $fila;
    	}

    	/*
        * Función para registrar solicitudes internas
        */
    	function registrar_solicitud_int($fecha, $usuario, $pieza, $ubicacion){
    		$sql=("insert into sisco.solicitud (fecha, usuario_id, tipo_solicitud_id, pieza_id, ubicacion_id) values ('$fecha', '$usuario', '1', '$pieza', '$ubicacion')");
    		$query=pg_query($sql);
    		return $query;
    	}

    	/*
        * Función para registrar solicitudes externas
        */
    	function registrar_solicitud_ext($fecha, $usuario, $pieza, $ubicacion){
    		$sql=("insert into sisco.solicitud (fecha, usuario_id, tipo_solicitud_id, pieza_id, ubicacion_id) values ('$fecha', '$usuario', '2', '$pieza', '$ubicacion')");
    		$query=pg_query($sql);
    		return $query;	
    	}

    	/*
        * Función para registrar solicitantes externos a la institución
        */
        function registrar_solicitante_externo($ci, $nombre, $apellido, $nac){
            $sql = ("insert into sisco.solicitante_externo (nombre, apellido, nacionalidad, cedula) values ('$nombre', '$apellido', '$nac', '$ci')");
            $query=pg_query($sql);
            return $query;
        }

        function consultar_solicitante_externo($nac, $ci){
        	$sql= ("select id from sisco.solicitante_externo where nacionalidad='$nac' and cedula='$ci'");
        	$query=pg_query($sql);
            $fila=pg_fetch_all($query);
            return $fila;
        }

        function listar_solicitudes_tramitadas_por_tiempo($desde, $hasta){
            $sql = ("select date(fecha) as fecha, extract(hour from fecha) as hora, extract(minute from fecha) as minuto, extract(second from fecha) as segundo,nombre, apellido, tipo, numero_expediente, numero_pieza, ubicacion from sisco.solicitud inner join sisco.usuario on sisco.solicitud.usuario_id = sisco.usuario.id inner join sisco.tipo_solicitud on sisco.solicitud.tipo_solicitud_id = sisco.tipo_solicitud.id inner join sisco.pieza on sisco.solicitud.pieza_id = sisco.pieza.id inner join sisco.expediente on sisco.pieza.expediente_id = sisco.expediente.id inner join sisco.ubicacion on sisco.solicitud.ubicacion_id = sisco.ubicacion.id where sisco.solicitud.estatus=3 and tipo='Interna' and fecha between '$desde' and '$hasta' order by fecha DESC");
            $query=pg_query($sql);
            $fila=pg_fetch_all($query);
            return $fila;
        }

        function estadistica_solicitudes_tramitadas_por_tiempo($desde, $hasta){
            $sql = ("select count(sisco.solicitud.id) from sisco.solicitud inner join sisco.usuario on sisco.solicitud.usuario_id = sisco.usuario.id inner join sisco.tipo_solicitud on sisco.solicitud.tipo_solicitud_id = sisco.tipo_solicitud.id inner join sisco.pieza on sisco.solicitud.pieza_id = sisco.pieza.id inner join sisco.expediente on sisco.pieza.expediente_id = sisco.expediente.id inner join sisco.ubicacion on sisco.solicitud.ubicacion_id = sisco.ubicacion.id where sisco.solicitud.estatus=3 and tipo='Interna' and fecha between '$desde' and '$hasta'");
            $query=pg_query($sql);
            $fila=pg_fetch_all($query);
            return $fila;
        }

        function aprobar_solicitud($id){
            $sql = ("update sisco.solicitud set estatus=1 where sisco.solicitud.id='$id'");
            $query=pg_query($sql);
            if ($query == 'FALSE') {
                return 0;
            }else{
                return 1;
            }
        }

        function transportar_solicitud($id){
            $sql = ("update sisco.solicitud set estatus=2 where sisco.solicitud.id='$id'");
            $query=pg_query($sql);
            if ($query == 'FALSE') {
                return 0;
            }else{
                return 1;
            }
        }

        function recibir_solicitud($id){
            $sql = ("update sisco.solicitud set estatus=3 where sisco.solicitud.id='$id'");
            $query=pg_query($sql);
            if ($query == 'FALSE') {
                return 0;
            }else{
                return 1;
            }
        }

        function cancelar_solicitud($id){
            $sql = ("update sisco.solicitud set estatus=4 where sisco.solicitud.id='$id'");
            $query=pg_query($sql);
            if ($query == 'FALSE') {
                return 0;
            }else{
                return 1;
            }
        }
    }
?>