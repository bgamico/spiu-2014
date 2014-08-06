<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * PerfilManage Class
 *
 * Manage Perfil.
 *
 * @author Castro Patricio Nicolas
 */

class PerfilManage extends CI_Controller
{
	
	/**
	 * constructor for PerfilManage
	 * @access public
	 */
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('Model_Perfil');
	}
	
	/**
	 * perfil search page
	 * @access public
	 */
	function search()
	{
		if($this->user->checkPrivilege('perfil_search') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}
		
		$miPerfil = $this->user->getPerfilId();
		$data['query'] = $this->Model_Perfil->get($miPerfil);
		$data['titulo'] = 'Mi Perfil';
		$data['opciones'] = true;
		
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('perfil_view/perfil_search',$data);
		$this->load->view('include/footer');
	}
	
	/**
	 * perfil edit page
	 * @access public
	 */
	function edit($perfil)
	{
		if($this->user->checkPrivilege('perfil_edit') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}

        //$miPerfil = $this->user->getPerfilId();
        $data['query'] = $this->Model_Perfil->get($perfil);
	
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('perfil_view/perfil_edit',$data);
		$this->load->view('include/footer');
	}

    /**
     * perfil update
     * @access public
     */
    public function update() {
        $registro = $this->input->post();
        $this->Model_Perfil->update($registro);
        redirect('perfilmanage/search');
    }
}