<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Assets/img/icon.ico"/>
    <title>Crear usuarios</title>

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
        <section class="" id="section_forms">
            <div class="contenedorFormularioCrearUsuario" id="contenedorFormularioCrearUsuario">
                <h2 class="text-center" id="tituloCrearUsuario">Crear usuario</h2>
                <form mane="" action="?class=Usuario&method=insertCrearUsuario" method="POST">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
                            <label for="Primer_nombre">Primer Nombre</label><br>
                            <input type="text" class="form-control" name="Primer_nombre" id="Primer_nombre" placeholder="Primer nombre" value="" required>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
                            <label for="Segundo_nombre">Segundo Nombre</label><br>
                            <input type="text" class="form-control" name="Segundo_nombre" id="Segundo_nombre" placeholder="Segundo nombre" value="">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
                            <label for="Primer_apellido">Primer Apellido</label><br>
                            <input type="text" class="form-control" name="Primer_apellido" id="Primer_apellido" placeholder="Primer apellido" value="" required>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
                            <label for="Segundo_apellido">Segundo Apellido</label><br>
                            <input type="text" class="form-control" name="Segundo_apellido" id="Segundo_apellido" placeholder="Segundo apellido" value="">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
                            <label for="Tipo_documentoId_documento">Tipo de documento</label><br>
                            <select class="form-control" name="Tipo_documentoId_documento" id="Tipo_documentoId_documento" >
                                <?php foreach (TipoDocumento::getTipoDocumento() as $responseGetTipoDocumento){ ?>
                                    <option value="<?php echo $responseGetTipoDocumento->Id_documento ?>"><?php echo $responseGetTipoDocumento->Siglas ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
                            <label for="Numero_documento">Numero de documento</label><br>
                            <input type="number" class="form-control" name="Numero_documento" id="Numero_documento" placeholder="Numero de documento" value="" required>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
                            <label for="Edad">EDAD</label><br>
                            <input type="number" class="form-control" name="Edad" id="Edad" placeholder="Edad" value="" required onblur="generales.validarEdad();">
                        </div>
                        <br>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
                            <label for="Telefono">Telefono</label><br>
                            <input type="number" class="form-control" name="Telefono" id="Telefono" placeholder="Telefono" value="" required>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                            <label for="Direccion">Direccion</label><br>
                            <input type="text" class="form-control" name="Direccion" id="Direccion" placeholder="Direccion" value="" required>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                            <label for="Email">Correo</label><br>
                            <input type="email" class="form-control" name="Email" id="Email" placeholder="Correo electronico" value="" required>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                            <a href="">	
                                <button class="btn btn-primary" id="botonCrearUsuario" type="submit">Crear usuario</button>
                            </a>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                            <a href="?class=Usuario&method=Index" class="btn btn-danger" id="botonNoCrearUsuario" >Cancelar operacion</a>
                        </div>
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