<?php

class AdministradorController extends Administrador{

    public function Index(){
        Security::validate();
        require_once('views/Administrador/index.php');
    }

}

?>