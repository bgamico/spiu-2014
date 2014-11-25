<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Sede extends CI_Model {

	function __construct() {
		parent::__construct();
    }

    function all() {
        $query = $this->db->get('sedes');
        return $query->result();
    }

    function allArray() {
        $lista = array();
        $query = $this->db->get('sedes')->result();
        foreach ($query as $registro) {
            $lista[$registro->id] = $registro->nombre;
        }
        return $lista;
    }

    function find($id) {
    	$this->db->where('id', $id);
		return $this->db->get('sedes')->result();
    }
    
    function miSede($username) {    	
    	$this->db->select ( 's.*' );
    	$this->db->from ( 'usuarios u' );
    	$this->db->join ( 'perfiles p', 'p.id = u.perfil_id' );
    	$this->db->join ( 'sedes s', 'p.sede_id = s.id' );
    	$this->db->where ( 'u.usuario', $username );
    	return $this->db->get()->result();
//     	return $this->db->get()->row();
    }

    function insert($registro) {
    	$this->db->set($registro);
		$this->db->insert('sedes');
    }

    function update($registro) {
    	$this->db->set($registro);
		$this->db->where('id', $registro['id']);
		$this->db->update('sedes');
    }

    function delete($id) {
    	$this->db->where('id', $id);
		$this->db->delete('sedes');
    }

}
