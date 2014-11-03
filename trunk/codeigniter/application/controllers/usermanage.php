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
	
	private $data;
	private $actividad_id;
	private $reglas = array(        	//  Configuramos las validaciones ayudandonos con la librería form_validation
			array(
					'field'   => 'username',
					'label'   => 'Nombre usuario',
					'rules'   => 'required|is_unique(user.user_name)'
			),	
			array(
					'field'   => 'nombre',
					'label'   => 'Nombre',
					'rules'   => 'required'
			),
			array(
					'field'   => 'apellido',
					'label'   => 'Apellido',
					'rules'   => 'required'
			),
			array(
					'field'   => 'documento',
					'label'   => 'Documento',
					'rules'   => 'required'
			),
			array(
					'field'   => 'fec_nac',
					'label'   => 'Fecha de Nacimiento',
					'rules'   => 'required'
			),
			array(
					'field'   => 'domicilio',
					'label'   => 'Domicilio',
					'rules'   => 'required'
			),
			array(
					'field'   => 'telefono',
					'label'   => 'Tel&eacute;fono',
					'rules'   => 'required'
			),
			array(
					'field'   => 'mail',
					'label'   => 'E-mail',
					'rules'   => 'required'
			),
			array(
					'field'   => 'rol',
					'label'   => 'Rol',
					'rules'   => 'required'
			),
			array(
					'field'   => 'sede',
					'label'   => 'Sede',
					'rules'   => 'required'
			)
	);	
	
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
        $this->data['urlCancelar'] = 'usermanage/search';      
        $this->form_validation->set_error_delimiters('<p class="text-primary"><em><button type="button" class="close text-primary" data-dismiss="alert"><p class="text-primary">&times;</p></button>','</em></p>');
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
		$this->data['query'] = $this->Model_Usuario->all($this->user->getUserId());
		$this->data['contenedor_aux'] = $this->retroalimentacion();
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('user_view/user_search',$this->data);
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
	 * user add page
	 * @access public
	 */
	public function add(){
		/*if($this->user->checkPrivilege('user_add') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}*/

		//  Si no recibimos ningún valor proveniente del formulario, significa que el usuario recién ingresa.
		//if(isset($_POST['username'])){    
			//$this->form_validation->set_rules('username','Username','is_unique[user.user_name]');//  Configuramos las validaciones ayudandonos con la librería form_validation
			//if(($this->form_validation->run()==TRUE)){               //  Verificamos si el usuario superó la validación
				
				//	$this->insert();                     //  insertamos
			//}
		//}
		
		//$data['url'] = 'usermanage/operadores';
		
        if($this->user->getUserRole() == 'admingral'){
            $this->data['roles'] = $this->Model_Roles->all();
            $this->data['sedes'] = $this->Model_Sede->allArray();
            $this->data['combo'] = true;
            //$data['url'] = 'usermanage/search';
        }

		//$data['url'] = 'usermanage/search';
		
  		//$this->load->view('include/header');
		//$this->load->view('include/nav');
		
		//$this->load->view('user_view/user_add',$data);
		//$this->load->view('include/footer');
		
		$this->data['titulo'] = 'Crear usuario';
		$this->data['urlCancelar'];
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('user_view/user_add', $this->data);
		$this->load->view('include/footer');		
		
		
	}

   
	public function insert() {


		//reglas de validación
		$this->form_validation->set_rules($this->reglas);
				
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

		
		//if(isset($registro['username'])){

			if(($this->form_validation->run() == TRUE)){
				//en esta instancia hemos superado la validacion del formulario
				//  insertamos
				$this->Model_Usuario->insert($sesion);
				$this->session->set_flashdata('mensaje', 'El usuario se insert&oacute; correctamente.');
				$this->session->set_flashdata('status', 'success');
				redirect('usermanage/search', 'refresh');
			}else {
				//no se pudo insertar, algún problema con la BD
				$this->add();
				//redirect('actividadmanage/add', 'refresh');
			}
		//}		
		
		//$this->Model_Usuario->insert($sesion);
		//redirect('usermanage/search');
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
    	$status = '';
    	$mensaje = '';    	
    	$this->Model_Usuario->delete($id);
    	if ($this->db->affected_rows() > 0){
    		$status = 'success';
    		$mensaje = 'El usuario se elimin&oacute; correctamente.';
    		$title = '';
    	}
    	$this->session->set_flashdata('mensaje', $mensaje);
    	$this->session->set_flashdata('status', $status);
    	redirect('usermanage/search', 'refresh');    	
    }
}