<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ciudades_model extends CI_Model{
	
	public function provincias()
	{
		$provincia = $this->db->get('provincias');
		return $provincia->result();
	}
	
	public function localidades($provincia)
	{
		$this->db->where('provincia_id',$provincia);
		$this->db->order_by('ciudad_nombre','asc');
		$localidades = $this->db->get('ciudades');
		return $localidades->result();

	}
}