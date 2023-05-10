<html>
	<head>
		<title>
			Crear turno
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
		<link rel="stylesheet" type="text/css" href="Assets/css/administrador.css">
		<link rel="stylesheet" type="text/css" href="Assets/css/administrador_eliminar_editar.css">

	</head>
	<body>
		<div class="center">
			<div class="container-fluid" id="pag">
				<div class="row">
					<div class="col-lg-12">
						<div class="container-fluid">
							<div class="row">

								<div class="col-lg-2" STYLE="">
									<a href="?class=administrador&method=index">
										<IMG SRC="Assets/img/Logo.jpeg" STYLE="width: 90%;"></IMG>
									</a>
								</div>

								<div class="col-lg-10" STYLE="background-color: WHITE;">
									<div class="row" id="busc">
										<div class="col-lg-3" STYLE="margin:auto;text-align:center;">
										</div>
										<div class="col-lg-4" STYLE="margin:auto;text-align:center;">
											<div class="input-group" id="bus">
												<input type="text" class="form-control" placeholder="BUSCADOR">
												<div class="input-group-append">
													<button class="btn btn-outline-secondary" type="button">IR</button>
												</div>
											</div>
										</div>
										<div class="col-lg-1" id="inicio-personal">

										</div>
										<div class="col-lg-4" id="inicio-usuarios">
											<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="usuario-arriba">
												<p><?php echo $_SESSION['UserAutenticate']->NOMBRE; ?></p>
												<img src="Assets/img/silueta-de-multiplesusuarios.png">
											</div>
											<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="usuario-arriba1">
												<p>cerrar sesion</p>
												<label class="switch">
													<input type="checkbox" onclick="cerrarSesion();">
													<span class="slider round"></span>
												</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<main>
					<!-----------------------   INICIO MODAL  ------------------------------------>
					<!-- Button trigger modal -->
					<!--
						$('#modalCenter').modal('show'); // abrir
						$('#modalCenter').modal('hide'); // cerrar
					-->
					<!--button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCenter">
					Launch demo modal
					</button-->

					<!-- Modal -->
					<div class="modal fade refrescarPagina" id="modalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
						<div class="modal-header bg-dark text-light">
							<h5 class="modal-title" id="exampleModalLongTitle">Importante</h5>
							<button type="button" class="close refrescarPagina" data-dismiss="modal" aria-label="Close" >
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							...
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary refrescarPagina" data-dismiss="modal">Cerrar</button>
							<!--button type="button" class="btn btn-primary">Save changes</button-->
						</div>
						</div>
					</div>
					</div>
					<!-----------------------   FIN MODAL  ------------------------------------>
					<section class="section-turnos">
						<div class="col-sm-10 col-md-10 col-lg-10 col-xl-10 m-auto sombra">
							<h3 class="text-center mb-4">Asocia personal al evento</h3>
							<div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 m-auto">
								<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12  boton-desplegable" control="TurnoPedidos">
										<i class="fas fa-bars"></i>
										<strong>Pedido</strong>
								</div>
								<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 body-desplegable text-center ocultar" id="TurnoPedidos">
									<label for="inputIdPedidoTurno">Id del pedido</label>
									<input type="text" class="text-center form-control inputDocumento" name="inputIdPedidoTurno" id="inputIdPedidoTurno" required>
									<div class="row ocultar" id="fechasDelPedido">
										<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 mt-4">
											<div class='row'>
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
													<label for="inputCiudadEvento">Ciudad</label>
												</div>
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
													<input class="boton_desabilitado" type="text" id="inputCiudadEvento" disabled="disabled"/>					
												</div>
											</div>
											<div class='row'>
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
													<label for="inputBarrioEvento">Barrio</label>
												</div>
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
													<input class="boton_desabilitado" type="datatime" id="inputBarrioEvento" disabled="disabled"/>
												</div>
											</div>
											<div class='row'>
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
													<label for="inputDireccionEvento">Direccion</label>
												</div>
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
													<input class="boton_desabilitado" type="text" id="inputDireccionEvento" disabled="disabled">
												</div>
											</div>
										</div>	
										<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 mt-4">
											<div class='row'>
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
													<label for="inputFechaInicioEvento">Fecha inicio evento</label>
												</div>
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
													<input type="text" class="datepicker text-center" id="inputFechaInicioEvento" disabled="disabled">
												</div>
											</div>
											<div class='row'>
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
													<label for="inputFechaFinEvento">Fecha fin evento</label>
												</div>
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
													<input type="text" class="datepicker text-center" id="inputFechaFinEvento" disabled="disabled">
												</div>
											</div>
										</div>	
									</div>
									<div class="row ocultar" id="contenedorMensajeError">
										<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4 text-center">
											<input type="text" class="text-center form-control" id="mensajeError" disabled="disabled">
										</div>
									</div>
								</div>
							</div>
							<br>
							<div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 m-auto">
								<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 boton-desplegable" control="TurnoEmpleado">
										<i class="fas fa-bars"></i>
										<strong>Empleados</strong>
								</div>
								<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 body-desplegable text-center ocultar" id="TurnoEmpleado">
									<div class='row'>
										<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 m-auto text-right">
											<label class="m-auto" for="inputTipoDocumento">Tipo documento</label>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
											<select class="text-center" id="inputTipoDocumento">
												<option value=''>Seleccionar</option>
												<?php foreach (TipoDocumento::getTipoDocumento() as $responseGetTipoDocumento){ ?>
													<option value="<?php echo $responseGetTipoDocumento->Siglas ?>"><?php echo $responseGetTipoDocumento->Siglas ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<br>
									<div class='row'>
										<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 m-auto text-right">
											<label class="m-auto" for="inputEmpleadoTurno">Numero de documento</label>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
											<input type="text" class="text-center form-control inputDocumento" name="inputEmpleadoTurno" id="inputEmpleadoTurno" required>
										</div>
									</div>
									<div class="row ocultar" id="contenedorMensaje">
										<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4 text-center">
											<input type="text" class="text-center form-control" id="mensaje" disabled="disabled">
										</div>
									</div>
								</div>
							</div>
							<br><br>
							<div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 m-auto">
								<div class='row'>
									<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-right" id="botonCrearTurno">
									<button class="btn verde crearTurno" id="crearTurno"> Crear turno </button>
									</div>
									<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-left">
										<a href="?class=turnos&method=index">
											<button class="btn rojo"> Volver </button>
										</a>
									</div>
								</div>
							</div>
						</div>
					</section>
					
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" style="margin-top: 5%;">
						<div class="row">
							<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-right">
								<a href="?class=turnos&method=index">
									<img src="Assets/img/izquierda.png">
								</a>
							</div>
							<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
								<a href="?class=administrador&method=index">
									<img src="Assets/img/casa.png">
								</a>
							</div>
							<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
							</div>
						</div>
					</div>
			</main>
		</div>
	</div>
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