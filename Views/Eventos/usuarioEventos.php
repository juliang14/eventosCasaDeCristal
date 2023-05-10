<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Assets/img/icon.ico"/>
    <title>Usuario Eventos</title>

    <link rel="stylesheet" type="text/css" href="Assets/utils/bootstrap/bootstrap-5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/utils/dataTable/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/utils/dataTable/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/utils/fontawesome/fontawesome-free-6.1.2-web/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="Assets/utils/datetimepicker/jquery.datetimepicker.css">
    <link rel="stylesheet" type="text/css" href="assets/css/generalStyles.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/styles.css">
	<link rel="stylesheet" type="text/css" href="Assets/css/usuario.css">
	<link rel="stylesheet" type="text/css" href="Assets/css/eventos.css">
</head>
<body class="container-body container">
    
    <header class="header row" id="header">
        <?php include_once('Views/Layouts/headerUsuario.php') ?>
    </header>
    <main class="main row">
        <!-- Modal -->
        <div class="modal fade" id="modalCenter" aria-hidden="true" aria-labelledby="modalCenterLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-light">
                        <h5 class="modal-title" id="exampleModalLongTitle">Importante</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-sm-12 col-md-10 col-lg-10 col-xl-10 m-auto" id="caja-paquete">
                            <?php foreach(Eventos::getEventos() AS $CantidadEventos){ ?>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center m-auto contenCajaEvento ocultar" id="idEvento<?php echo $CantidadEventos->ID_EVENTO; ?>">
                                    <div class="row">
                                        <?php foreach(Paquetes::getEventoPaquete($CantidadEventos->TIPO_DE_EVENTO) AS $ResponseGetEventoPaquete){ ?>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center m-auto pt-4">
                                                <form action="" method="POST">
                                                    <div class="contenedorPaquetes cajas-paquetes" id-paquete="<?php echo $ResponseGetEventoPaquete->ID_PAQUETE; ?>">
                                                        <h3 class="font-italic pl-2 pr-2">PLAN TODO INCLUIDO <?php echo $ResponseGetEventoPaquete->CANTIDAD_PERSONAS; ?> PERSONAS</h3>
                                                        <br>
                                                        <h1 class="text-danger">$<?php echo $ResponseGetEventoPaquete->VALOR_TOTAL; ?></h1>
                                                        <input type="hidden" name="valorPaquete" id="valorPaquete" value="<?php echo $ResponseGetEventoPaquete->VALOR_TOTAL; ?>">
                                                        <br>
                                                        <h5>NUESTRO PLAN INCLUYE</h5>
                                                        <br>
                                                        <ul class="text-muted p-0 mb-4 text-left">
                                                            <?php foreach(Paquetes::getPaquete($ResponseGetEventoPaquete->ID_PAQUETE) AS $ResponseGetPaquete){ ?>
                                                                <li><?php echo $ResponseGetPaquete->INVENTARIO; ?></li>
                                                            <?php } ?>
                                                        </ul>
                                                        <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10 text-center ml-auto mr-auto mb-1 nombre-paquete">
                                                            <?php echo $ResponseGetEventoPaquete->TIPO_DE_PAQUETE; ?>
                                                            <input type="hidden" name="tipoPaquete" id="tipoPaquete" value="<?php echo $ResponseGetEventoPaquete->TIPO_DE_PAQUETE; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                                                        <input type="hidden" name="idPaquete" id="idPaquete" value="<?php echo $ResponseGetEventoPaquete->ID_PAQUETE; ?>">
                                                        <input type="hidden" name="cantidad" id="cantidad" value="1">
                                                        <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit"> Comprar </button>
                                                    </div>
                                                </form>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>	
                            <?php } ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary accionEvento" data-bs-target="#modalCenter" data-bs-toggle="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mensaje carrito de compras -->
        <?php if($mensaje!=''){ ?>
            <div class="alert alert-success alert-dismissible mt-2" role="alert" id="mensajeCarritoCompra">
                <div class="contenedor-caja1">
                    <strong><?php echo $mensaje; ?></strong>
                    <a href="?class=Carrito&method=index" class="btn btn-success"> ver carrito</a>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php }?>
        <?php if($mensajeError!=''){ ?>
            <div class="alert alert-danger alert-dismissible mt-2" role="alert" id="mensajeCarritoCompra">
                <div class="contenedor-caja1">
                    <strong><?php echo $mensajeError; ?></strong>
                    <a href="?class=Carrito&method=index" class="btn btn-success"> ver carrito</a>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php }?>
        <!-- ************************** -->
        <!-----------------------   FIN MODAL  ------------------------------------>
        <section>
            <div class="container-fluid" id="contenidoEventos">
                <div class="row">
                    <div class="col-lg-12 contenedor-eventos" id="eventos">
                        <div class="row p-4 m-4">
                            <?php foreach(Eventos::getEventos() AS $ResponseGetEventos){ ?>
                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center cajas-eventos">
                                    <div class="row">
                                        <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 m-auto">
                                            <p><?php echo $ResponseGetEventos->TIPO_DE_EVENTO; ?></p>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4 pb-4">
                                            <img src="Files/img/<?php echo $ResponseGetEventos->IMAGEN; ?>" width="200px" height="200px" class=" seleccionarEventoHome" evento="<?php echo $ResponseGetEventos->TIPO_DE_EVENTO; ?>" idevento="idEvento<?php echo $ResponseGetEventos->ID_EVENTO; ?>">
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
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