<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Account Class
 *
 * Manage Rbac account related issues.
 *
 * @author Castro Patricio Nicolas
 */

class Account extends CI_Controller
{
	
	/**
	 * construct
	 * @access public
	 */
	function __construct()
	{
		parent::__construct();
		
		//load the rbac model
		$this->load->model('rbac_model');
		
		//load user library
		$this->load->library('user');
	}
	
	/**
	 * login page
	 * @access public
	 */
	function index()
	{
		/*if( $this->user->getUserRole() ){
			$user_search = base_url('manage');
			redirect($user_search);
		}*/
            
		$this->load->view('include/header');
		$this->load->view('login_index');
		$this->load->view('include/footer');
	}
	
	/**
	 * check username, password and privilege
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
			//show_error("invalid username or password");
			$this->load->view('include/header');
			$this->load->view('include/error');
			$this->load->view('login_index');
			$this->load->view('include/footer');
		}
		else
		{			
			$user_shortname = $this->rbac_model->getUserPriviledge($username);
			$this->user->set_user_session($username,$user_shortname,$ret);
			//echo $ret['user_id'];
			$user_search = base_url('manage');
			redirect($user_search);
		}

	}
	
	/**
	 * logout:destroy session
	 * @access public
	 */
	function logout()
	{
		$this->user->delete_user_session();
		$this->index();
	}
}