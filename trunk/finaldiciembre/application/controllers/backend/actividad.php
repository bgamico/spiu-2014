<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Administracion de Actividades.
 *
 * @author Castro Patricio Nicolas
*/

class Actividad extends CI_Controller
{

	/**
	 * constructor for ActividadManage
	 * @access public
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Actividad');
	}

	/**
	 * listar actividades
	 * @access public
	 */
	public function index()
	{
	
        $data['query'] = $this->Model_Actividad->getBySedeId($this->session->userdata('sede'));


		$data['query'] = $this->Model_Actividad->getBySedeId($this->session->userdata('sede'));
		$data['div_mensajes'] = $this->retroalimentacion();
		$this->load->view('backend/include/header');
		$this->load->view('backend/include/nav');
		$this->load->view('backend/act_view/act_get',$data);
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
	 * pagina para agregar actividad
	 * @access public
	 */
	public function add()
	{
		$this->load->view('backend/include/header');
		$this->load->view('backend/include/nav');
		$this->load->view('backend/act_view/act_add');
		$this->load->view('backend/include/footer');
	}

	/**
	 * pagina para insertar datos de la actividad
	 * @access public
	 */
	public function insert() {
		$registro = $this->input->post() + array('sede_id'=> $this->session->userdata('sede'));
		$this->Model_Actividad->insert($registro);
		$this->session->set_flashdata('mensaje', 'La actividad se cre&oacute; correctamente.');
		$this->session->set_flashdata('status', 'success');
		redirect('backend/actividad');
	}

	/**
	 * actividad edit page
	 * @access public
	 */
	public function edit($id)
	{
		$data['registro'] = $this->Model_Actividad->find($id);

		$this->load->view('backend/include/header');
		$this->load->view('backend/include/nav');
		$this->load->view('backend/act_view/act_edit', $data);
		$this->load->view('backend/include/footer');
	}

	/**
	 * actulizar datos de la actividad
	 * @access public
	 */
	public function update() {
		$registro = $this->input->post();
		$this->Model_Actividad->update($registro);
		$this->session->set_flashdata('mensaje', 'La actividad se actualiz&oacute; correctamente.');
		$this->session->set_flashdata('status', 'success');
		redirect('backend/actividad');
	}

	/**
	 * actividad delete page
	 * @access public
	 */
	public function delete($id)
	{
		$this->Model_Actividad->delete($id);
		$this->session->set_flashdata('mensaje', 'La actividad se elimin&oacute; correctamente.');
		$this->session->set_flashdata('status', 'success');
		redirect('backend/actividad');
	}
}