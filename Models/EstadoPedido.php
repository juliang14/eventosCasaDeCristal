<?php

class EstadoPedido extends DB{

   //Obtener estado de los pedidos
	public static function getEstadoPedido(){
		try {
			//Preparar la comsulta que se va a realizar
			$query = parent::conectDatabase()->prepare(" CALL PR_ESTADO_PEDIDO()");
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