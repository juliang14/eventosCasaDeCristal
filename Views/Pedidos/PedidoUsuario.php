<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Assets/img/icon.ico"/>
    <title>Usuario pedidos</title>

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
        <section class="seccion-pedidos-usuario">
            <div class="contenedor-pedidos-usuario">
                <h2>Informacion de pedidos</h2>
                <div class="row">
                    <?php if(!empty(Pedidos::getPedidoUsuario($_SESSION['UserAutenticate']->ID_USUARIO))){ ?>
                        <?php foreach(Pedidos::getPedidoUsuario($_SESSION['UserAutenticate']->ID_USUARIO) as $ResponseGetPedidosUsuario){ ?>
                            <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9 m-auto pt-4 pb-4 table-responsive">
                                <table class="table contenedorPedidos table-hover cajas-pedidos">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center font-italic table-danger" colspan="4"> 
                                                Pedido <?php echo $ResponseGetPedidosUsuario->ID_PEDIDO; ?>
                                            </th>
                                        </tr>
                                        <tr>
                                            <?php if($ResponseGetPedidosUsuario->ESTADO == 'Realizado'){?>
                                                <th scope="col" class="text-center text-success" colspan="4"> 
                                                    <i class="fas fa-check text-success"> </i> 
                                                    <?php echo $ResponseGetPedidosUsuario->ESTADO; ?>
                                                </th>
                                            <?php }else if($ResponseGetPedidosUsuario->ESTADO == 'Por realizar'){?>
                                                <th scope="col" class="text-center text-warning" colspan="4"> 
                                                    <i class="fas fa-info color_orange" title="Ver pedido 3"> </i> 
                                                    <?php echo $ResponseGetPedidosUsuario->ESTADO; ?>
                                                </th>
                                            <?php }else if($ResponseGetPedidosUsuario->ESTADO == 'Cancelado'){?>
                                                <th scope="col" class="text-center text-danger" colspan="4"> 
                                                    <i class="fas fa-trash-alt text-danger"> </i> 
                                                    <?php echo $ResponseGetPedidosUsuario->ESTADO; ?>
                                                </th>
                                            <?php }else{?>
                                                <p class="text-center"> <?php echo $ResponseGetPedidosUsuario->ESTADO; ?> </p>
                                                <th scope="col" class="text-center" colspan="4"> 
                                                    <?php echo $ResponseGetPedidosUsuario->ESTADO; ?>
                                                </th>
                                            <?php }?>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        <tr>
                                            <th class="text-right" cope="col" colspan="1">
                                                <i class="fas fa-glass-cheers"></i>
                                            </th>
                                            <th scope="col" colspan="1">
                                                <strong>Evento:</strong> 
                                            </th>
                                            <td scope="col" colspan="2">
                                                <?php echo $ResponseGetPedidosUsuario->EVENTO; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-right" cope="col" colspan="1">
                                                <i class="fas fa-cubes"></i>
                                            </th>
                                            <th scope="col" colspan="1">
                                                <strong>Paquete:</strong> 
                                            </th>
                                            <td scope="col" colspan="2">
                                                <?php echo $ResponseGetPedidosUsuario->PAQUETE; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-right" cope="col" colspan="1">
                                                <i class="fas fa-dollar-sign"></i>
                                            </th>
                                            <th scope="col" colspan="1">
                                                <strong>Valor:</strong> 
                                            </th>
                                            <td scope="col" colspan="2">
                                                <?php echo $ResponseGetPedidosUsuario->VALOR_PAQUETE; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-right" cope="col" colspan="1">
                                                <i class="fas fa-city"></i>
                                            </th>
                                            <th scope="col" colspan="1">
                                                <strong>Ciudad:</strong> 
                                            </th>
                                            <td scope="col" colspan="2">
                                                <?php echo $ResponseGetPedidosUsuario->CIUDAD_EVENTO; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-right" cope="col" colspan="1">
                                                <i class="fas fa-home"></i>
                                            </th>
                                            <th scope="col" colspan="1">
                                                <strong>Barrio:</strong> 
                                            </th>
                                            <td scope="col" colspan="2">
                                                <?php echo $ResponseGetPedidosUsuario->BARRIO_EVENTO; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-right" cope="col" colspan="1">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </th>
                                            <th scope="col" colspan="1">
                                                <strong>Direccion:</strong> 
                                            </th>
                                            <td scope="col" colspan="2">
                                                <?php echo $ResponseGetPedidosUsuario->DIRECCION_EVENTO; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-right" cope="col" colspan="1">
                                                <i class="fas fa-calendar-alt"></i>
                                            </th>
                                            <th scope="col" colspan="1">
                                                <strong>Fecha inicio evento:</strong> 
                                            </th>
                                            <td scope="col" colspan="2">
                                                <?php echo $ResponseGetPedidosUsuario->FECHA_INICIO_EVENTO; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-right" cope="col" colspan="1">
                                                <i class="fas fa-calendar-alt"></i>
                                            </th>
                                            <th scope="col" colspan="1">
                                                <strong>Fecha fin evento:</strong> 
                                            </th>
                                            <td scope="col" colspan="2">
                                                <?php echo $ResponseGetPedidosUsuario->FECHA_FIN_EVENTO; ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        <?php } ?>
                    <?php }else{?>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center m-auto pt-4 pb-4">
                            <div class="alert alert-success">
                                No tienes pedidos en el momento
                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade bd-example-modal-lg accionEvento" id="modalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" onclick="">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="exampleModalLongTitle">Importante</h5>
                    <button type="button" class="close accionEvento" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary accionEvento" data-dismiss="modal" onclick="">Cerrar</button>
                    <!--button type="button" class="btn btn-primary">Save changes</button-->
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
</body>
</html>