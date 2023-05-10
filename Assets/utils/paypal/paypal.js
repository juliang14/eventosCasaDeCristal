//$('#modalCenter').modal('hide');
paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'demo_sandbox_client_id',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'large',
      color: 'blue',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: '1',//Valortotal,
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        //window.alert('Tu pago fue exitoso!');
        var idUsuario           = $('#idUsuario').val();
        var idPaquete           = $('#idPaquete-1').val();
        var actualizarCiudad    = $('#inputCiudadEvento').val();
        var actualizarBarrio    = $('#inputBarrioEvento').val();
        var actualizarDireccion = $('#inputDireccionEvento').val();
        var actualizarFechaIni  = $('#inputFechaInicioEvento').val();
        var actualizarFechaFin  = $('#inputFechaFinEvento').val();
        var valorPago           = $('#inputValorPago').val();
        $('#modalCenter').modal('hide');
        $.ajax({
            type: 'POST',
            url : '?class=Carrito&method=destroyCarrito',
            //data: { tipo: 'RecuperarClave', Email: Email, tipoValidacion: tipoValidacion},
            success(response){
              console.log('Se elimino el carrito de compras ');
              $('#modalCenter').modal('hide');
              $.ajax({
                type: 'GET',
                url : '?class=Carrito&method=pago',
                data: { userIdPaquete: idPaquete, userId: idUsuario, userCiudad: actualizarCiudad, userBarrio: actualizarBarrio, userDireccion: actualizarDireccion, userDateIni: actualizarFechaIni, userDateFin: actualizarFechaFin, userValorPago: valorPago},
                success(response){
                    
                    window.location.href='?class=Usuario&method=usuario'
                }
              });
             },
            error(){
              $('.modal-body').html('Error al eliminar carrito.');
              $('#modalCenter').modal('show');
            }
          });  
      });
    }
  }, '#paypal-button');

/*
  // Set up a payment
payment: function(data, actions) {
    return actions.payment.create({
      transactions: [{
        amount: {
          total: Valortotal,
          currency: 'USD'
        }
      }]
    });
  }

  // Execute the payment
onAuthorize: function(data, actions)
{
  return actions.payment.execute().then(function()
  {
    // Show a confirmation message to the buyer
    window.alert('Tu pago fue exitoso!');
  });
}*/