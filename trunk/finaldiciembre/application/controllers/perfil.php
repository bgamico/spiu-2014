<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Administracion del Perfil.
 *
 * @author Castro Patricio Nicolas
 */

class Perfil extends CI_Controller
{
		
	/**
	 * detalles del perfil
	 * @access public
	 */
	function get()
	{
// 		if($this->user->checkPrivilege('perfil_search') == false)
// 		{
// 			show_error("you have no privilege to access this page");
// 			return ;
// 		}
				
		$data['query'] = $this->Model_Perfil->get($this->session->userdata('username'));
		$data['titulo'] = 'Mi Perfil';
		$data['opciones'] = true;
		
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('perfil_view/perfil_get',$data);
		$this->load->view('include/footer');
	}
	
	/**
	 * editar perfil
	 * @access public
	 */
	function edit()
	{
		/*if($this->user->checkPrivilege('perfil_edit') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}*/

        //$miPerfil = $this->user->getPerfilId();
        $data['query'] = $this->Model_Perfil->get($this->session->userdata('username'));
	
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('perfil_view/perfil_edit',$data);
		$this->load->view('include/footer');
	}

    /**
     * actualizar los datos del perfil 
     * @access public
     */
    public function update() {
        $registro = $this->input->post();
        $this->Model_Perfil->update($registro);
        redirect('perfilmanage/search');
    }
}