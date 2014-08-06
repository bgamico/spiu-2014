<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Roles extends CI_Model {

	function __construct() {
		parent::__construct();
    }

    function all($role_id = null) {
        $lista = array();
        if (isset($role_id)){
        	$this->db->where('role_id !=', $role_id);
        }
        
        $query = $this->db->get('role')->result();
                
        //$query = $this->db->get('role')->result();
        foreach ($query as $registro) {
            $lista[$registro->role_id] = $registro->role_name;
        }
        return $lista;
    }

    function insert($registro) {
        $this->db->set($registro);
        $this->db->insert('perfil');
        return $this->db->insert_id();//retorna el ultimo valor
    }

    function get($id) {
    	$this->db->where('role_id', $id);
		return $this->db->get('role')->result();
    }

    function update($registro) {
    	$this->db->set($registro);
		$this->db->where('perfil_id', $registro['perfil_id']);
		$this->db->update('perfil');
    }

}
