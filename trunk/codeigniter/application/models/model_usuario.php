<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Usuario extends CI_Model {

	function __construct() {
		parent::__construct();
    }

    function all($user_id) {
        $this->db->select('user.user_id, user.user_name,role.role_name as role');
        $this->db->from('user');
		$this->db->join('role', 'user.role_id = role.role_id');
		$this->db->where('user.user_id !=', $user_id);
		$this->db->order_by('user.user_id', 'asc'); 
        $query = $this->db->get();
        return $query->result();
    }
	
	function allOperadores($sede_id) {
        $this->db->select('user.user_id, user.user_name,role.role_name as role');
        $this->db->from('user');
        $this->db->join('role', 'user.role_id = role.role_id and user.role_id=3');
        $this->db->where('sede_id', $sede_id);
        $query = $this->db->get();
        return $query->result();
    }
	    
    function get($id) {
    	$this->db->where('user_id', $id);
		return $this->db->get('user')->result();
    }

    function find($id) {
    	$this->db->where('user_id', $id);
		return $this->db->get('user')->result();
    }

    function insert($registro) {
    	$this->db->set($registro);
		$this->db->insert('user');
    }

    function update($registro) {
    	$this->db->set($registro);
		$this->db->where('user_id', $registro['user_id']);
		$this->db->update('user');
        $this->db->select('perfil_id');
        $this->db->where('user_id', $registro['user_id']);
        return $this->db->get('user')->row();
    }

    function delete($id) {
    	$this->db->where('user_id', $id);
		$this->db->delete('user');
    }
}
