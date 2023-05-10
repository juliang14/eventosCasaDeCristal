<html>
<head>
	<title>
		Turnos empleado
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
	<link rel="stylesheet" type="text/css" href="Assets/css/empleados.css">

</head>
<body>
	<div class="center">
		<div class="container-fluid" id="pag">
			<div class="row">
				<div class="col-lg-12">

					<div class="container-fluid">
						<div class="row">

							<div class="col-lg-2" STYLE="">
								<a href="?class=empleado&method=empleado&Id_empleado=<?php echo $_SESSION['UserAutenticate']->ID_EMPLEADO; ?>">
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
											<img src="Assets/img/emple.png">
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
								<div class="row" style="height: 15%;">
								</div>
								<div id="div-menu" onclick="menu();">
									<img src="Assets/img/menu.png">
								</div>
								<nav class="men" id="men">
									<ul class="menu-pincipal">
										<li class="">
											<a href="?class=empleado&method=empleado&Id_empleado=<?php echo $_SESSION['UserAutenticate']->ID_EMPLEADO; ?>">Inicio</a>
										</li>
										<li class="active">
											<a href="?class=EmpleadoTurno&method=index&Id_empleado=<?php echo $_SESSION['UserAutenticate']->ID_EMPLEADO; ?>">Turnos</a>
										</li>
									</ul>
								</nav>

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
								<div style="text-align: center; margin-top: 5%;">
									<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
										<div class="row">
											<div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
											</div>
											<div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
												<h2 id="">Turnos</h2>
											</div>
											<div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
											</div>
										</div>
									</div>
									<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4 pb-4">
										<table id="tabla_empleados" class="display responsive nowrap tabla-jquery">
											<thead> 
												<tr style="color: #eb028b;">
													<th>ID</th>
													<th>NOMBRE EMPLEADO</th>
													<th>CARGO</th>							                        
													<th>PEDIDO</th>
													<th>FECHA INICIO EVENTO</th>
													<th>FECHA FIN EVENTO</th>
													<th>CIUDAD</th>
													<th>BARRIO</th>
													<th>DIRECCION</th>
												</tr>
											</thead>
											<tbody id="body_tabla_clientes">  
												<?php   foreach (parent::getTurnosEmpleado($_SESSION['UserAutenticate']->ID_EMPLEADO) as $responseGetTurnos){ ?>
															
													<tr>
														<td><?php echo $responseGetTurnos->ID_TURNO ?></td>
														<td><?php echo $responseGetTurnos->NOMBRE ?></td>		
														<td><?php echo $responseGetTurnos->NOMBRE_DE_CARGO ?></td>					                            
														<td><?php echo $responseGetTurnos->ID_PEDIDO ?></td>
														<td><?php echo $responseGetTurnos->FECHA_INICIO_EVENTO ?></td>
														<td><?php echo $responseGetTurnos->FECHA_FIN_EVENTO ?></td>
														<td><?php echo $responseGetTurnos->CIUDAD_EVENTO ?></td>
														<td><?php echo $responseGetTurnos->BARRIO_EVENTO ?></td>
														<td><?php echo $responseGetTurnos->DIRECCION_EVENTO ?></td>
													</tr>
													
												<?php   } ?>             
											</tbody>
										</table>
									</div>
									<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4 pt-4">
										<div class="row">
											<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
												
											</div>
											<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
												<a href="?class=empleado&method=empleado&Id_empleado=<?php echo $_SESSION['UserAutenticate']->ID_EMPLEADO; ?>">
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