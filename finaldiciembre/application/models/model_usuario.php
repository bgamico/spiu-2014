<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Model_Usuario extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	
	function all($username) {
		$this->db->select ( 'u.id, u.usuario,r.nombre as role' );
		$this->db->from ( 'usuarios u' );
		$this->db->join ( 'roles r', 'u.role_id = r.id' );
		$this->db->where ( 'u.usuario !=', $username );
		$this->db->order_by ( 'u.id', 'asc' );
		$query = $this->db->get ();
		return $query->result ();
	}
	
	function allOperadores($username) {
		$sql = 'select u.id, u.usuario , r.nombre as role from usuarios u
				join roles r on u.role_id = r.id and r.id=3 join perfiles p on p.user_id = u.id
				where p.sede_id = (select sede_id from perfiles p join usuarios u on p.user_id = u.id where u.usuario = ?)';
		$query = $this->db->query ( $sql, array (
				$username 
		) );
		return $query->result ();
	}
		
	function insert($registro) {
		$this->db->insert('usuarios',array('usuario' => $registro['username'],'role_id' => $registro['rol']));
		$user_id = $this->db->insert_id();
		unset($registro['username']);
		unset($registro['rol']);
 		$registro['user_id'] = $user_id;
		$this->db->insert('perfiles', $registro);
		return $user_id;
	}
	
	function update($registro) {
		$rol = array(role_id=>$registro['rol']);
		unset($registro['rol']);
		$this->db->where('id', $registro['id']);
		$this->db->update('usuarios' ,$rol);
		$user = array(user_id=>$registro['id']);
		unset($registro['id']);
		$this->db->update('perfiles', $registro, $user);
	}
	
	function delete($id) {
		$this->db->where ( 'id', $id );
		$this->db->delete ( 'usuarios' );
	}
}
