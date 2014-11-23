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
    	$this->db->join ( 'perfiles p', 'u.id = p.user_id' );
    	$this->db->join ( 'sedes s', 's.id = p.sede_id' );
    	$this->db->where ( 'u.usuario =', $username );
    	$query = $this->db->get ();
    	return $query->result ();
    }
    /*
     * select s.* from usuarios u join perfiles p on u.id = p.user_id join sedes s on s.id=p.sede_id where u.usuario='sede'
     */

//     function get($id) {
//         $lista = array();
//         $this ->db->where('sede_id',$id);
//         $query = $this->db->get('sede')->result();
//         foreach ($query as $registro) {
//             $lista[$registro->sede_id] = $registro->nombre;
//         }
//         return $lista;
//     }

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
		$this->db->delete('sede');
    }

}
