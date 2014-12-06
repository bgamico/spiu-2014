<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Administracion del Perfil.
 *
 * @author Castro Patricio Nicolas
 */

class Perfil extends CI_Controller
{
		
	/**
	 * detalles del perfil
	 * @access public
	 */
	function index()
	{				
		$data['query'] = $this->Model_Perfil->get($this->session->userdata('username'));
		$data['titulo'] = 'Mi Perfil';
		$data['opciones'] = true;

		$data['div_mensajes'] = $this->retroalimentacion();		
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('perfil_view/perfil_get',$data);
		$this->load->view('include/footer');
	}
	
	/**
	 *
	 * este metodo "arma" en div que muestra los mensajes de retroalimentación
	 *
	 */
	public function retroalimentacion(){
		$msj_error = '';
		$msj_error = $this->session->flashdata('mensaje');
		if ($msj_error != ''){
			$msj_error= '<div class="alert alert-dismissable alert-' . $this->session->flashdata('status') .'">';
			$msj_error= $msj_error . '<button type="button" class="close" data-dismiss="alert">&times;</button>';
			$msj_error= $msj_error . '<strong>Aviso: </strong>' . $this->session->flashdata('mensaje');
			$msj_error= $msj_error . '</div>';
		}
	
		return 	$msj_error;
	}	
	
	/**
	 * editar perfil
	 * @access public
	 */
	function edit()
	{
        $data['query'] = $this->Model_Perfil->get($this->session->userdata('username'));
	
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('perfil_view/perfil_edit',$data);
		$this->load->view('include/footer');
	}

    /**
     * actualizar los datos del perfil 
     * @access public
     */
    public function update() {
        $registro = $this->input->post();
        $this->Model_Perfil->update($registro);
        $this->session->set_flashdata('mensaje', 'El perfil se actualiz&oacute; correctamente.');
        $this->session->set_flashdata('status', 'success');        
        redirect('perfil');
    }
}