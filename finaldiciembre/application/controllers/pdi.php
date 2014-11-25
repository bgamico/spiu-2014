<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Administracion de Pdi.
 *
 * @author Castro Patricio Nicolas
 */

class Pdi extends CI_Controller
{
	
	/**
	 * listar los pdi
	 * @access public
	 */
	function get()
	{				
		
		$sede = $this->Model_Sede->find($this->session->userdata('sede'));
		$this->load->library('googlemaps');
		$config = array();
// 		$config['center'] = 'rio negro,argentina';
// 		$config['zoom'] = '6';
		$config['center'] = $sede[0]->latitud.','.$sede[0]->longitud;
		$config['zoom'] = '12';	
		$config['map_type'] = 'ROADMAP';
		$config['map_width'] = '750px';
		$config['map_height'] = '500px';
		$this->googlemaps->initialize($config);
		
		$markers = $this->Model_Pdi->getBySedeId($this->session->userdata('sede'));
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
		$this->load->view('include/nav');
		$this->load->view('pdi_view/pdi_get', $data);
		$this->load->view('include/footer');
	}
	
	/**
	 * pagina de edicion de puntos de informacion
	 * @access public
	 */
	function edit($id)
	{
		$query = $this->Model_Pdi->find($id);
		$data['query'] = $query;
		
		$this->load->library('googlemaps');
		
		foreach($query as $row)
		{
			$marker = array();
			$marker ['position'] = $row->latitud.','.$row->longitud;
			$marker ['infowindow_content'] = '<img src='.base_url('uploads/'.$row->imagen).'><br>'.$row->nombre;
			$marker['id'] = $row->id;
			$marker['draggable'] = true;
			$marker['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';
			$this->googlemaps->add_marker($marker);
			$config['center'] = $row->latitud.','.$row->longitud;
		}
		
		$config['zoom'] = 10;
		$this->googlemaps->initialize($config);
		$data['map'] = $this->googlemaps->create_map();
	
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('pdi_view/pdi_edit',$data);
		$this->load->view('include/footer');
	}
	
	/**
	 * pagina para agregar puntos de informacion
	 * @access public
	 */
	function add()
	{
		$this->load->library('googlemaps');
		
		$sede = $this->Model_Sede->find($this->session->userdata('sede'));
		
		$config['center'] = $sede[0]->latitud.','.$sede[0]->longitud;
		$config['zoom'] = '13';
		$this->googlemaps->initialize($config);
		
		$marker = array();
		$marker['position'] = $sede[0]->latitud.','.$sede[0]->longitud;
		$marker['draggable'] = true;
		$marker['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';
		$this->googlemaps->add_marker($marker);
		$data['map'] = $this->googlemaps->create_map();
		
		$this->load->model('ciudades_model');
		$data['provincias'] = $this->ciudades_model->provincias();
		
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('pdi_view/pdi_add', $data);
		$this->load->view('include/footer');
	}
	
	/**
	 * eliminacion de puntos de informacion
	 * @access public
	 */
	function delete($id)
	{
		$this->Model_Pdi->delete($id);
		redirect('pdi/get');
	}
	
	/**
	 * insertar datos del punto de informacion de la sede
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
		
		$registro+=array('sede_id'=> $this->session->userdata('sede'));
		$this->Model_Pdi->insert($registro);
		redirect('pdi/get');
	}
	
	/**
	 * actualizar datos del punto de informacion
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
		$this->Model_Pdi->update($registro);
		redirect('pdi/get');
	}
	
	public function llena_localidades()
	{
		$options = "";
		if($this->input->post('provincia'))
		{
			$provincia = $this->input->post('provincia');
			$this->load->model('ciudades_model');
			$localidades = $this->ciudades_model->localidades($provincia);
			foreach($localidades as $fila)
			{
				?>
					<option value="<?=$fila -> id ?>"><?=$fila -> ciudad_nombre ?></option>
				<?php
				}
			}
		}
	
}