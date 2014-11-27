<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Administración de Sedes.
 *
 * @author Castro Patricio Nicolas
 */

class Sede extends CI_Controller
{
	
	/**
	 * listado de sedes
	 * @access public
	 */
	function index(){

		if ($this->session->userdata('rol') == 1){
			$markers = $this->Model_Sede->all();
		}
		else{
			$markers = $this->Model_Sede->miSede($this->session->userdata('username'));
		}

		$this->load->library('googlemaps');
		$config = array();
		$config['center'] = 'rio negro,argentina';
		$config['zoom'] = '6';
		$config['map_type'] = 'ROADMAP';
		$config['map_width'] = '750px';
		$config['map_height'] = '500px';
		$this->googlemaps->initialize($config);
				
		$data['datos'] = $markers;
		foreach($markers as $info_marker)
		{
			$marker = array();
			$marker ['animation'] = 'DROP';
			$marker ['position'] = $info_marker->latitud.','.$info_marker->longitud;
			$marker ['infowindow_content'] = '<img width="150" height="117" src='.base_url('uploads/'.$info_marker->imagen).'><br>'.$info_marker->nombre;
			$marker['id'] = $info_marker->id;
			$this->googlemaps->add_marker($marker);
		}
		
		$data['map'] = $this->googlemaps->create_map();
		
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('sede_view/sede_get',$data);
		$this->load->view('include/footer');
		
	}	
		
	/**
	 * formulario para agregar sedes
	 * @access public
	 */
	function add()
	{
		// 		if(isset($_POST['nombre'])){    //  Si no recibimos ningún valor proveniente del formulario, significa que el usuario recién ingresa.
		// 		 	$this->form_validation->set_rules('nombre','Nombre','is_unique[sede.nombre]');//  Configuramos las validaciones ayudandonos con la librería form_validation
		// 			if(($this->form_validation->run()==TRUE)){               //  Verificamos si el usuario superó la validación
		// 				$this->insert();                     //  insertamos
		// 			}
		// 		}
		
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('sede_view/sede_add');
		$this->load->view('include/footer');
	}
	
	
    /**
     * cargar imagen e insertar datos de la sede en la base
     * @access public
     */
    public function insert() {
    	$config['upload_path'] = './uploads/';
    	$config['allowed_types'] = 'gif|jpg|png';
    	$this->load->library('upload', $config);
    	
    	$registro = $this->input->post();
    	
    	if ( $this->upload->do_upload())
    	{
    		$upload_data = $this->upload->data();
    		$registro += array('imagen'=> $upload_data['file_name']);
    	}
 	        $this->Model_Sede->insert($registro);
	        redirect('sede');
    	 
    }
    
    /**
	 * eliminación de sedes
	 * @access public
	 */
	function delete($id)
	{
		$this->Model_Sede->delete($id);
		redirect('sede');
	}
	
	 /**
     * detalles de la sede
     * @access public
     */
    function view($id)
    {
		
        $data['query'] = $this->Model_Sede->find($id);
		
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('sede_view/sede_get',$data);
        $this->load->view('include/footer');
    }
    
    /**
     * editar datos de la sede
     * @access public
     */
    function edit($id )
    {
    	
    	$query = $this->Model_Sede->find($id);
    	$data['query'] = $query;
    
    	$this->load->library('googlemaps');
    	 
    	foreach($query as $row)
    	{
    		$marker = array();
    		$marker ['position'] = $row->latitud.','.$row->longitud;
    		$marker ['infowindow_content'] = '<img width="150" height="117" src='.base_url('uploads/'.$row->imagen).'><br>'.$row->nombre;
    		$marker['id'] = $row->id;
	    	$marker['draggable'] = true;
	    	$marker['set_position'] = true;
	    	$marker['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';
	    	$this->googlemaps->add_marker($marker);
    	}
    	
    	$config['center'] = $row->latitud.','.$row->longitud;
    	$config['onclick'] = 'marker_1.setPosition(event.latLng);updateDatabase(event.latLng.lat(), event.latLng.lng());';
     	
    	$config['zoom'] = 10;
    	$this->googlemaps->initialize($config);
    	$data['map'] = $this->googlemaps->create_map();
    	
    	$this->load->view('include/header');
    	$this->load->view('include/nav');
    	$this->load->view('sede_view/sede_edit',$data);
    	$this->load->view('include/footer');
    }
    
    /**
     * actualizar datos de la sede
     * @access public
     */
    public function update() {
    	
    	$config['upload_path'] = './uploads/';
    	$config['allowed_types'] = 'gif|jpg|png';
    	 
    	$this->load->library('upload', $config);
    	$registro = $this->input->post();
    	if ( $this->upload->do_upload())
    	{
    		$upload_data = $this->upload->data();
    		$registro += array('imagen'=> $upload_data['file_name']);
    	}
    	$this->Model_Sede->update($registro);
    	redirect('sede');
    }
    
}