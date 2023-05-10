<?php

class FacturasController extends Facturas{

    public function VerFactura(){
        security::validate();
        require_once('views/Facturas/VerFactura.php');
    }

    public function EditarFactura(){
        security::validate();
        require_once('views/Facturas/EditarFactura.php');
    }

}

?>