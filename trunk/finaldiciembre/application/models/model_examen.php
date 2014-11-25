<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Examen extends CI_Model {
	
	private $tabla = 'fechas_de_examen';
	
	function __construct() {
		parent::__construct();
    }

    function all($id) {
        $this->db->where('id',$id);
        $query = $this->db->get($this->tabla);
        return $query->result();
    }

    function find($id) {
    	$this->db->where('id', $id);
		return $this->db->get($this->tabla)->result();		
    }
	
   
    function insert($registro) {
    	$this->db->set($registro);
		$this->db->insert($this->tabla);
    }

    function update($registro) {
    	$this->db->set($registro);
		$this->db->where('id', $registro['id']);
		$this->db->update($this->tabla);
    }

    function delete($id) {
    	$this->db->where('id', $id);
		$this->db->delete($this->tabla);
    }
    
    function getBySedeId($id){
    	$this->db->where('sede_id', $id);
    	return $this->db->get($this->tabla)->result();
    }
}
