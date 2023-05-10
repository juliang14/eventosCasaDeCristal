<?php

class EventosController extends eventos{

    public function index(){
        Security::validate();
        require_once('views/Eventos/Index.php');
    }
    public function eventos(){
        require_once('views/Eventos/Eventos.php');
    }
    public function crearEventos(){
        Security::validate();
        require_once('views/Eventos/CrearEventos.php');
    }

    public function editarEventos(){
        Security::validate();
        require_once('views/Eventos/EditarEventos.php');
    }

    public function store(){
        /****** enviar datos de imagenes*****/
        $folder='Files/img';
        $tmp_name = $_FILES['imagen']['tmp_name'];
        $name = basename($_FILES['imagen']['name']);
        $type = $_FILES['imagen']['type'];
        move_uploaded_file($tmp_name,$folder.'/'.$name); //CREAR O MUEVE LA IMAGEN A LA CARPETA
        /******** ***********/
        parent:: crearEvento($_POST['nombreEvento'], $type, $name);
        header('location:?class=eventos&method=index');
    }

    public function delete_store(){
        Security::validate();
        $REventos = parent::getEvento($_REQUEST['nombreEvento']);
        $REventos->ACCION='ELIMINAR';
        unlink('Files/img/'.$REventos->IMAGEN); // ELIMINA EL ARCHIVO
        parent::deleteEvento($_REQUEST['nombreEvento']);
        require_once('views/Modal/Index.php');
    }

    public function edit_store(){
        /****** enviar datos de imagenes*****/
        $folder='Files/img';
        $tmp_name = $_FILES['imagen']['tmp_name'];
        $name = basename($_FILES['imagen']['name']);
        $type = $_FILES['imagen']['type'];
        $idEvento     = $_POST['idEvento'];
        $nombreEvento = $_POST['nombreEvento'];
        $tipoImagenAc = $_POST['tipoImagenActual'];
        $imagenActual = $_POST['imagenActual'];
        /******** ***********/
        if(!empty($name)){
            move_uploaded_file($tmp_name,$folder.'/'.$name); //CREAR O MUEVE LA IMAGEN A LA CARPETA
            unlink('Files/img/'.$imagenActual); // ELIMINA EL ARCHIVO
            parent:: editarEvento( $idEvento, $nombreEvento, $type, $name);
            header('location:?class=eventos&method=index');
        }else{
            parent:: editarEvento( $idEvento, $nombreEvento, $tipoImagenAc, $imagenActual);
            header('location:?class=eventos&method=index');
        }
    }

    //Pagina eventos usuarios 
	public function eventosUsuario(){
        Security::validate();
		require_once('views/Eventos/usuarioEventos.php');
    }

}

?>