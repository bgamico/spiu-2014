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
	public function get()
	{	
		if ($this->session->userdata('rol') == 1){
			$data['query'] = $this->Model_Usuario->all($this->session->userdata('username'));
		}
		else{
			$data['query'] = $this->Model_Usuario->allOperadores($this->session->userdata('username'));
		}
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('user_view/user_get',$data);
		$this->load->view('include/footer');
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

		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('user_view/user_add');
		$this->load->view('include/footer');				
		
	}

   
	public function insert() {		
		$registro = $this->input->post();
		if (element('rol', $registro) == 1 ){
			unset($registro['sede_id']);
		}
			
		$this->Model_Usuario->insert($registro);
		redirect('usuario/get');
	}

	/**
	 * user edit page
	 * @access public
	 */
	public function edit($id)
	{
		$data['query'] = $this->Model_Perfil->getByUserId($id);
		
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('user_view/user_edit',$data);
		$this->load->view('include/footer');
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
    	redirect('usuario/get');
    }

    /**
     * detalles del usuario
     * @access public
     */
    public function view($id)
    {
    	$data['titulo'] = 'Consultar Usuario';
        $data['query'] = $this->Model_Perfil->getByUserId($id);

        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('perfil_view/perfil_get',$data);
        $this->load->view('include/footer');
    }
    
    
    /**
     * eliminación de usuarios
     * @access public
     */
    
    public function delete($id) {
     	$this->Model_Usuario->delete($id);
    	redirect('usuario/get');
    }
}