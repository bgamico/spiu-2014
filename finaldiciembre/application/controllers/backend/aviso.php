<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 * Administracion de Avisos.
 *
*/

class Aviso extends CI_Controller
{

	/**
	 * constructor for avisomanage
	 * @access public
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Aviso');
	}

	/**
	 * listado de avisos
	 * @access public
	 */
	public function index()
	{
		$data['query'] = $this->Model_Aviso->getBySedeId($this->session->userdata('sede'));

		$data['div_mensajes'] = $this->retroalimentacion();
		$this->load->view('backend/include/header');
		$this->load->view('backend/include/nav');
		$this->load->view('backend/avi_view/avi_get',$data);
		$this->load->view('backend/include/footer');
	}

	/**
	 *
	 * este metodo "arma" en div que muestra los mensajes de retroalimentación
	 *
	 */
	public function retroalimentacion(){
		$msj_error = '';
		$msj_error = $this->session->flashdata('mensaje');
		if ($msj_error != ''){
			$msj_error= '<div class="alert alert-dismissable alert-' . $this->session->flashdata('status') .'">';
			$msj_error= $msj_error . '<button type="button" class="close" data-dismiss="alert">&times;</button>';
			$msj_error= $msj_error . '<strong>Aviso: </strong>' . $this->session->flashdata('mensaje');
			$msj_error= $msj_error . '</div>';
		}

		return 	$msj_error;
	}

	/**
	 * pagina para agregar avisos
	 * @access public
	 */
	public function add()
	{
		$this->load->view('backend/include/header');
		$this->load->view('backend/include/nav');
		$this->load->view('backend/avi_view/avi_add');
		$this->load->view('backend/include/footer');
	}

	/**
	 * pagina para insertar datos del aviso
	 * @access public
	 */
	public function insert() {
		$registro = $this->input->post() + array('sede_id'=> $this->session->userdata('sede'));
		$this->Model_Aviso->insert($registro);
		$this->session->set_flashdata('mensaje', 'El aviso se cre&oacute; correctamente.');
		$this->session->set_flashdata('status', 'success');
		redirect('backend/aviso');
	}

	/**
	 * aviso edit page
	 * @access public
	 */
	public function edit($id)
	{
		$this->data['registro'] = $this->Model_Aviso->find($id);
		 
		$this->load->view('backend/include/header');
		$this->load->view('backend/include/nav');
		$this->load->view('backend/avi_view/avi_edit', $this->data);
		$this->load->view('backend/include/footer');
	}

	/**
	 * actulizar datosl aviso
	 * @access public
	 */
	public function update() {
		$registro = $this->input->post();
		$this->Model_Aviso->update($registro);
		$this->session->set_flashdata('mensaje', 'El aviso se actualiz&oacute; correctamente.');
		$this->session->set_flashdata('status', 'success');
		redirect('backend/aviso');
	}


	/**
	 * eliminacion de avisos
	 * @access public
	 */
	public function delete($id)
	{
		$this->Model_Aviso->delete($id);
		$this->session->set_flashdata('mensaje', 'El aviso se elimin&oacute; correctamente.');
		$this->session->set_flashdata('status', 'success');
		redirect('backend/aviso');
	}
	 
}