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

        function validar_datos($nombre, $apellido, $nac, $ci){
            $sql = ("select nombre, apellido from sisco.usuario where nacionalidad_id = '$nac' and cedula = '$ci'");
            $query=pg_query($sql);
            $fila=pg_fetch_array($query, 0, PGSQL_NUM);
            if ($nombre == $fila[0] and $apellido == $fila[1]) {
                return 'FALSE';
            }else{
                return 'TRUE';
            }
        }

        function crear_usuario($nombre, $apellido, $nac, $ci, $rol, $usuario, $password){
            $user = base64_encode($usuario);
            $passwd = base64_encode($password);
            $d = $this->validar_datos($nombre, $apellido, $nac, $ci);
            if ($d == 'TRUE') {
                $sql = ("insert into sisco.usuario (rol_id, nombre, apellido, nacionalidad_id, cedula, usuario, password, estatus) values ('$rol', '$nombre', '$apellido', '$nac', '$ci', '$user', '$passwd', 0)");
                $query=pg_query($sql);
                return $d;
            }else{
                return $d;
            }
        }


    }
    
?>