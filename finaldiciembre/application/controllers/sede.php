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
	function get(){

		$this->load->library('googlemaps');
		$config = array();
		$config['center'] = 'rio negro,argentina';
		$config['zoom'] = '6';
		$config['map_type'] = 'ROADMAP';
		$config['map_width'] = '750px';
		$config['map_height'] = '500px';
		$this->googlemaps->initialize($config);
		
		$markers = $this->Model_Sede->all();
		$data['datos'] = $markers;
		foreach($markers as $info_marker)
		{
			$marker = array();
			$marker ['animation'] = 'DROP';
			$marker ['position'] = $info_marker->latitud.','.$info_marker->longitud;
			$marker ['infowindow_content'] = '<img src='.base_url('uploads/patagones.jpg').'><br>'.$info_marker->nombre;
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
		$this->load->view('sede_view/sede_add', array('error' => ' ' ));
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
    	
    	if ( ! $this->upload->do_upload())
    	{
    		$error = array('error' => $this->upload->display_errors());
    	
    		$this->load->view('sede_view/sede_add', $error);
    	}
    	else
    	{    	
    		$upload_data = $this->upload->data();
    		$registro = $this->input->post() + array('imagen'=> $upload_data['file_name']);
 	        $this->Model_Sede->insert($registro);
	        redirect('sede/get');
    	}
    	 
    }
    
    /**
	 * sede delete page
	 * @access public
	 */
	function delete()
	{
	
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('sede_view/sede_delete');
		$this->load->view('include/footer');
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

    function miSede()
    {
    	
    	$query = $this->Model_Sede->miSede($this->session->userdata('username'));
    	$data['datos'] = $query;
    	$this->load->library('googlemaps');
    	
    	foreach($query as $row)
    	{
    		$marker = array();
    		$marker ['position'] = $row->latitud.','.$row->longitud;
    		$marker ['infowindow_content'] = '<img src='.base_url('uploads/'.$row->imagen).'><br>'.$row->nombre;
    		$marker['id'] = $row->id;
    		$this->googlemaps->add_marker($marker);
    	}
    	
    	$config['center'] = $row->latitud.','.$row->longitud;
    	$config['zoom'] = 10;
    	$this->googlemaps->initialize($config);
    	    	
		//$data['query'] = $this->Model_Sede->miSede($this->session->userdata('username'));
    	$data['map'] = $this->googlemaps->create_map();
		
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
    
    	foreach ($query as $row)
    	{
    		$latitud =  $row->latitud;
    		$longitud =  $row->longitud;
    		$nombre = $row->nombre;
    		$imagen = $row->imagen;
    	}
    
    	$this->load->library('googlemaps');
    	$config['center'] = $latitud.','. $longitud;
    	$config['zoom'] = 10;
    	$this->googlemaps->initialize($config);
    
    	$marker = array();
    	$marker['position'] = $latitud.','. $longitud;
    	$marker['draggable'] = true;
    	$marker['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';
//     	$marker['onmouseover'] = 'iw.setContent(this.get("content")); iw.open(map, this);';
    	$marker['infowindow_content'] = '<img src='.base_url('uploads/patagones.jpg').'><br>'. $nombre;
    	$this->googlemaps->add_marker($marker);
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
    	 
    	if ( ! $this->upload->do_upload())
    	{
    		$error = array('error' => $this->upload->display_errors());
    		 
    		$this->load->view('sede_view/sede_edit');
    	}
    	else
    	{
    		$upload_data = $this->upload->data();
    		$registro = $this->input->post() + array('imagen'=> $upload_data['file_name']);
    		$this->Model_Sede->update($registro);
    		redirect('sede/get');
    	}
    }
    
}