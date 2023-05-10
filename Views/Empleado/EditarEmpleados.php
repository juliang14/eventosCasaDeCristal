<html>
<head>
	<title>
		Editar usuario empleado
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
				<?php
					$Response = parent::getEmpleado($_GET['ID_EMPLEADO']);
				?>
				<!-----------------------   INICIO FORMULARIOS  ------------------------------------>
				<section class="" id="section_forms">
					<div class="contenedorFormularioVerEmpleado" id="contenedorFormularioVerEmpleado">
						<h2 class="text-center" id="tituloVerEmpleado">Editar  empleado <?php echo $Response->ID_EMPLEADO ?></h2>
						<form mane="" action="?class=empleado&method=updateEmpleado" method="POST">
							<div class="row">
								<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center ocultar" >
									<input type="number" class="form-control" name="Id_empleado" id="Id_empleado" value="<?php echo $Response->ID_EMPLEADO ?>">
								</div>
							    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center mt-3" >
									<label for="Primer_nombre">Primer Nombre</label><br>
									<input type="text" class="form-control" name="Primer_nombre" id="Primer_nombre" placeholder="Primer nombre" value="<?php echo $Response->PRIMER_NOMBRE ?>">
								</div>
								<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center mt-3" >
									<label for="Segundo_nombre">Segundo Nombre</label><br>
									<input type="text" class="form-control" name="Segundo_nombre" id="Segundo_nombre" placeholder="Segundo nombre" value="<?php echo $Response->SEGUNDO_NOMBRE ?>">
								</div>
								<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center mt-3" >
									<label for="Primer_apellido">Primer Apellido</label><br>
									<input type="text" class="form-control" name="Primer_apellido" id="Primer_apellido" placeholder="Primer apellido" value="<?php echo $Response->PRIMER_APELLIDO ?>">
								</div>
								<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center mt-3" >
									<label for="Segundo_apellido">Segundo Apellido</label><br>
									<input type="text" class="form-control" name="Segundo_apellido" id="Segundo_apellido" placeholder="Segundo apellido" value="<?php echo $Response->SEGUNDO_APELLIDO ?>">
								</div>
								<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center mt-3" >
									<label for="Tipo_documentoId_documento">Tipo de documento</label><br>
									<select class="form-control" name="Tipo_documentoId_documento" id="Tipo_documentoId_documento">
										<option value="<?php echo $Response->DOCUMENTO ?>"><?php echo $Response->DOCUMENTO ?></option>
										<?php foreach (TipoDocumento::getTipoDocumento() as $responseGetTipoDocumento){ ?>
											<option value="<?php echo $responseGetTipoDocumento->Siglas ?>"><?php echo $responseGetTipoDocumento->Siglas ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center mt-3" >
									<label for="Numero_documento">Numero de documento</label><br>
									<input type="number" class="form-control" name="Numero_documento" id="Numero_documento" placeholder="Numero de documento" value="<?php echo $Response->NUMERO_DOCUMENTO ?>">
								</div>
								<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center mt-3" >
									<label for="CargoId_cargo">Cargo empleado</label><br>
									<select class="form-control" name="CargoId_cargo" id="CargoId_cargo">
										<option value="<?php echo $Response->CARGO ?>"><?php echo $Response->CARGO ?></option>
										<?php foreach (Cargo::getCargos() as $responseGetCargos){ ?>
											<option value="<?php echo $responseGetCargos->Nombre_de_cargo ?>"><?php echo $responseGetCargos->Nombre_de_cargo ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center mt-3" >
									<label for="Edad">EDAD</label><br>
									<input type="number" class="form-control" name="Edad" id="Edad" placeholder="Edad" value="<?php echo $Response->EDAD ?>" required onblur="generales.validarEdad();">
								</div>
								<br>
								<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center mt-3" >
									<label for="Telefono">Telefono</label><br>
									<input type="number" class="form-control" name="Telefono" id="Telefono" placeholder="Telefono" value="<?php echo $Response->TELEFONO ?>">
								</div>
								<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center mt-3">
									<label for="Direccion">Direccion</label><br>
									<input type="text" class="form-control" name="Direccion" id="Direccion" placeholder="Direccion" value="<?php echo $Response->DIRECCION ?>">
								</div>
								<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center mt-3">
									<label for="Email">Correo</label><br>
									<input type="email" class="form-control" name="Email" id="Email" placeholder="Correo electronico" value="<?php echo $Response->EMAIL ?>">
								</div>
								<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center mt-3" >
									<label for="RolId_rol">Rol empleado</label><br>
									<select class="form-control" name="RolId_rol" id="RolId_rol">
										<option value="<?php echo $Response->ROL ?>"><?php echo $Response->ROL ?></option>
										<?php foreach (Roles::getRoles() as $responseGetRolId_rol){ ?>
											<option value="<?php echo $responseGetRolId_rol->Nombre_rol ?>"><?php echo $responseGetRolId_rol->Nombre_rol ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center mt-5">
								    <a href="">	
								    	<button class="btn btn-primary" id="botonEditarEmpleado" type="submit">Actualizar empleado</button>
							    	</a>
							    </div>
							    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center mt-5">
								    <a href="?class=empleado&method=index" class="btn btn-danger" id="" >Cancelar operacion</a>
							    </div>
							</div>
						</form>
					</div>
				</section>
				<!-----------------------   FIN FORMULARIOS  ------------------------------------>	
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" style="margin-top: 5%;">
					<div class="row">
						<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-right">
							<a href="?class=empleado&method=index">
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