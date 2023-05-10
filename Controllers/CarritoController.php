<?php

class CarritoController extends Carrito{

    public function index(){
        security::validate();
        require_once('views/Carrito/index.php');
    }
    public function destroyCarrito(){
        security::validate();
        unset($_SESSION['Carrito']);
        //require_once('views/Usuario/usuario.php');
        //header('location:?class=Usuario&method=Index');
    }

    public function pago(){
        security::validate();
        parent::pagoCarrito(  $_REQUEST['userIdPaquete'], $_REQUEST['userId'], $_REQUEST['userCiudad'], $_REQUEST['userBarrio'], $_REQUEST['userDireccion'], $_REQUEST['userDateIni'], $_REQUEST['userDateFin'] , $_REQUEST['userValorPago']);
        echo 'Se genero el pedido exitosamente';
    }

}

?>