<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Perfil extends CI_Model {

	function __construct() {
		parent::__construct();
    }

    function insert($registro) {
        $this->db->set($registro);
        $this->db->insert('perfil');
        return $this->db->insert_id();//retorna el ultimo valor
    }

    function get($username) {
    	$this->db->select('p.*');
    	$this->db->from('perfiles p');
    	$this->db->join('usuarios u', 'p.user_id = u.id');
    	$this->db->where('u.usuario', $username);
    	$query = $this->db->get();
    	return $query->result();
    }
    
	function getByUserId($id) {
		$this->db->select('p.id, p.nombre, p.apellido, p.telefono, p.documento,
		p.fec_nac, p.domicilio, p.email, p.sede_id as sede, p.user_id, u.role_id as rol');
        $this->db->from('perfiles p');
		$this->db->join('usuarios u', 'p.user_id = u.id');
		//$this->db->join('sedes s', 'p.sede_id = s.id','left');
		$this->db->where('u.id', $id); 
        $query = $this->db->get();
        return $query->result();
    }
    
    function update($registro) {
    	$this->db->set($registro);
		$this->db->where('perfil_id', $registro['perfil_id']);
		$this->db->update('perfil');
    }

}
