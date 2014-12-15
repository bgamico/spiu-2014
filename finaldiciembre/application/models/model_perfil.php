<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Perfil extends CI_Model {

	function __construct() {
		parent::__construct();
    }

    function get($username) {
    	$this->db->select('p.*');
    	$this->db->from('perfiles p');
    	$this->db->join('usuarios u', 'p.id = u.perfil_id');
    	$this->db->where('u.usuario', $username);
    	$query = $this->db->get();
    	return $query->result();
    }
    
	function getByUserId($id) {
		$this->db->select('p.id, p.nombre, p.apellido, p.telefono, p.documento,
				p.fec_nac, p.domicilio, p.email, p.sede_id as sede,u.id as user_id, u.role_id as rol');
        $this->db->from('perfiles p');
		$this->db->join('usuarios u', 'u.perfil_id = p.id');
		$this->db->where('u.id', $id); 
        $query = $this->db->get();
        return $query->result();
    }
    
    function update($registro) {
		$this->db->where('id', $registro['perfil_id']);
		unset($registro['perfil_id']);
    	$this->db->set($registro);
		$this->db->update('perfiles');
    }
    
    function getPassword($id) {
    	$this->db->select('u.contrasena');
    	$this->db->from('perfiles p');
    	$this->db->join('usuarios u', 'u.perfil_id = p.id');
    	$this->db->where('u.id', $id);
    	$query = $this->db->get();
    	return $query->result();
    }    
    
    function updatePassword($perfil_id,$contrasena) {
    	$this->db->where('usuarios.perfil_id', $perfil_id);
    	$this->db->set('contrasena', $contrasena);
		$this->db->update('usuarios');
    }    

}
