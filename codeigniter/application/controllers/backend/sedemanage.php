<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * SedeManage Class
 *
 * Manage Sedes.
 *
 * @author Castro Patricio Nicolas
 */

class SedeManage extends CI_Controller
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
	function search()
	{
		if($this->user->checkPrivilege('sede_search') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}

		$data['query'] = $this->Model_Sede->all();
		$data['agregar'] = true;
		$data['opciones'] = true;
		
		$this->load->view('include/header');
		$this->load->view('include/nav',$data);
		$this->load->view('sede_view/sede_search');
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

		$query = $this->Model_Sede->find($id);
		$data['query'] = $query;
		
		foreach ($query as $row)
		 {
			$latitud =  $row->latitud;
			$longitud =  $row->longitud;
		 }
		
 		$this->load->library('googlemaps');
		$config['center'] = $latitud.','. $longitud;
		$config['zoom'] = 12;
		$this->googlemaps->initialize($config);
		
		$marker = array();
		$marker['position'] = $latitud.','. $longitud;
		$marker['draggable'] = true;
		$marker['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';
		$this->googlemaps->add_marker($marker);
		$data['map'] = $this->googlemaps->create_map();

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
	
	 /**
     * user view page
     * @access public
     */
    function view($id)
    {
		
        $data['titulo'] = 'Consultar Sede';
        $data['query'] = $this->Model_Sede->find($id);
		
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('sede_view/sede_search',$data);
        $this->load->view('include/footer');
    }

    function miSede()
    {
		
        $miSede = $this->user->getSedeId();
		$data['query'] = $this->Model_Sede->find($miSede);
		
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('sede_view/sede_search',$data);
        $this->load->view('include/footer');
    }
}