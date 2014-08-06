<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * FechaManage Class
 *
 * Manage Fecha.
 *
 * @author Castro Patricio Nicolas
 */

class FechaManage extends CI_Controller
{
	
	/**
	 * constructor for FechaManage
	 * @access public
	 */
	function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * fecha search page
	 * @access public
	 */
	function search()
	{
		if($this->user->checkPrivilege('fec_search') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}
		
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('fec_view/fec_search');
		$this->load->view('include/footer');
	}
	
	/**
	 * fecha edit page
	 * @access public
	 */
	function edit()
	{
		if($this->user->checkPrivilege('fec_edit') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}
	
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('fec_view/fec_edit');
		$this->load->view('include/footer');
	}
	
	/**
	 * fecha add page
	 * @access public
	 */
	function add()
	{
		if($this->user->checkPrivilege('fec_add') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}
	
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('fec_view/fec_add');
		$this->load->view('include/footer');
	}
	
	/**
	 * fecha delete page
	 * @access public
	 */
	function delete()
	{
		if($this->user->checkPrivilege('fec_delete') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}
	
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('fec_view/fec_delete');
		$this->load->view('include/footer');
	}
}