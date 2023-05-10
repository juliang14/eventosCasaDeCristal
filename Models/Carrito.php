<?php

class Carrito extends DB{

    public static function pagoCarrito( $Id_paquete, $id_usuario, $Ciudad, $Barrio, $Direccion, $FechaInicioEvento, $FechaFinEvento, $ValorPago){

		try {
			//Preparar la comsulta que se va a realizar
			$query = parent::conectDatabase()->prepare("CALL PR_CREAR_PAGO_CARRITO( ?, ?, ?, ?, ?, ?, ?, ?);");
			//CALL PR_ACTUALIZAR_PEDIDO( 1, 'Realizado');
			$query->bindParam(1,$Id_paquete,PDO::PARAM_INT);
			$query->bindParam(2,$id_usuario,PDO::PARAM_STR);
			$query->bindParam(3,$Ciudad,PDO::PARAM_STR);
			$query->bindParam(4,$Barrio,PDO::PARAM_STR);
			$query->bindParam(5,$Direccion,PDO::PARAM_STR);
			$query->bindParam(6,$FechaInicioEvento,PDO::PARAM_STR);
            $query->bindParam(7,$FechaFinEvento,PDO::PARAM_STR);
            $query->bindParam(8,$ValorPago,PDO::PARAM_INT);
			//ejecutar consulta o sentencia
			$query->execute();
		} catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}

}

?>