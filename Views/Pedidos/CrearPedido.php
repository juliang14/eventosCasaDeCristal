<html>
<head>
	<title>
		Administrador crear pedido
	</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="Assets/img/icon.ico" />

	<link rel="stylesheet" type="text/css" href="Assets/Utilitarios/bootstrap-4.0.0/css/bootstrap.min.css">
	<!--link rel="stylesheet" type="text/css" href="Assets/bootstrap/css/bootstrap.min.css"-->
	<link rel="stylesheet" type="text/css" href="Assets/Utilitarios/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="Assets/Utilitarios/css/responsive.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="Assets/Utilitarios/fontawesome-5.13.0/css/all.css">
	<link rel="stylesheet" type="text/css" href="Assets/Utilitarios/datetimepicker/jquery.datetimepicker.css">
	<link rel="stylesheet" type="text/css" href="Assets/css/styles.css">
	<link rel="stylesheet" type="text/css" href="Assets/css/administrador.css">
	<link rel="stylesheet" type="text/css" href="Assets/css/facturas.css">
	<link rel="stylesheet" type="text/css" href="Assets/css/formularios.css">
	<link rel="stylesheet" type="text/css" href="Assets/css/fuentes.css">

</head>
<body>
	<div class="center">
		<div class="container-fluid" id="pag">
			<div class="row">
				<div class="col-lg-12">

					<div class="container-fluid">
						<div class="row">

							<div class="col-lg-2" STYLE="">
								<a href="?class=administrador&method=Index">
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
				<div class="modal fade" id="modalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content">
				      <div class="modal-header bg-dark text-light">
				        <h5 class="modal-title" id="exampleModalLongTitle">Importante</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        ...
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Cerrar</button>
				        <!--button type="button" class="btn btn-primary">Save changes</button-->
				      </div>
				    </div>
				  </div>
				</div>
				<!-----------------------   FIN MODAL  ------------------------------------>
				<h1>GENERAR PEDIDO</h1>
				<br>
				<form class="formulario-genial" action="?class=Pedidos&method=generarPedido" method="POST">
					<section class="" id="">
						<div class="row paso">
							<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-left">
								SELECCIONAR EVENTO
							</div>
							<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-right m-auto">
								<i class="fas fa-chevron-up formulario_genial" data-seccion="seleccionEvento" control-paso="1" id="p1"></i>
							</div>
						</div>
						<!------------------------ Menu con Bootstrap  ---------------------------->
						<div class="body-seccion" id="seleccionEvento">
							<nav class="navbar navbar-inverse bg-inverse navbar-toggleable-sm">
								<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
									<span class="navbar-toggler-icon"></span>
								</button>
								<div class="collapse navbar-collapse" id="navbarNav">
									<div class="navbar-nav text-center mr-auto ml-auto">
									<?php foreach(Eventos::getEventos() AS $ResponseGetEventos){ ?>
										<a class="nav-item nav-link seleccionarEvento" evento="<?php echo $ResponseGetEventos->TIPO_DE_EVENTO; ?>" idevento="idEvento<?php echo $ResponseGetEventos->ID_EVENTO; ?>"><?php echo $ResponseGetEventos->TIPO_DE_EVENTO; ?> <i class="fas fa-angle-down"></i></a>
									<?php } ?>
									</div>
								</div>
							</nav>
							<div class="botonesEventos text-center ">
									<input class="form-control text-center ocultar" type="text" id="valorEvento" disabled="disabled">
							</div>
						</div>
					</section>
					<section class="" id="">
						<div class="row paso">
							<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-left">
								SELECCIONAR PAQUETE
							</div>
							<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-right m-auto">
								<i class="fas fa-chevron-down formulario_genial" data-seccion="seleccionPaquete" control-paso="2" id="p2"></i>
							</div>
						</div>
						<div class="body-seccion" id="seleccionPaquete">
							<?php foreach(Eventos::getEventos() AS $CantidadEventos){ ?>
								<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center m-auto contenCajaEvento ocultar" id="idEvento<?php echo $CantidadEventos->ID_EVENTO; ?>">
									<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center mt-4 mb-4">
										<h4>Paquetes <?php echo $CantidadEventos->TIPO_DE_EVENTO; ?></h4>
									</div>
									<div class="row">
										<?php foreach(Paquetes::getEventoPaquete($CantidadEventos->TIPO_DE_EVENTO) AS $ResponseGetEventoPaquete){ ?>
											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center m-auto">
												<div class="contenedorPaquetes" id-paquete="<?php echo $ResponseGetEventoPaquete->ID_PAQUETE; ?>">
													<h3 class="font-italic">PLAN TODO INCLUIDO <?php echo $ResponseGetEventoPaquete->CANTIDAD_PERSONAS; ?> PERSONAS</h3>
													<br>
													<h1 class="text-danger">$<?php echo $ResponseGetEventoPaquete->VALOR_TOTAL; ?></h1>
													<br>
													<h5>NUESTRO PLAN INCLUYE</h5>
													<br>
													<ul class="text-muted p-0 mb-4 text-left">
														<?php foreach(Paquetes::getPaquete($ResponseGetEventoPaquete->ID_PAQUETE) AS $ResponseGetPaquete){ ?>
															<li><?php echo $ResponseGetPaquete->INVENTARIO; ?></li>
														<?php } ?>
													</ul>
													<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center ml-auto mr-auto mb-1 nombre-paquete">
														<?php echo $ResponseGetEventoPaquete->TIPO_DE_PAQUETE; ?>
														</div>
												</div>
											</div>
										<?php } ?>
									</div>
								</div>	
							<?php } ?>
						</div>
						<div class="botonesEventos text-center ">
							<input type="text" class="form-control text-center" name="valorPaqueteGenerar"  id="valorPaqueteGenerar">
						</div>
					</section>
					<section class="" id="">
						<div class="row paso">
							<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-left">
								SELECCIONAR USUARIO
							</div>
							<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-right m-auto">
								<i class="fas fa-chevron-down formulario_genial" data-seccion="seleccionUsuario" control-paso="3" id="p3"></i>
							</div>
						</div>
						<div class="body-seccion" id="seleccionUsuario">
							<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center m-auto contenCajaPedido ocultar">
								<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center mt-4 mb-4">
									<h4>Buscar usuario</h4>
								</div>
								<div class="row">
									<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 text-right mb-4 p-0" >
										<label for="inputTipoDocumento">Tipo documento</label><br>
										<select class="text-center" id="inputTipoDocumento">
											<option value=''>Seleccionar</option>
											<?php foreach (TipoDocumento::getTipoDocumento() as $responseGetTipoDocumento){ ?>
												<option value="<?php echo $responseGetTipoDocumento->Siglas ?>"><?php echo $responseGetTipoDocumento->Siglas ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center mb-4 p-0">
										<label for="inputBuscarCliente"># Documento</label><br>
										<input class="inputDocumento" type="text" id="inputBuscarCliente"/>
									</div>
									<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 text-left m-auto p-0">
										<div class="btn verde formularioGenialBotonBuscar">Buscar</div>
									</div>
									<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-right mt-4 mb-4 ocultar" id="personaPedido">
										<b>Se generara el pedido al usuario:</b>
									</div>
									<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-left mt-4 mb-4 p-0 ocultar" id="responseGetUsuario">
										
									</div>
								</div>
							</div>	
						</div>
						<div class="botonesEventos text-center">
							<input type="text" class="form-control text-center" name="IdUsuarioGenerar" id="IdUsuarioGenerar" />
						</div>
					</section>
					<section class="" id="">
						<div class="row paso">
							<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-left">
								SELECCIONAR FECHA EVENTO
							</div>
							<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-right m-auto">
								<i class="fas fa-chevron-down formulario_genial" data-seccion="seleccionFecha" control-paso="4" id="p4"></i>
							</div>
						</div>
						<div class="body-seccion" id="seleccionFecha">
							<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center m-auto contenCajaFecha ocultar">
								<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center mt-4 mb-4">
									<h4>Fecha de evento</h4>
								</div>
								<div class="row">
									<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-right mb-4" >
										<label for="inputFechaInicioEvento">Fecha inicio evento</label><br>
										<input type="text" class="datepicker text-center form-control validacionFechas" name="inputFechaInicioEvento" id="inputFechaInicioEvento">
									</div>
									<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-left mb-4">
										<label for="inputFechaFinEvento">Fecha fin evento</label><br>
										<input type="text" class="datepicker text-center form-control validacionFechas" name="inputFechaFinEvento" id="inputFechaFinEvento">
									</div>
								</div>
							</div>
						</div>
					</section>
					<section class="" id="">
						<div class="row paso">
							<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-left">
								SELECCIONAR DIRECCION EVENTO
							</div>
							<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-right m-auto">
								<i class="fas fa-chevron-down formulario_genial" data-seccion="seleccionUbicacion" control-paso="5" id="p5"></i>
							</div>
						</div>
						<div class="body-seccion" id="seleccionUbicacion">
							<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center m-auto contenCajaUbicacion ocultar">
								<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center mt-4 mb-4">
									<h4>Ubicacion del evento</h4>
								</div>
								<div class="row">
									<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-right m-auto" >
										<i class="fas fa-city"></i>
										<label for="inputCiudadEvento">Ciudad</label>
									</div>
									<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-right m-auto" >
										<input type="text" class="text-center form-control" name="inputCiudadEvento" id="inputCiudadEvento" required>
									</div>
									<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-right m-auto" >
										<i class="fas fa-home"></i>
										<label for="inputBarrioEvento">Barrio</label>
									</div>
									<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-left m-auto">
										<input type="text" class="text-center form-control" name="inputBarrioEvento" id="inputBarrioEvento" required>
									</div>
									<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-right m-auto" >
										<i class="fas fa-map-marker-alt"></i>
										<label for="inputDireccionEvento">Direccion</label>
									</div>
									<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-left m-auto">
										<input type="text" class="text-center form-control" name="inputDireccionEvento" id="inputDireccionEvento" required>
									</div>
								</div>
							</div>
						</div>
					</section>
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4">
						<div class="row">
							<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-right " id="botonesMenuGenial">
								
							</div>
							<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-left ">
								<a href="?class=pedidos&method=index">
									<button class="btn rojo">Volver</button>
								</a>
							</div>
						</div>
					</div>
				</form>
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