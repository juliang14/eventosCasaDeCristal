<html>
<head>
	<title>
		Administrador reportes
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
	<link rel="stylesheet" type="text/css" href="Assets/css/acercadenosotros.css">

</head>
<body>
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
	<div class="modal fade bd-example-modal-lg" id="modalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header bg-dark text-light">
			<h5 class="modal-title" id="exampleModalLongTitle">Importante</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close" >
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
	<div class="center">
		<div class="container-fluid" id="pag">
			<div class="row">
				<div class="col-lg-12">
					<div class="container-fluid">
						<div class="row">

							<div class="col-lg-2" STYLE="">
								<a href="?class=Administrador&method=Index">
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
				<div class="row">
					<div class="col-lg-12">
						<div class="row" id="event_2">
							<div class="col-lg-12" STYLE="">
								<div style="text-align: center; margin-top: 5%">
									<h2>Reportes</h2>
									<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="seccion1">
										<div class="row">
											<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
												<div class="row">
													<div class="col-sm-12 col-md-5 col-lg-5 col-xl-5" style="text-align: right;">
														<label>Tipo reporte</label>
													</div>
													<div class="col-sm-12 col-md-7 col-lg-7 col-xl-7" style="text-align: left;">
														<select style="width: 100%;" name="tipoReporte" id="tipoReporte">
															<option>Seleccione la opcion</option>
															<option value="Pedidos">Pedidos</option>
															<option value="Usuarios">Usuarios</option>
															<option value="Empleados">Empleados</option>
														</select>
													</div>
												</div>
											</div>
											<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
												<div class="row">
													<div class="col-sm-12 col-md-5 col-lg-5 col-xl-5" style="text-align: right;">
														<label>Fecha inicio</label>
													</div>
													<div class="col-sm-12 col-md-7 col-lg-7 col-xl-7" style="text-align: left;">
														<input type="date" name="fechaInicio" id="fechaInicio" style="width: 100%;">
													</div>
												</div>
											</div>
											<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
												<div class="row">
													<div class="col-sm-12 col-md-5 col-lg-5 col-xl-5" style="text-align: right;">
														<label>Fecha final</label>
													</div>
													<div class="col-sm-12 col-md-7 col-lg-7 col-xl-7" style="text-align: left;">
														<input type="date" name="fechaFin" id="fechaFin" style="width: 100%;">
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="seccion2">
										<div class="row">
											<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
											</div>
											<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4" id="cajaDescargar" onClick="ejecutarModalReportes();">
												<i class="fas fa-download"></i>
												<label>Descargar reporte</label>
											</div>
											<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
											</div>
										</div>
									</div>
										
										<div cla
										ss="col-sm-12 col-md-12 col-lg-12 col-xl-12">
										<div class="row">
											<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
												
											</div>
											<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
												<a href="?class=Administrador&method=Index">
													<img src="Assets/img/casa.png">
												</a>
											</div>
											<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
												
											</div>

										</div>
									</div>
								</div>
							</div>
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