<?php
if (!defined( 'BASEPATH')) exit('No direct script access allowed'); 
class Home
{
    private $ci;
    
    public function __construct()
    {
    	$this->ci =& get_instance();
    	$this->ci->load->library('user');
    }
    
    public function check_login()
    {
			if($this->ci->session->userdata('username') == FALSE)
            {
	            	if (site_url() != current_url()){
		            	if (site_url('account/validate') != current_url() ){
		            		show_error('you have no privilege to access this page <a href="'. site_url() .'">back</a>');
	            		}
            		}
            }
            elseif($this->ci->user->checkPrivilege($this->ci->uri->segment(1).$this->ci->uri->segment(2)) == false && site_url() != current_url())
	        {
            		if (site_url('account/validate') != current_url() ){
            			show_error("you have no privilege to access this page");
            		    return ;
            		}
	        }

    }
    
    
}
/*
/end hooks/home.php
*/