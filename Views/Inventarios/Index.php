<html>
<head>
	<title>
		Administrador inventarios
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
				<div class="modal fade" id="modalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" onclick="generales.refrescarPagina();">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content">
				      <div class="modal-header bg-dark text-light">
				        <h5 class="modal-title" id="exampleModalLongTitle">Importante</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="generales.refrescarPagina();">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        ...
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="generales.refrescarPagina();">Cerrar</button>
				        <!--button type="button" class="btn btn-primary">Save changes</button-->
				      </div>
				    </div>
				  </div>
				</div>
				<!-----------------------   FIN MODAL  ------------------------------------>
				<!-----------------------   INICIO TABLA CLIENTES  ------------------------------------>
				<section id="section_table">
					<h2>DATOS INVENTARIO</h2>
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="seccion_boton_crear_usuario">
						<div class="row">
							<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
							</div>
							<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
							</div>
							<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-right">
								<a href="?class=Inventarios&method=CrearInventario">
									<button type="button" class="btn btn-success">
										Crear producto <i class="fas fa-plus-circle"></i>
									</button>

								</a>
							</div>
						</div>
					</div>
					<table id="tabla_clientes" class="display responsive nowrap tabla-jquery">
						<thead> 
							<tr style="color: #eb028b;">
								<th>ID</th>
		                        <th>INVENTARIO</th>
		                        <th>CANTIDAD</th>
		                        <th>VALOR_SIN_IVA</th>
		                        <th>IVA</th>
		                        <th>VALOR_TOTAL</th>
		                        <th>ACCION</th>
		                    </tr>
						</thead>
						<tbody id="body_tabla_clientes">  
							<?php   foreach (parent::getInventarios() as $responseGetInventarios){ ?>
					                       
		                        <tr>
		                        	<td><?php echo $responseGetInventarios->Id_inventario ?></td>
		                            <td><?php echo $responseGetInventarios->Inventario ?></td>
		                            <td><?php echo $responseGetInventarios->Cantidad ?></td>
		                            <td><?php echo $responseGetInventarios->Valor_sin_iva ?></td>
		                            <td><?php echo $responseGetInventarios->Iva ?></td>
		                            <td><?php echo $responseGetInventarios->Valor_Total ?></td>
		                            <td>
		                            	<a href="?class=Inventarios&method=VerInventario&Id_inventario=<?php echo $responseGetInventarios->Id_inventario ?>">
		                            		<i class="fas fa-info color_orange" title="Ver inventario <?php echo $responseGetInventarios->Id_inventario ?>"></i>
		                            	</a>
		                            	&nbsp;&nbsp;
		                            	<a href="?class=Inventarios&method=EditarInventario&Id_inventario=<?php echo $responseGetInventarios->Id_inventario ?>">
		                            		<i class="fas fa-pencil-alt color_blue" title="Editar inventario <?php echo $responseGetInventarios->Id_inventario ?>"></i>
		                            	</a>
		                            	&nbsp;&nbsp;
		                            	<i class="fas fa-trash-alt color_red btn-borrarinventario" title="Borrar inventario <?php echo $responseGetInventarios->Id_inventario ?>" data-control-user=<?php echo $responseGetInventarios->Id_inventario ?>></i>
		                            </td>
		                        </tr>
					            
					        <?php   } ?>             
						</tbody>
					</table>
				</section>
				<!-----------------------   FIN TABLA CLIENTES  ------------------------------------>
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="row">
						<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-right">
							<!--img src="Assets/img/izquierda.png"-->
						</div>
						<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
							<a href="?class=Administrador&method=Index">
								<img src="Assets/img/casa.png">
							</a>
						</div>
						<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-left">
							<!--img src="Assets/img/derecha.png"-->
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