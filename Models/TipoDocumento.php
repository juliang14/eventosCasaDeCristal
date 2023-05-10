<?php

class TipoDocumento extends DB{

    // Obtener todos los tipos de documento
	public static function getTipoDocumento(){
		try {
			//Preparar la comsulta que se va a realizar
			$query = parent::conectDatabase()->prepare(" CALL PR_TIPO_DOCUMENTO()");
			//ejecutar consulta o sentencia
			$query->execute();
			return $query->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}

	public static function getUniqueTipoDocumento($id){
		try {
			//Preparar la comsulta que se va a realizar
			$query = parent::conectDatabase()->prepare(" SELECT * FROM VW_VER_TIPO_DOCUMENTO WHERE ID_DOCUMENTO = ?");
			$query->bindParam(1,$id,PDO::PARAM_INT);
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