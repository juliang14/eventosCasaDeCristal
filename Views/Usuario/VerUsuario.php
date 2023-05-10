<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Assets/img/icon.ico"/>
    <title>Ver usuario</title>

    <link rel="stylesheet" type="text/css" href="Assets/utils/bootstrap/bootstrap-5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/utils/dataTable/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/utils/dataTable/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/utils/fontawesome/fontawesome-free-6.1.2-web/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="Assets/utils/datetimepicker/jquery.datetimepicker.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/generalStyles.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/styles.css">
	<link rel="stylesheet" type="text/css" href="Assets/css/administrador.css">
	<link rel="stylesheet" type="text/css" href="Assets/css/administrador_eliminar_editar.css">
</head>
<body class="container-body container">
    
    <header class="header row" id="header">
        <?php include_once('Views/Layouts/headerAdmin.php') ?>
    </header>
    <main class="main row">
        <?php
            $Response = parent::getCliente($_GET['ID_USUARIO']);
        ?>
        <section class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="section_forms">
            <div class="contenedorFormularioVerUsuario" id="contenedorFormularioVerUsuario">
                <h2 class="text-center" id="tituloCrearUsuario">Ver usuario <?php echo $Response->ID_USUARIO ?></h2>
                <form >
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
                            <label for="verPrimer_nombre">Primer Nombre</label><br>
                            <input type="text" class="form-control" name="verPrimer_nombre" id="verPrimer_nombre" value="<?php echo $Response->PRIMER_NOMBRE ?>" disabled>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
                            <label for="verSegundo_nombre">Segundo Nombre</label><br>
                            <input type="text" class="form-control" name="verSegundo_nombre" id="verSegundo_nombre" value="<?php echo $Response->SEGUNDO_NOMBRE ?>" disabled>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
                            <label for="verPrimer_apellido">Primer Apellido</label><br>
                            <input type="text" class="form-control" name="verPrimer_apellido" id="verPrimer_apellido" value="<?php echo $Response->PRIMER_APELLIDO ?>" disabled>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
                            <label for="verSegundo_apellido">Segundo Apellido</label><br>
                            <input type="text" class="form-control" name="verSegundo_apellido" id="verSegundo_apellido" value="<?php echo $Response->SEGUNDO_APELLIDO ?>" disabled>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
                            <label for="verTipo_documentoId_documento">Tipo de documento</label><br>
                            <input type="text" class="form-control" name="verTipo_documentoId_documento" id="verTipo_documentoId_documento" value="<?php echo $Response->DOCUMENTO ?>" disabled>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
                            <label for="verNumero_documento">Numero de documento</label><br>
                            <input type="number" class="form-control" name="verNumero_documento" id="verNumero_documento" value="<?php echo $Response->NUMERO_DOCUMENTO ?>" disabled>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
                            <label for="verEdad">EDAD</label><br>
                            <input type="number" class="form-control" name="verEdad" id="verEdad" value="<?php echo $Response->EDAD ?>" disabled>
                        </div>
                        <br>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
                            <label for="verTelefono">Telefono</label><br>
                            <input type="number" class="form-control" name="verTelefono" id="verTelefono" value="<?php echo $Response->TELEFONO ?>" disabled>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                            <label for="verDireccion">Direccion</label><br>
                            <input type="text" class="form-control" name="verDireccion" id="verDireccion" value="<?php echo $Response->DIRECCION ?>" disabled>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                            <label for="verEmail">Correo</label><br>
                            <input type="email" class="form-control" name="verEmail" id="verEmail" value="<?php echo $Response->EMAIL ?>" disabled>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
                            <label for="verUsuarioSistema">Usuario sistema</label><br>
                            <input type="text" class="form-control" name="verUsuarioSistema" id="verUsuarioSistema" value="<?php echo $Response->USUARIO_SISTEMA ?>" disabled>
                        </div>
                        <br>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
                            <label for="verClave">Clave</label><br>
                            <input type="text" class="form-control" name="verClave" id="verClave" value="<?php echo $Response->CLAVE ?>" disabled>
                        </div>
                        <a class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-4 m-auto btn btn-danger" href="?class=Usuario&method=Index">
                            Volver
                        </a>
                    </div>
                </form>
            </div>
        </section>
        <section class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4" id="section_buttom_finaly">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-right">
                    <a href="?class=Usuario&method=Index">
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
        </section>
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
</body>
</html>