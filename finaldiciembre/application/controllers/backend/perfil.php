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
		$this->load->view('backend/include/header');
		$this->load->view('backend/include/nav');
		$this->load->view('backend/perfil_view/perfil_get',$data);
		$this->load->view('backend/include/footer');
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
	
		$this->load->view('backend/include/header');
		$this->load->view('backend/include/nav');
		$this->load->view('backend/perfil_view/perfil_edit',$data);
		$this->load->view('backend/include/footer');
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
        redirect('backend/perfil');
    }
    
    /**
     * modifica la contraseña del usuario
     * @access public
     */
    public function cambiarPassword() {
    	//recibimos el usuario_id desde el post, puede que venga vacio.
    	$registro = $this->input->post();
    	$usuario_id = $registro['usuario_id'];
    	if ($usuario_id != null && $usuario_id != '') {
    		//p.id, id del perfil del usuario al que se le cambia la constraseña
    		$data['query'] = $this->Model_Perfil->getByUserId($usuario_id);
    	}else{
    		//p.id, id del perfil del usuario al que se le cambia la constraseña
    		$data['query'] = $this->Model_Perfil->get($this->session->userdata('username'));
    	}
    	
    	$this->load->view('backend/include/header');
    	$this->load->view('backend/include/nav');
    	$this->load->view('backend/perfil_view/perfil_cpassword',$data);
    	$this->load->view('backend/include/footer');
    }    
    
    public function updatePassword() {    
    	
    	$registro = $this->input->post();
    	//perfil id del usuario al que se le quiere cambiar la contraseña
    	//puede ser uno seleccionado desde gestion usuarios o el usuario logueado
    	$perfil_id = $registro['perfil_id'];
    	// se encripa contraseña
    	$md5_password = md5($registro['contrasena']);

    	$id_perfil = $registro['perfil_id'];
    	$this->Model_Perfil->updatePassword($perfil_id,$md5_password);
    	$this->session->set_flashdata('mensaje', 'La contrase&ntilde;a se actualiz&oacute; correctamente.');
    	$this->session->set_flashdata('status', 'success');    	
    	redirect('backend/perfil');
    }

    public function passwordCheck(){
    	$username = $this->session->userdata ( 'username' );
    	$md5pass = $this->input->post('contrasena_act');
    	$results = $this->Model_Perfil->getPassword();
    	$currentPass = $results->password;
    
    	if($md5pass==$currentPass){
    		return true;
    	}else{
    		$this->form_validation->set_message('passwordCheck', 'Invalid current password, please try again');
    		return false;
    	}
    }
    
}