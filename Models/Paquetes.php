<?php

class Paquetes extends DB{

    // Obtener paquete
	public static function getPaquete($Id_paquete){
		try {
			//Preparar la comsulta que se va a realizar
			$query = parent::conectDatabase()->prepare(" SELECT * FROM VW_VER_PAQUETE WHERE ID_PAQUETE=?");
			$query->bindParam(1,$Id_paquete,PDO::PARAM_INT);
			//ejecutar consulta o sentencia
			$query->execute();
			return $query->fetchAll(PDO::FETCH_OBJ);
		}catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}
	// Obtener paquete por nombre
	public static function getPaqueteDeEvento($nombrePaquete){
		try {
			//Preparar la comsulta que se va a realizar
			$query = parent::conectDatabase()->prepare(" SELECT * FROM VW_VER_PAQUETES_EVENTOS WHERE TIPO_DE_PAQUETE=?");
			$query->bindParam(1,$nombrePaquete,PDO::PARAM_STR);
			//ejecutar consulta o sentencia
			$query->execute();
			return $query->fetch(PDO::FETCH_OBJ);
		}catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}
	 // Obtener Evento paquete
	 public static function getEventoPaquete($Tipo_de_evento){
		try {
			//Preparar la comsulta que se va a realizar
			$query = parent::conectDatabase()->prepare(" SELECT * FROM VW_VER_PAQUETES_EVENTOS WHERE TIPO_DE_EVENTO=?");
			$query->bindParam(1,$Tipo_de_evento,PDO::PARAM_STR);
			//ejecutar consulta o sentencia
			$query->execute();
			return $query->fetchAll(PDO::FETCH_OBJ);
		}catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}
	// Editar paquete
	public static function editPaquete( $Id_pedido, $Estado){

		try {
			//Preparar la comsulta que se va a realizar
			$query = parent::conectDatabase()->prepare("CALL PR_ACTUALIZAR_PEDIDO( ?, ?);");
			//CALL PR_ACTUALIZAR_PEDIDO( 1, 'Realizado');
			$query->bindParam(1,$Id_pedido,PDO::PARAM_INT);
			$query->bindParam(2,$Estado,PDO::PARAM_STR);
			//ejecutar consulta o sentencia
			$query->execute();
		} catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}
	public static function getLastPaquete($evento){
		try {
			//Preparar la consulta que se va a realizar
			$query = parent::conectDatabase()->prepare("CALL PR_OBTENER_ULTIMO_PAQUETE( ? );");
			//CALL PR_ACTUALIZAR_PEDIDO( 1, 'Realizado');
			$query->bindParam(1,$evento,PDO::PARAM_STR);
			//ejecutar consulta o sentencia
			$query->execute();
			return $query->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}
	public static function crearPaqueteDeEvento($evento, $nombrePaquete, $valor, $cantidad){
		try {
			//Preparar la consulta que se va a realizar
			$query = parent::conectDatabase()->prepare("CALL PR_CREAR_PAQUETES( ?, ?, ?, ?);");
			$query->bindParam(1,$evento,PDO::PARAM_STR);
			$query->bindParam(2,$nombrePaquete,PDO::PARAM_STR);
			$query->bindParam(3,$valor,PDO::PARAM_INT);
			$query->bindParam(4,$cantidad,PDO::PARAM_INT);
			$query->execute();
		} catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}

	public static function crearInventarioPaquete($idPaquete, $idInventario, $cantidad){
		try {
			//Preparar la consulta que se va a realizar
			$query = parent::conectDatabase()->prepare("CALL PR_CREAR_INVENTARIO_PAQUETES( ?, ?, ?);");
			$query->bindParam(1,$idPaquete,PDO::PARAM_INT);
			$query->bindParam(2,$idInventario,PDO::PARAM_INT);
			$query->bindParam(3,$cantidad,PDO::PARAM_INT);
			$query->execute();
		} catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}

	//Borrar inventario de paquete
	public static function deleteInventarioPaquete($idPaquete, $idInventario){
		try {
			$query = parent::conectDatabase()->prepare('CALL PR_ELIMINAR_INVENTARIO_PAQUETE( ?, ?)');
			$query->bindParam(1,$idPaquete,PDO::PARAM_INT);
			$query->bindParam(2,$idInventario,PDO::PARAM_INT);
			// Ejecutar sentencia
			$query->execute();
		} catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}

	public static function deletePaquete($idPaquete){
		try {
			$query = parent::conectDatabase()->prepare('CALL PR_ELIMINAR_PAQUETE( ?)');
			$query->bindParam(1,$idPaquete,PDO::PARAM_INT);
			// Ejecutar sentencia
			$query->execute();
		} catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}
	

}

?>