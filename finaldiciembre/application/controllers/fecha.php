<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 * Administracion de fechas de examen
 *
 * @author Castro Patricio Nicolas
 */

class Fecha extends CI_Controller
{
	
	/**
	 * pagina para listar las fechas de examen
	 * @access public
	 */
	function index()
	{
		$this->load->model('Model_Examen');
		$data['query'] = $this->Model_Examen->getBySedeId($this->session->userdata('sede'));
		
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('fec_view/fec_get', $data);
		$this->load->view('include/footer');
	}
	
	/**
	 * insertar datos de la fecha de examen
	 * @access public
	 */
	public function insert() {
			
		$registro = $this->input->post() + array('sede_id'=> $this->session->userdata('sede'));
		$this->load->model('Model_Examen');
		$this->Model_Examen->insert($registro);
		redirect('fecha');
	}
		
	/**
	 * pagina de edicion de fechas de examen
	 * @access public
	 */
	function edit($id)
	{
		$this->load->model('Model_Examen');
		$data['query'] = $this->Model_Examen->find($id);
		
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('fec_view/fec_edit',$data);
		$this->load->view('include/footer');
	}
	
	/**
	 * actualizar datos de la fecha de examen
	 * @access public
	 */
	public function update() {
		$registro = $this->input->post();
		$this->load->model('Model_Examen');
		$this->Model_Examen->update($registro);
		redirect('fecha');
	}
	
	/**
	 * pagina para agregar fechas de examen
	 * @access public
	 */
	function add()
	{
	
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('fec_view/fec_add');
		$this->load->view('include/footer');
	}
	
	/**
	 * eliminacion de fechas de examen
	 * @access public
	 */
	function delete($id)
	{
		$this->load->model('Model_Examen');
		$this->Model_Examen->delete($id);
		redirect('fecha');
	}
}