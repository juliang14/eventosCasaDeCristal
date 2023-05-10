<?php  
include 'views/Carrito/Carrito.php';

$class = (empty($_REQUEST['class']))?0:$_REQUEST['class'];
$method = (empty($_REQUEST['method']))?0:$_REQUEST['method'];

$classInicio = ($class == "usuario" && $method == "usuario"? "nav-link active" : "nav-link");
$classEventos = ($class==="Eventos" && $method ==="eventosUsuario")?"nav-link active":"nav-link";
$classAcerca = ($class==="usuario" && $method ==="usuarioAcercaDeNosotros")?"nav-link active":"nav-link";
$classContactenos = ($class==="usuario" && $method ==="usuarioContactos")?"nav-link active":"nav-link";
$classPedidos = ($class==="Pedidos" && $method ==="vistaPedidosUsuario")?"nav-link active":"nav-link";

?>

<div class="container-logo col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-2 m-auto p-0">
	<img src="Assets/img/Logo.jpeg" class="d-block m-auto" id="img-logo" alt="logo">
</div>
<div class="container-menu-top col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 col-xxl-10 p-0">
	<div class="row ">
		<div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 col-xxl-7 d-flex flex-row-reverse">
			<nav class="navbar-top navbar navbar-expand-lg">
				<div class="container-fluid">
					<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
						<div class="navbar-nav">
                            <div class="nav-link">
                                <a class="icon-carrito" href="?class=Carrito&method=index">
                                    <img SRC="Assets/img/boton-de-agregar-carrito-de-compras.png" title="Carrito de compras" />
                                    <span class="cantidadCarrito">(<?php echo (empty($_SESSION['Carrito']))?0:count($_SESSION['Carrito']); ?>)</span>
                                </a>
                            </div>
							<form action="javascript:;" class="d-flex nav-link form-search" role="search">
								<input class="form-control" type="search" placeholder="Buscar" aria-label="Search">
								<button class="btn btn-outline-secondary" type="submit">IR</button>
							</form>
						</div>
					</div>
				</div>
			</nav>
		</div>
        <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5 pl-0">
            <div class="row nav-top-user">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="row">
                        <p class="col-sm-10 col-md-10 col-lg-10 col-xl-10 mt-2 mb-2 text-right">
                            <?php echo $_SESSION['UserAutenticate']->NOMBRE; ?>
                        </p>
                        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 mt-2 mb-2">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="row">
                        <p class="col-sm-10 col-md-10 col-lg-10 col-xl-10 mt-2 mb-2 text-right">
                            cerrar sesion
                        </p>
                        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 mt-2 mb-2">    
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked onclick="cerrarSesion();">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
	<div class="row">
		<div class="col-12 col-sm-12 col-md-1 col-lg-1 col-xl-1 col-xxl-2"></div>
		<nav class="navbar-center navbar navbar-expand-lg col-12 col-sm-12 col-md-11 col-lg-11 col-xl-11 col-xxl-10">
			<div class="container-fluid">
				<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
					<div class="navbar-nav nav-center">
						<a class="<?php echo $classInicio; ?>" href="?class=usuario&method=usuario">INICIO</a>
						<a class="<?php echo $classEventos; ?>" href="?class=Eventos&method=eventosUsuario">EVENTOS</a>
						<a class="<?php echo $classAcerca; ?>" href="?class=usuario&method=usuarioAcercaDeNosotros">ACERCA DE NOSOTROS</a>
						<a class="<?php echo $classContactenos; ?>" href="?class=usuario&method=usuarioContactos">CONTACTENOS</a>
                        <a class="<?php echo $classPedidos; ?>" href="?class=Pedidos&method=vistaPedidosUsuario">PEDIDOS</a>
					</div>
				</div>
			</div>
		</nav>
	</div>
</div>