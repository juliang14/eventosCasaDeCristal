<?php 



class EmpleadoController extends Empleado{

    public function index(){
        Security::validate();
        //require_once('Views/Layouts/header.php');
        //require_once('Views/Layouts/navbar-top.php');
        require_once('Views/Empleado/index.php');

        //require_once('Views/Layouts/footer.php');
    }

    // Pagina crear empleado
    public function empleadoCrear(){
        Security::validate();
        require_once('Views/Empleado/CrearEmpleado.php');
    }
    //Crear empleado
	public function insertCrearEmpleado(){
        Security::validate();
		parent::createEmpleado( $_POST['Primer_nombre'], $_POST['Segundo_nombre'], $_POST['Primer_apellido'], $_POST['Segundo_apellido'], $_POST['Tipo_documentoId_documento'], $_POST['Numero_documento'], $_POST['CargoId_cargo'], $_POST['Edad'], $_POST['Telefono'], $_POST['Direccion'], $_POST['Email'], $_POST['RolId_rol']);
		header('location:?class=Empleado&method=index');
    }

    //Pagina ver empleados
	public function empleadosVer(){
        Security::validate();
		require_once('views/Empleado/VerEmpleado.php');
    }
    
    //Pagina editar empleados
	public function empleadosEditar(){
        Security::validate();
		require_once('views/Empleado/editarEmpleados.php');
    }
    //Editar empleado
	public function updateEmpleado(){
        Security::validate();
		parent::editEmpleado($_POST['Id_empleado'], $_POST['Primer_nombre'], $_POST['Segundo_nombre'], $_POST['Primer_apellido'], $_POST['Segundo_apellido'], $_POST['Tipo_documentoId_documento'], $_POST['Numero_documento'], $_POST['CargoId_cargo'], $_POST['Edad'], $_POST['Telefono'], $_POST['Direccion'], $_POST['Email'], $_POST['RolId_rol']);
		header('location:?class=empleado&method=index');
    }
    
    //Borrar empleado
	public function deleteEmpleado(){
        Security::validate();
		$user = parent::getEmpleado($_REQUEST['userId']);
		parent::borrarEmpleado($_REQUEST['userId']);
		require_once('views/Modal/Index.php');
	}

/********************* PAGINA DE EMPLEADOS******************************************************/
    public function empleado(){
        Security::validate();
        require_once('Views/Empleado/empleado.php');
    }
}


?>