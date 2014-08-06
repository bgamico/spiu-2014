<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * UserManage Class
 *
 * Manage Users.
 *
 * @author Castro Patricio Nicolas
 */

class UserManage extends CI_Controller
{
	
	/**
	 * constructor for UserManage
	 * @access public
	 */
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('Model_Usuario');
		$this->load->model('Model_Perfil');
        $this->load->model('Model_Roles');
        $this->load->model('Model_Sede');
	}
	
	/**
	 * user search page
	 * @access public
	 */
	function search()
	{
		if($this->user->checkPrivilege('user_search') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}
		
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
	function operadores()
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
	
	function edit($id)
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
	 * user add page
	 * @access public
	 */
	function add()
	{
		if($this->user->checkPrivilege('user_add') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}
		
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
	function delete()
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
	}

    /**
     * user update
     * @access public
     */
    public function update() {
        $registro = $this->input->post();
        $sesion['user_id'] = $registro['user_id'];
        $sesion['role_id'] = $registro['rol'];
        if($sesion['role_id'] == 1){
            $sesion['sede_id'] = '';
        }else{
            $sesion['sede_id'] = $registro['sede'];
        }
        unset($registro['user_id']);
        unset($registro['rol']);
        unset($registro['sede']);

        $this->Model_Usuario->update($sesion);

        $registro['perfil_id'] = $this->Model_Usuario->update($sesion)->perfil_id;

        $this->Model_Perfil->update($registro);
        redirect('usermanage/search');
    }

    /**
     * user view page
     * @access public
     */
    function view($id)
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

}