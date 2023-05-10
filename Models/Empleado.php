<?php

class Empleado extends DB{

	public static function autenticarEmpleado($Usuario,$Clave){
		try {
			//Preparar la comsulta que se va a realizar
			$query = parent::conectDatabase()->prepare(" CALL PR_OBTENER_USUARIO_SISTEMA('EMPLEADO',?,?)");
			$query->bindParam(1,$Usuario, PDO::PARAM_STR);
			$query->bindParam(2,$Clave, PDO::PARAM_STR);
			//ejecutar consulta o sentencia
			$query->execute();
			return $query->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}

    // Obtener empleado
	public static function getEmpleado($Id_empleado){
		try {
			//Preparar la comsulta que se va a realizar
			$query = parent::conectDatabase()->prepare(" SELECT * FROM VW_VER_EMPLEADOS WHERE ID_EMPLEADO=?");
			$query->bindParam(1,$Id_empleado,PDO::PARAM_INT);
			//ejecutar consulta o sentencia
			$query->execute();
			return $query->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}
	// Obtener empleado
	public static function getEmpleadoDocumento($Tipo_documento, $Numero_documento){
		try {
			//Preparar la comsulta que se va a realizar
			$query = parent::conectDatabase()->prepare(" SELECT * FROM VW_VER_EMPLEADOS WHERE DOCUMENTO = ? AND NUMERO_DOCUMENTO = ?");
			$query->bindParam(1,$Tipo_documento,PDO::PARAM_STR);
			$query->bindParam(2,$Numero_documento,PDO::PARAM_INT);
			//ejecutar consulta o sentencia
			$query->execute();
			return $query->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}
	// Obtener todos los empleados de la Base de datos
	public static function getEmpleados(){
		try {
			//Preparar la comsulta que se va a realizar
			$query = parent::conectDatabase()->prepare(" CALL PR_VER_EMPLEADOS()");
			//ejecutar consulta o sentencia
			$query->execute();
			return $query->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}

	// Crear EMPLEADO
	public static function createEmpleado($Primer_nombre, $Segundo_nombre, $Primer_apellido, $Segundo_apellido, $Tipo_documentoId_documento, $Numero_documento, $CargoId_cargo, $Edad, $Telefono, $Direccion, $Email, $RolId_rol){

		try {
			//Preparar la comsulta que se va a realizar
			$query = parent::conectDatabase()->prepare("CALL PR_CREAR_EMPLEADO( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
			//CALL crear_usuario( Primer_nombre, Segundo_nombre, Primer_apellido, Segundo_apellido, Tipo_documentoId_documento, Numero_documento, Edad, Telefono, Direccion, Email, RolId_rol);
			$query->bindParam(1,$Primer_nombre,PDO::PARAM_STR);
			$query->bindParam(2,$Segundo_nombre,PDO::PARAM_STR);
			$query->bindParam(3,$Primer_apellido,PDO::PARAM_STR);
			$query->bindParam(4,$Segundo_apellido,PDO::PARAM_STR);
			$query->bindParam(5,$Tipo_documentoId_documento,PDO::PARAM_INT);
			$query->bindParam(6,$Numero_documento,PDO::PARAM_INT);
			$query->bindParam(7,$CargoId_cargo,PDO::PARAM_INT);
			$query->bindParam(8,$Edad,PDO::PARAM_INT);
			$query->bindParam(9,$Telefono,PDO::PARAM_INT);
			$query->bindParam(10,$Direccion,PDO::PARAM_STR);
			$query->bindParam(11,$Email,PDO::PARAM_STR);
			$query->bindParam(12,$RolId_rol,PDO::PARAM_INT);
			//ejecutar consulta o sentencia
			$query->execute();
		} catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}

	// Editar empleado
	public static function editEmpleado( $Id_empleado, $Primer_nombre, $Segundo_nombre, $Primer_apellido, $Segundo_apellido, $Tipo_documentoId_documento, $Numero_documento, $CargoId_cargo, $Edad, $Telefono, $Direccion, $Email, $RolId_rol){

		try {
			//Preparar la comsulta que se va a realizar
			$query = parent::conectDatabase()->prepare("CALL PR_ACTUALIZAR_EMPLEADO( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
			//CALL PR_ACTUALIZAR_EMPLEADO( 1,'KAROL', '', 'gomez', 'avila', 'CE', 1015452884,'DJ', 25, 3108023148, 'carrera 94', 'KAROL887@MISENA.EDU.CO','ADMINISTRADOR');
			$query->bindParam(1,$Id_empleado,PDO::PARAM_INT);
			$query->bindParam(2,$Primer_nombre,PDO::PARAM_STR);
			$query->bindParam(3,$Segundo_nombre,PDO::PARAM_STR);
			$query->bindParam(4,$Primer_apellido,PDO::PARAM_STR);
			$query->bindParam(5,$Segundo_apellido,PDO::PARAM_STR);
			$query->bindParam(6,$Tipo_documentoId_documento,PDO::PARAM_STR);
			$query->bindParam(7,$Numero_documento,PDO::PARAM_INT);
			$query->bindParam(8,$CargoId_cargo,PDO::PARAM_STR);
			$query->bindParam(9,$Edad,PDO::PARAM_INT);
			$query->bindParam(10,$Telefono,PDO::PARAM_INT);
			$query->bindParam(11,$Direccion,PDO::PARAM_STR);
			$query->bindParam(12,$Email,PDO::PARAM_STR);
			$query->bindParam(13,$RolId_rol,PDO::PARAM_STR);
			//ejecutar consulta o sentencia
			$query->execute();
		} catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}

	//Borrar empleado
	public static function borrarEmpleado($Id_empleado){
		try {
			$query = parent::conectDatabase()->prepare('CALL PR_ELIMINAR_EMPLEADO(?)');
			//
			$query->bindParam(1,$Id_empleado,PDO::PARAM_INT);
			// Ejecutar sentencia
			$query->execute();
		} catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}

	// validar empleado por correo
	public static function validarCorreoEmpleado($email){
		try {
			//Preparar la comsulta que se va a realizar
			$query = parent::conectDatabase()->prepare(" SELECT * FROM VW_VER_EMPLEADOS WHERE EMAIL= ?");
			$query->bindParam(1,$email,PDO::PARAM_STR);
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