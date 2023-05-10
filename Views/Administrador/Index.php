<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Assets/img/icon.ico"/>
    <title>Administrador</title>

    <link rel="stylesheet" type="text/css" href="Assets/utils/bootstrap/bootstrap-5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/utils/dataTable/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/utils/dataTable/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/utils/fontawesome/fontawesome-free-6.1.2-web/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="Assets/utils/datetimepicker/jquery.datetimepicker.css">
    <link rel="stylesheet" type="text/css" href="assets/css/generalStyles.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/usuario.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/admin.css">
    
</head>
<body class="container-body container">
    <?php
		$Response = Administrador::getInicioAdminCantidad();
	?>
    <header class="header row" id="header">
        <?php include_once('Views/Layouts/headerAdmin.php') ?>
    </header>
    <main class="main row">   
        <!-- sections -->
        <section class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 m-auto mt-4 mb-4 pt-4 pb-4">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 text-center content-menu">
					<div class="row">
						<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4"></div>
						<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 cantidad item-menu-admin" id="num-empleados">
							<p id="Cantidad-empleados">Cantidad de empleados <strong class="datosCantidades">
                                <?php echo $Response->CANTIDAD_EMPLEADOS ?></strong>
                            </p>
						</div>
						<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4"></div>
					</div>
				</div>
				<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 text-center content-menu" >
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 cantidad item-menu-admin content-menu" id="num-usuarios">
							<p id="Cantidad-usuarios">Cantidad usuarios <strong class="datosCantidades">
                                <?php echo $Response->CANTIDAD_USUARIOS ?></strong>
                            </p>
						</div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 cantidad item-menu-admin" id="num-Paquetes">
							<p id="Paquetes">Eventos y Paquetes</p>
						</div>
					</div>
				</div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 text-center content-menu">
					<div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                            <img src="Assets/img/Logo.jpeg" class="img-thumbnail" id="img-logo" alt="logo">
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 text-center content-menu">
					<div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 cantidad item-menu-admin content-menu" id="num-pedidos">
							<p id="Cantidad-pedidos">Cantidad pedidos <strong class="datosCantidades">
                                <?php echo $Response->CANTIDAD_PEDIDOS ?></strong>
                            </p>
						</div>
						<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 cantidad item-menu-admin"  id="num-Reportes">
							<p id="Reportes">Reportes</p>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12  col-xxl-12 text-center content-menu m-auto" >
					<div class="row">
						<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 m-auto cantidad item-menu-admin" id="turno">
							<p id="Turnos">Turnos</p>
						</div>
						<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 m-auto cantidad item-menu-admin" id="inventario">
							<p id="Inventarios">Inventarios</p>
						</div>
					</div>
				</div>
            </div>
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