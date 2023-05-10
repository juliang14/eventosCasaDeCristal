<?php

class SecurityController extends Security{

    //Pagina de login usuario
	public function loginUsuario(){
		require_once('views/Security/loginUsuario.php');
    }
    public function recuperarClave(){
        require_once('views/Security/FormularioRecuperarClave.php');
    }
    
    //Pagina inicio usuario
    public function usuario(){
        $ResponseAutenticate = Usuario::autenticarUsuario($_POST['usuario'],$_POST['password']);
        if(!$ResponseAutenticate){
            $_SESSION['mesagge-login']='Usuario o contraseña incorrectos';
            header('location:?class=security&method=loginUsuario');
        }else if($ResponseAutenticate->ROL =='Cliente'){
            //var_dump($ResponseAutenticate);
            $_SESSION['UserAutenticate']=$ResponseAutenticate;
            //require_once('views/usuario/usuario.php');
            header('location:?class=usuario&method=usuario');
        }else{
            header('location:?class=security&method=loginUsuario');
        }      
    }

    //Pagina de login empleado
	public function loginEmpleado(){
        require_once('views/Security/loginEmpleado.php');
        //sockets
        //fpdf 
        //smtp -> Gmail ->hotmail
        //phpMailer
        //phpexcel - lite
    }

    //Pagina inicio empleado
    public function empleado(){
        $ResponseAutenticate = Empleado::autenticarEmpleado($_POST['usuario'],$_POST['password']);
       if(!$ResponseAutenticate){
            header('location:?class=security&method=loginEmpleado');
        }else if($ResponseAutenticate->ROL =='Empleado'){
            //var_dump($ResponseAutenticate);
            $_SESSION['UserAutenticate']=$ResponseAutenticate;
            header('location:?class=empleado&method=empleado&Id_empleado='.$ResponseAutenticate->ID_EMPLEADO);
        }else{
            header('location:?class=security&method=loginEmpleado');
        }   
    }

    //Pagina de login administrador
	public function loginAdministrador(){
		require_once('views/Security/loginAdministrador.php');
    }

    //Pagina inicio administrador
    public function administrador(){
        $ResponseAutenticate = Empleado::autenticarEmpleado($_POST['usuario'],$_POST['password']);
        if(!$ResponseAutenticate){
            $_SESSION['mesagge-login']='Usuario o contraseña incorrectos';
            header('location:?class=security&method=loginAdministrador');
        }else if($ResponseAutenticate->ROL =='Administrador'){
            //var_dump($ResponseAutenticate);
            $_SESSION['UserAutenticate']=$ResponseAutenticate;
            header('location:?class=administrador&method=index');
        }else{
            header('location:?class=security&method=loginAdministrador');
        }    
    }

    //Pagina de registro
	public static function formularioRegistro(){
		require_once('views/Security/FormularioRegistro.php');
    }

    public function closeSesion(){

        unset($_SESSION['UserAutenticate']);
        session_destroy();
        header('location:?class=index&method=index');
    }

}

?>