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
 	 * @param String $username usuario
 	 * @param String $password contrasena
 	 * @return 1:username not match password 2:user has no privilege to login 100:successfully login
 	 */
	function validateUser($username, $password)
	{
		$this->db->where('usuario', $username);
		$this->db->where('contrasena', $password);
	
		$query = $this->db->get('usuarios');
		
		if($query->num_rows() == 0)
		{
			return 1;
		}
		else
		{
			$user['role_id'] = $query->row()->role_id;
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
		$sql = "select m.* from usuarios u, roles r, permisos_has_roles pr, permisos p, menus m
				where u.usuario= ? and
				u.role_id = r.id and 
				r.id = pr.roles_id and 
				pr.permisos_id = p.id and 
				p.menu_id = m.id";
		
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
		$sql = "select * from usuarios, roles, permisos_has_roles, permisos
				where usuarios.usuario = ? and
				usuarios.role_id = roles.id and
				roles.id = permisos_has_roles.roles_id and
				permisos_has_roles.permisos_id = permisos.id and
				permisos.accion = ?";
				
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