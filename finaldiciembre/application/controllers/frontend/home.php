<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	// Constructor de Clase
	function __construct() {
		parent::__construct();
	}

	public function pdi($id){

		$this->load->library('googlemaps');
		$markers = $this->Model_Pdi->getBySedeId($id);
		$sede = $this->Model_Sede->find($id);
		$this->load->library('googlemaps');
		$config = array();
		$config['center'] = $sede[0]->latitud.','.$sede[0]->longitud;
		$config['zoom'] = '12';
		$config['map_width'] = '500px';
		$config['map_height'] = '800px';
		$this->googlemaps->initialize($config);

		$data['datos'] = $markers;
		foreach($markers as $info_marker)
		{
			$marker = array();
			$marker ['animation'] = 'DROP';
			$marker ['position'] = $info_marker->latitud.','.$info_marker->longitud;
			$marker['infowindow_content'] = '<img width="190" height="149" src='.base_url('uploads/'.$info_marker->imagen).'><br>'."<strong>Nombre: </strong>".$info_marker->nombre.'<br>'."<strong>Direccion: </strong>".$info_marker->direccion.'<br>'."<strong>Ciudad: </strong>".$info_marker->ciudad.'<br>'."<strong>Provincia: </strong>".$info_marker->provincia."<br><strong>Descripcion: </strong><br><textarea rows='3' cols='25' readonly>".$info_marker->direccion."</textarea>";;
			$marker['id'] = $info_marker->id;
			$this->googlemaps->add_marker($marker);
		}

		$data['map'] = $this->googlemaps->create_map();

		$this->load->view('frontend/include/header');
		$this->load->view('frontend/pdi_get', $data);
		$this->load->view('frontend/include/footer');
	}

	public function aviso($id){
		$data['query'] = $this->Model_Aviso->getBySedeId($id);

		$this->load->view('frontend/include/header');
		$this->load->view('frontend/avi_get', $data);
		$this->load->view('frontend/include/footer');
	}

	public function actividad($id){
		$data['query'] = $this->Model_Actividad->getBySedeId($id);

		$this->load->view('frontend/include/header');
		$this->load->view('frontend/act_get', $data);
		$this->load->view('frontend/include/footer');
	}

	public function examen($id){
		$this->load->model('Model_Examen');
		$data['query'] = $this->Model_Examen->getBySedeId($id);

		$this->load->view('frontend/include/header');
		$this->load->view('frontend/examen_get', $data);
		$this->load->view('frontend/include/footer');
	}

	public function index(){ 
		$this->load->library('googlemaps');
		$markers = $this->Model_Sede->all();
		$this->load->library('googlemaps');

		$config = array();
		$config['center'] = 'rio negro,argentina';
		$config['zoom'] = '6';
		$config['map_width'] = '500px';
		$config['map_height'] = '800px';
		$this->googlemaps->initialize($config);

		$data['datos'] = $markers;
		
		foreach($markers as $info_marker)
		{
			$marker = array();
			$marker ['animation'] = 'DROP';
			$marker ['position'] = $info_marker->latitud.','.$info_marker->longitud;
			$marker ['infowindow_content'] = '<img width="190" height="149" src='.base_url('uploads/'.$info_marker->imagen).'><br>'."<strong>Nombre: </strong>".$info_marker->nombre.'<br>'."<strong>Direccion: </strong>".$info_marker->direccion."<br><strong>Descripcion: </strong><br><textarea rows='3' cols='25' readonly>".$info_marker->direccion."</textarea>";
			$marker['id'] = $info_marker->id;
			$this->googlemaps->add_marker($marker);
		}
		
		$data['map'] = $this->googlemaps->create_map();

		$this->load->view('frontend/include/header');
		$this->load->view('frontend/index',$data);
		$this->load->view('frontend/include/footer');
	}
	

}
