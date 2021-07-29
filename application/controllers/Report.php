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

    function pageHandling() {
        $data['activeMenu']     = '13';
        $this->load->view('report/v-handling', $data);
    }

    function printHandling() {
        $data['dataRoom']       = $this->db->query("SELECT 
            name, COUNT(mr_number) AS qty FROM table_radiological_image JOIN table_handling ON table_radiological_image.`handling` = table_handling.`id` JOIN table_radiology_reading ON table_radiology_reading.`radiology` = table_radiological_image.`id`
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
            table_film.`size` as name,
            COUNT(table_radiological_image.`mr_number`) AS qty
        FROM table_film
            JOIN table_handling ON table_handling.`film` = table_film.`id`
            JOIN table_radiological_image ON table_radiological_image.`handling` = table_handling.`id`
            GROUP BY table_film.`size`
        ");
        $this->load->view('report/p-film', $data);
    }

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
            table_film.`size` as name,
            SUM(table_handling.`amount`) AS qty
        FROM table_film
            JOIN table_handling ON table_handling.`film` = table_film.`id`
            JOIN table_radiological_image ON table_radiological_image.`handling` = table_handling.`id`
            GROUP BY table_film.`size`
        ");
        $this->load->view('report/p-income-film', $data);
    }

    function printIncomeHandling() {
        $data['dataRoom']       = $this->db->query("SELECT 
            name,
            SUM(table_handling.`amount`) AS qty
        FROM table_radiological_image 
            JOIN table_handling ON table_radiological_image.`handling` = table_handling.`id` 
            JOIN table_radiology_reading ON table_radiology_reading.`radiology` = table_radiological_image.`id`
            GROUP BY NAME
        ");
        $this->load->view('report/p-income-handling', $data);
    }


}