<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Assets/img/icon.ico"/>
    <title>Administrador empleados</title> 

    <link rel="stylesheet" type="text/css" href="Assets/utils/bootstrap/bootstrap-5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/utils/dataTable/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/utils/dataTable/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/utils/fontawesome/fontawesome-free-6.1.2-web/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="Assets/utils/datetimepicker/jquery.datetimepicker.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/generalStyles.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/styles.css">
	<link rel="stylesheet" type="text/css" href="Assets/css/administrador.css">
	<link rel="stylesheet" type="text/css" href="Assets/css/acercadenosotros.css">
</head>
<body class="container-body container">
    
    <header class="header row" id="header">
        <?php include_once('Views/Layouts/headerAdmin.php') ?>
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
                        
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary accionEvento" data-bs-target="#modalCenter" data-bs-toggle="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-----------------------   FIN MODAL  ------------------------------------>
        <!-----------------------   INICIO TABLA CLIENTES  ------------------------------------>
        <section id="section_table">
            <h2>DATOS EMPLEADOS</h2>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="seccion_boton_crear_usuario">
                <div class="row">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-right">
                        <a href="?class=empleado&method=empleadoCrear">
                            <button type="button" class="btn btn-success">
                                Crear empleado <i class="fas fa-plus-circle"></i>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <table id="tabla_empleados" class="display responsive nowrap tabla-jquery">
                <thead> 
                    <tr style="color: #eb028b;">
                        <th>ID</th>
                        <th>NOMBRES</th>
                        <th>APELLIDOS</th>
                        <th>DOCUMENTO</th>
                        <th>TELEFONO</th>
                        <th>ROL</th>
                        <th>CARGO</th>							                        
                        <th>USUARIO_SISTEMA</th>
                        <th>CLAVE</th>
                        <th>ACCION</th>
                    </tr>
                </thead>
                <tbody id="body_tabla_clientes">  
                    <?php   foreach (parent::getEmpleados() as $responseGetClientes){ ?>
                                    
                        <tr>
                            <td><?php echo $responseGetClientes->ID_EMPLEADO ?></td>
                            <td><?php echo $responseGetClientes->NOMBRES ?></td>
                            <td><?php echo $responseGetClientes->APELLIDOS ?></td>
                            <td><?php echo $responseGetClientes->DOCUMENTO ?></td>
                            <td><?php echo $responseGetClientes->TELEFONO ?></td>
                            <td><?php echo $responseGetClientes->ROL ?></td>		
                            <td><?php echo $responseGetClientes->CARGO ?></td>					                            
                            <td><?php echo $responseGetClientes->USUARIO_SISTEMA ?></td>
                            <td><?php echo $responseGetClientes->CLAVE ?></td>
                            <td>
                                <a href="?class=empleado&method=empleadosVer&ID_EMPLEADO=<?php echo $responseGetClientes->ID_EMPLEADO ?>">
                                    <i class="fas fa-info color_orange" title="Ver empleado <?php echo $responseGetClientes->ID_EMPLEADO ?>"></i>
                                </a>
                                &nbsp;&nbsp;
                                <a href="?class=empleado&method=empleadosEditar&ID_EMPLEADO=<?php echo $responseGetClientes->ID_EMPLEADO ?>">
                                    <i class="fas fa-pencil-alt color_blue" title="Editar empleado <?php echo $responseGetClientes->ID_EMPLEADO ?>"></i>
                                </a>
                                &nbsp;&nbsp;
                                <i class="fas fa-trash-alt color_red btn-borrarEmpleado" title="Borrar empleado <?php echo $responseGetClientes->ID_EMPLEADO ?>" data-control-user=<?php echo $responseGetClientes->ID_EMPLEADO ?>></i>
                            </td>
                        </tr>
                        
                    <?php   } ?>             
                </tbody>
            </table>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="row">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-right">
                        <a href="?class=Usuario&method=Index">
                            <img src="Assets/img/izquierda.png">
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
                        <a href="?class=administrador&method=index">
                            <img src="Assets/img/casa.png">
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-left">
                    </div>
                </div>
            </div>		 
        </section>
        <!-----------------------   FIN TABLA CLIENTES  ------------------------------------>
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