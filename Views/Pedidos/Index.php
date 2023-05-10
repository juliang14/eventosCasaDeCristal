<html>
<head>
	<title>
		Administrador pedidos
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
				<div class="modal fade" id="modalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" onclick="generales.refrescarPagina();">
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
				        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="generales.refrescarPagina();">Cerrar</button>
				        <!--button type="button" class="btn btn-primary">Save changes</button-->
				      </div>
				    </div>
				  </div>
				</div>
				<!-----------------------   FIN MODAL  ------------------------------------>
				<!-----------------------   INICIO TABLA PEDIDOS  ------------------------------------>
				<section id="section_table">
					<h2>DATOS PEDIDOS</h2>
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="seccion_boton_crear_usuario">
						<div class="row">
							<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
							</div>
							<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
							</div>
							<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-right">
								<a href="?class=Pedidos&method=CrearPedido">
									<button type="button" class="btn btn-success">
										Crear pedido <i class="fas fa-plus-circle"></i>
									</button>

								</a>
							</div>
						</div>
					</div>
					<table id="tabla_pedidos" class="display responsive nowrap tabla-jquery">
						<thead> 
							<tr style="color: #eb028b;">
								<th>ID</th>
		                        <th>NOMBRES</th>
		                        <th>APELLIDOS</th>
		                        <th>DOCUMENTO</th>
		                        <th>ID_PAQ</th>
		                        <th>EVENTO</th>
		                        <th>PAQUETE</th>							                        
		                        <th>VALOR_PAQUETE</th>
		                        <th>IVA</th>
		                        <th>VALOR_TOTAL</th>
		                        <th>ESTADO</th>
								<th>FECHA INICIO EVENTO</th>
								<th>FECHA FIN EVENTO</th>
								<th>CIUDAD DE EVENTO</th>
								<th>BARRIO DE EVENTO</th>
								<th>DIRECCION DE EVENTO</th>
		                        <th>ACCION</th>
		                    </tr>
						</thead>
						<tbody id="body_tabla_clientes">  
							<?php   foreach (parent::getPedidos() as $responseGetPedidos){ ?>
					                       
		                        <tr>
		                        	<td><?php echo $responseGetPedidos->ID_PEDIDO ?></td>
		                            <td><?php echo $responseGetPedidos->NOMBRES ?></td>
		                            <td><?php echo $responseGetPedidos->APELLIDOS ?></td>
		                            <td><?php echo $responseGetPedidos->DOCUMENTO ?></td>
		                            <td><?php echo $responseGetPedidos->ID_PAQUETE ?></td>
		                            <td><?php echo $responseGetPedidos->EVENTO ?></td>		
		                            <td><?php echo $responseGetPedidos->PAQUETE ?></td>					                            
		                            <td><?php echo $responseGetPedidos->VALOR_PAQUETE ?></td>
		                            <td><?php echo $responseGetPedidos->IVA ?></td>
		                            <td><?php echo $responseGetPedidos->VALOR_TOTAL ?></td>
		                            <td><?php echo $responseGetPedidos->ESTADO ?></td>
									<td><?php echo $responseGetPedidos->FECHA_INICIO_EVENTO ?></td>
									<td><?php echo $responseGetPedidos->FECHA_FIN_EVENTO ?></td>
									<td><?php echo $responseGetPedidos->CIUDAD_EVENTO ?></td>
									<td><?php echo $responseGetPedidos->BARRIO_EVENTO ?></td>
									<td><?php echo $responseGetPedidos->DIRECCION_EVENTO ?></td>
		                            <td>
		                            	<a href="?class=Facturas&method=VerFactura&ID_PEDIDO=<?php echo $responseGetPedidos->ID_PEDIDO ?>&ID_PAQUETE=<?php echo $responseGetPedidos->ID_PAQUETE ?>">
		                            		<i class="fas fa-info color_orange" title="Ver pedido <?php echo $responseGetPedidos->ID_PEDIDO ?>"></i>
		                            	</a>
		                            	&nbsp;&nbsp;
		                            	<a href="?class=Facturas&method=EditarFactura&ID_PEDIDO=<?php echo $responseGetPedidos->ID_PEDIDO ?>&ID_PAQUETE=<?php echo $responseGetPedidos->ID_PAQUETE ?>">
		                            		<i class="fas fa-pencil-alt color_blue" title="Editar pedido <?php echo $responseGetPedidos->ID_PEDIDO ?>"></i>
		                            	</a>
		                            </td>
		                        </tr>
					            
					        <?php   } ?>             
						</tbody>
					</table>
				</section>
				<!-----------------------   FIN TABLA PEDIDOS  ------------------------------------>

                <div class="row">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-right">
                        <img src="Assets/img/izquierda.png">
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
                        <a href="?class=administrador&method=Index">
                            <img src="Assets/img/casa.png">
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-left">
                        <img src="Assets/img/derecha.png">
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