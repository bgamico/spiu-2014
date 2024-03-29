<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Rbac model
 *
 * Manage Rbac model related table.
 *
 * @author Castro Patricio Nicolas
 */

class rbac_model extends CI_Model
{

	/**
 	 * @access public
 	 * @param String $username username
 	 * @param String $password password
 	 * @return 1:username not match password 2:user has no privilege to login 100:successfully login
 	 */
	function validateUser($username, $password)
	{
		$this->db->where('user_name', $username);
		$this->db->where('user_pass', $password);
	
		$query = $this->db->get('user');
	
		// No quiero devuelva un numero, sino un true or false
		if($query->num_rows() == 0)
		{
			return 1;
		}
		else
		{
			$user['user_id'] = $query->row()->user_id;
			$user['role_id'] = $query->row()->role_id;
			$user['sede_id'] = $query->row()->sede_id;
			$user['perfil_id'] = $query->row()->perfil_id;
			return $user;		
		}
	}

	/**
	 * get user priviledge
	 * @param String $role_id role id
	 * @return role shortname
 	 */
	function getUserPriviledge($username)
	{
	
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('role', 'user.role_id = role.role_id');
		$this->db->where('user_name', $username);
		
		$query = $this->db->get();
	
		if($query->num_rows())
		{
			return $query->first_row()->role_shortname;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * get user sede
	 * @param String $sede_name sede_name
	 * @return role shortname
 	 */
	function getSedeName($username)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('sede', 'user.sede_id = sede.sede_id');
		$this->db->where('user_name', $username);
		
		$query = $this->db->get();
	
		if($query->num_rows())
		{
			return $query->first_row()->sede_name;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * get sede id
	 * @param String $username username
	 * @return sede_id
 	 */
	function getSedeId($username)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('sede', 'user.sede_id = sede.sede_id');
		$this->db->where('user_name', $username);
		
		$query = $this->db->get();
	
		if($query->num_rows())
		{
			return $query->first_row()->sede_id;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * get perfil id
	 * @param String $username username
	 * @return perfil_id
 	 */
	function getPerfilId($username)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('perfil', 'user.perfil_id = perfil.perfil_id');
		$this->db->where('user_name', $username);
		
		$query = $this->db->get();
	
		if($query->num_rows())
		{
			return $query->first_row()->perfil_id;
		}
		else
		{
			return false;
		}
	}

	/**
	 * get user information
	 * @param String $username username
	 * @return user information
 	 */
	function getUserByUsername($username)
	{
		$this->db->where('user_name', $username);
		
		$query =  $this->db->get('user');
		if($query->num_rows() > 0)
		{
			return $query->first_row();
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * get user submenu
	 * @param String $username username
	 * @return user menu
	 */
	function getUserSubMenuByUsername($username)
	{
		$sql = "select menu.* from user, role, role_privilege, privilege, menu
				where user.user_name= ? and
				user.role_id = role.role_id and 
				role.role_id = role_privilege.role_id and 
				role_privilege.privilege_id = privilege.privilege_id and 
				privilege.menu_id = menu.menu_id";
		
		$query = $this->db->query($sql, array($username));
		
		
		if($query->num_rows() > 0)
		{
			foreach($query->result() as $menu)
			{
				$menus[] = $menu;
			}
			return $menus;
		}
		else 
		{
			return false;
		}
		
	}
	
	/**
	 * get menu parent
	 * @param Integer $sub_menu_id submenu id
	 * @return parent menu info
	 */
	function getParentMenu($sub_menu_id)
	{
		$this->db->where('menu_id', $sub_menu_id);
		$parent = $this->db->get('menu');
		
		if($parent->num_rows() > 0)
		{
			$parent_id = $parent->first_row()->parent_id;
			
			$this->db->where('menu_id', $parent_id);
			$menu = $this->db->get('menu');
			
			return $menu->first_row();
		}
	}
	
	/**
	 * get user all menus
	 * @param String $username username
	 * @return user menus
	 */
	function getUserAllMenuByUsername($username)
	{
		$sub_menus = $this->getUserSubMenuByUsername($username);		
		
		foreach($sub_menus as $sub_menu)
		{
			$parent_menu = $this->getParentMenu($sub_menu->menu_id);
			if(!isset($all_menu[$parent_menu->menu_id]))
			{
				$all_menu[$parent_menu->menu_id] = array('parent_title' => $parent_menu->menu_title );
			}
			
			$sub_menu_item['title'] = $sub_menu->menu_title;
			$sub_menu_item['url'] = $sub_menu->menu_url;
			
			$all_menu[$parent_menu->menu_id][] = array('title' => $sub_menu_item['title'],
													   'url' => $sub_menu_item['url']
			);
		}
		
		return $all_menu;
	}
	
/**
	 * get user all menus
	 * @param String $username username
	 * @return user menus
	 */
	function getUserMenuByUsername($username)
	{
		$menu = $this->getUserSubMenuByUsername($username);			
		
		return $menu;
	}
	
	/**
	 * check user privilege
	 * @access public
	 * @param String $username username
	 * @param String $action privilege action
	 * @return false or true
	 */
	function checkUserPrivilege($username, $action)
	{
		$sql = "select * from user, role, role_privilege, privilege
				where user.user_name = ? and
				user.role_id = role.role_id and
				role.role_id = role_privilege.role_id and
				role_privilege.privilege_id = privilege.privilege_id and
				privilege.action = ?";
				
		// OPTIMIZAR CONSULTA
		// PROBAR DESDE PHPMYADMIN y VER QUE RETORNA
		
		$query = $this->db->query($sql, array($username, $action));
		if($query->num_rows() > 0)
		{
			return true;
		}
		else 
		{
			return false;
		}
	}

}