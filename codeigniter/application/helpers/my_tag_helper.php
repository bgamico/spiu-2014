<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Muestra TODOS errores de validación de un formulario
if ( ! function_exists('my_validation_errors')) {

	function my_validation_errors($mensaje,$tipo) {
		$salida = '';

		if ($tipo == 'error') {
			$salida = '<div class="alert alert-error">';
			$salida = $salida.'<button type="button" class="close" data-dismiss="alert"> × </button>';
			$salida = $salida.'<h4> Error </h4>';
			$salida = $salida.'<small>'.$mensaje.'</small>';
			$salida = $salida.'</div>';
		}else{
			//sino existen errores entonces se actualizo correctamente (success)
			if ($tipo == 'aviso'){
				$salida = '<div class="alert alert-success">';
				$salida = $salida.'<button type="button" class="close" data-dismiss="alert"> × </button>';
				$salida = $salida.'<h4> Aviso </h4>';
				$salida = $salida.'<small>'.$mensaje.'</small>';
				$salida = $salida.'</div>';							
			}			
		}
		return $salida;
	}
}