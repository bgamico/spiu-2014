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
        $this->form_validation->set_message('my_validation', 'El Usuario ya existe. Verifique los datos.');
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
		//echo 'se actualizó corectament';
		//exit();
		$data['query'] = $this->Model_Usuario->all($this->user->getUserId());
		//agregamos el flasdata en la vista. Asi tenemos retroalimentación en la acción.
		//indicamos su tipo
		$data['tipo_mensaje'] = $this->session->flashdata('tipo_mensaje');
		$data['mensaje'] = $this->session->flashdata('mensaje');
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
	
	/**
	 * user edit page
	 * @access public
	 */
	/*function edit($id)
	{
		if($this->user->checkPrivilege('user_edit') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}

        $data['user'] = $this->Model_Usuario->find($id);

		//a partir del id del usuario obtengo el perfil        
        foreach ($data['user'] as $registro):
            $perfil_id = $registro->perfil_id;
        endforeach;
        $data['query'] = $this->Model_Perfil->get($perfil_id);

        if($this->user->getUserRole() == 'admingral'){
            $data['roles'] = $this->Model_Roles->all();
            $data['sedes'] = $this->Model_Sede->allArray();
        }
        else{
            $lista = array();
            $lista[0] = 'Operadores';
            $data['roles'] = $lista;
            $miSede = $this->user->getSedeId();
            $data['sedes'] = $this->Model_Sede->get($miSede);
        }
        
        $this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('user_view/user_edit',$data);
		$this->load->view('include/footer');
	}*/
	
	public function my_validation() {
		return $this->user->my_validation($this->input->post());
	}	
	
	/**
	 * user add page
	 * @access public
	 */
	public function add(){
		
		$data['tipo_mensaje'] = $this->session->flashdata('tipo_mensaje');
		$data['mensaje'] = $this->session->flashdata('mensaje');
				
		/*if($this->user->checkPrivilege('user_add') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}*/
		
		$data['url'] = 'usermanage/operadores';
		
        if($this->user->getUserRole() == 'admingral'){
            $data['roles'] = $this->Model_Roles->all();
            $data['sedes'] = $this->Model_Sede->allArray();
            $data['combo'] = true;
            $data['url'] = 'usermanage/search';
        }

  		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('user_view/user_add',$data);
		$this->load->view('include/footer');
	}

    /**
     * user insert
     * @access public
     */
    public function insert() {
    	$registro = $this->input->post();
    	
    	$str = $registro['username'].'-'.$registro['nombre'].'-'.$registro['apellido'].'-'.$registro['documento'].'-'.$registro['fec_nac'].'-'.$registro['domicilio'].'-'.$registro['telefono'].'-'.$registro['mail'].'-'.$registro['rol'].'-'.$registro['sede'];
    	echo $str;
    	//exit;
    	
    	$this->form_validation->set_rules('username', 'username', 'required|callback_my_validation');
    	//$this->form_validation->set_rules('nombre', 'nombre','required');
    	if ($this->form_validation->run() == FALSE) {
    		
    		$this->session->set_flashdata('tipo_mensaje', 'error');    		
    		$this->session->set_flashdata('mensaje', 'El Usuario ya existe. Verifique los datos.');
    		//$this->session->keep_flashdata('tipo_mensaje');
    		//$this->session->keep_flashdata('mensaje');
			echo 'antes del redirect';
			
    		redirect('usermanage/add');	             
    		//$this->add();
    	}  
    	else{
    		
	        $sesion['user_name'] = $registro['username'];
	        $sesion['perfil_id'] = $registro['rol'];
			//el combo de rol esta activo. Tomar la eleccion realizada.
	        if (isSet($registro['combo']) == true){
	        	$sesion['role_id'] = $registro['rol'];
	        }
	        else{
	        	//rol por default (administrador general)
	          	$sesion['role_id'] = 1;
	        }
	        //el administrador general no tiene sede asociada.
	        if($sesion['role_id'] == 1){
	            $sesion['sede_id'] = '';
	        }else{
	            $sesion['sede_id'] = $registro['sede'];
	        }
	        
	        //insertamos el usuario
	        $user = $registro['username'].'-'.$registro['nombre'].'-'.$registro['apellido'].'-'.$registro['documento'].'-'.$registro['fec_nac'].'-'.$registro['domicilio'].'-'.$registro['telefono'].'-'.$registro['mail'].'-'.$registro['rol'].'-'.$registro['sede'];
	        $result = $this->Model_Usuario->insert($registro);
	        //si la actualización ha sido correcta creamos una sesión flashdata para decirlo
	        if($result)
	        {
	        	$this->session->set_flashdata('tipo_mensaje', 'aviso');
	        	$this->session->set_flashdata('mensaje', 'El Usuario se cre&oacute; correctamente.');
	        }
	        redirect('usermanage/search');	             
    	}
        //unset($registro['username']);
        //unset($registro['rol']);
       // unset($registro['sede']);
        //inserta en la tabla del perfil y lo retorna... no es necesario
        //$sesion['perfil_id'] = $this->Model_Perfil->insert($registro);
        
        //validamos que el usuario sea único.
        //$this->form_validation->set_rules('user_name', 'user_name', 'required|callback_my_validation');
        //echo 'despues del set rules';
        //echo 'respuesta del form_validation';
        //$res = $this->form_validation->run();
       // echo 'Es: '.$res;
        /*
        if ($res == FALSE) {
        	echo 'ya existe ese usuario chaval!';
        	
        	$this->add();
        }
        else{
        	echo 'voy a insertar jajaj';
        	
	        $this->Model_Usuario->insert($sesion);
	        redirect('usermanage/search');
        }*/
    }

	/**
	 * user delete page
	 * @access public
	 */
    /*
	public function delete()
	{
		if($this->user->checkPrivilege('user_delete') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}
	
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('user_view/user_delete');
		$this->load->view('include/footer');
	}*/
	
	public function delete($id) {
		
		if($this->user->checkPrivilege('user_delete') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}		
		$this->Model_Usuario->delete($id);
		//search es nuestro equivalente de index
		redirect('usermanage/search');
	}	

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