<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	// Constructor de Clase
	function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->load->view('include/header');		
		$this->load->view('frontend/index');
		$this->load->view('include/footer');
	}
	
}
