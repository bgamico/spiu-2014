//
//	jQuery Validate example script
//
//	Prepared by David Cochran
//
//	Free for your use -- No warranties, no guarantees!
//

$(document).ready(function(){

		$('#contact-form').validate({
	    rules: {
	      nombre: {
	        minlength: 2,
	        required: true
	      },
	      apellido: {
	        minlength: 2,
	        required: true
	      },
	      documento: {
	        minlength: 7,
	        maxlength: 8,
			number:true,
	        required: true
	      },
	      email: {
	        required: true,
	        email: true
	      },
	      telefono: {
	      	number:true,
	        required: true	        
	      },
	      domicilio: {
	        minlength: 2,
	        required: true
	      },
	      direccion: {
	        minlength: 2,
	        required: true
	      },
	      latitud: {
	        minlength: 1,
			number:true,
	        required: true
	      },
	      longitud: {
	        minlength: 2,
			number:true,
	        required: true
	      },
	      descripcion: {
	        minlength: 2,
	        required: true
	      },		  
	      username: {
	        minlength: 4,
	        required: true
	      },
	      password: {
	        minlength: 6,
	        required: true
	      },
	      fec_nac: {
	        date: 1,
	        required: true
	      },	  
	      provincia: {
		      required: true
		  },	  
	      ciudad: {
		      required: true
		  },	  
	      /*
	       * es un form_dropdown que siempre estar� con una opci�n seleccionada.
		  tipo: {
		      required: true
		  },
		  */
	      fecha: {
		        date: 1,
		        required: true
	      },
	      hora: {
		        minlength: 2,
		        required: true
	      },
	      materia: {
		        minlength: 2,
		        required: true
	      },
	      aula: {
		        minlength: 2,
		        required: true
	      },
	      profesor: {
		        minlength: 2,
		        required: true
	      },
	      contrasena_act: {
		        minlength: 2,
		        required: true
	      },
	      contrasena: {
		        required: true
	      },
	      contrasena_confirm: {
		        required: true
	      },
	      contrasena_confirm: {
		  equalTo: "#contrasena"
		  }      
	    },
	      messages: {
	          contrasena_confirm :"La contrase&ntilde;a debe coincidir con la nueva contrase&ntilde;a."
	      }		    
			/*highlight: function(element) {
				$(element).closest('.control-group').removeClass('success').addClass('error');
			},
			success: function(element) {
				element
				.text('OK!').addClass('valid')
				.closest('.control-group').removeClass('error').addClass('success');
			}*/	
	  });
		
		/* estilo para la tabla */
		$('#tabla').dataTable();

		/* mensaje de confirmaci�n al eliminar */
		$('#confirm-delete').on('show.bs.modal', function(e) {
		    $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
		});		
		
		/* mensaje de confirmaci�n restaurar contrase�a */
        $('#confirm-reset').on('show.bs.modal', function(e) {
            $(this).find('.brestaurar').attr('href', $(e.relatedTarget).data('href'));
        })     

}); // end document.ready
