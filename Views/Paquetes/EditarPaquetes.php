<html>
	<head>
		<title>
			Editar paquete
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
						$ResponsePaquete = Paquetes::getPaqueteDeEvento($_GET['tipo_de_paquete']);
					?>
					<div class="row">
						<div class="col-lg-12">
							<div class="row" id="event_2">
								<div class="col-lg-12" STYLE="">
									<div style="text-align: center; margin-top: 5%;">
										<h2>Editar Paquete</h2>
										<form class="col-sm-12 col-md-12 col-lg-12 col-xl-12 " id="eliminar2">
											<div class="row sombra">
												<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 margen-abajo">
													<label for="nombrePaquete">
														NOMBRE PAQUETE 
													</label>
													<br>
													<input type="text" class="form-control" name="nombrePaquete"  id="nombrePaquete" placeholder="0" value="<?php echo  $ResponsePaquete->TIPO_DE_PAQUETE; ?>" required disabled="disabled">
												</div>
												<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 margen-abajo">
													<label for="Valor_total">
														VALOR 
													</label>
													<br>
													<input type="text" class="form-control valorNumerico" name="Valor_total" id="Valor_total" data-thousands="." data-decimal="," data-precision="0" data-prefix="$ "  value="<?php echo  $ResponsePaquete->VALOR_TOTAL; ?>" required disabled="disabled">
												</div>
												<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 margen-abajo">
													<label for="cantidad_personas">
														CANTIDAD PERSONAS
													</label>
													<br>
													<input type="text" class="form-control inputDocumento" name="cantidad_personas" id="cantidad_personas" value="<?php echo  $ResponsePaquete->CANTIDAD_PERSONAS; ?>" required disabled="disabled">
												</div>
												<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="inventarioDePaquete">
													<table class="table">
														<thead class="thead-dark">
															<tr>
																<th>Inventario</th>
																<th>Cantidad</th>
																<th>Opciones</th>
															</tr>
														</thead>
														<tbody>
															<?php $cantidadInventario = count(parent::getPaquete($ResponsePaquete->ID_PAQUETE));  
																if($cantidadInventario > 0){
																	foreach(parent::getPaquete($ResponsePaquete->ID_PAQUETE) AS $ResponseGetPaquete){ ?>
																		<tr>
																			<td><?php echo $ResponseGetPaquete->INVENTARIO;?></td>
																			<td><?php echo $ResponseGetPaquete->CANTIDAD; ?></td>
																			<td>
																				<a onClick="eliminarInventarioPaquete(<?php echo $ResponsePaquete->ID_PAQUETE; ?>, <?php echo $ResponseGetPaquete->ID_INVENTARIO; ?>);">
																					<i class="fas fa-minus-circle text-danger" title="eliminar <?php echo $ResponseGetPaquete->INVENTARIO; ?>"></i>
																				</a>
																			</td>
																		</tr>
																	<?php } ?>
																<?php }else{  ?>
																	<tr>
																		<td colspan="3" ><?php echo "No hay registros"; ?></td>
																	</tr>
																<?php }
															?>
															<tr>
																<td>
																	<select type="text" class="form-control" name="inventario_paquete"  id="inventario_paquete"  required >
																		<option value="">Selecciona un articulo</option>
																		<?php foreach(Inventarios::getInventarios() AS $ResponseInventario){ ?>
																			<option value="<?php echo $ResponseInventario->Id_inventario; ?>"><?php echo $ResponseInventario->Inventario; ?></option>
																		<?php } ?>
																	</select>
																</td>
																<td>
																	<input type="text" class="form-control inputDocumento" name="cantidad_inventario" id="cantidad_inventario" required>
																</td>
																<td>
																	<a class="btn btn-success text-white" onClick="agregarInventarioPaquete(<?php echo $ResponsePaquete->ID_PAQUETE ; ?>);">
																		<i class="fas fa-plus-circle text-white"></i> Agregar
																	</a>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</form>
										<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" style="margin-top: 5%;">
										<div class="row">
											<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
												<a href="?class=eventos&method=index">
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
	<script type="text/javascript" src="Assets/Utilitarios/Utilitarios/jquery.maskMoney.js"></script>
	<script type="text/javascript" src="Assets/Utilitarios/datetimepicker/jquery.datetimepicker.full.min.js"></script>
	<script type="text/javascript" src="Assets/js/generales.js"></script>
</body>
</html>