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

    function pageDoctorRadiology() {
        $data['activeMenu']     = '12';
        $this->load->view('report/v-doctor-radiology', $data);
    }

    function printDoctorRadiology() {
        $data['dataRoom']       = $this->db->query("SELECT 
            name, COUNT(mr_number) AS qty FROM table_radiological_image JOIN table_handling ON table_radiological_image.`handling` = table_handling.`id` JOIN table_radiology_reading ON table_radiology_reading.`radiology` = table_radiological_image.`id`
            GROUP BY NAME
        ");
        $this->load->view('report/p-doctor-radiology', $data);
    }


}