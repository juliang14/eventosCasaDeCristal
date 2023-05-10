<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Assets/img/icon.ico"/>
    <title>Login Usuario</title>

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
        <section class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-4 mb-4" id="login-usuario">
            <div class="btn-cerrar">
                <a href="?class=Index&method=index">
                    <img src="Assets/img/cancelar.png" id="cerrar">
                </a>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="inicio-de-sesion">
                <h2>Iniciar sesion</h2>
            </div>
            <form action="?class=Security&method=usuario" method="POST">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="contenedor-login">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="parte-10">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label>Usuario</label><br>
                            <input class="form-control" type="text" name="usuario" required>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="parte-10">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label>Contraseña</label><br>
                            <input class="form-control" type="password" name="password" required>
                        </div>
                    </div>
                    <?php if(!empty($_SESSION['mesagge-login'])){ ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><?php echo $_SESSION['mesagge-login'] ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php unset($_SESSION['mesagge-login']); } ?>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="olvide">
                        <a href="?class=Security&method=recuperarClave&tipo=Usuario">
                            Olvide mi contraseña
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="parte-11">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="btn-registrarse">
                            <input class="btn btn-success" type="submit" name="Ingresar" value="Ingresar">
                        </div>
                    </div>
                </div>
            </form>
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