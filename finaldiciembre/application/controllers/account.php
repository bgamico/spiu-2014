<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Administrador de cuentas Rbac.
 *
 * @author Castro Patricio Nicolas
*/

class Account extends CI_Controller
{
	/**
	 * pagina de login
	 * @access public
	 */
	function index()
	{
		if($this->session->userdata('username')){
			redirect(base_url('manage'));
		}
		else{
			$this->load->view('include/header');
			$this->load->view('login_index');
			$this->load->view('include/footer');
		}
	}

	/**
	 * validar usuario, contrasena y permisos
	 * @access public
	 */
	function validate()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$md5_password = md5($password);

		$ret = $this->rbac_model->validateUser($username, $md5_password);

		if($ret == 1)
		{

			redirect(base_url());
		}
		else
		{
			$query = $this->Model_Sede->miSede($username);
			isset( $query[0]->id) AND $this->session->set_userdata('sede',$query[0]->id);
			$this->session->set_userdata('username',$username);
			$this->session->set_userdata('rol',$ret['role_id']);
			redirect(base_url('manage'));
		}

	}

	/**
	 * logout:terminar session
	 * @access public
	 */
	function logout()
	{
		$this->session->sess_destroy();
		redirect($this->index());
	}
}