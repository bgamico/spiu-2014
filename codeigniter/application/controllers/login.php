<?php
class Login extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		
		//load the rbac model
		$this->load->model('rbac_model');
		
		//load user library
		$this->load->library('user');
	}
	
	function index(){
		$this->load->view('include/header');
		$this->load->view('login_index');
		$this->load->view('include/footer');
	}

	public function in()
	{
		$this->session->set_userdata("id",1);
		redirect(base_url("home"));
	}
	
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
			$user_search = base_url('manage');
			redirect($user_search);
		}

	}
	
}