<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Handling extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('login');
            redirect($url);
		};
	}

    function pagePatient() {
        
    }

}
