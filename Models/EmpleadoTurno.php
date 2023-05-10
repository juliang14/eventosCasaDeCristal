<?php

class EmpleadoTurno extends DB{

    

	// Obtener turno empleado
	public static function getTurnosEmpleado($Id_empleado){
		try {
			//Preparar la comsulta que se va a realizar
			$query=parent::conectDatabase()->prepare(" CALL PR_VER_TURNO_EMPLEADO( ? ); ");
			//ejecutar consulta o sentencia
			$query->bindparam(1,$Id_empleado,PDO::PARAM_INT);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}

}

?>