<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ActividadManage Class
 *
 * Manage Actividad.
 *
 * @author Castro Patricio Nicolas
 */

class ActividadManage extends CI_Controller
{
	
	private $data;
	/**
	 * constructor for ActividadManage
	 * @access public
	 */
	function __construct()
	{
		parent::__construct();
        $this->load->model('Model_Actividad');
        $this->data['titulo'] = '';
        $this->data['urlCancelar'] = 'actividadmanage/search';
	}
	
	/**
	 * actividad search page
	 * @access public
	 */
	function search()
	{
		if($this->user->checkPrivilege('act_search') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}

        $sede_id = $this->user->getSedeId();
        $data['query'] = $this->Model_Actividad->all($sede_id);
		
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('act_view/act_search',$data);
		$this->load->view('include/footer');
	}
	
	/**
	 * actividad edit page
	 * @access public
	 */
	function edit($id)
	{
		if($this->user->checkPrivilege('act_edit') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}

        $data['registro'] = $this->Model_Actividad->find($id);
        $data['titulo'] = 'Actualizar actividad';        
	
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('act_view/act_edit',$data);
		$this->load->view('include/footer');
	}
	
	/**
	 * actividad add page
	 * @access public
	 */
	function add()
	{
		if($this->user->checkPrivilege('act_add') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}
		
		$this->data['titulo'] = 'Crear actividad';
		$this->data['urlCancelar'];
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('act_view/act_add', $this->data);
		$this->load->view('include/footer');
	}

    /**
     * actividad insert
     * @access public
     */
    public function insert() {
        $registro = $this->input->post();
        $registro['sede_id'] = $this->user->getSedeId();
        $this->Model_Actividad->insert($registro);
        redirect('actividadmanage/search');
    }


    /**
	 * actividad delete page
	 * @access public
	 */
	function delete()
	{
		if($this->user->checkPrivilege('act_delete') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}
	
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('act_view/act_delete');
		$this->load->view('include/footer');
	}

    /**
     * actividad update
     * @access public
     */
    public function update() {
        $registro = $this->input->post();
        $this->Model_Actividad->update($registro);
        redirect('actividadmanage/search');
    }
}