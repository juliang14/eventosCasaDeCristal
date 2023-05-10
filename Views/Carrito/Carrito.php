<?php

//session_start();
$mensaje ='';
$mensajeError='';
$cantidadProductos=0;

if(isset($_POST['btnAccion'])){

    switch($_POST['btnAccion']){

        case 'Agregar':

            if(is_string($_POST['valorPaquete'])){ $mensaje.= 'Valor paquete OK <br>';
            }else{ $mensaje.= 'Valor paquete MAL <br>'; }
            if(is_string($_POST['tipoPaquete'])){ $mensaje.= 'Tipo paquete OK <br>';
            }else{ $mensaje.= 'Tipo paquete MAL <br>'; }
            if(is_numeric($_POST['idPaquete'])){ $mensaje.= 'Id paquete OK <br>';
            }else{ $mensaje.= 'Id paquete MAL <br>'; }
 
            if(!isset($_SESSION['Carrito'])){

                $producto = array(
                    "ID_PAQUETE"=> $_POST['idPaquete'],
                    "VALOR_PAQUETE"=> $_POST['valorPaquete'],
                    "TIPO_PAQUETE"=> $_POST['tipoPaquete'],
                    "CANTIDAD"=> $_POST['cantidad']
                );
                $_SESSION['Carrito'][0] = $producto;
                $mensaje = 'Se agrego el producto al carrito de compras';

            }else{
                $idProductos = array_column($_SESSION['Carrito'],"ID_PAQUETE");
                //echo "<script> alert(".print_r($idProductos).");</script>";
                if(in_array($_POST['idPaquete'],$idProductos)){
                    $mensaje='';
                    $mensajeError = 'El producto ya esta agregado en el carrito';
                }else{
                    $cantidadProductos = count($_SESSION['Carrito']);
                    $producto = array(
                        "ID_PAQUETE"=> $_POST['idPaquete'],
                        "VALOR_PAQUETE"=> $_POST['valorPaquete'],
                        "TIPO_PAQUETE"=> $_POST['tipoPaquete'],
                        "CANTIDAD"=> $_POST['cantidad']
                    );
                    $_SESSION['Carrito'][$cantidadProductos] = $producto;
                    $mensajeError='';
                    $mensaje = 'Se agrego el producto al carrito de compras';
                }
            }
            //$mensaje = print_r($_SESSION,true);
            
        break;

        case 'Eliminar':

            if(is_numeric($_POST['idPaquete'])){ 
                
                foreach($_SESSION['Carrito'] as $indice=>$producto){
                    if($producto['ID_PAQUETE']==$_POST['idPaquete']){
                        unset($_SESSION['Carrito'][$indice]);
                        echo "<script> $('.modal-body').html(''); $('.modal-body').html('Se elimino el producto'); $('#modalCenter').modal('show');</script>";
                    }
                }
                
            }else{ $mensaje.= 'Id paquete MAL <br>'; }

        break;

    }

}

?>