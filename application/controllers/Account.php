<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('login');
            redirect($url);
		};
	}

    function pageAdmin() {
        $data['dataAdmin']      = $this->db->query("SELECT * FROM table_admin JOIN table_account ON table_admin.id = table_account.id");
        $query                  = $this->db->query("SELECT MAX(id) AS newCode FROM table_admin")->row_array();
        $lastID                 = $query['newCode'];
        $numb                   = substr($lastID, 1, 4);
        $newID                  = $numb + 1;
        $data['code']           = $newID;
        $data['activeMenu']     = '8';
        $this->load->view('v-admin', $data);
    }

    function insertAdmin() {
		$id                     = $this->input->post('code');
		$name                   = $this->input->post('name');
		$email                  = $this->input->post('email');
		$phone                  = $this->input->post('phone');
		$address                = $this->input->post('address');
		$password               = $this->input->post('password');
		$role                   = '0';
		$this->db->query("INSERT INTO table_account (id,email,password,role) VALUES ('$id','$email',md5('$password'),'$role')");
		$this->db->query("INSERT INTO table_admin (id,name,phone,address) VALUES ('$id','$name','$phone','$address')");
		redirect('account/admin');
    }

    function editAdmin() {
        $id                     = $this->input->post('code');
        $name                   = $this->input->post('name');
        $email                  = $this->input->post('email');
        $phone                  = $this->input->post('phone');
        $address                = $this->input->post('address');
        $status                 = $this->input->post('status');
		$this->db->query("UPDATE table_account SET status = '$status', email = '$email' WHERE id = '$id'");
        $this->db->query("UPDATE table_admin SET name = '$name', phone = '$phone', address = '$address' WHERE id = '$id'");
		redirect('account/admin');
    }

    function resetPasswordAdmin() {
        $id                     = $this->input->post('code');
        $password               = $this->input->post('password');
		$this->db->query("UPDATE table_account SET password = md5('$password')  WHERE id = '$id'");
		redirect('account/admin');
    }

    function deleteAdmin() {
        $id                     = $this->input->post('code');
		$this->db->query("DELETE FROM table_account WHERE id = '$id'");
		$this->db->query("DELETE FROM table_admin WHERE id = '$id'");
		redirect('account/admin');
    }

    function pageDoctor() {
        $data['dataDoctor']      = $this->db->query("SELECT * FROM table_doctor JOIN table_account ON table_doctor.id = table_account.id");
        $query                   = $this->db->query("SELECT MAX(id) AS newCode FROM table_doctor")->row_array();
        $lastID                  = $query['newCode'];
        $numb                    = substr($lastID, 1, 4);
        $newID                   = $numb + 1;
        $data['code']            = $newID;
        $data['activeMenu']      = '9';
        $this->load->view('v-doctor', $data);
    }

    function insertDoctor() {
		$id                     = $this->input->post('code');
		$name                   = $this->input->post('name');
		$email                  = $this->input->post('email');
		$phone                  = $this->input->post('phone');
		$address                = $this->input->post('address');
		$password               = $this->input->post('password');
		$role                   = '1';
		$this->db->query("INSERT INTO table_account (id,email,password,role) VALUES ('$id','$email',md5('$password'),'$role')");
		$this->db->query("INSERT INTO table_doctor (id,name,phone,address) VALUES ('$id','$name','$phone','$address')");
		redirect('account/doctor');
    }

    function editDoctor() {
        $id                     = $this->input->post('code');
        $name                   = $this->input->post('name');
        $email                  = $this->input->post('email');
        $phone                  = $this->input->post('phone');
        $address                = $this->input->post('address');
        $status                 = $this->input->post('status');
		$this->db->query("UPDATE table_account SET status = '$status', email = '$email' WHERE id = '$id'");
        $this->db->query("UPDATE table_doctor SET name = '$name', phone = '$phone', address = '$address' WHERE id = '$id'");
		redirect('account/doctor');
    }

    function resetPasswordDoctor() {
        $id                     = $this->input->post('code');
        $password               = $this->input->post('password');
		$this->db->query("UPDATE table_account SET password = md5('$password')  WHERE id = '$id'");
		redirect('account/doctor');
    }

    function deleteDoctor() {
        $id                     = $this->input->post('code');
		$this->db->query("DELETE FROM table_account WHERE id = '$id'");
		$this->db->query("DELETE FROM table_doctor WHERE id = '$id'");
		redirect('account/doctor');
    }

    function pageRadiologyDoctor() {
        $data['dataRadiologyDoctor']    = $this->db->query("SELECT * FROM table_doctor_radiology JOIN table_account ON table_doctor_radiology.id = table_account.id");
        $query                          = $this->db->query("SELECT MAX(id) AS newCode FROM table_doctor_radiology")->row_array();
        $lastID                         = $query['newCode'];
        $numb                           = substr($lastID, 1, 4);
        $newID                          = $numb + 1;
        $data['code']                   = $newID;
        $data['activeMenu']             = '10';
        $this->load->view('v-radiology-doctor', $data);
    }

    function insertRadiologyDoctor() {
		$id                     = $this->input->post('code');
		$name                   = $this->input->post('name');
		$email                  = $this->input->post('email');
		$phone                  = $this->input->post('phone');
		$address                = $this->input->post('address');
		$password               = $this->input->post('password');
		$role                   = '2';
		$this->db->query("INSERT INTO table_account (id,email,password,role) VALUES ('$id','$email',md5('$password'),'$role')");
		$this->db->query("INSERT INTO table_doctor_radiology (id,name,phone,address) VALUES ('$id','$name','$phone','$address')");
		redirect('account/radiology-doctor');
    }

    function editRadiologyDoctor() {
        $id                     = $this->input->post('code');
        $name                   = $this->input->post('name');
        $email                  = $this->input->post('email');
        $phone                  = $this->input->post('phone');
        $address                = $this->input->post('address');
        $status                 = $this->input->post('status');
		$this->db->query("UPDATE table_account SET status = '$status', email = '$email' WHERE id = '$id'");
        $this->db->query("UPDATE table_doctor_radiology SET name = '$name', phone = '$phone', address = '$address' WHERE id = '$id'");
		redirect('account/radiology-doctor');
    }

    function resetPasswordRadiologyDoctor() {
        $id                     = $this->input->post('code');
        $password               = $this->input->post('password');
		$this->db->query("UPDATE table_account SET password = md5('$password')  WHERE id = '$id'");
		redirect('account/radiology-doctor');
    }

    function deleteRadiologyDoctor() {
        $id                     = $this->input->post('code');
		$this->db->query("DELETE FROM table_account WHERE id = '$id'");
		$this->db->query("DELETE FROM table_doctor_radiology WHERE id = '$id'");
		redirect('account/radiology-doctor');
    }

}
