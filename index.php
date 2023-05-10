<?php
   session_start();

   //llamar modelos
   require_once('models/DataBase/DB.php');
   require_once('models/Security.php');
   require_once('models/Administrador.php');
   require_once('models/TipoDocumento.php');
   require_once('models/Cargo.php');
   require_once('models/Roles.php');
   require_once('models/Usuario.php');
   require_once('models/Empleado.php');
   require_once('models/EmpleadoTurno.php');
   require_once('models/Pedidos.php');
   require_once('models/Facturas.php');
   require_once('models/Paquetes.php');
   require_once('models/Eventos.php');
   require_once('models/EstadoPedido.php');
   require_once('models/Reportes.php');
   require_once('models/Inventarios.php');
   require_once('models/Turnos.php');
   require_once('models/Mail.php');
   require_once('models/Carrito.php');

   /*-----------------------------------------------------*/
   // se declara variable $controller = si existe la clase se deja la clase (?), sino(:) deja por default Index
   $controller=isset($_REQUEST['class']) ? $_REQUEST['class']: 'Index';
   $method=isset($_REQUEST['method']) ? $_REQUEST['method']: 'index';


   // permite requerir un archivo .php en nuestro sitio
   require_once ('Controllers/'.$controller.'Controller.php');

   $controller=$controller.'Controller';

   $class = ucfirst($controller);
   $controller = new $class();
   call_user_func(array($controller,  $method));

   ?> 