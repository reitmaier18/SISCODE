<?php
    /**
	 * Clase usuario
	 */
    class usuario
    {
        /*
        * Función para verificar el login del usuario
        */
        function login($usuario, $password){
            $user = base64_encode($usuario);
            $passwd = base64_encode($password);
            $sql = ("select nombre, apellido, usuario, password, rol, estatus from sisco.usuario inner join sisco.rol on sisco.usuario.rol_id=sisco.rol.id where sisco.usuario.usuario = '$user' and sisco.usuario.password = '$passwd'");
            $query=pg_query($sql);
            $fila=pg_fetch_array($query, 0, PGSQL_NUM);
            return $fila;
        }

        /*
        * Función para verificar el login del usuario
        */
        function iniciar_sesion($usuario, $password){
            $user = base64_encode($usuario);
            $passwd = base64_encode($password);
            $sql = ("update sisco.usuario set estatus = 1 where usuario = '$user' and password = '$passwd'");
            $query=pg_query($sql);
            //var_dump($query);
            if ($query == 'FALSE') {
                return 'Fallo al activar usuario';
            }else{
                return $query;
            }
            
        }

        /*
        * Función para cerrar sesion del usuario
        */
        function cerrar_sesion($usuario){
            $user = base64_encode($usuario);
            $sql = ("update sisco.usuario set estatus = 0 where usuario = '$user'");
            $query=pg_query($sql);
            if ($query == 'FALSE') {
                return 'Fallo al activar usuario';
            }else{
                return $query;
            }
        }


        /*
        * Función para validar datos del usuario
        */
        function validar_datos($nombre, $apellido, $nac, $ci){
            $sql = ("select nombre, apellido from sisco.usuario where nacionalidad = '$nac' and cedula = '$ci'");
            $query=pg_query($sql);
            $fila=pg_fetch_array($query, 0, PGSQL_NUM);
            if ($nombre == $fila[0] and $apellido == $fila[1]) {
                return 0;
            }else{
                return 1;
            }
        }


        /*
        * Función para buscar datos del usuario
        */
        function buscar_datos($nac, $ci){
            $sql = ("select nombre, apellido, nacionalidad, cedula, rol_id, usuario, password, estatus, id from sisco.usuario where nacionalidad = '$nac' and cedula = '$ci'");
            $query=pg_query($sql);
            $fila=pg_fetch_array($query, 0, PGSQL_NUM);
            $fila[5] = base64_decode($fila[5]);
            $fila[6] = base64_decode($fila[6]);
            if ($fila[8]==NULL) {
                return 0;
            }
            return $fila;
            //$fila=pg_fetch_array($query);
            //return $fila;
        }


        /*
        * Función para crear usuario
        */
        function crear_usuario($nombre, $apellido, $nac, $ci, $rol, $usuario, $password){
            $user = base64_encode($usuario);
            $passwd = base64_encode($password);
            $d = $this->validar_datos($nombre, $apellido, $nac, $ci);
            if ($d == 1) {
                $sql = ("insert into sisco.usuario (rol_id, nombre, apellido, nacionalidad, cedula, usuario, password, estatus) values ('$rol', '$nombre', '$apellido', '$nac', '$ci', '$user', '$passwd', 0)");
                $query=pg_query($sql);
                $a = 1;
                return 1;
            }else{
                return 0;
            }
        }

        /*
        * Función para actualizar usuario
        */
        function actualizar_datos($id, $nombre, $apellido, $nacionalidad, $cedula, $rol, $usuario, $password, $estatus){
            $user = base64_encode($usuario);
            $passwd = base64_encode($password);
            $sql = ("update sisco.usuario set nombre = '$nombre', apellido = '$apellido', nacionalidad = '$nacionalidad', cedula = '$cedula', rol_id = '$rol', usuario = '$user', password = '$passwd', estatus = '$estatus' where id = '$id'");
            $query=pg_query($sql);
            return $query;
        }


    }
    
?>