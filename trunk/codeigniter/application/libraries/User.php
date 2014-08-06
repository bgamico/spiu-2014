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
	* set user session
 	* @access public
 	* @param String $username username $user_shortname user_shortname
 	*/
//	function set_user_session($username,$user_shortname,$sede_id,$perfil_id)
	function set_user_session($username,$user_shortname,$datos)
	{
		$user['username'] = $username;
		$user['user_shortname'] = $user_shortname;
		$user['user_id'] = $datos['user_id'];
		$user['sede_id'] = $datos['sede_id'];
		$user['role_id'] = $datos['role_id'];
		$user['perfil_id'] = $datos['perfil_id'];
		$session = array('user'=>$user);
		
		$this->_CI->session->set_userdata($session);
	}
	
	/**
	 * delete user session
	 * @access public
	 */
	function delete_user_session()
	{
		$this->_CI->session->sess_destroy();
	}
	
	/**
	 * get user name
	 * @return username
	 */
	function getUserName()
	{
		$user = $this->_CI->session->userdata('user');
		$username = $user['username'];
		return $username;
	}
	
	/**
	 * get user user_id
	 * @return user_id
	 */
	function getUserId()
	{
		$user = $this->_CI->session->userdata('user');
		$user_id = $user['user_id'];
		return $user_id;
	}
	
	/**
	 * get user role
	 * @return user_shortname
	 */
	function getUserRole()
	{
		$user = $this->_CI->session->userdata('user');
		$user_shortname = $user['user_shortname'];
		return $user_shortname;
	}
	
	/**
	 * get sede name
	 * @return sede_name
	 */
	function getSedeName()
	{
		$user = $this->_CI->session->userdata('user');
		$sede_name = $user['sede_name'];
		return $sede_name;
	}
	
	/**
	 * get sede id
	 * @return sede_id
	 */
	function getSedeId()
	{
		$user = $this->_CI->session->userdata('user');
		$sede_id = $user['sede_id'];
		return $sede_id;
	}

    /**
	 * get sede id
	 * @return sede_id
	 */
	function getPerfilId()
	{
		$user = $this->_CI->session->userdata('user');
		$perfil_id = $user['perfil_id'];
		return $perfil_id;
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
		$username = $this->getUserName();
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
		$username = $this->getUsername();
		$privilege = $this->_CI->rbac_model->checkUserPrivilege($username, $action);
		
		return $privilege;
	}
	
	/* simplemente validamos que no exista otro usuario con el mismo nombre */
	public function my_validation($registro) {
		$this->_CI->load->model('Model_Usuario');
		$this->_CI->db->where('user_name', $registro['username']);
		$query = $this->_CI->db->get('user');
		if ($query->num_rows() > 0 AND (!isset($registro['id']) OR ($registro['id'] != $query->row('id')))) {
			return FALSE;
		}
		else {
			return TRUE;
		}
	}	
	
}