<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Assets/img/icon.ico"/>
    <title>Editar usuario</title>

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
                <h2 class="text-center" id="tituloCrearUsuario">Editar usuario <?php echo $Response->ID_USUARIO ?></h2>
                <form mane="" action="?class=Usuario&method=updateUsuario" method="POST">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center ocultar" >
                            <input type="number" class="form-control" name="Id_usuario" id="Id_usuario" value="<?php echo $Response->ID_USUARIO ?>">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
                            <label for="Primer_nombre">Primer Nombre</label><br>
                            <input type="text" class="form-control" name="Primer_nombre" id="Primer_nombre" value="<?php echo $Response->PRIMER_NOMBRE ?>">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
                            <label for="Segundo_nombre">Segundo Nombre</label><br>
                            <input type="text" class="form-control" name="Segundo_nombre" id="Segundo_nombre" value="<?php echo $Response->SEGUNDO_NOMBRE ?>">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
                            <label for="Primer_apellido">Primer Apellido</label><br>
                            <input type="text" class="form-control" name="Primer_apellido" id="Primer_apellido" value="<?php echo $Response->PRIMER_APELLIDO ?>">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
                            <label for="Segundo_apellido">Segundo Apellido</label><br>
                            <input type="text" class="form-control" name="Segundo_apellido" id="Segundo_apellido" value="<?php echo $Response->SEGUNDO_APELLIDO ?>">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
                            <label for="Tipo_documentoId_documento">Tipo de documento</label><br>
                            <select class="form-control" name="Tipo_documentoId_documento" id="Tipo_documentoId_documento" >
                                <option value="<?php echo $Response->DOCUMENTO ?>"><?php echo $Response->DOCUMENTO ?></option>
                                <?php foreach (TipoDocumento::getTipoDocumento() as $responseGetTipoDocumento){ ?>
                                    <option value="<?php echo $responseGetTipoDocumento->Siglas ?>"><?php echo $responseGetTipoDocumento->Siglas ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
                            <label for="Numero_documento">Numero de documento</label><br>
                            <input type="number" class="form-control" name="Numero_documento" id="Numero_documento" value="<?php echo $Response->NUMERO_DOCUMENTO ?>">
                            
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
                            <label for="Edad">EDAD</label><br>
                            <input type="number" class="form-control" name="Edad" id="Edad" value="<?php echo $Response->EDAD ?>">
                        </div>
                        <br>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
                            <label for="Telefono">Telefono</label><br>
                            <input type="number" class="form-control" name="Telefono" id="Telefono" value="<?php echo $Response->TELEFONO ?>" >
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                            <label for="Direccion">Direccion</label><br>
                            <input type="text" class="form-control" name="Direccion" id="Direccion" value="<?php echo $Response->DIRECCION ?>" >
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                            <label for="Email">Correo</label><br>
                            <input type="email" class="form-control" name="Email" id="Email" value="<?php echo $Response->EMAIL ?>" >
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-5 text-center">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <button class="btn azul" type="submit">Actualizar</button>
                                </div>
                            </div>
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