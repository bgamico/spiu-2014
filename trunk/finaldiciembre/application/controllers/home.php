<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	// Constructor de Clase
	function __construct() {
		parent::__construct();
	}

	public function index() {
		
		$this->load->library('googlemaps');
		$markers = $this->Model_Sede->all();
		$this->load->library('googlemaps');
		$config = array();
		$config['center'] = 'rio negro,argentina';
		$config['zoom'] = '6';
// 		$config['cluster'] = TRUE;
// 		$config['map_type'] = 'ROADMAP';
		$config['map_width'] = '750px';
		$config['map_height'] = '500px';
		$this->googlemaps->initialize($config);
		
		$data['datos'] = $markers;
		foreach($markers as $info_marker)
		{
			$marker = array();
			$marker ['animation'] = 'DROP';
			$marker ['position'] = $info_marker->latitud.','.$info_marker->longitud;
			$marker ['infowindow_content'] = '<img src='.base_url('uploads/'.$info_marker->imagen).'><br>'.$info_marker->nombre;
			$marker['id'] = $info_marker->id;
			$this->googlemaps->add_marker($marker);
		}
		
		$data['map'] = $this->googlemaps->create_map();
				
		$this->load->view('include/header');		
		$this->load->view('frontend/index', $data);
		$this->load->view('include/footer');
	}
	
	public function sede($id){
	
		$this->load->library('googlemaps');
		$markers = $this->Model_Pdi->getBySedeId($id);
		$this->load->library('googlemaps');
		$config = array();
		$config['center'] = 'rio negro,argentina';
		$config['zoom'] = '6';
		$config['cluster'] = TRUE;
		$config['map_width'] = '750px';
		$config['map_height'] = '500px';
		$this->googlemaps->initialize($config);
	
		$data['datos'] = $markers;
		foreach($markers as $info_marker)
		{
			$marker = array();
			$marker ['animation'] = 'DROP';
			$marker ['position'] = $info_marker->latitud.','.$info_marker->longitud;
			$marker ['infowindow_content'] = '<img src='.base_url('uploads/'.$info_marker->imagen).'><br>'.$info_marker->nombre;
			$marker['id'] = $info_marker->id;
			$this->googlemaps->add_marker($marker);
		}
	
		$data['map'] = $this->googlemaps->create_map();
	
		$this->load->view('include/header');
		$this->load->view('frontend/sede_search', $data);
		$this->load->view('include/footer');
	}
	
	public function aviso($id){
		$data['query'] = $this->Model_Aviso->getBySedeId($id);
		
		$this->load->view('include/header');
		$this->load->view('frontend/avi_get', $data);
		$this->load->view('include/footer');
	}
	
	public function actividad($id){
		$data['query'] = $this->Model_Actividad->getBySedeId($id);
	
		$this->load->view('include/header');
		$this->load->view('frontend/act_get', $data);
		$this->load->view('include/footer');
	}
	
	public function examen($id){ // falta fecha de examen
		$data['query'] = $this->Model_Actividad->getBySedeId($id);
	
		$this->load->view('include/header');
		$this->load->view('frontend/act_get', $data);
		$this->load->view('include/footer');
	}
	
}
