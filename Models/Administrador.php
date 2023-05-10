<?php

class Administrador extends DB{

    // Obtener cantidad de datos inicio
	public static function getInicioAdminCantidad(){
		try {
			//Preparar la comsulta que se va a realizar
			$query = parent::conectDatabase()->prepare(" SELECT * FROM VW_CANTIDAD_REGISTROS_INICIO_ADMIN");
			//ejecutar consulta o sentencia
			$query->execute();
			return $query->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}


}

?>