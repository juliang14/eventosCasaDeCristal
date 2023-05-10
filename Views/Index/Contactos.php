<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Assets/img/icon.ico"/>
    <title>Contacto</title>

    <link rel="stylesheet" type="text/css" href="Assets/utils/bootstrap/bootstrap-5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/utils/dataTable/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/utils/dataTable/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/utils/fontawesome/fontawesome-free-6.1.2-web/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="Assets/utils/datetimepicker/jquery.datetimepicker.css">
    <link rel="stylesheet" type="text/css" href="assets/css/generalStyles.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/contactos.css">
</head>
<body class="container-body container">
    
    <header class="header row" id="header">
        <?php include_once('Views/Layouts/header.php') ?>
    </header>
    <main class="main row">   
        <!-- sections -->
        <section class="section-contact col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                    <h5 class="text-contact">Contacto</h5>
                </div> 
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 content-form">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-1 col-lg-1 col-xl-1 col-xxl-1 text-right mb-4">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 mb-4">
                            <input class="form-control" type="text" name="name" id="name" placeholder="Nombre"/>
                        </div>
                        <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-2 mb-4"></div>
                        <div class="col-12 col-sm-12 col-md-1 col-lg-1 col-xl-1 col-xxl-1 text-right mb-4">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 mb-4">
                            <input class="form-control" type="text" name="phone" id="phone" placeholder="teléfono"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-1 col-lg-1 col-xl-1 col-xxl-1 text-right mt-4 mb-4">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="col-12 col-sm-12 col-md-11 col-lg-11 col-xl-11 col-xxl-11 mt-4 mb-4">
                            <input class="form-control" type="email" name="email" id="email" placeholder="correo"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-1 col-lg-1 col-xl-1 col-xxl-1 text-right mt-4">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </div>
                        <div class="col-12 col-sm-12 col-md-11 col-lg-11 col-xl-11 col-xxl-11 mt-4">
                            <textarea class="form-control" placeholder="escribir.." name="comments" id="comments" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-1 col-lg-1 col-xl-1 col-xxl-1 text-right mt-4"></div>
                        <div class="col-12 col-sm-12 col-md-11 col-lg-11 col-xl-11 col-xxl-11 mt-4">
                            <button class="btn btn-dark btn-send">Enviar</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 content-contact">
                    <h6><i class="fa-solid fa-phone"></i> Número de teléfono</h6>
                    <p>+57 302 000 00 00</p>
                    <h6><i class="fa-solid fa-envelope"></i> Correo</h6>
                    <p>eventoscasadecristal@gmail.com</p>
                    <h6><i class="fa-solid fa-code"></i> Sitio web</h6>
                    <p> https://www.eventoscasadecristal.co/</p>
                    <h6><i class="fa-solid fa-house"></i> Dirección</h6>
                    <p>Carrera 128 # 80 - 6, Bogotá</p>
                    <iframe class="col-sm-12 col-md-12 col-lg-12 col-xl-12" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7953.276075480344!2d-74.06693580000004!3d4.658467400000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2sco!4v1567953754522!5m2!1ses-419!2sco" id="mapa-contact" frameborder="0"  allowfullscreen=""></iframe>
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