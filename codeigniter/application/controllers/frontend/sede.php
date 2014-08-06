<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Sede Class
 *
 * Manage Sedes.
 *
 * @author Castro Patricio Nicolas
 */

class Sede extends CI_Controller
{
	/**
	 * constructor for SedeManage
	 * @access public
	 */
	function __construct()
	{
		parent::__construct();

		$this->load->model('Model_Sede');
	}
	
	/**
	 * sede search page
	 * @access public
	 */
	function search($id)
	{
		$data['query'] = $this->Model_Sede->find($id);
		
		$this->load->view('include/header');
		//$this->load->view('include/nav',$data);
		$this->load->view('sede_view/sede_search',$data);
		$this->load->view('include/footer');
	}
	
	/**
	 * sede edit page
	 * @access public
	 */
	function edit($id )
	{
		if($this->user->checkPrivilege('sede_edit') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}

        $data['query'] = $this->Model_Sede->find($id);

		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('sede_view/sede_edit',$data);
		$this->load->view('include/footer');
	}

    /**
     * sede update
     * @access public
     */
    public function update() {
        $registro = $this->input->post();
        $this->Model_Sede->update($registro);
        redirect('sedemanage/search');
    }
	
	/**
	 * sede add page
	 * @access public
	 */
	function add()
	{
		if($this->user->checkPrivilege('sede_add') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}
	
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('sede_view/sede_add');
		$this->load->view('include/footer');
	}

    /**
     * user insert
     * @access public
     */
    public function insert() {
        $registro = $this->input->post();
        $this->Model_Sede->insert($registro);
        redirect('sedemanage/search');
    }

    /**
	 * sede delete page
	 * @access public
	 */
	function delete()
	{
		if($this->user->checkPrivilege('sede_delete') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}
	
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('sede_view/sede_delete');
		$this->load->view('include/footer');
	}
}