<html>

<head>
	<title>
		Administrador paquetes
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
		</div>
	</div>
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
	<div class="modal fade accionEvento" id="modalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" onclick="">
		<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header bg-dark text-light">
			<h5 class="modal-title" id="exampleModalLongTitle">Importante</h5>
			<button type="button" class="close accionEvento" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="modal-body">
			...
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary accionEvento" data-dismiss="modal" onclick="">Cerrar</button>
			<!--button type="button" class="btn btn-primary">Save changes</button-->
			</div>
		</div>
		</div>
	</div>
	<!-----------------------   FIN MODAL  ------------------------------------>
	<section class="contenedor-eventos-paquetes">
		<div class="row m-0">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 blanco">
				<h1 class=" mb-4">Selecciona una opcion</h1>
			</div>
			<div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 text-center blanco" id="">
			</div>
			<div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 text-center" id="">
				<button class="bubbly-button" onClick="controlMenuSeccionEventos(1);"><i class="fas fa-th"></i>EVENTOS</button>
			</div>
			<div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 text-center" id="">
				<button class="bubbly-button" onClick="controlMenuSeccionEventos(2);"><i class="fas fa-th-large"></i>PAQUETES</button>
			</div>
			<div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 text-center blanco" id="">
			</div>
		</div>
	</section>
	<section class="center seccion-cajas-eventos ocultar">
		<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
			<h2 class="titulo-paquetes">Eventos</h2>
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 contenedor-eventos" id="contenedor-eventos">
				<div class="row">
					<div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
					</div>
					<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10" id="caja-paquete">
						<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-right mb-4">
							<a href="?class=Eventos&method=crearEventos">
								<button class="btn verde evento-crear" > Agregar  <i class="fas fa-plus add"></i></button>
							</a>
						</div>
						<div class="row">
							<?php foreach(Eventos::getEventos() AS $ResponseGetEventos){ ?>
								<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center" id="eventos">
									<div class="row">
										<div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 m-auto">
											<p><?php echo $ResponseGetEventos->TIPO_DE_EVENTO; ?></p>
										</div>
										<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4">
											<img src="Files/img/<?php echo $ResponseGetEventos->IMAGEN; ?>">
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-4">
											<a href="?class=Eventos&method=editarEventos&tipo_de_evento=<?php echo $ResponseGetEventos->TIPO_DE_EVENTO; ?>">
												<button class="btn btn-sm azul">Editar</button>
											</a>
										</div>
										<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-4">
											<button class="btn btn-sm rojo" onclick="borrarEvento(1,'<?php echo $ResponseGetEventos->TIPO_DE_EVENTO; ?>');">Eliminar</button>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
					<div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
					</div>
				</div>
			</div>
			
		</div>
	</section>
	<section class="center seccion-cajas-paquetes ocultar">
		<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
			<h2 class="titulo-paquetes">Paquetes</h2>
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
				<div class="row">
					<div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
					</div>
					<div class="col-sm-12 col-md-8 col-lg-8 col-xl-8" style="padding: 0;">
						<nav class="navbar navbar-inverse bg-inverse navbar-toggleable-sm adminMenuEventos p-0">
							<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarNav">
								<div class="navbar-nav text-center mr-auto ml-auto borde-gris">
								<?php foreach(Eventos::getEventos() AS $ResponseGetEventos){ ?>
									<a class="nav-item nav-link seleccionarEvento" evento="<?php echo $ResponseGetEventos->TIPO_DE_EVENTO; ?>" idevento="idEvento<?php echo $ResponseGetEventos->ID_EVENTO; ?>"><?php echo $ResponseGetEventos->TIPO_DE_EVENTO; ?></a>
								<?php } ?>
								</div>
							</div>
						</nav>
					</div>
					<div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="contenedor-tabla-paquetes">
				<div class="row">
					<div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
					</div>
					<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10" id="caja-paquete">
						<?php foreach(Eventos::getEventos() AS $CantidadEventos){ ?>
							<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center m-auto contenCajaEvento ocultar" id="idEvento<?php echo $CantidadEventos->ID_EVENTO; ?>">
								<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-right mb-4">
									<a href="?class=paquetes&method=crearPaquete&tipo_de_evento=<?php echo $CantidadEventos->TIPO_DE_EVENTO ?>">
										<button class="btn verde evento-crear" evento-crear="<?php echo $CantidadEventos->TIPO_DE_EVENTO; ?>"> Agregar  <i class="fas fa-plus add"></i></button>
									</a>
								</div>
								<div class="row">
									<?php foreach(Paquetes::getEventoPaquete($CantidadEventos->TIPO_DE_EVENTO) AS $ResponseGetEventoPaquete){ ?>
										<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center m-auto pt-4">
											<div class="contenedorPaquetes cajas-paquetes" id-paquete="<?php echo $ResponseGetEventoPaquete->ID_PAQUETE; ?>">
												<h3 class="font-italic pl-2 pr-2">PLAN TODO INCLUIDO <?php echo $ResponseGetEventoPaquete->CANTIDAD_PERSONAS; ?> PERSONAS</h3>
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
											<div class="row">
												<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-1">
													<a href="?class=paquetes&method=editarPaquetes&tipo_de_paquete=<?php echo $ResponseGetEventoPaquete->TIPO_DE_PAQUETE; ?>">
														<button class="btn azul">Editar</button>
													</a>
												</div>
												<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-1">
													<a onClick="eliminarPaquete('<?php echo $ResponseGetEventoPaquete->TIPO_DE_PAQUETE; ?>');">	
														<button class="btn rojo">Eliminar</button>
													</a>	
												</div>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>	
						<?php } ?>
					</div>
					<div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
					</div>
				</div>
			</div>
			
		</div>
	</section>
	<section class="center footer-page pt-4">
		<div cla ss="col-sm-12 col-md-12 col-lg-12 col-xl-12">
			<div class="row">
				<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
					<a href="?class=administrador&method=index">
						<img src="Assets/img/izquierda.png">
					</a>
				</div>
				<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
					<a href="?class=administrador&method=index">
						<img src="Assets/img/casa.png">
					</a>
				</div>
				<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
				</div>
			</div>
		</div>
	</section>
	
	<script type="text/javascript" src="Assets/js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="Assets/Utilitarios/Utilitarios/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="Assets/Utilitarios/Utilitarios/dataTables.responsive.min.js"></script>
	<script type="text/javascript" src="Assets/Utilitarios/Utilitarios/tether.min.js"></script>
	<script type="text/javascript" src="Assets/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="Assets/Utilitarios/Utilitarios/jquery.maskMoney.js"></script>
	<script type="text/javascript" src="Assets/Utilitarios/datetimepicker/jquery.datetimepicker.full.min.js"></script>
	<script type="text/javascript" src="Assets/js/generales.js"></script>
</body>

</html>