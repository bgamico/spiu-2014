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

		$data['div_mensajes'] = $this->retroalimentacion();
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('fec_view/fec_get', $data);
		$this->load->view('include/footer');
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
	 * insertar datos de la fecha de examen
	 * @access public
	 */
	public function insert() {
			
		$registro = $this->input->post() + array('sede_id'=> $this->session->userdata('sede'));
		$this->load->model('Model_Examen');
		$this->Model_Examen->insert($registro);
		$this->session->set_flashdata('mensaje', 'La fecha de examen se cre&oacute; correctamente.');
		$this->session->set_flashdata('status', 'success');
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
		$this->session->set_flashdata('mensaje', 'La fecha de examen se actualiz&oacute; correctamente.');
		$this->session->set_flashdata('status', 'success');
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
		$this->session->set_flashdata('mensaje', 'La fecha de examen se elimin&oacute; correctamente.');
		$this->session->set_flashdata('status', 'success');
		redirect('fecha');
	}
}