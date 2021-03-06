<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Handling extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('login');
            redirect($url);
		};
        $this->load->library('upload');
        $this->load->helper('text');
        $this->load->helper('string');
	}

    function pageHandling() {
        $data['dataHandling']   = $this->db->query("SELECT table_handling.`id`, NAME as name, amount, film, size FROM table_handling JOIN table_film ON table_handling.`film` = table_film.`id`");
        $data['dataFilm']  		= $this->db->query("SELECT * FROM table_film");
        $query                  = $this->db->query("SELECT MAX(id) AS newCode FROM table_handling")->row_array();
        $lastID                 = $query['newCode'];
        $numb                   = substr($lastID, 1, 4);
        $newID                  = $numb + 1;
        $data['code']           = $newID;
        $data['activeMenu']     = '5';
        $this->load->view('v-handling', $data);
    }

	function insertHandling() {
        $id                     = $this->input->post('code');
		$name                   = $this->input->post('name');
		$size                   = $this->input->post('size');
		$amount                 = $this->input->post('amount');
		$this->db->query("INSERT INTO table_handling (id,name,film,amount) VALUES ('$id','$name','$size','$amount')");
		redirect('handling');
    }

	function editHandling() {
        $id                     = $this->input->post('code');
        $name                   = $this->input->post('name');
		$size                   = $this->input->post('size');
		$amount                 = $this->input->post('amount');
		$this->db->query("UPDATE table_handling SET NAME = '$name', film = '$size', amount = '$amount' WHERE id = '$id'");
		redirect('handling');
    }

	function deleteHandling() {
        $id                     = $this->input->post('code');
		$this->db->query("DELETE FROM table_handling WHERE id = '$id'");
		redirect('handling');
    }

	// Radiology
	function pageRadiology() {
        $data['dataRad']   		= $this->db->query("SELECT 
            table_radiological_image.id, table_patient.name, table_admin.`name` AS doctor_name, table_doctor_radiology.`name` AS doctor_rad
        FROM table_radiological_image
            JOIN table_patient ON table_radiological_image.`mr_number` = table_patient.`mr_number`
            JOIN table_admin ON table_radiological_image.`admin` = table_admin.`id`
            JOIN table_doctor_radiology ON table_patient.`radiology_doctor` = table_doctor_radiology.`id`
        ");
        $data['activeMenu']     = '6';
        $this->load->view('radiology/v-radiology', $data);
    }

	function pageInsertRadiology() {
        $data['dataRad']       	= $this->db->query("SELECT * FROM table_radiological_image");
        $data['dataHandling']   = $this->db->query("SELECT table_handling.id, table_handling.film, name, amount, size, stock FROM table_handling JOIN table_film ON table_film.`id` = table_handling.`film`");
        $data['dataPatient']   	= $this->db->query("SELECT table_patient.`mr_number`, table_patient.`name` AS name_patient, table_doctor.`name` AS name_doctor, table_doctor_radiology.`name` AS name_doctor_rad, table_room.`name` AS room FROM table_patient JOIN table_doctor ON table_patient.`doctor` = table_doctor.`id` JOIN table_doctor_radiology ON table_doctor_radiology.`id` = table_patient.`radiology_doctor` JOIN table_room ON table_room.`id` = table_patient.`room`");
        $data['activeMenu']     = '6';
        $this->load->view('radiology/v-add-radiology', $data);
    }

    function pageDetailRadiology($id) {
        $data['dataRad']   		= $this->db->query("SELECT 
            table_radiological_image.id, 
            table_radiological_image.`file`, 
            table_patient.name, 
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
        WHERE table_radiological_image.id = '$id'
        ");
        $data['activeMenu']     = '6';
        $this->load->view('radiology/v-detail-radiology', $data);
    }

	function insertRadiology() {
        $config['upload_path'] = './assets/images/upload';
        $config['allowed_types'] = 'jpg|png|jpeg';
		$config['encrypt_name'] = TRUE;
		$config['max_size'] = 5000;
        
        $this->upload->initialize($config);
        if(!empty($_FILES['image']['name'])){
            if ($this->upload->do_upload('image')){
                $gbr           = $this->upload->data();
                $foto          = $gbr['file_name'];
                $id            = $this->input->post('code');
                $mr            = $this->input->post('mr');
                $handling      = $this->input->post('handling');
                $user          = $this->input->post('user');
                $film          = $this->input->post('film');
                $stockInput    = $this->input->post('stock');
                $stock         = $stockInput - 1;
                $this->db->query("INSERT INTO table_radiological_image (id,mr_number,handling,file,admin) VALUES ('$id','$mr','$handling','$foto','$user')");
                $this->db->query("UPDATE table_film SET stock = '$stock' WHERE id = '$film'");
                redirect('handling/radiology');
			}else{
				echo $this->session->set_flashdata('msg','<div class="alert alert-danger border-danger">
                <strong>Upload failed!</strong> Please upload images in JPG, PNG, JPEG and a maximum size of 5MB.
                </div>');
				redirect('handling/radiology/new');
            }
        }
    }

	function editRadiology() {
        $id                     = $this->input->post('code');
        $name                   = $this->input->post('name');
		$size                   = $this->input->post('size');
		$amount                 = $this->input->post('amount');
		$this->db->query("UPDATE table_handling SET NAME = '$name', film = '$size', amount = '$amount' WHERE id = '$id'");
		redirect('handling/radiology');
    }

	function deleteRadiology() {
        $id                     = $this->input->post('code');
		$this->db->query("DELETE FROM table_radiological_image WHERE id = '$id'");
		redirect('handling/radiology');
    }

    // Reading
    function pageReading() {
        $queryCondition = '';
        $idLogin = $this->session->userdata('id');
        if ($this->session->userdata('access') == 2) { //Jika yang mengakses adalah Dokter Radiologi, maka tambahkan Query Where.
            $queryCondition = "WHERE table_doctor_radiology.`id` = '$idLogin' ";
        }
        $data['dataRad']   		= $this->db->query("SELECT 
            table_radiological_image.id, 
            table_patient.name, 
            table_admin.`name` AS doctor_name, 
            table_doctor_radiology.`name` AS doctor_rad,
            table_radiological_image.status
        FROM table_radiological_image
            JOIN table_patient ON table_radiological_image.`mr_number` = table_patient.`mr_number`
            JOIN table_admin ON table_radiological_image.`admin` = table_admin.`id`
            JOIN table_doctor_radiology ON table_patient.`radiology_doctor` = table_doctor_radiology.`id`
            $queryCondition
        ");
        $data['activeMenu']     = '7';
        $this->load->view('reading/v-reading', $data);
    }

    function pageInputReading($id) {
        $data['dataRad']   		= $this->db->query("SELECT 
            table_radiological_image.id, 
            table_radiological_image.`file`, 
            table_patient.name, 
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
        WHERE table_radiological_image.id = '$id'
        ");
        $data['activeMenu']     = '7';
        $this->load->view('reading/v-input-reading', $data);
    }

    function pageEditReading($id) {
        $data['dataRad']   		= $this->db->query("SELECT 
            table_radiological_image.id, 
            table_radiological_image.`file`, 
            table_patient.name, 
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
        WHERE table_radiological_image.id = '$id'
        ");
        $dataReading      		= $this->db->query("SELECT * FROM table_radiology_reading WHERE radiology = '$id'")->row_array();
        $data['desc']           = $dataReading['description'];
        $data['activeMenu']     = '7';
        $this->load->view('reading/v-edit-reading', $data);
    }

    function pagePreviewReading($id) {
        $data['dataRad']   		= $this->db->query("SELECT 
            table_radiological_image.id, 
            table_radiological_image.`file`, 
            table_patient.name, 
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
        WHERE table_radiological_image.id = '$id'
        ");
        $dataReading      		= $this->db->query("SELECT * FROM table_radiology_reading WHERE radiology = '$id'")->row_array();
        $data['desc']           = $dataReading['description'];
        $data['activeMenu']     = '7';
        $this->load->view('reading/v-preview-reading', $data);
    }

    function insertReading() {
        $idRad                  = $this->input->post('code');
		$desc                   = $this->input->post('desc');
		$this->db->query("INSERT INTO table_radiology_reading (radiology,description) VALUES ('$idRad','$desc')");
		$this->db->query("UPDATE table_radiological_image SET status = 1 WHERE id = '$idRad'");
		redirect('handling/radiology-reading');
    }

    function updateReading() {
        $idRad                  = $this->input->post('code');
		$desc                   = $this->input->post('desc');
		$this->db->query("UPDATE table_radiology_reading SET description = '$desc' WHERE radiology = '$idRad'");
		$this->db->query("UPDATE table_radiological_image SET status = 1 WHERE id = '$idRad'");
		redirect('handling/radiology-reading');
    }

}
