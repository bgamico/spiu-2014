<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Manage Class
 *
 * Manage Users.
 *
 * @author        	Castro Patricio Nicolas
 */
class Manage extends CI_Controller
{
	/**
	 * index page for manage
	 * @access public
	 */
	function index()
	{
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('manage_index');
		$this->load->view('include/footer');
	}
}