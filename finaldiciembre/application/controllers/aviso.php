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
        
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('avi_view/avi_get',$data);
		$this->load->view('include/footer');
	}
		
	/**
	 * pagina para agregar avisos
	 * @access public
	 */
	public function add()
	{
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('avi_view/avi_add');
		$this->load->view('include/footer');
	}
	
	/**
	 * pagina para insertar datos del aviso
	 * @access public
	 */
	public function insert() {
		$registro = $this->input->post() + array('sede_id'=> $this->session->userdata('sede'));
		$this->Model_Aviso->insert($registro);
		redirect('aviso');
	}

    /**
     * aviso edit page
     * @access public
     */
    public function edit($id)
    {
    	$this->data['registro'] = $this->Model_Aviso->find($id);
    	
    	$this->load->view('include/header');
    	$this->load->view('include/nav');
    	$this->load->view('avi_view/avi_edit', $this->data);
    	$this->load->view('include/footer');
    }    

	/**
     * actulizar datosl aviso
     * @access public
     */
    public function update() {
		$registro = $this->input->post();
		$this->Model_Aviso->update($registro);
		redirect('aviso');
   }  

 
    /**
	 * eliminacion de avisos
	 * @access public
	 */
	public function delete($id)
	{
		$this->Model_Aviso->delete($id);
		redirect('aviso');	
	}
   
}