<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Model_Pdi extends CI_Model {

	function insert($registro) {
        $this->db->set($registro);
        $this->db->insert('pdis');
    }
    
    function all() {
    	return $this->db->get('pdis')->result();
    }
    
    function find($id) {
    	$this->db->where('id', $id);
    	return $this->db->get('pdis')->result();
    }
    
    function update($registro) {
    	$this->db->set($registro);
    	$this->db->where('id', $registro['id']);
    	$this->db->update('pdis');
    }
    
    function delete($id) {
    	$this->db->where('id', $id);
    	$this->db->delete('pdis');
    }
    
    
}
