<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Assets/img/icon.ico"/>
    <title>Administrador paquetes</title>

    <link rel="stylesheet" type="text/css" href="Assets/utils/bootstrap/bootstrap-5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/utils/dataTable/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/utils/dataTable/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/utils/fontawesome/fontawesome-free-6.1.2-web/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="Assets/utils/datetimepicker/jquery.datetimepicker.css">
    <link rel="stylesheet" type="text/css" href="assets/css/generalStyles.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/admin.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/usuario.css">
</head>
<body class="container-body container">
    
    <header class="header row" id="header">
        <?php include_once('Views/Layouts/headerAdmin.php') ?>
    </header>
    <main class="main row"> 
        <!-- sections -->
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-5 mb-5 text-center blanco">
            <h1 class="tittle-evento">Selecciona una opcion</h1>
        </div>
        <section class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 p-0 m-auto contenedor-eventos-paquetes bg-dark">
            <div class="row m-0">
                <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1 text-center"></div>
                <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5 pt-5 pb-5 text-center" id="">
                    <button class="bubbly-button" onClick="controlMenuSeccionEventos(1);"><i class="fas fa-th icon-btn-evento"></i>EVENTOS</button>
                </div>
                <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5 pt-5 pb-5 text-center" id="">
                    <button class="bubbly-button" onClick="controlMenuSeccionEventos(2);"><i class="fas fa-th-large icon-btn-evento"></i>PAQUETES</button>
                </div>
                <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1 text-center"></div>
            </div>
        </section>
        <section class="center seccion-cajas-eventos ocultar">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-5 mb-5 text-center">
                <h2 class="titulo-paquetes">Eventos</h2>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 contenedor-eventos" id="contenedor-eventos">
                    <div class="row">
                        <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                        </div>
                        <div class="col-sm-12 col-md-10 col-lg-10 col-xl-10" id="caja-paquete">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-right mb-4">
                                <a href="?class=Eventos&method=crearEventos">
                                    <button class="btn btn-success evento-crear" > Agregar  <i class="fas fa-plus add"></i></button>
                                </a>
                            </div>
                            <div class="row">
                                <?php foreach(Eventos::getEventos() AS $ResponseGetEventos){ ?>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-5 text-center" id="eventos">
                                        <div class="row">
                                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10 m-auto">
                                                <p><?php echo $ResponseGetEventos->TIPO_DE_EVENTO; ?></p>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4">
                                                <img src="Files/img/<?php echo $ResponseGetEventos->IMAGEN; ?>" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-4">
                                                <a href="?class=Eventos&method=editarEventos&tipo_de_evento=<?php echo $ResponseGetEventos->TIPO_DE_EVENTO; ?>">
                                                    <button class="btn btn-primary w-100">Editar</button>
                                                </a>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-4">
                                                <button class="btn btn-danger w-100" onclick="borrarEvento(1,'<?php echo $ResponseGetEventos->TIPO_DE_EVENTO; ?>');">Eliminar</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
        <section class="center seccion-cajas-paquetes ocultar">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-5 mb-5 text-center">
                <h2 class="titulo-paquetes">Paquetes</h2>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="row">
                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        </div>
                        <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8" style="padding: 0;">
                            <nav class="navbar navbar-expand-lg bg-light">
                                <div class="container-fluid">
                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 m-auto border-gris">
                                            <?php foreach(Eventos::getEventos() AS $ResponseGetEventos){ ?>
                                            <li class="nav-item">
                                                <a class="nav-link seleccionarEvento" evento="<?php echo $ResponseGetEventos->TIPO_DE_EVENTO; ?>" idevento="idEvento<?php echo $ResponseGetEventos->ID_EVENTO; ?>"><?php echo $ResponseGetEventos->TIPO_DE_EVENTO; ?></a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="contenedor-tabla-paquetes">
                    <div class="row">
                        <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                        </div>
                        <div class="col-sm-12 col-md-10 col-lg-10 col-xl-10" id="caja-paquete">
                            <?php foreach(Eventos::getEventos() AS $CantidadEventos){ ?>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center m-auto contenCajaEvento ocultar" id="idEvento<?php echo $CantidadEventos->ID_EVENTO; ?>">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-right mb-4">
                                        <a href="?class=paquetes&method=crearPaquete&tipo_de_evento=<?php echo $CantidadEventos->TIPO_DE_EVENTO ?>">
                                            <button class="btn btn-success evento-crear" evento-crear="<?php echo $CantidadEventos->TIPO_DE_EVENTO; ?>"> Agregar  <i class="fas fa-plus add"></i></button>
                                        </a>
                                    </div>
                                    <div class="row">
                                        <?php foreach(Paquetes::getEventoPaquete($CantidadEventos->TIPO_DE_EVENTO) AS $ResponseGetEventoPaquete){ ?>
                                            <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5 text-center m-auto pt-4">
                                                <div class="contenedorPaquetes cajas-paquetes" id-paquete="<?php echo $ResponseGetEventoPaquete->ID_PAQUETE; ?>">
                                                    <h3 class="font-italic pl-2 pr-2">PLAN TODO INCLUIDO <?php echo $ResponseGetEventoPaquete->CANTIDAD_PERSONAS; ?> PERSONAS</h3>
                                                    <br>
                                                    <h1 class="text-danger">$<?php echo $ResponseGetEventoPaquete->VALOR_TOTAL; ?></h1>
                                                    <br>
                                                    <h5>NUESTRO PLAN INCLUYE</h5>
                                                    <br>
                                                    <ul class="text-muted mb-4 text-left">
                                                        <?php foreach(Paquetes::getPaquete($ResponseGetEventoPaquete->ID_PAQUETE) AS $ResponseGetPaquete){ ?>
                                                            <li><?php echo $ResponseGetPaquete->INVENTARIO; ?></li>
                                                        <?php } ?>
                                                    </ul>
                                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center ml-auto mr-auto mb-1 nombre-paquete">
                                                        <?php echo $ResponseGetEventoPaquete->TIPO_DE_PAQUETE; ?>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-1">
                                                        <a href="?class=paquetes&method=editarPaquetes&tipo_de_paquete=<?php echo $ResponseGetEventoPaquete->TIPO_DE_PAQUETE; ?>">
                                                            <button class="btn btn-primary w-100">Editar</button>
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-1">
                                                        <a onClick="eliminarPaquete('<?php echo $ResponseGetEventoPaquete->TIPO_DE_PAQUETE; ?>');">	
                                                            <button class="btn btn-danger w-100">Eliminar</button>
                                                        </a>	
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>	
                            <?php } ?>
                        </div>
                        <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
        <section class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 m-auto mt-4 mb-4 pt-4 pb-4">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="row">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 text-right">
                        <a href="?class=administrador&method=index">
                            <img src="Assets/img/izquierda.png">
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 text-center">
                        <a href="?class=administrador&method=index">
                            <img src="Assets/img/casa.png">
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 text-left">
                    </div>
                </div>
            </div>
        </section>
        <!-- end sections -->   
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