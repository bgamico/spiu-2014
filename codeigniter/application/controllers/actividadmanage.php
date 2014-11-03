<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ActividadManage Class
 *
 * Manage Actividad.
 *
 * @author Castro Patricio Nicolas
 */

class ActividadManage extends CI_Controller
{

	private $data;
	private $actividad_id;
	private $reglas = array(        	//  Configuramos las validaciones ayudandonos con la librería form_validation
			array(
					'field'   => 'name',
					'label'   => 'Nombre de actividad',
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
			),
			array(
					'field'   => 'hora',
					'label'   => 'Hora',
					'rules'   => 'required'
			),
			array(
					'field'   => 'direccion',
					'label'   => 'Direcci&oacute;n',
					'rules'   => 'required'
			)
	);
	
	
	/**
	 * constructor for ActividadManage
	 * @access public
	 */
	function __construct()
	{
		parent::__construct();
        $this->load->model('Model_Actividad');
        $this->data['titulo'] = '';
        $this->data['urlCancelar'] = 'actividadmanage/search';
        //$this->form_validation->set_error_delimiters('<div class="alert alert-dismissable alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
        $this->form_validation->set_error_delimiters('<p class="text-primary"><em><button type="button" class="close text-primary" data-dismiss="alert"><p class="text-primary">&times;</p></button>','</em></p>');
        ///<p class="text-danger">Donec ullamcorper nulla non metus auctor fringilla.</p>
	}
	
	/**
	 * actividad search page
	 * @access public
	 */
	public function search()
	{
		if($this->user->checkPrivilege('act_search') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}

        $sede_id = $this->user->getSedeId();
        $this->data['query'] = $this->Model_Actividad->all($sede_id);

        $this->data['contenedor_aux'] = $this->retroalimentacion();
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('act_view/act_search',$this->data);
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
	 * actividad add page
	 * @access public
	 */
	public function add()
	{
		if($this->user->checkPrivilege('act_add') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}
		
		$this->data['titulo'] = 'Crear actividad';
		$this->data['urlCancelar'];
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('act_view/act_add', $this->data);
		$this->load->view('include/footer');
	}

    /**
     * actividad insert
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
        		$this->Model_Actividad->insert($registro);
        		$this->session->set_flashdata('mensaje', 'La actividad se insert&oacute; correctamente.');  
        		$this->session->set_flashdata('status', 'success');
        		redirect('actividadmanage/search', 'refresh');
        	}else {
        		//no se pudo insertar, algún problema con la BD   
        		$this->add();
        		//redirect('actividadmanage/add', 'refresh');	
        	}
        //}               
    }

    /**
     * actividad edit page
     * @access public
     */
    public function edit($id)
    {
    	/*if($this->user->checkPrivilege('act_edit') == false)
    	{
    		show_error("you have no privilege to access this page");
    		return ;
    	}*/
    	$this->actividad_id = $id;
    	$this->data['registro'] = $this->Model_Actividad->find($id);
    	$this->data['titulo'] = 'Actualizar actividad';
    	$this->data['urlCancelar'];
    	 
    	$this->load->view('include/header');
    	$this->load->view('include/nav');
    	$this->load->view('act_view/act_edit', $this->data);
    	$this->load->view('include/footer');
    }    

    /**
     * actividad update
     * @access public
     */
    public function update() {
    	//reglas de validación
    	$this->form_validation->set_rules($this->reglas);
    	$registro = $this->input->post();
    	$this->actividad_id = $registro['actividad_id'];
   	
    	if(isset($registro['name'])){
    		if(($this->form_validation->run() == TRUE)){    
    			$this->session->set_flashdata('mensaje', 'La actividad se actualiz&oacute; correctamente.');
    			$this->session->set_flashdata('status', 'success');
    			$this->Model_Actividad->update($registro);
    			redirect('actividadmanage/search', 'refresh');
    		}else {
        		//no se pudo actualizar   
        		$this->edit($registro['actividad_id']);	
        	}
    	}
    }    

    /**
     * valida si la actividad se repite en la sede que gestiona el operador. 
     * */
    public function my_validation()
    {
    	$registro = $this->input->post();
    	$name_actividad = $registro['name'];
    	if (isset($registro['actividad_id'])){
    		$actividad_id = $registro['actividad_id'];
    	}

    	$session_data = $this->session->userdata('user');
    	//tomo la sede del usser logueado desde la sesión
    	$sede_id = $session_data['sede_id'];
	
		$row = $this->Model_Actividad->find($actividad_id);
		$hayCambios = $row->name != $name_actividad;

    	if ($row->name == $name_actividad && $row->sede_id == $sede_id )
    	{
    		return TRUE;
    	}
    	else
    	{
    		$this->form_validation->set_message('my_validation', 'Ya existe una actividad con el mismo nombre en la sede actual.');
    		return FALSE;    		
    	}
    }    

    /**
	 * actividad delete page
	 * @access public
	 */
	public function delete($id)
	{
		if($this->user->checkPrivilege('act_delete') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}
		$status = '';
		$mensaje = '';
		$this->Model_Actividad->delete($id);
		if ($this->db->affected_rows() > 0){
			$status = 'success';
			$mensaje = 'La actividad se elimin&oacute; correctamente.';
			$title = '';			
		}
		$this->session->set_flashdata('mensaje', $mensaje);
		$this->session->set_flashdata('status', $status);		
		redirect('actividadmanage/search', 'refresh');
	}
}