<?php

class InventariosController extends Inventarios{

    public function Index(){
        Security::validate();
        require_once('views/Inventarios/Index.php');
    }
    public function VerInventario(){
        Security::validate();
        require_once('views/Inventarios/VerInventario.php');
    }

    //Ver pagina Crear inventario
    public function CrearInventario(){
        Security::validate();
        require_once('views/Inventarios/CrearInventario.php');
    }

    //Crear Inventario
	public function insertCrearInventario(){
        Security::validate();
        $N_valor_sin_iva = str_replace('$ ', '',$_POST['Valor_sin_iva']);
        $N_valor_sin_iva = str_replace('.', '',$N_valor_sin_iva);
        parent::createInventario( $_POST['VerInventario'], $_POST['Cantidad'], $N_valor_sin_iva, $_POST['Categoria']);
		header('location:?class=Inventarios&method=Index');
    }

    // Editar inventario
    public function EditarInventario(){
        Security::validate();
        require_once('views/Inventarios/EditarInventario.php');
    }

    //Actualizar pedido
	public function updateInventario(){
        security::validate();
        $RInventario = parent::getInventario($_REQUEST['userId']);
        $RInventario->ACCION='ACTUALIZAR';
		parent::editInventario( $_REQUEST['userId'], $_REQUEST['inventario'], $_REQUEST['cantidad'], $_REQUEST['valorSinIva'], $_REQUEST['categoria']);
		require_once('views/Modal/Index.php');
    }
    
    //Borrar Inventario
	public function deleteInventario(){
        Security::validate();
        $RInventario = parent::getInventario($_REQUEST['userId']);
        $RInventario->ACCION='ELIMINAR';
		parent::borrarInventario($_REQUEST['userId']);
		require_once('views/Modal/Index.php');
	}
}


?>