<html>
<head>
	<title>
	</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="Assets/img/icon.ico" />

	<!--link rel="stylesheet" type="text/css" href="Assets/Utilitarios/bootstrap-4.0.0/css/bootstrap.min.css"-->
	<link rel="stylesheet" type="text/css" href="Assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Assets/Utilitarios/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="Assets/Utilitarios/css/responsive.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="Assets/Utilitarios/fontawesome-5.13.0/css/all.css">
	<link rel="stylesheet" type="text/css" href="Assets/Utilitarios/datetimepicker/jquery.datetimepicker.css">
	<link rel="stylesheet" type="text/css" href="Assets/css/styles.css">
	
</head>
<body>
	
	<main>
		<section>
		<?php 

			if (isset($user)) {

				if(!empty($user->RESPUESTA_MODAL)){
					$Respuesta_modal = substr($user->RESPUESTA_MODAL, 0,9);
					$ValorId		 = substr($user->RESPUESTA_MODAL, 9);

					if($Respuesta_modal=="Cliente -"){
						echo "Eliminaste el usuario: <br><br>".$ValorId." ".$user->DESCRIPCION_MODAL;
					}else if($Respuesta_modal=="Empleado-"){
						echo "Eliminaste el empleado: <br><br>".$ValorId." - ".$user->DESCRIPCION_MODAL;
					}else if($Respuesta_modal == 'Pedido  -'){
						echo "Actualizaste el pedido: <br><br>".$ValorId." del cliente ".$user->DESCRIPCION_MODAL;
					}else{
						echo "Respuesta no controlada";
					}
				}
			}else if (isset($RInventario)) {
				if(!empty($RInventario)){

					if($RInventario->ACCION=='ACTUALIZAR'){
						echo "Actualizaste el inventario: <br><br>".$RInventario->ID_INVENTARIO." - ".$RInventario->INVENTARIO;
					}else if($RInventario->ACCION=='ELIMINAR'){
						echo "Eliminaste el inventario: <br><br>".$RInventario->ID_INVENTARIO." - ".$RInventario->INVENTARIO;
					}else{
						echo 'Accion no configurada';
					}

				}else{
					echo "Se actualizo el registro exitosamente.";
				}
				
			}else if (isset($RTurnos)) {
				if(!empty($RTurnos)){

					if($RTurnos->ACCION=='ELIMINAR'){
						echo "Eliminaste el empleado: ".$RTurnos->ID_EMPLEADO." - ".$RTurnos->NOMBRE." del turno ".$RTurnos->ID_TURNO;
					}else{
						echo 'Accion no configurada';
					}

				}else{
					echo "No hay datos en la respuesta.";
				}
				
			}else if (isset($REventos)) {
				if(!empty($REventos)){

					if($REventos->ACCION=='ELIMINAR'){
						echo "Se elimino el evento: ".$REventos->ID_EVENTO." - ".$REventos->TIPO_DE_EVENTO;
					}else{
						echo 'Accion no configurada';
					}

				}else{
					echo "No hay datos en la respuesta.";
				}
				
			}else if (isset($REpaquetes)) {
				if(!empty($REpaquetes)){

					if($ACCION=='CREAR'){
						echo "Se creo el paquete: ".$REpaquetes->TIPO_DE_PAQUETE;
					}else if($ACCION=='AGREGAR'){
						echo "Se agregaron ".$_REQUEST['cantidad']." cantidades del inventario ".$REpaquetes->ID_INVENTARIO." - ".$REpaquetes->INVENTARIO." al paquete.";
					}else if($ACCION=='ELIMINAR'){
						echo "Se elimino el inventario ".$REpaquetes->ID_INVENTARIO." - ".$REpaquetes->INVENTARIO." del paquete.";
					}else if($ACCION=='ELIMINAR PAQUETE'){
						echo "Se elimino el paquete ".$_REQUEST['tipoPaquete'];
					}else{
						echo 'Accion no configurada';
					}

				}else{
					echo "No hay datos en la respuesta.";
				}
				
			}else if (isset($RegistroUsuario)) {
				if(!empty($RegistroUsuario)){
					if($ACCION=='REGISTRAR USUARIO'){
						echo "Se registro correctamente el usuario: ".$RegistroUsuario.'<br><br> hemos enviado los datos de ingreso a tu correo.';
					}else{
						echo 'Accion no configurada';
					}
				}else{
					echo "No hay datos en la respuesta.";
				}
				
			}else{
				echo "Esta variable no está definida";
			}
		
		?>
		</section>
	</main>


	<script type="text/javascript" src="Assets/js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="Assets/Utilitarios/Utilitarios/jquery.dataTables.min.js" ></script>
    <script type="text/javascript" src="Assets/Utilitarios/Utilitarios/dataTables.responsive.min.js" ></script>	
	<script type="text/javascript" src="Assets/Utilitarios/Utilitarios/tether.min.js"></script>
	<script type="text/javascript" src="Assets/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="Assets/Utilitarios/Utilitarios/jquery.maskMoney.js"></script>
	<script type="text/javascript" src="Assets/Utilitarios/datetimepicker/jquery.datetimepicker.full.min.js"></script>
	<script type="text/javascript" src="Assets/js/generales.js"></script>
</body>
</html>