<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Administracion de usuarios.
 *
 * @author Castro Patricio Nicolas
 */

class Usuario extends CI_Controller
{
		
	/**
	 * listar usuarios
	 * @access public
	 */
	public function index()
	{	
		if ($this->session->userdata('rol') == 1){
			$data['query'] = $this->Model_Usuario->all($this->session->userdata('username'));
		}
		else{
			$data['query'] = $this->Model_Usuario->allOperadores($this->session->userdata('username'));
		}

		$data['div_mensajes'] = $this->retroalimentacion();
		$this->load->view('backend/include/header');
		$this->load->view('backend/include/nav');
		$this->load->view('backend/user_view/user_get',$data);
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
	 * pagina de creacion de usuarios
	 * @access public
	 */
	public function add(){

		if(isset($_POST['username'])){    //  Si no recibimos ningún valor proveniente del formulario, significa que el usuario recién ingresa.
			$this->form_validation->set_rules('username','Username','is_unique[usuarios.usuario]');//  Configuramos las validaciones ayudandonos con la librería form_validation
			if(($this->form_validation->run()==TRUE)){               //  Verificamos si el usuario superó la validación
				$this->insert();                     //  insertamos
			}
		}

		$this->load->view('backend/include/header');
		$this->load->view('backend/include/nav');
		$this->load->view('backend/user_view/user_add');
		$this->load->view('backend/include/footer');				
		
	}

   
	public function insert() {		
		$registro = $this->input->post();
		if (element('rol', $registro) == 1 ){
			unset($registro['sede_id']);
		}
			
		$this->Model_Usuario->insert($registro);
		$this->session->set_flashdata('mensaje', 'El usuario se cre&oacute; correctamente.');
		$this->session->set_flashdata('status', 'success');		
		redirect('backend/usuario');
	}

	/**
	 * user edit page
	 * @access public
	 */
	public function edit($id)
	{
		$data['query'] = $this->Model_Perfil->getByUserId($id);
		
		$this->load->view('backend/include/header');
		$this->load->view('backend/include/nav');
		$this->load->view('backend/user_view/user_edit',$data);
		$this->load->view('backend/include/footer');
	}
		
    /**
     * actualizar los datos del usuario
     * @access public
     */
    public function update() {
    	$registro = $this->input->post();
    	if (element('rol', $registro) == 1 ){
    		$registro['sede_id'] = NULL;
    	}
    	$this->Model_Usuario->update($registro);
    	$this->session->set_flashdata('mensaje', 'El usuario se actualiz&oacute; correctamente.');
    	$this->session->set_flashdata('status', 'success');    	
    	redirect('backend/usuario');
    }

    /**
     * detalles del usuario
     * @access public
     */
    public function view($id)
    {
    	$data['titulo'] = 'Consultar Usuario';
        $data['query'] = $this->Model_Perfil->getByUserId($id);
        $data['div_mensajes'] = $this->retroalimentacion();
        
        $this->load->view('backend/include/header');
        $this->load->view('backend/include/nav');
        $this->load->view('backend/perfil_view/perfil_get',$data);
        $this->load->view('backend/include/footer');
    }
    
    
    /**
     * eliminación de usuarios
     * @access public
     */ 
    public function delete($id) {
     	$this->Model_Usuario->delete($id);
     	$this->session->set_flashdata('mensaje', 'El usuario se elimin&oacute; correctamente.');
     	$this->session->set_flashdata('status', 'success');     	
    	redirect('backend/usuario');
    }

    /**
     * metodo para resetear la contraseña del usuario
     * @access public
     */
    public function resetPassword($id) {	
    	$this->Model_Usuario->resetPassword($id);
    	$this->session->set_flashdata('mensaje', 'Se ha restaurado la contrase&ntilde;a del usuario.');
    	$this->session->set_flashdata('status', 'success');
    	redirect('backend/usuario');
    }
        
    
}