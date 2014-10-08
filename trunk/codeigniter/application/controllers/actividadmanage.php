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
	private $reglas = array(
			array(
					'field'   => 'nombre',
					'label'   => 'Nombre de actividad',
					'rules'   => 'required'
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
	}
	
	/**
	 * actividad search page
	 * @access public
	 */
	function search()
	{
		if($this->user->checkPrivilege('act_search') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}

        $sede_id = $this->user->getSedeId();
        $data['query'] = $this->Model_Actividad->all($sede_id);
		/*$msj = $this->session->flashdata('mensaje');
        if (isset($msj)){
        	$data['tipo']='success';
        }*/
        $data['contenedor_aux'] = $this->error();
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('act_view/act_search',$data);
		$this->load->view('include/footer');
	}
	
	function error(){	
		$msj_error = '';
		$msj_error = $this->session->flashdata('mensaje');
		if ($msj_error != ''){
			$msj_error= '<div class="alert alert-dismissable alert-' . $this->session->flashdata('tipo') .'">';
			$msj_error= $msj_error . '<button type="button" class="close" data-dismiss="alert">&times;</button>';
			$msj_error= $msj_error . '<strong>Aviso: </strong>' . $this->session->flashdata('mensaje');
			$msj_error= $msj_error . '</div>'; 
		}

		return 	$msj_error;
	}
	
	/**
	 * actividad edit page
	 * @access public
	 */
	function edit($id)
	{
		if($this->user->checkPrivilege('act_edit') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}

        $data['registro'] = $this->Model_Actividad->find($id);
        $data['titulo'] = 'Actualizar actividad';        
	
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('act_view/act_edit',$data);
		$this->load->view('include/footer');
	}
	
	/**
	 * actividad add page
	 * @access public
	 */
	function add()
	{
		if($this->user->checkPrivilege('act_add') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}
		//seteo de los posibles warnings, errores, o logs
		$this->data['contenedor_aux'] = $this->error();
		
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
        //set rules, reglas de validación para el form

        
        //en esta instancia hemos superado la validacion del formulario
        //verifico si la actividad es única (sin duplicados)
        if(isset($registro['name'])){    
        	//  Configuramos las validaciones ayudandonos con la librería form_validation
        	$this->form_validation->set_rules('name','Nombre','is_unique[actividad.name]');        	
        	//  Verificamos si el usuario superó la validación
        	if(($this->form_validation->run() == TRUE)){
        		//  insertamos
        		$this->Model_Actividad->insert($registro);
        		$this->session->set_flashdata('mensaje', 'La actividad se insert&oacute; correctamente.');  
        		$this->session->set_flashdata('tipo', 'success');
        		redirect('actividadmanage/search', 'refresh');
        	}else {
        		//no se pudo insertar, algún problema con la BD
        		$this->session->set_flashdata('mensaje', 'La actividad no se puedo insertar.');        
        		$this->session->set_flashdata('tipo', 'danger');   
        		$this->add();
        		//redirect('actividadmanage/add', 'refresh');	
        	}
        }        
        
        //$registro['sede_id'] = $this->user->getSedeId();
        //$this->Model_Actividad->insert($registro);
        
    }


    /**
	 * actividad delete page
	 * @access public
	 */
	function delete()
	{
		if($this->user->checkPrivilege('act_delete') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}
	
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('act_view/act_delete');
		$this->load->view('include/footer');
	}

    /**
     * actividad update
     * @access public
     */
    public function update() {
        $registro = $this->input->post();
        $this->Model_Actividad->update($registro);
        redirect('actividadmanage/search');
    }
}