<?php

class PaquetesController extends Paquetes{

    public function crearPaquete(){
        security::validate();
        require_once('views/paquetes/crearpaquetes.php');
    }

    public function Store(){
        security::validate();
        parent::crearPaqueteDeEvento( $_REQUEST['nombreEvento'], $_REQUEST['nombrePaquete'], $_REQUEST['Valor_total'], $_REQUEST['cantidad_personas']);
        $REpaquetes = parent::getPaqueteDeEvento($_REQUEST['nombrePaquete']);
        $ACCION ='CREAR';
        require_once('views/Modal/Index.php');
    }
    public function editarPaquetes(){
        security::validate();
        require_once('views/paquetes/EditarPaquetes.php');
    }

    public function agregarInventarioPaquete(){
        security::validate();
        parent::crearInventarioPaquete( $_REQUEST['idPaquete'], $_REQUEST['idInventario'], $_REQUEST['cantidad']);
        $REpaquetes = Inventarios::getInventario($_REQUEST['idInventario']);
        $ACCION ='AGREGAR';
        require_once('views/Modal/Index.php');
    }

    public function eliminarInventarioPaquete(){
        Security::validate();
        parent::deleteInventarioPaquete($_REQUEST['idPaquete'], $_REQUEST['idInventario']);
        $REpaquetes = Inventarios::getInventario($_REQUEST['idInventario']);
        $ACCION='ELIMINAR';
        require_once('views/Modal/Index.php');
    }

    public function eliminarPaquete(){
        Security::validate();
        $REpaquetes = parent::getPaqueteDeEvento($_REQUEST['tipoPaquete']);
        $ACCION='ELIMINAR PAQUETE';
        parent::deletePaquete($REpaquetes->ID_PAQUETE);
        require_once('views/Modal/Index.php');
    }

}

?>