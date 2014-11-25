<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Actividad extends CI_Model {
	
	private $tabla = 'actividades';
	
	function __construct() {
		parent::__construct();
    }

    function all($sede_id) {
        $this->db->where('sede_id',$sede_id);
        $query = $this->db->get($this->tabla);
        return $query->result();
    }

    function find($id) {
    	$this->db->where('id', $id);
		return $this->db->get($this->tabla)->row();		
    }
	
    /**
     * búsqueda según una columna de la tabla y una clave.
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
		$this->db->where('actividad_id', $registro['actividad_id']);
		$this->db->update($this->tabla);
    }

    function delete($id) {
    	$this->db->where('actividad_id', $id);
		$this->db->delete($this->tabla);
    }
    
    function getBySedeId($id){
    	$this->db->where('sede_id', $id);
    	return $this->db->get('actividades')->result();
    }
}
