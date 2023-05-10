<?php

class Cargo extends DB{

    // Obtener todos los cargos
	public static function getCargos(){
		try {
			//Preparar la comsulta que se va a realizar
			$query = parent::conectDatabase()->prepare(" CALL PR_CARGOS()");
			//ejecutar consulta o sentencia
			$query->execute();
			return $query->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}

}

?>