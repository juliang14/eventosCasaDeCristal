<?php

class Usuario extends DB{

    public static  function autenticarUsuario($Usuario,$Clave){
		try {
			//Preparar la comsulta que se va a realizar
			$query = parent::conectDatabase()->prepare(" CALL PR_OBTENER_USUARIO_SISTEMA('USUARIO',?,?)");
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

	// Obtener todos los clientes de la Base de datos
	public static function getClientes(){
		try {
			//Preparar la comsulta que se va a realizar
			$query = parent::conectDatabase()->prepare(" CALL PR_VER_USUARIOS()");
			//ejecutar consulta o sentencia
			$query->execute();
			return $query->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}

	// Crear cliente
	public static function createCliente($Primer_nombre, $Segundo_nombre, $Primer_apellido, $Segundo_apellido, $Tipo_documentoId_documento, $Numero_documento, $Edad, $Telefono, $Direccion, $Email){

		try {
			//Preparar la comsulta que se va a realizar
			$query = parent::conectDatabase()->prepare("CALL PR_CREAR_USUARIO( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
			//CALL crear_usuario( Primer_nombre, Segundo_nombre, Primer_apellido, Segundo_apellido, Tipo_documentoId_documento, Numero_documento, Edad, Telefono, Direccion, Email, RolId_rol);
			$query->bindParam(1,$Primer_nombre,PDO::PARAM_STR);
			$query->bindParam(2,$Segundo_nombre,PDO::PARAM_STR);
			$query->bindParam(3,$Primer_apellido,PDO::PARAM_STR);
			$query->bindParam(4,$Segundo_apellido,PDO::PARAM_STR);
			$query->bindParam(5,$Tipo_documentoId_documento,PDO::PARAM_INT);
			$query->bindParam(6,$Numero_documento,PDO::PARAM_INT);
			$query->bindParam(7,$Edad,PDO::PARAM_INT);
			$query->bindParam(8,$Telefono,PDO::PARAM_INT);
			$query->bindParam(9,$Direccion,PDO::PARAM_STR);
			$query->bindParam(10,$Email,PDO::PARAM_STR);
			//ejecutar consulta o sentencia
			$query->execute();
		} catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}

	// Obtener cliente
	public static function getCliente($Id_usuario){
		try {
			//Preparar la comsulta que se va a realizar
			$query = parent::conectDatabase()->prepare(" SELECT * FROM VW_VER_USUARIOS WHERE ID_USUARIO=?");
			$query->bindParam(1,$Id_usuario,PDO::PARAM_INT);
			//ejecutar consulta o sentencia
			$query->execute();
			return $query->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}
	// Obtener cliente por su documento
	public static function getClienteDocumento($TipoDocumento,$Documento){
		try {
			//Preparar la comsulta que se va a realizar
			$query = parent::conectDatabase()->prepare(" SELECT * FROM VW_VER_USUARIOS WHERE DOCUMENTO = ? AND NUMERO_DOCUMENTO = ?");
			$query->bindParam(1,$TipoDocumento,PDO::PARAM_STR);
			$query->bindParam(2,$Documento,PDO::PARAM_INT);
			//ejecutar consulta o sentencia
			$query->execute();
			return $query->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}
	
	// Editar cliente
	public static function editCliente( $Id_usuario, $Primer_nombre, $Segundo_nombre, $Primer_apellido, $Segundo_apellido, $Tipo_documentoId_documento, $Numero_documento, $Edad, $Telefono, $Direccion, $Email){

		try {
			//Preparar la comsulta que se va a realizar
			$query = parent::conectDatabase()->prepare("CALL PR_ACTUALIZAR_USUARIO( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
			//CALL PR_ACTUALIZAR_USUARIO( 1,'KAROL', '', 'gomez', 'avila', 'CE', 1015452884, 25, 3108023148, 'carrera 94', 'KAROL887@misena.edu.co');
			$query->bindParam(1,$Id_usuario,PDO::PARAM_INT);
			$query->bindParam(2,$Primer_nombre,PDO::PARAM_STR);
			$query->bindParam(3,$Segundo_nombre,PDO::PARAM_STR);
			$query->bindParam(4,$Primer_apellido,PDO::PARAM_STR);
			$query->bindParam(5,$Segundo_apellido,PDO::PARAM_STR);
			$query->bindParam(6,$Tipo_documentoId_documento,PDO::PARAM_STR);
			$query->bindParam(7,$Numero_documento,PDO::PARAM_INT);
			$query->bindParam(8,$Edad,PDO::PARAM_INT);
			$query->bindParam(9,$Telefono,PDO::PARAM_INT);
			$query->bindParam(10,$Direccion,PDO::PARAM_STR);
			$query->bindParam(11,$Email,PDO::PARAM_STR);
			//ejecutar consulta o sentencia
			$query->execute();
		} catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}

	//Borrar cliente
	public static function deleteCliente($Id_usuario){
		try {
			$query = parent::conectDatabase()->prepare('CALL PR_ELIMINAR_USUARIO(?)');
			//
			$query->bindParam(1,$Id_usuario,PDO::PARAM_INT);
			// Ejecutar sentencia
			$query->execute();
		} catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}

	// validar si existe el correo
	public static function validarSiExisteCorreoCliente($email){
		try {
			//Preparar la comsulta que se va a realizar
			$query = parent::conectDatabase()->prepare(" SELECT COUNT(EMAIL) AS EMAIL FROM VW_VER_USUARIOS WHERE EMAIL= ?");
			$query->bindParam(1,$email,PDO::PARAM_STR);
			//ejecutar consulta o sentencia
			$query->execute();
			return $query->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}
	}

	// validar usuario por correo
	public static function validarUsuarioCorreoCliente($email){
		try {
			//Preparar la comsulta que se va a realizar
			$query = parent::conectDatabase()->prepare(" SELECT * FROM VW_VER_USUARIOS WHERE EMAIL= ?");
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