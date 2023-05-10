<?php

class Reportes extends DB{

    // Obtener reporte
	public static function getReporte($tipoReporte, $fechaInicio, $fechaFin){
		try {
			//Preparar la comsulta que se va a realizar
			$query = parent::conectDatabase()->prepare(" CALL PR_GENERAR_REPORTE( ?, ?, ?)");
            $query->bindParam(1,$tipoReporte,PDO::PARAM_STR);
            $query->bindParam(2,$fechaInicio,PDO::PARAM_STR);
            $query->bindParam(3,$fechaFin,PDO::PARAM_STR);
			//ejecutar consulta o sentencia
			$query->execute();
			return $query->fetchAll(PDO::FETCH_OBJ);
		}catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}

}



?>