<?php

class Pedidos extends DB{

    // Obtener todos los pedidos de la Base de datos
	public static function getPedidos(){
		try {
			//Preparar la comsulta que se va a realizar
			$query = parent::conectDatabase()->prepare(" CALL PR_VER_PEDIDOS()");
			//ejecutar consulta o sentencia
			$query->execute();
			return $query->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}

	// Obtener pedido
	public static function getPedido($Id_pedido){
		try {
			//Preparar la comsulta que se va a realizar
			$query = parent::conectDatabase()->prepare(" SELECT * FROM VW_VER_PEDIDOS WHERE ID_PEDIDO=?");
			$query->bindParam(1,$Id_pedido,PDO::PARAM_INT);
			//ejecutar consulta o sentencia
			$query->execute();
			return $query->fetch(PDO::FETCH_OBJ);
		}catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}

	// Editar pedido
	public static function editPedido( $Id_pedido, $Ciudad, $Barrio, $Direccion, $Estado, $FechaInicioEvento, $FechaFinEvento){

		try {
			//Preparar la comsulta que se va a realizar
			$query = parent::conectDatabase()->prepare("CALL PR_ACTUALIZAR_PEDIDO( ?, ?, ?, ?, ?, ?, ?);");
			//CALL PR_ACTUALIZAR_PEDIDO( 1, 'Realizado');
			$query->bindParam(1,$Id_pedido,PDO::PARAM_INT);
			$query->bindParam(2,$Ciudad,PDO::PARAM_STR);
			$query->bindParam(3,$Barrio,PDO::PARAM_STR);
			$query->bindParam(4,$Direccion,PDO::PARAM_STR);
			$query->bindParam(5,$Estado,PDO::PARAM_STR);
			$query->bindParam(6,$FechaInicioEvento,PDO::PARAM_STR);
			$query->bindParam(7,$FechaFinEvento,PDO::PARAM_STR);
			//ejecutar consulta o sentencia
			$query->execute();
		} catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}

	public static function createPedido( $Id_paquete, $id_usuario, $Ciudad, $Barrio, $Direccion, $FechaInicioEvento, $FechaFinEvento){

		try {
			//Preparar la comsulta que se va a realizar
			$query = parent::conectDatabase()->prepare("CALL PR_CREAR_PEDIDOS( ?, ?, ?, ?, ?, ?, ?);");
			//CALL PR_ACTUALIZAR_PEDIDO( 1, 'Realizado');
			$query->bindParam(1,$Id_paquete,PDO::PARAM_INT);
			$query->bindParam(2,$id_usuario,PDO::PARAM_STR);
			$query->bindParam(3,$Ciudad,PDO::PARAM_STR);
			$query->bindParam(4,$Barrio,PDO::PARAM_STR);
			$query->bindParam(5,$Direccion,PDO::PARAM_STR);
			$query->bindParam(6,$FechaInicioEvento,PDO::PARAM_STR);
			$query->bindParam(7,$FechaFinEvento,PDO::PARAM_STR);
			//ejecutar consulta o sentencia
			$query->execute();
		} catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}

	// Obtener pedido
	public static function getPedidoUsuario($Id_usuario){
		try {
			//Preparar la comsulta que se va a realizar
			$query = parent::conectDatabase()->prepare(" SELECT * FROM VW_VER_PEDIDOS_USUARIO WHERE ID_USUARIO=?");
			$query->bindParam(1,$Id_usuario,PDO::PARAM_INT);
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