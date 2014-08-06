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

    function get($id) {
    	$this->db->where('perfil_id', $id);
		return $this->db->get('perfil')->result();
    }

	function getByUserId($id) {
    	/*$this->db->where('perfil_id', $id);
		return $this->db->get('perfil')->result();*/
		$this->db->select('perfil.perfil_id, perfil.nombre,perfil.apellido, perfil.telefono, perfil.documento,
		perfil.fec_nac, perfil.domicilio, perfil.mail, user.sede_id, user.role_id');
        $this->db->from('perfil');
		$this->db->join('user', 'perfil.perfil_id = user.perfil_id');
		$this->db->where('user.user_id', $id); 
        $query = $this->db->get();
        return $query->result();
    }
    
    function update($registro) {
    	$this->db->set($registro);
		$this->db->where('perfil_id', $registro['perfil_id']);
		$this->db->update('perfil');
    }

}
