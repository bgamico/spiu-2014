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
				join roles r on u.role_id = r.id and r.id=3 join perfiles p on p.id = u.perfil_id
				where p.sede_id = (select sede_id from perfiles p join usuarios u on p.id = u.perfil_id where u.usuario = ?)';
		$query = $this->db->query ( $sql, array (
				$username 
		) );
		return $query->result ();
	}
		
	function insert($registro) {
		$usuario = array('usuario' => $registro['username'],'role_id' => $registro['rol']);
		unset($registro['username']);
		unset($registro['rol']);
		$this->db->insert('perfiles', $registro);
		$perfil_id = $this->db->insert_id();
 		$usuario['perfil_id'] = $perfil_id;
 		$this->db->insert('usuarios', $usuario);
// 		return $user_id;
	}
	
	function update($registro) {
		$rol = array(role_id=>$registro['rol']);
		unset($registro['rol']);
		$this->db->where('id', $registro['id']);
		$this->db->update('usuarios' ,$rol);
		$perfil = array(id=>$registro['id']);
		unset($registro['id']);
		$this->db->update('perfiles', $registro, $perfil);
	}
	
	function delete($id) {
		$this->db->where ( 'perfil_id', $id );
		$this->db->delete ( 'usuarios' );
	}
}
