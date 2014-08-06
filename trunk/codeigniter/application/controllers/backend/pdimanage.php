<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * PdiManage Class
 *
 * Manage Pdi.
 *
 * @author Castro Patricio Nicolas
 */

class PdiManage extends CI_Controller
{
	
	/**
	 * constructor for PdiManage
	 * @access public
	 */
	function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * pdi search page
	 * @access public
	 */
	function search()
	{
		if($this->user->checkPrivilege('pdi_search') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}
		
		$this->load->library('googlemaps');

		$config['center'] = '-40.8, -63';
		$config['zoom'] = 'auto';
		$config['onclick'] = 'createMarker_map({ map: map, position:event.latLng, draggable: true, ondragend:alert(event.latLng.lat()+ \', \' + event.latLng.lng()) });';
		$this->googlemaps->initialize($config);
		
		
		$data['map'] = $this->googlemaps->create_map();
		
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('pdi_view/pdi_search', $data);
		$this->load->view('include/footer');
	}
	
	/**
	 * pdi edit page
	 * @access public
	 */
	function edit()
	{
		if($this->user->checkPrivilege('pdi_edit') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}
	
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('pdi_view/pdi_edit');
		$this->load->view('include/footer');
	}
	
	/**
	 * pdi add page
	 * @access public
	 */
	function add()
	{
		if($this->user->checkPrivilege('pdi_add') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}
	
		$this->load->library('googlemaps');
		/*$config['center'] = '-40.8, -63';
		$config['zoom'] = 'auto';
		$config['onclick'] = 'createMarker_map({ map: map, position:event.latLng, draggable: true, ondragend:alert(event.latLng.lat()+ \', \' + event.latLng.lng()) });';
		$this->googlemaps->initialize($config);
		
		$data['map'] = $this->googlemaps->create_map();*/
		
		$config['center'] = '37.4419, -122.1419';
		$config['zoom'] = 'auto';
		$this->googlemaps->initialize($config);
		
		$marker = array();
		$marker['position'] = '37.429, -122.1419';
		$marker['draggable'] = true;
		/*$marker['ondragend'] = 'alert(\'You just dropped me at: \' + event.latLng.lat() + \', \' + event.latLng.lng());';*/
		$marker['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';
		$this->googlemaps->add_marker($marker);
		$data['map'] = $this->googlemaps->create_map();
	
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('pdi_view/pdi_add', $data);
		$this->load->view('include/footer');
	}
	
	/**
	 * pdi delete page
	 * @access public
	 */
	function delete()
	{
		if($this->user->checkPrivilege('pdi_delete') == false)
		{
			show_error("you have no privilege to access this page");
			return ;
		}
	
		$this->load->view('include/header');
		$this->load->view('include/nav');
		$this->load->view('pdi_view/pdi_delete');
		$this->load->view('include/footer');
	}
}