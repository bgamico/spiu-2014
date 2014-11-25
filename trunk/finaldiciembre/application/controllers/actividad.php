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

		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('act_view/act_get',$data);
		$this->load->view('include/footer');
	}
	
	/**
	 * pagina para agregar actividad
	 * @access public
	 */
	public function add()
	{
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('act_view/act_add');
		$this->load->view('include/footer');
	}

    /**
     * pagina para insertar datos de la actividad
     * @access public
     */
    public function insert() {
		$registro = $this->input->post() + array('sede_id'=> $this->session->userdata('sede'));
		$this->Model_Actividad->insert($registro);
		redirect('actividad');    
    }

    /**
     * actividad edit page
     * @access public
     */
    public function edit($id)
    {
    	$data['registro'] = $this->Model_Actividad->find($id);
    	 
    	$this->load->view('include/header');
    	$this->load->view('include/nav');
    	$this->load->view('act_view/act_edit', $data);
    	$this->load->view('include/footer');
    }    

    /**
     * actulizar datos de la actividad
     * @access public
     */
    public function update() {
		$registro = $this->input->post();
		$this->Model_Actividad->update($registro);
		redirect('actividad');
   }    

    /**
	 * actividad delete page
	 * @access public
	 */
	public function delete($id)
	{
		$this->Model_Actividad->delete($id);
		redirect('actividad');	
	}
}