<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Assets/img/icon.ico"/>
    <title>Home usuario</title>

    <link rel="stylesheet" type="text/css" href="Assets/utils/bootstrap/bootstrap-5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/utils/dataTable/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/utils/dataTable/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/utils/fontawesome/fontawesome-free-6.1.2-web/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="Assets/utils/datetimepicker/jquery.datetimepicker.css">
    <link rel="stylesheet" type="text/css" href="assets/css/generalStyles.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/usuario.css">
</head>
<body class="container-body container">
    
    <header class="header row" id="header">
        <?php include_once('Views/Layouts/headerUsuario.php') ?>
    </header>
    <main class="main row">
        <!-- Carousel -->
        <div id="carouselAerolinea" class="carousel slide p-0" data-bs-touch="false">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="Assets/img/69.jpg" class="img-banners d-block w-100" alt="Los Angeles">
                </div>
                <div class="carousel-item">
                    <img src="Assets/img/961.jpg" class="img-banners d-block w-100" alt="Chicago">
                </div>
                <div class="carousel-item">
                    <img src="Assets/img/churque.jpg" class="img-banners d-block w-100" alt="New York">
                </div>
                <div class="carousel-item">
                    <img src="Assets/img/962.jpg" class="img-banners d-block w-100" alt="New York">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselAerolinea" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselAerolinea" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- end Carousel -->       
        <!-- sections -->
        <section class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 m-auto mt-4 mb-4 pt-4 pb-4">
            <h2 class="text-center">Bienvenidos</h2><br>
            <p class="text-justify">
                Somos una empresa dispuesta a cumplir la fiesta de tus sueños y hacer la realidad 
                de tus dulces momentos.
            </p>
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