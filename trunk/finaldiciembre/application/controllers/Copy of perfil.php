<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Administracion del Perfil.
 *
 * @author Castro Patricio Nicolas
 */

class Perfil extends CI_Controller
{
		
	//  Configuramos las validaciones ayudandonos con la librería form_validation
	private $reglas = array(
			array(
					'field'   => 'contrasena_act',
					'label'   => 'Contrase&ntilde;a actual',
					'rules'   => 'required'
					//'rules'   => 'required|callback_my_validation'
			),
			array(
					'field'   => 'contrasena_confirm',
					'label'   => 'Confirmar Contrase&ntilde;a',
					'rules'   => 'required'
			),
			array(
					'field'   => 'contrasena',
					'label'   => 'Nueva Contrase&ntilde;a',
					'rules'   => 'required|matches[contrasena_confirm]'
			)
	);
		
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
    
    /**
     * modifica la contraseña del usuario
     * @access public
     */
    public function cambiarPassword() {
    	
    	
    	$data['query'] = $this->Model_Perfil->get($this->session->userdata('username'));
    	
    	$this->load->view('include/header');
    	$this->load->view('include/nav');
    	$this->load->view('perfil_view/perfil_cpassword',$data);
    	$this->load->view('include/footer');
    	 /*  	
    	$query = $this->Model_Perfil->get($this->session->userdata('username'));
    	echo $this->session->userdata('username');
    	echo $this->session->userdata('usuario');

	    foreach ($query as $row)
		{
		   $id = $row->id;
		}
    	echo $id;
    	$registro = $this->Model_Perfil->getPassword($id);
    	foreach ($registro as $row)
    	{
    		$contrasena = $row->contrasena;
    	}    	
    	echo $contrasena;
    	$data['registro'] = $registro;
    	exit;
    	
    	$registro = $this->input->post();
    	$this->Model_Perfil->update($registro);
    	$this->session->set_flashdata('mensaje', 'El perfil se actualiz&oacute; correctamente.');
    	$this->session->set_flashdata('status', 'success');
    	redirect('perfil');*/
    }    
    
    public function updatePassword() {    
    	
    	$registro = $this->input->post();
    	echo $registro['contrasena_act'];
    	echo $registro['contrasena'];
    	echo $registro['contrasena_confirm'];
    	
    	//$this->form_validation->set_rules('contrasena_act', 'Contrase&ntilde;a actual', 'required');
    	//$this->form_validation->set_rules('contrasena', 'Nueva Contrase&ntilde;a', 'required');
    	//$this->form_validation->set_rules('contrasena_confirm', 'Confirmar Contrase&ntilde;a', 'required');
    	//$this->form_validation->set_rules('contrasena', 'Nueva Contrase&ntilde;a', 'required|matches[contrasena_confirm]');
    	
    	//reglas de validación
    	$this->form_validation->set_rules($this->reglas);    	
    	if(($this->form_validation->run() == TRUE)){
    		//en esta instancia hemos superado la validacion del formulario

    		echo 'superamos validacion';

    	}else {
    		$this->cambiarPassword();
    		//echo 'contraseñas no son iguales';
    		
    	}    	
    	/*
    	$query = $this->Model_Perfil->get($this->session->userdata('username'));
    	echo $this->session->userdata('username');
    	echo $this->session->userdata('usuario');
    	
    	foreach ($query as $row)
    	{
    		$id = $row->id;
    	}    	
    	
    	*/
    	//exit;
    }
    
    
}