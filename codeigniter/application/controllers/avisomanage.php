<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * AvisoManage Class
 *
 * Manage Aviso.
 *
 * @author Castro Patricio Nicolas
 */

class AvisoManage extends CI_Controller
{
	
	/**
	 * constructor for AvisoManage
	 * @access public
	 */
	function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * aviso search page
	 * @access public
	 */
	function search()
	{
		if($this->user->checkPrivilege('avi_search') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}
		
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('avi_view/avi_search');
		$this->load->view('include/footer');
	}
	
	/**
	 * aviso edit page
	 * @access public
	 */
	function edit()
	{
		if($this->user->checkPrivilege('avi_edit') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}
	
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('avi_view/avi_edit');
		$this->load->view('include/footer');
	}
	
	/**
	 * aviso add page
	 * @access public
	 */
	function add()
	{
		if($this->user->checkPrivilege('avi_add') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}
	
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('avi_view/avi_add');
		$this->load->view('include/footer');
	}
	
	/**
	 * aviso delete page
	 * @access public
	 */
	function delete()
	{
		if($this->user->checkPrivilege('avi_delete') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}
	
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('avi_view/avi_delete');
		$this->load->view('include/footer');
	}
}