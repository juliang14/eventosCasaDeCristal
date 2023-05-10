<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Assets/img/icon.ico"/>
    <title>Formulario de registro</title>

    <link rel="stylesheet" type="text/css" href="Assets/utils/bootstrap/bootstrap-5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/utils/dataTable/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/utils/dataTable/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/utils/fontawesome/fontawesome-free-6.1.2-web/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="Assets/utils/datetimepicker/jquery.datetimepicker.css">
    <link rel="stylesheet" type="text/css" href="assets/css/generalStyles.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/formularios.css">
</head>
<body class="container-body container">
    
    <header class="header row" id="header">
        <?php include_once('Views/Layouts/headerSecurity.php') ?>
    </header>
    <main class="main row m-auto">
        <!-- sections -->
        <section class="" id="section_forms">
            <div class="contenedorFormularioCrearUsuario" id="contenedorFormularioCrearUsuario">
                <h2 class="text-center" id="tituloCrearUsuario">Formulario de registro</h2>
                <form mane="" action="" method="POST" id="formulario_registrousuario">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center seccion" >
                            <label for="Primer_nombre">Primer Nombre</label><br>
                            <input type="text" class="form-control" name="Primer_nombre" id="Primer_nombre" placeholder="Primer nombre" value="" required>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center seccion" >
                            <label for="Segundo_nombre">Segundo Nombre</label><br>
                            <input type="text" class="form-control" name="Segundo_nombre" id="Segundo_nombre" placeholder="Segundo nombre" value="">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center seccion" >
                            <label for="Primer_apellido">Primer Apellido</label><br>
                            <input type="text" class="form-control" name="Primer_apellido" id="Primer_apellido" placeholder="Primer apellido" value="" required>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center seccion" >
                            <label for="Segundo_apellido">Segundo Apellido</label><br>
                            <input type="text" class="form-control" name="Segundo_apellido" id="Segundo_apellido" placeholder="Segundo apellido" value="">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center seccion" >
                            <label for="Tipo_documentoId_documento">Tipo de documento</label><br>
                            <select class="form-control" name="Tipo_documentoId_documento" id="Tipo_documentoId_documento" >
                                <option value="">Selecciona un valor</option>
                                <?php foreach (TipoDocumento::getTipoDocumento() as $responseGetTipoDocumento){ ?>
                                    <option value="<?php echo $responseGetTipoDocumento->Id_documento ?>"><?php echo $responseGetTipoDocumento->Siglas ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center seccion" >
                            <label for="Numero_documento">Numero de documento</label><br>
                            <input type="number" class="form-control" name="Numero_documento" id="Numero_documento" placeholder="Numero de documento" value="" required>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center seccion" >
                            <label for="Edad">EDAD</label><br>
                            <input type="number" class="form-control" name="Edad" id="Edad" placeholder="Edad" value="" required onblur="generales.validarEdad();">
                        </div>
                        <br>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center seccion" >
                            <label for="Telefono">Telefono</label><br>
                            <input type="number" class="form-control" name="Telefono" id="Telefono" placeholder="Telefono" value="" required>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center seccion">
                            <label for="Direccion">Direccion</label><br>
                            <input type="text" class="form-control" name="Direccion" id="Direccion" placeholder="Direccion" value="" required>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center seccion">
                            <label for="Email">Correo</label><br>
                            <input type="email" class="form-control" name="Email" id="Email" placeholder="Correo electronico" value="" required>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 centrar seccion">
                            <input type="checkbox" name="" id="input_aceptar_TyC">
                            <label onClick="cargarTyC();" id="aceptar_TyC">Aceptar terminos y condiciones</label>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="row centrar">
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 seccion" id="">
                                    <a>
                                        <input type="text" class="btn btn-success" name="Registrarse" value="Registrarse" id='Registrarse' onClick="registrarCliente();">
                                    </a>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 seccion" id="">
                                    <a class="col-sm-12 col-md-12 col-lg-12 col-xl-12 btn btn-danger" href="?class=index&method=index">
                                        Cancelar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- end sections -->   

        <!-- Modal -->
        <div class="modal fade" id="modalCenter" aria-hidden="true" aria-labelledby="modalCenterLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-light">
                        <h5 class="modal-title" id="exampleModalLongTitle">Importante</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary accionEvento" data-bs-target="#modalCenter" data-bs-toggle="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-----------------------   FIN MODAL  ------------------------------------>
    </main>
    <footer class="footer row">
        <?php include_once('Views/Layouts/footer.php') ?>
    </footer>

    <script type="text/javascript" src="Assets/js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="Assets/utils/dataTable/js/jquery.dataTables.min.js" ></script>
    <script type="text/javascript" src="Assets/utils/dataTable/js/dataTables.responsive.min.js" ></script>	
	<script type="text/javascript" src="Assets/utils/tether/js/tether.min.js"></script>
    <script type="text/javascript" src="Assets/utils/bootstrap/bootstrap-5.2.0/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="Assets/utils/maskMoney/js/jquery.maskMoney.js"></script>
	<script type="text/javascript" src="Assets/utils/datetimepicker/jquery.datetimepicker.full.min.js"></script>
	<script type="text/javascript" src="Assets/js/generales.js"></script>
    <script type="text/javascript">
		function cargarTyC(){
			var terminos = `<div>
								Los Términos y Condiciones, también denominados como Condiciones Generales de Uso, son un documento 
								diseñado para aquellas personas que van a crear o administrar una página o sitio web, en el cual se 
								establecen las condiciones bajo las cuales los usuarios ingresarán y harán uso del sitio web.<br><br>

								El documento se encuentra diseñado para sitios que sean operados o manejados por personas o empresas 
								que tengan su domicilio en la República Mexicana o que estén destinados a personas que habitan en 
								este país, no obstante, su contenido hace referencia a disposiciones civiles comunes en la mayoría 
								de los países del mundo.<br><br>

								Este documento es utilizado para regular las condiciones y reglas a las que se someten tanto los 
								usuarios de un sitio web como su propietario y/o administrador, en lo referente al acceso y 
								utilización del sitio web. De igual manera, hace referencia a las políticas de privacidad, protección 
								de datos personales, enlaces, etc., que se tomarán para proteger la privacidad de los usuarios.<br><br>

								Dichas reglas y principios aportan un mayor nivel de confianza y seguridad jurídica a los usuarios 
								del sitio web así como a sus propietarios y/o administradores, puesto que también se establece el 
								tipo de personas a las que va dirigido y las responsabilidades que estos adquieren al hacer uso del 
								sitio o de los servicios que en él son ofrecidos.<br><br>

								Existe además otro documento conocido generalmente como "Condiciones Generales de Venta" que se utiliza 
								para regular la adquisición de productos o servicios a través de internet, no obstante, este último no 
								debe ser confundido con el presente documento, puesto que el presente solo se limita a regular el acceso, 
								funcionamiento e interacción del usuario con el sitio web, sin que se incluya las condiciones bajo las 
								cuales se formalizará la adquisición de productos o servicios que tengan un costo o que requieran una 
								licencia; y que se puedan obtener o adquirir a través del mismo sitio web.<br><br>
							</div>`;
			$('#exampleModalLongTitle').html('');
			$('#exampleModalLongTitle').html('Tèrminos y condiciones');
			$('.modal-body').html('');
			$('.modal-body').html(terminos);
			$('#modalCenter').modal('show');
		}
	</script>
</body>
</html>