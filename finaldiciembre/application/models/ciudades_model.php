<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ciudades_model extends CI_Model{
	
	public function provincias()
	{
		$provincia = $this->db->get('provincias');
		return $provincia->result();
	}
	
	function all_provincias() {
		$lista = array ();
		$query = $this->db->get ('provincias')->result ();
		foreach ( $query as $registro ) {
			$lista [$registro->provincia_nombre] = $registro->provincia_nombre;
		}
		return $lista;
	}
	
	function ciudades($provincia) {
		$lista = array ();
		
		$this->db->select('*');
		$this->db->from('ciudades c');
		$this->db->join('provincias p', 'p.id = c.provincia_id');
		$this->db->where('p.provincia_nombre',$provincia);
		$this->db->order_by('c.ciudad_nombre','asc');
		$query = $this->db->get()->result ();
		foreach ( $query as $registro ) {
			$lista [$registro->ciudad_nombre] = $registro->ciudad_nombre;
		}
		return $lista;
	}
	
	public function localidades($provincia)
	{
		$this->db->where('provincia_id',$provincia);
		$this->db->order_by('ciudad_nombre','asc');
		$localidades = $this->db->get('ciudades');
		return $localidades->result();

	}
}