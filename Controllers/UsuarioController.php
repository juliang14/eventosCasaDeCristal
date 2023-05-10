<?php

class UsuarioController extends Usuario{

    public function Index(){
        Security::validate();
        require_once('views/Usuario/Index.php');
    }

    //Pagina administrador usuarios crear
	public function usuariosCrear(){
        Security::validate();
		require_once('views/Usuario/CrearUsuario.php');
    } 
    //Crear usuario
	public function insertCrearUsuario(){
        Security::validate();
		parent::createCliente( $_POST['Primer_nombre'], $_POST['Segundo_nombre'], $_POST['Primer_apellido'], $_POST['Segundo_apellido'], $_POST['Tipo_documentoId_documento'], $_POST['Numero_documento'], $_POST['Edad'], $_POST['Telefono'], $_POST['Direccion'], $_POST['Email']);
		header('location:?class=Usuario&method=Index');
	}
	
	//Registrar usuario
	public function registrarUsuario(){
		$existeCorreo = parent::validarSiExisteCorreoCliente($_REQUEST['Email']);
		$email = intval($existeCorreo->EMAIL);

		if($email == 0){
			$responseCreateUser = parent::createCliente( $_REQUEST['Primer_nombre'], $_REQUEST['Segundo_nombre'], $_REQUEST['Primer_apellido']
								, $_REQUEST['Segundo_apellido'], $_REQUEST['Tipo_documentoId_documento']
								, $_REQUEST['Numero_documento'], $_REQUEST['Edad'], $_REQUEST['Telefono']
								, $_REQUEST['Direccion'], $_REQUEST['Email']);
			
			$RegistroUsuario = $_REQUEST['Primer_nombre']." ".$_REQUEST['Segundo_nombre']." ".$_REQUEST['Primer_apellido']." ".$_REQUEST['Segundo_apellido'];
			$ACCION='REGISTRAR USUARIO';
			require_once('views/Modal/Index.php');
		}else if($email > 0){
			echo 'El correo ya existe en el sistema, por favor ingresa otro.';
		}
		
    }
    
    //Pagina administrador usuarios ver
	public function UsuariosVer(){
        Security::validate();
		require_once('views/Usuario/VerUsuario.php');
    }
    
    //Pagina administrador usuarios editar
	public function UsuariosEditar(){
        Security::validate();
		require_once('views/Usuario/EditarUsuario.php');
	}
	//Editar usuario
	public function updateUsuario(){
        Security::validate();
		parent::editCliente($_POST['Id_usuario'], $_POST['Primer_nombre'], $_POST['Segundo_nombre'], $_POST['Primer_apellido'], $_POST['Segundo_apellido'], $_POST['Tipo_documentoId_documento'], $_POST['Numero_documento'], $_POST['Edad'], $_POST['Telefono'], $_POST['Direccion'], $_POST['Email']);
		header('location:?class=Usuario&method=Index');
    }
    
    //Borrar usuario
	public function deleteUsuario(){
		Security::validate();
		$user = parent::getCliente($_REQUEST['userId']);
		parent::deleteCliente($_REQUEST['userId']);
		require_once('views/Modal/Index.php');
	}

	//Pagina usuarios 
	public function usuario(){
        Security::validate();
		require_once('views/Usuario/usuario.php');
	}
	
	//Pagina eventos usuarios 
	public function usuarioAcercaDeNosotros(){
        Security::validate();
		require_once('views/Usuario/usuario_acerca_de_nosotros.php');
	}
	
	//Pagina eventos usuarios 
	public function usuarioContactos(){
        Security::validate();
		require_once('views/Usuario/usuario_contactos.php');
    }

}

?>