seccionFormulario = document.getElementById('section_forms');

window.onload = function() {

		//INICIAR TABLAS JQUERY 
		generales.cargarDataTable();
			
		}

var generales = {

	cargarDataTable: function(){		
			//$('#table-Fac').DataTable();
			//$('#tabla-facturas').DataTable();
			$('#tabla_clientes').DataTable({
					"language":{
					"empyTable":  "<i>No hay datos disponibles en la tabla.</i>",
					"info":  "Del _START_ al _END_ de _TOTAL_ ",
					"infoEmpty": "Mostrando 0 registros de un total de 0.",
					"infoFiltered":  "(filtrados de un total de _MAX_ registros)",
					"infoPostFix":  "(actualizados)",
					"lengthMenu":  "Mostrar _MENU_ registros",
					"loadingRecords":  "Cargando...",
					"processing":  "Procesando...",
					"search":  "<span style='font-size:15px;'>Buscar:</span>",
					"searchPlaceholder":  "Dato para buscar",
					"zeroRecords":  "No se han encontrado registros",
					"paginate": { 
						"first":  "Primera",
						"last":  "Última",
						"next":  "Siguiente", 
						"previous":  "Anterior"
					},
					"aria":  {
						"sortAscending":  "Ordenación ascendente",
						"sortDescending":  "Ordenación descendente"
					}
				},
				"lengthMenu": [[5, 10, 20, 50],[5, 10, 20, 50,"Todos"]],
				"iDisplayLenght": 5,

			});
			$('#tabla2').DataTable({
					"language":{
					"empyTable":  "<i>No hay datos disponibles en la tabla.</i>",
					"info":  "Del _START_ al _END_ de _TOTAL_ ",
					"infoEmpty": "Mostrando 0 registros de un total de 0.",
					"infoFiltered":  "(filtrados de un total de _MAX_ registros)",
					"infoPostFix":  "(actualizados)",
					"lengthMenu":  "Mostrar _MENU_ registros",
					"loadingRecords":  "Cargando...",
					"processing":  "Procesando...",
					"search":  "<span style='font-size:15px;'>Buscar:</span>",
					"searchPlaceholder":  "Dato para buscar",
					"zeroRecords":  "No se han encontrado registros",
					"paginate": { 
						"first":  "Primera",
						"last":  "Última",
						"next":  "Siguiente", 
						"previous":  "Anterior"
					},
					"aria":  {
						"sortAscending":  "Ordenación ascendente",
						"sortDescending":  "Ordenación descendente"
					}
				}, 
				"lengthMenu": [[5, 10, 20, 50],[5, 10, 20, 50,"Todos"]],
				"iDisplayLenght": 5,
				"order": [[ 0, "desc" ]],

			});
			
	},
	cargarFormulario: function(tipoFormulario){
console.log('respondiendo desde cargarFormulario');
		$('#section_forms').html('');
		if (tipoFormulario=='CREARUSUARIO') {
			seccionFormulario.className='code_on';
console.log('respondiendo desde CREARUSUARIO');
			formularioCrearUsuario=`
									<div class="contenedorFormularioCrearUsuario" id="contenedorFormularioCrearUsuario">
										<h2 class="text-center" id="tituloCrearUsuario">Crear usuario</h2>
										<form mane="" action="<?php parent::getCliente()?>" method="POST">
											<div class="row">
											    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
													<label for="crearPrimerNombre">Primer Nombre</label><br>
													<input type="text" class="form-control" name="crearPrimerNombre" id="crearPrimerNombre" placeholder="Primer nombre" value="" required>
												</div>
												<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
													<label for="crearSegundoNombre">Segundo Nombre</label><br>
													<input type="text" class="form-control" name="crearSegundoNombre" id="crearSegundoNombre" placeholder="Segundo nombre" value="">
												</div>
												<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
													<label for="crearPrimerApellido">Primer Apellido</label><br>
													<input type="text" class="form-control" name="crearPrimerApellido" id="crearPrimerApellido" placeholder="Primer apellido" value="" required>
												</div>
												<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
													<label for="crearSegundopellido">Segundo Apellido</label><br>
													<input type="text" class="form-control" name="crearSegundopellido" id="crearSegundopellido" placeholder="Segundo apellido" value="">
												</div>
												<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
													<label for="">Tipo de documento</label><br>
													<div style="display: inline-flex; width: 100%">
														C.C <input type="radio" class="form-control" name="crearCC" id="crearCC" style="margin-top: 1.5%;">
														NIT <input type="radio" class="form-control" name="crearNIT" id="crearNIT" style="margin-top: 1.5%;">
														C.E <input type="radio" class="form-control" name="crearCE" id="crearCE" style="margin-top: 1.5%;">
													</div>
												</div>
												<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
													<label for="crearNumeroDocumento">Numero de documento</label><br>
													<input type="number" class="form-control" name="crearNumeroDocumento" id="crearNumeroDocumento" placeholder="Numero de documento" value="" required>
												</div>
												<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 margen-abajo" >
													<label for="crearEdad">EDAD</label><br>
													<input type="number" class="form-control" name="crearEdad" id="crearEdad" placeholder="Edad" value="" required>
												</div>
												<br>
												<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center" >
													<label for="crearTelefono">Telefono</label><br>
													<input type="number" class="form-control" name="crearTelefono" id="crearTelefono" placeholder="Telefono" value="" required>
												</div>
												<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
													<label for="crearCorreo">Correo</label><br>
													<input type="email" class="form-control" name="crearCorreo" id="crearCorreo" placeholder="Correo electronico" value="" required>
												</div>
											    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
												    <button class="btn btn-primary" id="botonCrearUsuario" type="submit">Crear usuario</button>
											    </div>
											</div>
										</form>
									</div>
									`;

			$('#section_forms').append(formularioCrearUsuario);
			$('#crearPrimerNombre').focus();
		}else{
			console.log('Parametro no configurado en la funcion');
		}

	}


}