//
//	jQuery Validate example script
//
//	Prepared by David Cochran
//
//	Free for your use -- No warranties, no guarantees!
//

$(document).ready(function(){

	// Validate
	// http://bassistance.de/jquery-plugins/jquery-plugin-validation/
	// http://docs.jquery.com/Plugins/Validation/
	// http://docs.jquery.com/Plugins/Validation/validate#toptions

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
	      mail: {
	        required: true,
	        email: true
	      },
	      /*subject: {
	      	minlength: 2,
	        required: true
	      },*/
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
	      nombre_usuario: { 
	        minlength: 4,
	        required: true
	      },
	      password: {
	        minlength: 6,
	        required: true
	      },
	      id_rol: {
	        minlength: 1,
	        required: true
	      },
	      fec_nac: {
	        date: 1,
	        required: true
	      }	  


	    },
			highlight: function(element) {
				$(element).closest('.control-group').removeClass('success').addClass('error');
			},
			success: function(element) {
				element
				.text('OK!').addClass('valid')
				.closest('.control-group').removeClass('error').addClass('success');
			}
	  });

}); // end document.ready
