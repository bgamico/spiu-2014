<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Actividad extends CI_Model {

	function __construct() {
		parent::__construct();
    }

    function all($sede_id) {
        $this->db->where('sede_id',$sede_id);
        $query = $this->db->get('actividad');
        return $query->result();
    }

    function find($id) {
    	$this->db->where('actividad_id', $id);
		return $this->db->get('actividad')->result();
    }

    function insert($registro) {
    	$this->db->set($registro);
		$this->db->insert('actividad');
    }

    function update($registro) {
    	$this->db->set($registro);
		$this->db->where('actividad_id', $registro['actividad_id']);
		$this->db->update('actividad');
    }

    function delete($id) {
    	$this->db->where('id', $id);
		$this->db->delete('usuario');
    }
}
