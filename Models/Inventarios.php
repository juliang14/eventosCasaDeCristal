<?php

class Inventarios extends DB{

    // Obtener todos los datos del inventario
	public static function getInventarios(){
		try {
			//Preparar la comsulta que se va a realizar
			$query = parent::conectDatabase()->prepare(" CALL PR_VER_INVENTARIO()");
			//ejecutar consulta o sentencia
			$query->execute();
			return $query->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}

	// Obtener todos los clientes de la Base de datos
	public static function getInventario($Id_inventario){
		try {
			//Preparar la comsulta que se va a realizar
			$query = parent::conectDatabase()->prepare(" SELECT * FROM VW_VER_INVENTARIO WHERE ID_INVENTARIO = ?");
			$query-> bindParam(1,$Id_inventario, PDO::PARAM_INT);
			//ejecutar consulta o sentencia
			$query->execute();
			return $query->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}
	
	// Crear productos de inventario
	public static function createInventario( $Inventario, $Cantidad, $Valor_sin_iva, $Categoria){
		try {
			//Preparar la comsulta que se va a realizar
			$query = parent::conectDatabase()->prepare(" CALL PR_CREAR_INVENTARIO( ?, ?, ?, ?)");
			$query->bindParam(1, $Inventario, PDO::PARAM_STR);
			$query->bindParam(2, $Cantidad, PDO::PARAM_INT);
			$query->bindParam(3, $Valor_sin_iva, PDO::PARAM_INT);
			$query->bindParam(4, $Categoria, PDO::PARAM_STR);
			//ejecutar consulta o sentencia
			$query->execute();
		} catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}
	//Crear Inventario
	public static function editInventario( $Id_inventario, $Inventario, $Cantidad, $Valor_sin_iva, $Categoria){
		try{
			$N_valor_sin_iva = str_replace('$ ', '', $Valor_sin_iva);
			$N_valor_sin_iva = str_replace('.', '',$N_valor_sin_iva);
			$query = parent::conectDatabase()->prepare('CALL PR_ACTUALIZAR_INVENTARIO( ?, ?, ?, ?, ?)');
			$query->bindParam(1, $Id_inventario,PDO::PARAM_INT);
			$query->bindParam(2, $Inventario, PDO::PARAM_STR);
			$query->bindParam(3, $Cantidad, PDO::PARAM_INT);
			$query->bindParam(4, $N_valor_sin_iva, PDO::PARAM_INT);
			$query->bindParam(5, $Categoria, PDO::PARAM_STR);

			//ejecutar consulta o sentencia
			$query->execute();
		} catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}

	}
	//Borrar empleado
	public static function borrarInventario($Id_inventario){
		try {
			$query = parent::conectDatabase()->prepare('CALL PR_ELIMINAR_INVENTARIO(?)');
			//
			$query->bindParam(1,$Id_inventario,PDO::PARAM_INT);
			// Ejecutar sentencia
			$query->execute();
		} catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}
	

}

?>