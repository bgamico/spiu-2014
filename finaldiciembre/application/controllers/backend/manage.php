<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Administracion del back end.
 *
 * @author Castro Patricio Nicolas
*/
class Manage extends CI_Controller
{
	/**
	 * pagina de inicio
	 * @access public
	 */
	function index()
	{
		$this->load->view('backend/include/header');
		$this->load->view('backend/include/nav');
		$this->load->view('backend/manage_index');
		$this->load->view('backend/include/footer');
	}
}