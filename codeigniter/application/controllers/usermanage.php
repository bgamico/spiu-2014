<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * UserManage Class
 *
 * Manage Users.
 *
 * @author Castro Patricio Nicolas
 */

/*
 * acceder a la sesión
 *         	$user = $this->session->userdata('user');
			echo $user['username'];
			echo $user['user_shortname'];
			echo $user['user_id'];
			echo $user['sede_id'];
			echo $user['role_id'];
			echo $user['perfil_id'];
 * 
 * 
 * */

class UserManage extends CI_Controller
{
	
	/**
	 * constructor for UserManage
	 * @access public
	 */
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('Model_Usuario');
		$this->load->model('Model_Perfil');
        $this->load->model('Model_Roles');
        $this->load->model('Model_Sede');
        //set messeges, utilizados para algunas validaciones
	}
	
	/**
	 * user search page
	 * @access public
	 */
	public function search()
	{	
		/*if($this->user->checkPrivilege('user_search') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}*/
		$data['query'] = $this->Model_Usuario->all($this->user->getUserId());

		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('user_view/user_search',$data);
		$this->load->view('include/footer');
	}
	
	/**
	 * user operadores page
	 * @access public
	 */
	public function operadores()
	{
		if($this->user->checkPrivilege('user_operadores') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}
		
        $sede_id = $this->user->getSedeId();
		$data['query'] = $this->Model_Usuario->allOperadores($sede_id);
		
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('user_view/user_search',$data);
		$this->load->view('include/footer');
	}
		
	public function my_validation() {
		return $this->user->my_validation($this->input->post());
	}	
	
	/**
	 * user add page
	 * @access public
	 */
	public function add(){
		/*if($this->user->checkPrivilege('user_add') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}*/
		
		if(isset($_POST['username'])){    //  Si no recibimos ningún valor proveniente del formulario, significa que el usuario recién ingresa.
			$this->form_validation->set_rules('username','Username','is_unique[user.user_name]');//  Configuramos las validaciones ayudandonos con la librería form_validation
			if(($this->form_validation->run()==TRUE)){               //  Verificamos si el usuario superó la validación
					$this->insert();                     //  insertamos
			}
		}
		
		$data['url'] = 'usermanage/operadores';
		
        if($this->user->getUserRole() == 'admingral'){
            $data['roles'] = $this->Model_Roles->all();
            $data['sedes'] = $this->Model_Sede->allArray();
            $data['combo'] = true;
            $data['url'] = 'usermanage/search';
        }

		$data['url'] = 'usermanage/search';
		
  		$this->load->view('include/header');
		$this->load->view('include/nav');
		
		$this->load->view('user_view/user_add',$data);
		$this->load->view('include/footer');
	}

   
	public function insert() {
		$registro = $this->input->post();
		
		$sesion['user_name'] = $registro['username'];
		$sesion['role_id'] = $registro['rol'];
		if($sesion['role_id'] == 1){
			$sesion['sede_id'] = '';
		}else{
			$sesion['sede_id'] = $registro['sede'];
		}
		unset($registro['username']);
		unset($registro['rol']);
		unset($registro['sede']);
		$sesion['perfil_id'] = $this->Model_Perfil->insert($registro);
		$this->Model_Usuario->insert($sesion);
		redirect('usermanage/search');
	}
	
	/**
	 * user delete page
	 * @access public
	 */
	
	public function delete($id) {
		
		if($this->user->checkPrivilege('user_delete') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}		
		$this->Model_Usuario->delete($id);
		redirect('usermanage/search');
	}	

	/**
	 * user edit page
	 * @access public
	 */
	public function edit($id)
	{
		if($this->user->checkPrivilege('user_edit') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}
	
		$data['user'] = $id;
		$data['query'] = $this->Model_Perfil->getByUserId($id);
		$data['url'] = 'usermanage/operadores';
	
		if($this->user->getUserRole() == 'admingral'){
			$data['roles'] = $this->Model_Roles->all();
			$data['sedes'] = $this->Model_Sede->allArray();
			$data['combo'] = true;
			$data['url'] = 'usermanage/search';
		}
	
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('user_view/user_edit',$data);
		$this->load->view('include/footer');
	}
		
    /**
     * user update
     * @access public
     */
    public function update() {
    	
    	$registro = $this->input->post();
    	 
    	$str = /*$registro['username'].'-'.*/$registro['nombre'].'-'.$registro['apellido'].'-'.$registro['documento'].'-'.$registro['fec_nac'].'-'.$registro['domicilio'].'-'.$registro['telefono'].'-'.$registro['mail'].'-'.$registro['rol'].'-'.$registro['sede'];
    	echo $str;
    	exit;    	
        $usuario['user_id'] = $registro['user_id'];
        $usuario['role_id'] = $registro['rol'];
        //$usuario['perfil_id'] = $registro['perfil_id'];
        if($usuario['role_id'] == 1){
            $usuario['sede_id'] = '';
        }else{
            $usuario['sede_id'] = $registro['sede'];
        }
        //unset($registro['user_id']);
        //unset($registro['rol']);
        //unset($registro['sede']);

        $actualizar = $this->Model_Usuario->update($usuario);
        $registro['perfil_id'] = $this->Model_Usuario->update($usuario)->perfil_id;

        $this->Model_Perfil->update($registro);
        //si la actualización ha sido correcta creamos una sesión flashdata para decirlo
        if($actualizar)
        {
        	$this->session->set_flashdata('tipo_mensaje', 'aviso');
        	$this->session->set_flashdata('mensaje', 'La informaci&oacute;n se actualiz&oacute; correctamente.');
        	//$this->session->set_flashdata('actualizado', 'El mensaje se actualizó correctamente');
        	///redirect('usermanage/search', 'refresh');        	
        }        
        redirect('usermanage/search', 'refresh');

    }

    /**
     * user view page
     * @access public
     */
    public function view($id)
    {
        if($this->user->checkPrivilege('perfil_search') == false)
        {
            show_error("you have no privilege to access this page");
            return ;
        }
		
        $data['titulo'] = 'Consultar Usuario';
        $data['query'] = $this->Model_Perfil->getByUserId($id);

        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('perfil_view/perfil_search',$data);
        $this->load->view('include/footer');
    }
    
    public function getMsjEliminacion($id){
    	$usuario = $this->Model_Usuario->get($id);
    	$nombre = $usuario->user_name;
    	return 'Esta seguro que desea eliminar este Usuario: '.$nombre;
    }
    
   

}