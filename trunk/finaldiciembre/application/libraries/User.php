<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * user class
 *
 * Manage logged user information.
 *
 * @author Castro Patricio Nicolas
 */

class User
{
	
	/**
	 *@access private
	 */
	private $_CI;
	
	/**
	 * construct of user class
	 * @access public
	 */
	function __construct()
	{
		$this->_CI = & get_instance();
	}
	
	
	/**
	 * devolver los roles
	 * @return roles
	 */
	function getRoles()
	{
		$roles = $this->_CI->Model_Roles->all();
		return $roles;
	}

	/**
	 * devolver las sedes
	 * @return sedes
	 */
	function getSedes()
	{
		$sedes = $this->_CI->Model_Sede->allArray();
		return $sedes;
	}
		
	/**
	 * get user menu
	 * @access public
	 * @return user menus
	 */
	function getUserMenus()
	{
		$this->_CI->load->model('rbac_model');
		$username = $this->getUserName();
		$menus = $this->_CI->rbac_model->getUserAllMenuByUsername($username);
		return $menus;
	}
	
	/**
	 * get user menu
	 * @access public
	 * @return user menus
	 */
	function getUserMenus2()
	{
		$this->_CI->load->model('rbac_model');
		$username = $this->_CI->session->userdata('username');
		$menus = $this->_CI->rbac_model->getUserSubMenuByUsername($username);
		return $menus;
	}
	
	/**
	 * check user privilege
	 * @access public
	 * @param String $action action
	 * @return true or false
	 */
	function checkPrivilege($action)
	{
		$this->_CI->load->model('rbac_model');
// 		$username = $this->_CI->session->userdata('username');
		$username = null;
		if($this->_CI->session->userdata('username')){
			$username = $this->_CI->session->userdata('username');
		}
		$privilege = $this->_CI->rbac_model->checkUserPrivilege($username, $action);
		
		return $privilege;
	}		
	
}