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
        $data['dataAdmin']      = $this->db->query("SELECT * FROM table_account WHERE role = '0'");
        $data['activeMenu']     = '8';
        $this->load->view('v-admin', $data);
    }

    function insertAdmin() {
		$name                   = $this->input->post('name');
		$email                  = $this->input->post('email');
		$phone                  = $this->input->post('phone');
		$address                = $this->input->post('address');
		$password               = $this->input->post('password');
		$role                   = '0';
		$this->db->query("INSERT INTO table_account (name,phone,address,email,password,role) VALUES ('$name','$phone','$address','$email',md5('$password'),'$role')");
		redirect('account/admin');
    }

    function editAdmin() {
        $id                     = $this->input->post('code');
        $name                   = $this->input->post('name');
        $email                  = $this->input->post('email');
        $phone                  = $this->input->post('phone');
        $address                = $this->input->post('address');
        $status                 = $this->input->post('status');
		$this->db->query("UPDATE table_account SET name = '$name', email = '$email', phone = '$phone', address = '$address', status = '$status'  WHERE id = '$id'");
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
		redirect('account/admin');
    }

    function pageDoctor() {
        $data['dataDoctor']      = $this->db->query("SELECT * FROM table_account WHERE role = '1'");
        $data['activeMenu']     = '9';
        $this->load->view('v-doctor', $data);
    }

    function insertDoctor() {
		$name                   = $this->input->post('name');
		$email                  = $this->input->post('email');
		$phone                  = $this->input->post('phone');
		$address                = $this->input->post('address');
		$password               = $this->input->post('password');
		$role                   = '1';
		$this->db->query("INSERT INTO table_account (name,phone,address,email,password,role) VALUES ('$name','$phone','$address','$email',md5('$password'),'$role')");
		redirect('account/doctor');
    }

    function editDoctor() {
        $id                     = $this->input->post('code');
        $name                   = $this->input->post('name');
        $email                  = $this->input->post('email');
        $phone                  = $this->input->post('phone');
        $address                = $this->input->post('address');
        $status                 = $this->input->post('status');
		$this->db->query("UPDATE table_account SET name = '$name', email = '$email', phone = '$phone', address = '$address', status = '$status'  WHERE id = '$id'");
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
		redirect('account/doctor');
    }

}
