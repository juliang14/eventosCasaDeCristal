<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Assets/img/icon.ico"/>
    <title>Carrito</title>

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
        <!-- sections -->
        <section>
            <div class="contenedor-carrito">
                <h3 class="titulo-carrito">Carrito</h3>
                <?php if(!empty($_SESSION['Carrito'])){ ?>
                    <table class="table mt-4 text-center">
                        <thead class="thead-dark">
                            <tr class="table-danger">
                                <th scope="col">Descripcion</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Total</th>
                                <th scope="col">Accion</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php 
                                $total = 0;
                                $contador = 1; 
                                foreach($_SESSION['Carrito'] as $RespuestaCarrito){?>
                                <tr>
                                    <input type="hidden" class="text-center form-control" name="idPaquete" id="idPaquete-<?php echo $contador;?>" value="<?php echo $RespuestaCarrito['ID_PAQUETE']; ?>" required>
                                    <td><?php echo $RespuestaCarrito['TIPO_PAQUETE'];?></td>
                                    <td><?php echo $RespuestaCarrito['CANTIDAD'];?></td>
                                    <td><?php echo $RespuestaCarrito['VALOR_PAQUETE'];?></td>
                                    <td><?php echo intval($RespuestaCarrito['VALOR_PAQUETE'])*$RespuestaCarrito['CANTIDAD'];?></td>
                                    <td>
                                        <form action="" method="POST">
                                            <input type="hidden" name="idPaquete" id="idPaquete" value="<?php echo $RespuestaCarrito['ID_PAQUETE'];?>">
                                            <button class="" name="btnAccion" value="Eliminar" type="submit">
                                                <i class="fas fa-minus-circle i-rojo"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php $contador = $contador+1;
                                  $total = $total+(intval($RespuestaCarrito['VALOR_PAQUETE'])*$RespuestaCarrito['CANTIDAD']);
                                }?>
                            <tr>
                                <td colspan="3" class="text-right"><h4>Total</h4></td>
                                <td><?php echo $total;?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center mt-4 mb-4">
                                        <h4>Fecha de evento</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-right mb-4" >
                                            <label for="inputFechaInicioEvento">Fecha inicio evento</label><br>
                                            <input type="text" class="datepicker text-center form-control validacionFechas" name="inputFechaInicioEvento" id="inputFechaInicioEvento">
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-left mb-4">
                                            <label for="inputFechaFinEvento">Fecha fin evento</label><br>
                                            <input type="text" class="datepicker text-center form-control validacionFechas" name="inputFechaFinEvento" id="inputFechaFinEvento">
                                        </div>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center mt-4 mb-4">
                                        <h4>Ubicacion del evento</h4>
                                    </div>
                                    <div class="row">
                                        <input type="hidden" class="text-center form-control" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION['UserAutenticate']->ID_USUARIO; ?>" required>
                                        <input type="hidden" class="text-center form-control" name="inputValorPago" id="inputValorPago" value="<?php echo $total; ?>" required>
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-right m-auto" >
                                            <i class="fas fa-city"></i>
                                            <label for="inputCiudadEvento">Ciudad</label>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-right m-auto" >
                                            <input type="text" class="text-center form-control" name="inputCiudadEvento" id="inputCiudadEvento" required>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-right m-auto" >
                                            <i class="fas fa-home"></i>
                                            <label for="inputBarrioEvento">Barrio</label>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-left m-auto">
                                            <input type="text" class="text-center form-control" name="inputBarrioEvento" id="inputBarrioEvento" required>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-right m-auto" >
                                            <i class="fas fa-map-marker-alt"></i>
                                            <label for="inputDireccionEvento">Direccion</label>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-left m-auto">
                                            <input type="text" class="text-center form-control" name="inputDireccionEvento" id="inputDireccionEvento" required>
                                        </div>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="5"> 
                                    <button class="btn btn-primary col-sm-12 col-md-12 col-lg-12 col-xl-12" onClick="generarPago();" value="Pagar">Pagar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                <?php }else{?>
                    <div class="alert alert-success">
                        No hay productos en el carrito
                    </div>
                <?php }?>
                
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modalCenter" aria-hidden="true" aria-labelledby="modalCenterLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-dark text-light">
                            <h5 class="modal-title" id="exampleModalLongTitle">Importante</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="jumbotron text-center">
                                <h1 class="display-4"> Confirmación </h1>
                                <p class="lead">
                                    Estas apunto de realizar el pago a través de Paypal
                                    <hr class="my-4">
                                    <h4>$ <?php echo $total;?></h4>
                                    <div id="paypal-button"></div>
                                </p>
                                <hr class="my-4">
                                <p>Tu evento sera programado tan pronto se procese el pago.<br>
                                    <strong>#eventoscasadecristal</strong>
                                </p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary accionEvento" data-bs-target="#modalCenter" data-bs-toggle="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-----------------------   FIN MODAL  ------------------------------------>
        </section>
        <!-- end sections -->   
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
    <script type="text/javascript" src="Assets/utils/paypal/checkout.js"></script>
    <script type="text/javascript" src="Assets/utils/paypal/paypal.js"></script>
</body>
</html>