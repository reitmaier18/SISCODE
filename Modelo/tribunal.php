<?php
    /**
	 * Clase tribunal
	 */
    class tribunal
    {
        /*
        * Función para listar tribunales
        */
        function listar_tribunales($id){
            $sql = ("select sisco.tribunal.id, tribunal from sisco.tribunal inner join sisco.estado on sisco.tribunal.estado_id = sisco.estado.id where sisco.estado.id='$id'");
            $query=pg_query($sql);
            echo "<option disabled selected>Tribunal</option>";
            while ($row = pg_fetch_row($query)) {
                echo "<option value=$row[0]>$row[1]</option>";
            }    
            
        }

        /*
        * Función para añadir tribunales
        */
        function añadir_tribunal($tribunal,$estado){
            $condicion=$this->buscar_tribunal($tribunal,$estado);
            if ($condicion==1) {
                $sql = ("insert into sisco.tribunal (tribunal, estado_id) values ('$tribunal', '$estado')");
                $query=pg_query($sql);
                echo "Tribunal añadido exitosamente";
            }else{
                echo "Datos del tribunal duplicados";
            }
            
        }

        /*
        * Función para buscar tribunales
        */
        function buscar_tribunal($tribunal,$estado){
            $sql = ("select tribunal from sisco.tribunal where tribunal='$tribunal' and estado_id='$estado'");
            $query=pg_query($sql);
            $fila=pg_fetch_array($query, 0, PGSQL_NUM);            
            if ($tribunal==$fila[0]) {
                return 0;
            }else{
                return 1;
            }
        }

        /*
        * Función para consultar tribunales
        */
        function consultar_tribunal_estado($id){
            $sql = ("select tribunal, estado_id from sisco.tribunal inner join sisco.estado on sisco.tribunal.estado_id = sisco.estado.id where sisco.tribunal.id = '$id'");
            $query=pg_query($sql);
            $fila=pg_fetch_array($query, 0, PGSQL_NUM);
            return $fila;
        }
    }
    
?>