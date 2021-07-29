<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('login');
            redirect($url);
		};
	}

    function pageServiceRadiographer() {
        $data['activeMenu']     = '11';
        $this->load->view('report/v-service-radiographer', $data);
    }

}