<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Aviso extends CI_Model {
	
	private $tabla = 'aviso';
	
	function __construct() {
		parent::__construct();
    }

    function all($sede_id) {
        $this->db->where('sede_id',$sede_id);
        $query = $this->db->get($this->tabla);
        return $query->result();
    }

    function find($id) {
    	$this->db->where('aviso_id', $id);
		return $this->db->get($this->tabla)->row();		
    }
	
    /**
     * b�squeda seg�n una columna de la tabla y una clave.
     * */
    function find_by_x($columna,$key) {
    	$this->db->where($columna, $key);
    	return $this->db->get($this->tabla)->row();
    }    

    function insert($registro) {
    	$this->db->set($registro);
		$this->db->insert($this->tabla);
    }

    function update($registro) {
    	$this->db->set($registro);
		$this->db->where('aviso_id', $registro['aviso_id']);
		$this->db->update($this->tabla);
    }

    function delete($id) {
    	$this->db->where('aviso_id', $id);
		$this->db->delete($this->tabla);
    }
}
