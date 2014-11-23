<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Model_Roles extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	function all_array() {
		$this->db->select ( 'nombre' );
		$query = $this->db->get ( 'roles' );
		return $query->result_array ();
	}
	function all() {
		$lista = array ();
		$query = $this->db->get ('roles')->result ();
		foreach ( $query as $registro ) {
			$lista [$registro->id] = $registro->nombre;
		}
		return $lista;
	}
}
