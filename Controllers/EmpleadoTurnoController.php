<?php

class EmpleadoTurnoController extends EmpleadoTurno{

    public function index(){
        Security::validate();
        require_once('views/EmpleadoTurno/Index.php');
    }

}

?>