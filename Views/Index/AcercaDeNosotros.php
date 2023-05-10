<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Assets/img/icon.ico"/>
    <title>Acerca de nosotros</title>

    <link rel="stylesheet" type="text/css" href="Assets/utils/bootstrap/bootstrap-5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/utils/dataTable/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/utils/dataTable/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/utils/fontawesome/fontawesome-free-6.1.2-web/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="Assets/utils/datetimepicker/jquery.datetimepicker.css">
    <link rel="stylesheet" type="text/css" href="assets/css/generalStyles.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/acercadenosotros.css">
</head>
<body class="container-body container">
    
    <header class="header row" id="header">
        <?php include_once('Views/Layouts/header.php') ?>
    </header>
    <main class="main row">
        <section class="row" id="todoElContenido">
			<div class="col-lg-12">
				<div class="row" id="event_2">
					<div class="col-lg-12" >
						<div style="text-align: center;">
							<h2>EVENTOS CASA DE CRISTAL</h2>
							<p class="center" id="text">
								Eventos casa de cristal es una compañía que vela por la organización y creatividad de eventos sociales, familiares y empresariales sin dejar de lado los intereses y gustos de nuestro clientes 	
							</p>
						</div>
					</div>
				</div>
				<div id="video-acercadenosotros">
					<iframe width="500" height="250" src="https://www.youtube.com/embed/6EllTOaYgqg?autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
				<div class="row margin" >
					<div class="col-lg-3">
						<img src="Assets/img/novios.jpg"  id="imagenes">
					</div>
					<div class="col-lg-7 justify">
						<h3>CAPTURAMOS MOMENTOS INOLVIDABLES...</h3>
						<p>
							¡Sus momentos merecen siempre la mejor presentación!. Nos encargamos de que espectaculares imágenes reflejen todos los sentimientos y sean captados durante la celebración.
							En cada evento nos encargamos de ofrecer fotos únicas en donde todos los momentos se convertirán en inolvidables y esos detalles se trasformaran en grandes y hermosos recuerdos 
						</p>
					</div>
					<div class="col-lg-2"></div>
				</div>
				<div class="row margin" >
					<div class="col-lg-2"></div>
					<div class="col-lg-7 justify">
						<h3>DECORACIÓN Y AMBIENTACIÓN</h3>
						<p>
							Nos comprometemos a crear juntos a los mejores profesionales el mundo de la de la ambientación y escenarios llenos de emociones que harán de sus eventos momentos inolvidables.

							Decoraciones de lujo, fantasía y creatividad acompañaran tus mejores momentos, si tienes alguna idea especial, buscaremos la forma de complementarla para que sea única
						</p>
					</div>
					<div class="col-lg-3">
						<img src="Assets/img/decoracion.jpg"  id="imagenes">
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