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
        // $data['dataRoom']       = $this->db->query("SELECT 
        //     name, COUNT(mr_number) AS qty FROM table_radiological_image JOIN table_handling ON table_radiological_image.`handling` = table_handling.`id` GROUP BY name
        // ");
        // $data['dataRoom']       = $this->db->query("SELECT 
        //     table_handling.name, 
        //     COUNT(table_patient.mr_number) AS qty 
        //     ,table_doctor.`name` AS name_doctor
        //     ,table_doctor_radiology.`name` AS name_rad
        // FROM table_radiological_image 
        //     JOIN table_handling ON table_radiological_image.`handling` = table_handling.`id`
        //     JOIN table_patient ON table_patient.`mr_number` = table_radiological_image.`mr_number`
        //     JOIN table_doctor ON table_doctor.`id` = table_patient.`doctor`
        //     JOIN table_doctor_radiology ON table_doctor_radiology.`id` = table_patient.`radiology_doctor`
        //     GROUP BY table_handling.`name`
        // ");
        $data['dataRoom']       = $this->db->query("SELECT 
            table_handling.name, 
            COUNT(table_patient.mr_number) AS qty,
            table_admin.`name` AS name_admin,
            table_doctor_radiology.`name` AS name_rad
        FROM table_radiological_image 
            JOIN table_handling ON table_radiological_image.`handling` = table_handling.`id`
            JOIN table_patient ON table_patient.`mr_number` = table_radiological_image.`mr_number`
            JOIN table_admin ON table_admin.`id` = table_radiological_image.`admin`
            JOIN table_doctor_radiology ON table_doctor_radiology.`id` = table_patient.`radiology_doctor`
            GROUP BY NAME
        ");
        $this->load->view('report/p-service-radiographer', $data);
    }

    function pageDoctorRadiology() {
        $data['activeMenu']     = '12';
        $this->load->view('report/v-doctor-radiology', $data);
    }

    function printDoctorRadiology() {
        // $data['dataRoom']       = $this->db->query("SELECT 
        //     name, COUNT(mr_number) AS qty FROM table_radiological_image JOIN table_handling ON table_radiological_image.`handling` = table_handling.`id` JOIN table_radiology_reading ON table_radiology_reading.`radiology` = table_radiological_image.`id`
        //     GROUP BY NAME
        // ");
        $data['dataRoom']       = $this->db->query("SELECT 
            table_handling.name, 
            COUNT(table_patient.mr_number) AS qty
            ,table_admin.`name` AS name_doctor
            ,table_doctor_radiology.`name` AS name_rad
        FROM table_radiological_image 
            JOIN table_handling ON table_radiological_image.`handling` = table_handling.`id` 
            JOIN table_radiology_reading ON table_radiology_reading.`radiology` = table_radiological_image.`id`
            JOIN table_patient ON table_patient.`mr_number` = table_radiological_image.`mr_number`
            JOIN table_admin ON table_admin.`id` = table_radiological_image.`admin`
            JOIN table_doctor_radiology ON table_doctor_radiology.`id` = table_patient.`radiology_doctor`
            GROUP BY table_handling.name
        ");
        $this->load->view('report/p-doctor-radiology', $data);
    }

    function pageHandling() {
        $data['activeMenu']     = '13';
        $this->load->view('report/v-handling', $data);
    }

    function printHandling() {
        $data['dataRoom']       = $this->db->query("SELECT 
                table_handling.name, 
                COUNT(table_radiological_image.mr_number) AS qty 
        FROM table_radiological_image 
            JOIN table_handling ON table_radiological_image.`handling` = table_handling.`id` 
            JOIN table_patient ON table_patient.`mr_number` = table_radiological_image.`mr_number`
            JOIN table_radiology_reading ON table_radiology_reading.`radiology` = table_radiological_image.`id`
        GROUP BY NAME
        ");
        $this->load->view('report/p-handling', $data);
    }

    function pageFilm() {
        $data['activeMenu']     = '14';
        $this->load->view('report/v-film', $data);
    }

    function printFilm() {
        $data['dataRoom']       = $this->db->query("SELECT 
            table_film.`size` AS name,
            COUNT(table_radiological_image.`mr_number`) AS qty
        FROM table_film
            JOIN table_handling ON table_handling.`film` = table_film.`id`
            JOIN table_radiological_image ON table_radiological_image.`handling` = table_handling.`id`
            JOIN table_patient ON table_patient.`mr_number` = table_radiological_image.`mr_number`
            GROUP BY table_film.`size`
        ");
        $this->load->view('report/p-film', $data);
    }

    // function pageStock() {
    //     $data['activeMenu']     = '17';
    //     $this->load->view('report/v-film-stock', $data);
    // }

    // function printStock() {
    //     $data['dataRoom']       = $this->db->query("SELECT * FROM table_film");
    //     $this->load->view('report/p-film-stock', $data);
    // }

    function pageRoom() {
        $data['activeMenu']     = '15';
        $this->load->view('report/v-room', $data);
    }

    function printRoom() {
        $data['dataRoom']       = $this->db->query("SELECT 
            table_room.`name` AS name,
            COUNT(table_patient.`name`) AS qty
        FROM table_room
            JOIN table_patient ON table_patient.`room` = table_room.`id`
            GROUP BY table_room.`name`
        ");
        $this->load->view('report/p-room', $data);
    }

    function pageIncome() {
        $data['activeMenu']     = '16';
        $this->load->view('report/v-income', $data);
    }

    function printIncomeFilm() {
        $data['dataRoom']       = $this->db->query("SELECT 
            table_film.`size` AS name,
            SUM(table_handling.`amount`) AS qty
        FROM table_film
            JOIN table_handling ON table_handling.`film` = table_film.`id`
            JOIN table_radiological_image ON table_radiological_image.`handling` = table_handling.`id`
            JOIN table_patient ON table_patient.`mr_number` = table_radiological_image.`mr_number`
            GROUP BY table_film.`size`
        ");
        $this->load->view('report/p-income-film', $data);
    }

    function printIncomeHandling() {
        $data['dataRoom']       = $this->db->query("SELECT 
            table_handling.name,
            SUM(table_handling.`amount`) AS qty
        FROM table_radiological_image 
            JOIN table_handling ON table_radiological_image.`handling` = table_handling.`id` 
            JOIN table_patient ON table_patient.`mr_number` = table_radiological_image.`mr_number`
            JOIN table_radiology_reading ON table_radiology_reading.`radiology` = table_radiological_image.`id`
            GROUP BY NAME
        ");
        $this->load->view('report/p-income-handling', $data);
    }

    function printIncomeRoom() {
        $data['dataRoom']       = $this->db->query("SELECT 
            table_room.`name` AS name,
            SUM(table_handling.`amount`) AS qty
        FROM table_room
            JOIN table_patient ON table_patient.`room` = table_room.`id`
            JOIN table_radiological_image ON table_radiological_image.`mr_number` = table_patient.`mr_number`
            JOIN table_handling ON table_handling.`id` = table_radiological_image.`handling`
            GROUP BY table_room.`name`
        ");
        $this->load->view('report/p-income-room', $data);
    }

    function printPreview($id) {
        $data['dataRad']   		= $this->db->query("SELECT 
            table_radiological_image.id, 
            table_radiological_image.`file`, 
            table_patient.name, 
            table_patient.`mr_number`, 
            table_patient.`gender`, 
            table_radiological_image.`create_at`,
            table_doctor.`name` AS doctor_name, 
            table_doctor_radiology.`name` AS doctor_rad, 
            table_room.`name` AS room,
            table_handling.`name` AS handling,
            table_handling.`amount`
        FROM table_radiological_image
            JOIN table_patient ON table_radiological_image.`mr_number` = table_patient.`mr_number`
            JOIN table_doctor ON table_patient.`doctor` = table_doctor.`id`
            JOIN table_doctor_radiology ON table_patient.`radiology_doctor` = table_doctor_radiology.`id`
            JOIN table_room ON table_patient.`room` = table_room.`id`
            JOIN table_handling ON table_radiological_image.handling = table_handling.`id`
        WHERE table_radiological_image.id = '$id' LIMIT 1
        ");
        $dataReading      		= $this->db->query("SELECT * FROM table_radiology_reading WHERE radiology = '$id'")->row_array();
        $data['desc']           = $dataReading['description'];
        $this->load->view('report/p-preview', $data);
    }


}