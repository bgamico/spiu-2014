<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Sede extends CI_Model {

	function __construct() {
		parent::__construct();
    }

    function all() {
        $query = $this->db->get('sede');
        return $query->result();
    }

    function allArray() {
        $lista = array();
        $query = $this->db->get('sede')->result();
        foreach ($query as $registro) {
            $lista[$registro->sede_id] = $registro->nombre;
        }
        return $lista;
    }

    function find($id) {
    	$this->db->where('sede_id', $id);
		return $this->db->get('sede')->result();
    }

    function get($id) {
        $lista = array();
        $this ->db->where('sede_id',$id);
        $query = $this->db->get('sede')->result();
        foreach ($query as $registro) {
            $lista[$registro->sede_id] = $registro->nombre;
        }
        return $lista;
    }

    function insert($registro) {
    	$this->db->set($registro);
		$this->db->insert('sede');
    }

    function update($registro) {
    	$this->db->set($registro);
		$this->db->where('sede_id', $registro['sede_id']);
		$this->db->update('sede');
    }

    function delete($id) {
    	$this->db->where('id', $id);
		$this->db->delete('sede');
    }

}
