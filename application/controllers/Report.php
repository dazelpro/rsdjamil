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

    function printServiceRadiographer() {
        $data['dataRoom']       = $this->db->query("SELECT name, COUNT(mr_number) AS qty FROM table_radiological_image JOIN table_handling ON table_radiological_image.`handling` = table_handling.`id` GROUP BY name");
        $this->load->view('report/p-service-radiographer', $data);
    }

}