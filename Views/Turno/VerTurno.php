<html>
	<head>
		<title>
			Ver turno
		</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="Assets/img/icon.ico" />

		<!--link rel="stylesheet" type="text/css" href="Assets/Utilitarios/bootstrap-4.0.0/css/bootstrap.min.css"-->
		<link rel="stylesheet" type="text/css" href="Assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="Assets/Utilitarios/css/jquery.dataTables.min.css">
		<link rel="stylesheet" type="text/css" href="Assets/Utilitarios/css/responsive.dataTables.min.css">
		<link rel="stylesheet" type="text/css" href="Assets/Utilitarios/fontawesome-5.13.0/css/all.css">
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
				<?php
					$Response = Turnos::getTurno($_GET['ID_TURNO']);
				?>
					<div class="row">
						<div class="col-lg-12">
							<div class="row" id="event_2">
								<div class="col-lg-12" STYLE="">
									<div style="text-align: center; margin-top: 5%;">
										<h2>Ver Turno <?php echo $Response->ID_TURNO ?></h2>
										<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="eliminar2">
											<div class="row sombra contenedorVerTurno">
												<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 margen-abajo">
													<label for="inputCiudadEvento">Ciudad</label>
													<br>
													<input class="boton_desabilitado" type="text" id="inputCiudadEvento" disabled="disabled" value="<?php echo $Response->CIUDAD_EVENTO ?>"/>					
												</div>
												<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 margen-abajo">
													<label for="inputBarrioEvento">Barrio</label>
													<br>
													<input class="boton_desabilitado" type="datatime" id="inputBarrioEvento" disabled="disabled" value="<?php echo $Response->BARRIO_EVENTO ?>" />
												</div>
												<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 margen-abajo">
													<label for="inputFechaInicioEvento">Fecha inicio evento</label>
													<br>
													<input class="boton_desabilitado" type="text" id="inputFechaInicioEvento" disabled="disabled" value="<?php echo $Response->FECHA_INICIO_EVENTO ?>"/>
												</div>
												<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 margen-abajo">
													<label for="inputFechaFinEvento">Fecha fin evento</label>
													<br>
													<input class="boton_desabilitado" type="datatime" id="inputFechaFinEvento" disabled="disabled" value="<?php echo $Response->FECHA_FIN_EVENTO ?>" />
												</div>
												<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 margen-abajo" style="text-align:center;">
													<label for="inputDireccionEvento">Direccion</label>
													<br>
													<input class="boton_desabilitado" type="text" id="inputDireccionEvento" name="" placeholder="total" disabled="disabled" value="<?php echo $Response->DIRECCION_EVENTO ?>">
												</div>
											</div>
										</div>
										<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
											<div class="row">
												<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
												</div>
												<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
													<a href="?class=turnos&method=index">
														<button class="btn rojo">volver</button>
													</a>
												</div>
												<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
												</div>
											</div>
										</div>
										<div cla
										ss="col-sm-12 col-md-12 col-lg-12 col-xl-12" style="margin-top: 5%;">
										<div class="row">
											<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
												<a href="?class=turnos&method=index">
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
	<script type="text/javascript" src="Assets/js/generales.js"></script>
</body>
</html>