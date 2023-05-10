<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Assets/img/icon.ico"/>
    <title>Recuperacion de clave</title>

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
            <div class="contenedorFormularioRecuperarClave" id="contenedorFormularioRecuperarClave">
                <h2 class="text-center" id="tituloCrearUsuario">Recuperar clave</h2>
                <form class="" mane="" action="" method="POST" id="formulario_crearUsuario">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-left seccion mt-4">
                        <p>* Enviaremos tus datos de ingreso al correo registrado.</p>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center seccion">
                        <label for="Email">Correo</label><br>
                        <input type="email" class="form-control" name="Email" id="Email" placeholder="Correo electronico" value="" required>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="row centrar">
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 seccion text-right" id="">
                                <a type="text" class="btn btn-success" name="RecuperarClave" id='RecuperarClave' onClick="recuperarClave('<?php echo $_GET['tipo']?>');">RecuperarClave</a>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 seccion text-left" id="">
                                <a href="?class=index&method=index">
                                    <input type="text" class="btn btn-danger" name="Cancelar" value="Cancelar">
                                </a>
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
</body>
</html>