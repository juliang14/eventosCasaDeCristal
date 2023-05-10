<html>
<head>
	<title>
		Ver INVENTARIO
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
				<div class="modal fade" id="modalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" onclick="redirectPageController('administradorInventarios');">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content">
				      <div class="modal-header bg-dark text-light">
				        <h5 class="modal-title" id="exampleModalLongTitle" onclick="redirectPageController('administradorInventarios');">Importante</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        ...
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="redirectPageController('administradorInventarios');">Cerrar</button>
				        <!--button type="button" class="btn btn-primary">Save changes</button-->
				      </div>
				    </div>
				  </div>
				</div>
				<!-----------------------   FIN MODAL  ------------------------------------>
				<!-----------------------   INICIO FORMULARIOS  ------------------------------------>
                <section class="" id="section_forms">
                <?php
					$ResponseGetInventario = parent::getInventario($_GET['Id_inventario']);
				?>
					<div class="contenedorFormularioEditarInventario" id="contenedorFormularioEditarInventario">
						<h2 class="text-center" id="tituloEditarInventario"> Editar Producto <?php echo $ResponseGetInventario->ID_INVENTARIO ?></h2>
						<div class="row">
							<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center" >
								<input type="hidden" class="form-control" name="Id_inventario" id="Id_inventario"value="<?php echo $ResponseGetInventario->ID_INVENTARIO ?>" required>
							</div>
							<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
								<label for="VerInventario">Inventario</label><br>
								<input type="text" class="form-control" name="VerInventario" id="VerInventario" placeholder="Inventario" value="<?php echo $ResponseGetInventario->INVENTARIO ?>" required>
							</div>
							<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
								<label for="SegundoCantidad_nombre">Cantidad</label><br>
								<input type="number" class="form-control" name="Cantidad" id="Cantidad" placeholder="Cantidad" value="<?php echo $ResponseGetInventario->CANTIDAD ?>" required >
							</div>
							<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center" >
								<label for="Valor_sin_iva">Valor sin iva</label><br>
								<input type="text" class="form-control valorNumerico" name="Valor_sin_iva" id="Valor_sin_iva" data-thousands="." data-decimal="," data-precision="0" data-prefix="$ " placeholder="Valor sin iva" value="<?php echo $ResponseGetInventario->VALOR_SIN_IVA ?>" required>
							</div>
							<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
								<label for="Iva">Iva</label><br>
								<input type="number" class="form-control" name="Iva" id="Iva" placeholder="Iva" value="<?php echo $ResponseGetInventario->IVA ?>" required disabled="disabled">
							</div>
							<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
								<label for="Valor_total">Valor total</label><br>
								<input type="number" class="form-control" name="Valor_total" id="Valor_total" placeholder="Valor total" value="<?php echo $ResponseGetInventario->VALOR_TOTAL ?>" required disabled="disabled">
							</div>
							<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4 mb-4 text-center" >
								<p>* Si modificas el valor sin iva, el precio del Iva y valor total, se calculara automaticamente sobre el valor ingresado</p>
							</div>
							<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center" >
								<label for="Categoria">Categoria</label><br>
								<input type="text" class="form-control" name="Categoria" id="Categoria" placeholder="Categoria" value="<?php echo $ResponseGetInventario->CATEGORIA ?>" required>
							</div>
							<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 mt-4 text-center">
								<button class="btn azul actualizacion_inventario"  data-control-user="<?php echo $ResponseGetInventario->ID_INVENTARIO ?>" id="botonEditarInventario" >Actualizar</button>
							</div>
							<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 mt-4 text-center">
								<a href="?class=inventarios&method=Index" class="btn rojo" id="botonNoCrearInventario" >volver</a>
							</div>
						</div>
					</div>
				</section>
                <!-----------------------   FIN FORMULARIOS  ------------------------------------>
				<!-----------------------   INICIO BOTONES FINALES  ------------------------------------>
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" style="margin-top: 5%;" id="section_buttom_finaly">
					<div class="row">
						<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-right">
							<a href="?class=Inventarios&method=Index">
								<img src="Assets/img/izquierda.png">
							</a>
						</div>
						<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
							<a href="?class=Administrador&method=Index">
								<img src="Assets/img/casa.png">
							</a>
						</div>
						<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4"></div>
					</div>
				</div>
				<!-----------------------   FIN BOTONES FINALES  ------------------------------------>
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