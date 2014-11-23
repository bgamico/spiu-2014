<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 * Administracion de Avisos.
 *
 */

class Aviso extends CI_Controller
{

	private $data;
	private $aviso_id;
	//  Configuramos las validaciones ayudandonos con la librería form_validation
	private $reglas = array(        	
			array(
					'field'   => 'name',
					'label'   => 'Nombre aviso',
					'rules'   => 'required'
					//'rules'   => 'required|callback_my_validation'
			),
			array(
					'field'   => 'descripcion',
					'label'   => 'Descripci&oacute;n',
					'rules'   => 'required'
			),
			array(
					'field'   => 'fecha',
					'label'   => 'Fecha',
					'rules'   => 'required'
			)
	);
	
	
	/**
	 * constructor for avisomanage
	 * @access public
	 */
	function __construct()
	{
		parent::__construct();
        $this->load->model('Model_Aviso');
        $this->data['titulo'] = '';
        $this->data['urlCancelar'] = 'avisomanage/search';
        //$this->form_validation->set_error_delimiters('<div class="alert alert-dismissable alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
        $this->form_validation->set_error_delimiters('<p class="text-primary"><em><button type="button" class="close text-primary" data-dismiss="alert"><p class="text-primary">&times;</p></button>','</em></p>');
	}
	
	/**
	 * listado de avisos
	 * @access public
	 */
	public function get()
	{

        $sede_id = 1;
        $this->data['query'] = $this->Model_Aviso->all($sede_id);
        $this->data['contenedor_aux'] = $this->retroalimentacion();
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('avi_view/avi_get',$this->data);
		$this->load->view('include/footer');
	}
	
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
	 * aviso add page
	 * @access public
	 */
	public function add()
	{
		$this->data['titulo'] = 'Crear aviso';
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('avi_view/avi_add', $this->data);
		$this->load->view('include/footer');
	}

    /**
     * aviso insert
     * @access public
     */
    public function insert() {

    	//reglas de validación
    	$this->form_validation->set_rules($this->reglas);
    	    	
        $registro = $this->input->post();

        $sede_id = $this->user->getSedeId();
        $registro['sede_id']= $sede_id;
        
        //if(isset($registro['name'])){
        	if(($this->form_validation->run() == TRUE)){
        		//en esta instancia hemos superado la validacion del formulario        		
        		//  insertamos
        		$this->Model_Aviso->insert($registro);
        		$this->session->set_flashdata('mensaje', 'El aviso se insert&oacute; correctamente.');  
        		$this->session->set_flashdata('status', 'success');
        		redirect('avisomanage/search', 'refresh');
        	}else {
        		//no se pudo insertar, algún problema con la BD   
        		$this->add();
        		//redirect('avisomanage/add', 'refresh');	
        	}
        //}               
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
     * aviso update
     * @access public
     */
    public function update() {
    	//reglas de validación
    	$this->form_validation->set_rules($this->reglas);
    	$registro = $this->input->post();
    	$this->aviso_id = $registro['aviso_id'];
   	
    	if(isset($registro['name'])){
    		if(($this->form_validation->run() == TRUE)){    
    			$this->session->set_flashdata('mensaje', 'El aviso se actualiz&oacute; correctamente.');
    			$this->session->set_flashdata('status', 'success');
    			$this->Model_Aviso->update($registro);
    			redirect('avisomanage/search', 'refresh');
    		}else {
        		//no se pudo actualizar   
        		$this->edit($registro['aviso_id']);	
        	}
    	}
    }    

    /**
     * valida si la aviso se repite en la sede que gestiona el operador. 
     * */
    public function my_validation()
    {
    	$registro = $this->input->post();
    	$name_aviso = $registro['name'];
    	if (isset($registro['aviso_id'])){
    		$aviso_id = $registro['aviso_id'];
    	}

    	$session_data = $this->session->userdata('user');
    	//tomo la sede del usser logueado desde la sesión
    	$sede_id = $session_data['sede_id'];
	
		$row = $this->Model_Aviso->find($aviso_id);
		$hayCambios = $row->name != $name_aviso;
//echo $hayCambios . ' * '.$row->name. ' * ' .$name_aviso .' ** ' . $row->sede_id .' ** '. $sede_id.'gggg';
//exit;
    	if ($row->name == $name_aviso && $row->sede_id == $sede_id )
    	{
    		return TRUE;
    	}
    	else
    	{
    		$this->form_validation->set_message('my_validation', 'Ya existe una aviso con el mismo nombre en la sede actual.');
    		return FALSE;    		
    	}
    }    

    /**
	 * aviso delete page
	 * @access public
	 */
	public function delete($id)
	{
		if($this->user->checkPrivilege('avi_delete') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}
		$status = '';
		$mensaje = '';
		$this->Model_Aviso->delete($id);
		if ($this->db->affected_rows() > 0){
			$status = 'success';
			$mensaje = 'El aviso se elimin&oacute; correctamente.';
			$title = '';			
		}
		$this->session->set_flashdata('mensaje', $mensaje);
		$this->session->set_flashdata('status', $status);		
		redirect('avisomanage/search', 'refresh');
	}
}