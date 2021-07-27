<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('login');
            redirect($url);
		};
	}

    function pagePatient() {
        $data['dataPatient']    = $this->db->query("SELECT * FROM table_patient");
        $data['activeMenu']     = '4';
        $this->load->view('patient/v-patient', $data);
    }

    function pageInsertPatient() {
        $data['dataPatient']    = $this->db->query("SELECT * FROM table_patient");
        $data['dataRoom']       = $this->db->query("SELECT * FROM table_room");
        $data['dataDoctor']     = $this->db->query("SELECT * FROM table_account WHERE role = '1'");
        $data['dataDoctorRad']  = $this->db->query("SELECT * FROM table_account WHERE role = '2'");
        $query                  = $this->db->query("SELECT MAX(mr_number) AS newCode FROM table_patient")->row_array();
        $lastID                 = $query['newCode'];
        $numb                   = substr($lastID, 2, 4);
        $newID                  = $numb + 1;
        $data['code']           = $newID;
        $data['activeMenu']     = '4';
        $this->load->view('patient/v-add-patient', $data);
    }

    function insertPatient() {
        $mr                     = $this->input->post('mr');
		$name                   = $this->input->post('name');
		$place                  = $this->input->post('place');
		$birth                  = $this->input->post('birth');
		$gender                 = $this->input->post('gender');
		$room                   = $this->input->post('room');
		$doctor                 = $this->input->post('doctor');
		$doctorRad              = $this->input->post('doctorRad');
		$this->db->query("INSERT INTO table_patient VALUES ('$mr','$name','$place','$birth','$gender','$room','$doctor','$doctorRad')");
		redirect('patient');
    }

}
