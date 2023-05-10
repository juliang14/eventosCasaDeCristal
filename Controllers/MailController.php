<?php

class MailController extends Mail{

    public function index(){
        $tipo = '';
        $tipoValidacion='';
        if (isset($_REQUEST['tipo'])){
            $tipo = $_REQUEST['tipo'];
        }
        if (isset($_REQUEST['tipoValidacion'])){
            $tipoValidacion = $_REQUEST['tipoValidacion'];
        }
        
        if($_REQUEST['tipo'] == 'RegistroUsuario'){
            //$TipoDocumento = tipoDocumento::getUniqueTipoDocumento($_REQUEST['Tipo_documentoId_documento']);
            //$dataUser = usuario::getClienteDocumento($TipoDocumento->SIGLAS, $_REQUEST['Numero_documento']);
            $dataUser = usuario::validarUsuarioCorreoCliente($_REQUEST['Email']);
            require_once('views/Mail/MailRegistroUsuario.php');
        }else if($_REQUEST['tipo'] == 'RecuperarClave'){
            if($tipoValidacion == 'Usuario'){
                $dataUser = usuario::validarUsuarioCorreoCliente($_REQUEST['Email']);
            }else if($tipoValidacion == 'Empleado'){
                $dataUser = empleado::validarCorreoEmpleado($_REQUEST['Email']);
            }

            if(!$dataUser){
               echo 'No se encontraron usuarios con el correo '.$_REQUEST['Email'];
            }else{
                echo 'Se enviaron los datos al correo';
                require_once('views/Mail/MailRecuperarClave.php');  
            }   
        }else if($_REQUEST['tipo'] == 'Test'){
            require_once('views/Mail/Mail.php');     
        }    
           
    }

}

?>