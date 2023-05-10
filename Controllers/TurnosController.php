<?php 


class TurnosController extends Turnos{


    public function index(){
        Security::validate();
        require_once('Views/Turno/index.php');
    }

    // Crear turno
    public function crearTurno(){
        Security::validate();
        require_once('Views/Turno/CrearTurno.php');
    }

    //obtener pedido para crear turno
	public function getPedido(){
		Security::validate();
        $user = Pedidos::getPedido($_REQUEST['userPedido']);
        if (!empty($user)) {
            echo $user->ID_PEDIDO.'_'.$user->CIUDAD_EVENTO.'_'.$user->BARRIO_EVENTO.'_'.$user->DIRECCION_EVENTO.'_'.$user->FECHA_INICIO_EVENTO.'_'.$user->FECHA_FIN_EVENTO;
        }else{echo "No se encontraron registros con el id pedido ".$_REQUEST['userPedido'];}
    }

    //obtener empleado para crear turno
	public function getEmpleado(){
		Security::validate();
        $user = Empleado::getEmpleadoDocumento($_REQUEST['userTipoDocumento'],$_REQUEST['userDocumento']);
        if (!empty($user)) {
            echo $user->ID_EMPLEADO.'-'.$user->DESCRIPCION_MODAL;
        }else{echo "No se encontraron registros con el tipo documento ".$_REQUEST['userTipoDocumento'].' y número documento '.$_REQUEST['userDocumento'];}
    }

    //Crear Turno
	public function insertCrearTurno(){
        Security::validate();
		parent::createTurno( $_REQUEST['userIdPedido'], $_REQUEST['userTipoDocumento'], $_REQUEST['userDocumento']);
		//header('location:?class=Empleado&method=index');
    }
    //pagina ver turno
    public function verTurno(){
        require_once('Views/Turno/VerTurno.php');
    }

    //Borrar turno
	public function borrarTurno(){
		Security::validate();
        $RTurnos = parent::getTurno($_REQUEST['userIdTurno']);
        $RTurnos ->ACCION = 'ELIMINAR';
		parent::deleteTurno($_REQUEST['userIdEmpleado'], $_REQUEST['userIdTurno']);
		require_once('views/Modal/Index.php');
	}

}



?>