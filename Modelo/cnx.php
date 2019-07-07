<?php 
	/**
	 * Clase de conección con la base de datos del SISCODE
	 */
	class db
	{
		private $usuario = 'postgres';
	 	private $password = '123456';
	
		function _construct()
		{
			$db = pg_connect("host=localhost dbname=siscode user=$this->usuario password=$this->password") or die ('No se pudo conectar a la base de datos '.pg_last_error());
			if ($db==FALSE) {
				echo "Error de acceso a la base de datos";
			}
		}
		function _destruct()
		{
			$db = pg_close();
		}
	}

?>