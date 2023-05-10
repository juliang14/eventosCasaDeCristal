<?php

class PedidosController extends Pedidos{

    public function Index(){
        security::validate();
        require_once('views/Pedidos/Index.php');
    }

    //Actualizar pedido
	public function updatePedido(){
        security::validate();
		$user = parent::getPedido($_REQUEST['userId']);
		parent::editPedido( $_REQUEST['userId'], $_REQUEST['userCiudad'], $_REQUEST['userBarrio'], $_REQUEST['userDireccion'], $_REQUEST['userData'], $_REQUEST['userDateIni'], $_REQUEST['userDateFin']);
        require_once('views/Modal/Index.php');
    }
    
    //Pagina crear pedido
    public function CrearPedido(){
        security::validate();
        require_once('views/Pedidos/CrearPedido.php');
    }

    //obtener usuario parqa crear pedido
	public function getUsuario(){
		Security::validate();
        $user = Usuario::getClienteDocumento($_REQUEST['userTDocument'], $_REQUEST['userDocument']);
        if (!empty($user)) {
            echo $user->ID_USUARIO.'-'.$user->DESCRIPCION_MODAL.'-'.$user->DOCUMENTO.'-'.$user->NUMERO_DOCUMENTO;
        }else{echo "No se encontraron registros en la consulta realizada";}
    }
    //Crear pedido
	public function generarPedido(){
        Security::validate();
        parent::createPedido( $_POST['valorPaqueteGenerar'], $_POST['IdUsuarioGenerar'], $_POST['inputCiudadEvento'], $_POST['inputBarrioEvento'], $_POST['inputDireccionEvento'], $_POST['inputFechaInicioEvento'], $_POST['inputFechaFinEvento']);
        header('location:?class=Pedidos&method=Index');
    }

    public function vistaPedidosUsuario(){
        Security::validate();
        require_once('views/Pedidos/PedidoUsuario.php');
    }

}

?>